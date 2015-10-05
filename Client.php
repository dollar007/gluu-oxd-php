<?php

abstract class Client{

    protected static $socket = null;
    protected $data = array();
    protected $protacol;
    protected $ip;
    protected $port;
    protected $command;
    protected $params = array();
    protected $response_json;
    protected $response_object;
    private $response_status;
    private $response_data = array();
    private $command_types = array( 'register_client','client_read','authorization_code_flow',
                                    'get_authorization_url','get_tokens_by_code','get_user_info',
                                    'obtain_pat','obtain_aat','obtain_rpt','authorize_rpt',
                                    'register_resource','rpt_status','discovery',
                                    'id_token_status','access_token_status',
                                    'register_ticket','register_site',
    );

    /**
     * abstract Client constructor.
     * @param $protacol='tcp', $ip='127.0.0.1', $port=8099
     */
    public function __construct($protacol='tcp', $ip='127.0.0.1', $port=8099)
    {

        $this->setProtacol($protacol);
        $this->setIp($ip);
        $this->setPort($port);
        $this->setCommand();

    }
    /**
     * send function sends the command to the oxD server.
    Args:
    command (dict) - Dict representation of the JSON command string
     **/
    public function request($sinbol=8048)
    {
        $this->setParams();
        if(!self::$socket = stream_socket_client($this->getProtacol().'://'.$this->getIp().':'.$this->getPort(),$errno,$errstr,STREAM_CLIENT_PERSISTENT)){
            die($errno);
        }
        $exist = false;
        for($i=0; $i<count($this->command_types);$i++){

            if($this->command_types[$i]== $this->getCommand()){
                $exist =true;
                break;
            }
        }
        if(!$exist){
            die('Command: '. $this->getCommand(). ' not exist!');
        }

        foreach($this->getParams() as $key => $val){

            if(is_array($val)){
                if(empty($val)){
                    die('Params: '. $key. ' can not be empty!');
                }
            }
            if($val== null || $val==''){
                die('Params: '. $key. ' can not be null or empty!');
            }
        }

        $this->setData(array('command'=>$this->getCommand(),'params'=>$this->getParams()));


        fwrite(self::$socket,utf8_encode(json_encode($this->getData(),JSON_PRETTY_PRINT)));


        if($this->response_json = fread(self::$socket, $sinbol)){
            var_dump($this->response_json);
            $this->response_object = json_decode($this->response_json);
        }else{
            die('Respons is empty...');
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
        if(!$this->getResponseObject()){
            $this->response_data ='Data is empty';
        }else {
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
    public function getProtacol()
    {
        return $this->protacol;
    }

    /**
     * @param mixed $protacol
     */
    public function setProtacol($protacol)
    {
        $this->protacol = $protacol;
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
    Return: response_object - The JSON response parsing to object
     **/
    public function getResponseObject(){


        return  $this->response_object;
    }
    /**
     * getResult function geting result from oxD server.
        return: response - The JSON response from the oxD Server
     **/
    public function getResponseJSON(){
        return $this->response_json;
    }

    /**
     * disconnect function closing socket connection.
     **/
    public function disconnect(){
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

}