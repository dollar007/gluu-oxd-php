<?php
/**
 * Created Vlad Karapetyan
 */

require_once 'Oxd_config.php';

class Client_Socket_OXD{
    protected static $socket = null;

    /**
     * Socket_oxd constructor.
     */
    public function __construct()
    {
        $configJSON = file_get_contents('../oxd-configuration.json');
        $configOBJECT = json_decode($configJSON);
        if(!$configOBJECT->gluuServerUrl){
            if(!$configJSON = file_get_contents('../oxd-configuration-test.json')){
                $error = error_get_last();
                $this->log("oxd-configuration-test: ", 'Error problem with json data.');
                $this->error_message("HTTP request failed. Error was: " . $error['message']);
            }
        }
        $configOBJECT = json_decode($configJSON);
        $this->define_variables($configOBJECT);
        if (filter_var(Oxd_config::$localhostIp, FILTER_VALIDATE_IP) === false) {
            $this->error_message(Oxd_config::$localhostIp." is not a valid IP address");
        }

        if(is_int(Oxd_config::$localhostPort) && Oxd_config::$localhostPort>=0 && Oxd_config::$localhostPort<=65535){

        }else{
            $this->error_message(Oxd_config::$localhostPort."is not a valid port for socket. Port must be integer and between from 0 to 65535.");
        }
        $this->oxd_socket_connection();
    }
    /**
     * request to oxd socket
     * @return object
     **/
    public function define_variables($configOBJECT){
        Oxd_config::$localhostIp = $configOBJECT->ip;
        Oxd_config::$localhostPort = $configOBJECT->port;
        Oxd_config::$gluuServerUrl = $configOBJECT->gluuServerUrl;
        Oxd_config::$amHost = $configOBJECT->amHost;
        Oxd_config::$userId = $configOBJECT->userId;
        Oxd_config::$userSecret = $configOBJECT->userSecret;
        Oxd_config::$clientId = $configOBJECT->clientId;
        Oxd_config::$clientSecret = $configOBJECT->clientSecret;
        Oxd_config::$clientRedirectURL = $configOBJECT->clientRedirectURL;
        Oxd_config::$logoutRedirectUrl = $configOBJECT->logoutRedirectUrl;
        Oxd_config::$appType = $configOBJECT->appType;
        Oxd_config::$grantTypes = $configOBJECT->grantTypes;
        Oxd_config::$responseTypes = $configOBJECT->responseTypes;
        Oxd_config::$httpMethod = $configOBJECT->httpMethod;
        Oxd_config::$discoveryUrl = $configOBJECT->gluuServerUrl."/.well-known/openid-configuration";
        Oxd_config::$umaDiscoveryUrl = $configOBJECT->gluuServerUrl."/.well-known/uma-configuration";
        Oxd_config::$jwks = $configOBJECT->gluuServerUrl."/jwks";
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
        $result = fread(self::$socket, $char_count);
        if($result){
            $this->log("Client: oxd_socket_response", $result);
        }else{
            $this->log("Client: oxd_socket_response", 'Error socket reading process.');
        }
        return $result;
    }

    /*
     * connection
     * */
    public function oxd_socket_connection(){
        if (!self::$socket = stream_socket_client( Oxd_config::$localhostIp . ':' . Oxd_config::$localhostPort, $errno, $errstr, STREAM_CLIENT_PERSISTENT)) {
            $this->log("Client: socket::socket_connect is not connected, error: ",$errstr);
            die($errno);
        }else{
            $this->log("Client: socket::socket_connect", "socket connected");
        }
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
    /**
     * saving process in log file.
     **/
    public function log($process, $message){
        $OldFile  = '../logs/oxd-php-server-'.date("Y-m-d") .'.log';
        $person = "\n".date('l jS \of F Y h:i:s A')."\n".$process.$message."\n";
        file_put_contents($OldFile, $person, FILE_APPEND | LOCK_EX);

    }



}