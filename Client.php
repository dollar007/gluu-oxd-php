<?php

abstract class Client{

    protected $socket = null;
    protected $data = array();
    protected $response;
    protected $protacol='tcp';
    protected $ip = '127.0.0.1';
    protected $port = 8099;
    protected $command;
    protected $params = array();
    /**
     * abstract Client constructor.
     * @param $protacol='tcp', $ip='127.0.0.1', $port=8099
     */
    public function __construct($protacol, $ip, $port)
    {
        $this->protacol =  $protacol;
        $this->ip =  $ip;
        $this->port =  $port;
    }
    /**
     * send function sends the command to the oxD server.
    Args:
    command (dict) - Dict representation of the JSON command string
     **/
    protected function send()
    {
        if(!$this->socket = stream_socket_client($this->protacol.'://'.$this->ip.':'.$this->port,$errno,$errstr,STREAM_CLIENT_PERSISTENT)){
            die($errno);
        }
        $this->data = array('command'=>$this->command,'params'=>$this->params);
        $this->data= json_encode($this->data,JSON_PRETTY_PRINT);
        fwrite($this->socket,$this->data);
        $this->getResult($this->socket,'command:'.$this->command);
        $this->disconnect($this->socket);
    }
    /**
     * @return null
     */
    protected function getSocket()
    {
        return $this->socket;
    }

    /**
     * @param null $socket
     */
    protected function setSocket($socket)
    {
        $this->socket = $socket;
    }

    /**
     * @return array
     */
    protected function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    protected function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    protected function getProtacol()
    {
        return $this->protacol;
    }

    /**
     * @param mixed $protacol
     */
    protected function setProtacol($protacol)
    {
        $this->protacol = $protacol;
    }

    /**
     * @return mixed
     */
    protected function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $response
     */
    protected function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * @return mixed
     */
    protected function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     */
    protected function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return mixed
     */
    protected function getPort()
    {
        return $this->port;
    }

    /**
     * @param mixed $port
     */
    protected function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return mixed
     */
    protected function getCommand()
    {
        return $this->command;
    }

    /**
     * @param mixed $command
     */
    abstract function setCommand();
    /**
     * getResult function geting result from oxD server.
    Print:
    response - The JSON response from the oxD Server and print
     **/
    protected function getResult($socket,$command, $sinbol=80048){
        $this->response = fread($this->socket, $sinbol);
        $object = json_decode($this->response);
        echo '<div style="border: 1px solid black;">';
        echo '<p>'.$command.'</p>';
        echo '<pre>';
        var_dump($object);
        echo '</pre></div><br.>';
    }
    /**
     * disconnect function closing connection .
     **/
    protected function disconnect($socket){
        fclose($socket);
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