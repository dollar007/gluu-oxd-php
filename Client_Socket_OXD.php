<?php
/**
 * Created by PhpStorm.
 * User: Vlad Karapetyan
 * Date: 11/9/2015
 * Time: 4:15 PM
 */

class Client_Socket_OXD{

    protected $ip = '127.0.0.1';
    protected $port = 8099;
    protected static $socket = null;

    /**
     * Socket_oxd constructor.
     * @param $ip ='127.0.0.1', $port=8099
     */
    public function __construct($ip = '127.0.0.1', $port = 8099)
    {
        $this->setIp($ip);
        $this->setPort($port);
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
        $this->oxd_socket_connection();
    }
    /**
     * request to oxd socket
     **/
    public function oxd_socket_request($data){
        $this->log("Client: oxd_socket_request", fwrite(self::$socket, $data));
        fwrite(self::$socket, $data);
    }
    /**
     * response from oxd socket
     * @return string
     **/
    public function oxd_socket_response($char_count = 8192){
        if(fread(self::$socket, $char_count)){
            $this->log("Client: oxd_socket_response", fread(self::$socket, $char_count));
        }else{
            $this->log("Client: oxd_socket_response", 'Error socket reading process.');
        }
        return fread(self::$socket, $char_count);
    }

    /*
     * connection
     * */
    public function oxd_socket_connection(){
        if (!self::$socket = stream_socket_client( $this->getIp() . ':' . $this->getPort(), $errno, $errstr, STREAM_CLIENT_PERSISTENT)) {
            $this->log("Client: socket::socket_connect()",$errno);
            die($errno);
        }else{
            $this->log("Client: socket::socket_connect()", "socket connected");
        }
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
     * @return null
     */
    public static function getSocket()
    {
        return self::$socket;
    }

    /**
     * @param null $socket
     */
    public static function setSocket($socket)
    {
        self::$socket = $socket;
    }

    /**
     * function closing socket connection.
     **/
    public function disconnect()
    {
        if(fclose(self::$socket)){
            $this->log("Client: oxd_socket_connection", "disconnected.");
        }
    }
    /**
     * showing errors and exit.
     **/

    public function error_message($error)
    {
        die($error);
    }
    public function log($reason, $extra, $return = false){
        $log = '
	<div class="log">
		<h1>'.$reason.'</h1>
		<p><strong>Message:</strong>
			<span>'.$extra.'</span>
		</p>
	</div>'.PHP_EOL;

        if($return == true){
            return $log;
        }else{
            $this->log[] = $log;
        }
    }

}