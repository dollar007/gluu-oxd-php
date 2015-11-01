<?php

abstract class Client
{

    protected static $socket = null;
    protected $data = array();
    protected $ip;
    protected $port;
    protected $command;
    protected $params = array();
    protected $response_json;
    protected $response_object;
    protected $response_status;
    protected $response_data = array();
    private $command_types = array(
                                'register_client', 'client_read', 'obtain_pat', 'obtain_aat',
                                'obtain_rpt', 'authorize_rpt', 'register_resource', 'rpt_status',
                                'id_token_status', 'access_token_status', 'register_ticket', 'discovery',
                                'authorization_code_flow', 'get_authorization_url', 'get_tokens_by_code',
                                'get_user_info', 'register_site',
    );

    /**
     * abstract Client constructor.
     * @param $ip ='127.0.0.1', $port=8099
     */
    public function __construct($ip = '127.0.0.1', $port = 8099)
    {
        if (!filter_var($ip, FILTER_VALIDATE_IP) === false) {
            $this->setIp($ip);
        } else {
            $this->error_message("$ip is not a valid IP address");
        }


        if(is_int($port) && $port>=0 && $port<=65535){
            $this->setPort($port);
        }else{
            $this->error_message("$port is not a valid port for socket. Port must be integer and between from 0 to 65535.");
        }
        $this->setCommand();
        $exist = false;
        for ($i = 0; $i < count($this->command_types); $i++) {

            if ($this->command_types[$i] == $this->getCommand()) {
                $exist = true;
                break;
            }
        }

        if (!$exist) {
            $this->error_message('Command: ' . $this->getCommand() . ' not exist!');
        }


    }

    /**
     * send function sends the command to the oxD server.
     * Args:
     * command (dict) - Dict representation of the JSON command string
     **/
    public function request()
    {
        $this->setParams();
        if (!self::$socket = stream_socket_client( $this->getIp() . ':' . $this->getPort(), $errno, $errstr, STREAM_CLIENT_PERSISTENT)) {
            die($errno);
        }

        /*foreach ($this->getParams() as $key => $val) {

            if (is_array($val)) {
                if (empty($val)) {
                    $this->error_message('Params: ' . $key . ' can not be empty!');
                }
            }
            if ($val == null || $val == '') {
                $this->error_message('Params: ' . $key . ' can not be null or empty!');
            }
        }*/

        $this->setData(array('command' => $this->getCommand(), 'params' => $this->getParams()));
        $jsondata = json_encode($this->getData());

        if(!$this->is_JSON($jsondata)){
            $this->error_message('Sending parameters must be JSON.');
        }
        $lenght = strlen($jsondata);
        if($lenght<=0){
            $this->error_message("Length must be more than zero.");
        }else{
            $lenght = $lenght <= 999 ? "0" . $lenght : $lenght;
        }

        fwrite(self::$socket, utf8_encode($lenght . $jsondata));

        $this->response_json = fread(self::$socket, 8192);

        $this->response_json = str_replace(substr($this->response_json, 0, 4), "", $this->response_json);
        if(!$this->is_JSON($this->response_json)){
            $this->error_message('Reading parameter is not JSON.');
        }
        if ($this->response_json) {
            $object = json_decode($this->response_json);
            if ($object->status == 'error') {
                $this->error_message($object->data->error . ' : ' . $object->data->error_description);
            } elseif ($object->status == 'ok') {
                $this->response_object = json_decode($this->response_json);
            }
        } else {
            $this->error_message('Response is empty...');
        }
    }

    /**
     * @return mixed
     */
    public function getResponseStatus()
    {
        return $this->response_status;
    }

    /**
     * @param mixed $response_status
     */
    public function setResponseStatus()
    {
        $this->response_status = $this->getResponseObject()->status;
    }

    /**
     * @return mixed
     */
    public function getResponseData()
    {
        if (!$this->getResponseObject()) {
            $this->response_data = 'Data is empty';
            $this->error_message($this->response_data);
        } else {
            $this->response_data = $this->getResponseObject()->data;
        }
        return $this->response_data;
    }

    /**
     * @return null
     */
    public function getSocket()
    {
        return self::$socket;
    }

    /**
     * @param null $socket
     */
    public function setSocket($socket)
    {
        self::$socket = $socket;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param mixed $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return mixed
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * @param mixed $command
     */
    abstract function setCommand();

    /**
     * getResult function geting result from oxD server.
     * Return: response_object - The JSON response parsing to object
     **/
    public function getResponseObject()
    {


        return $this->response_object;
    }

    /**
     * getResult function geting result from oxD server.
     * return: response - The JSON response from the oxD Server
     **/
    public function getResponseJSON()
    {
        return $this->response_json;
    }

    /**
     * disconnect function closing socket connection.
     **/
    public function disconnect()
    {
        fclose(self::$socket);
    }

    /**
     * @param array $params
     */
    abstract function setParams();

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * showing errors.
     **/
    public function error_message($error)
    {
        die($error);
    }

    /**
     * chacking format string.
     **/
    public function is_JSON($string){
        return is_string($string) && is_object(json_decode($string)) ? true : false;
    }

}