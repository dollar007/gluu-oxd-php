<?php
/**
 * Created Vlad Karapetyan
 */

require_once 'Oxd_RP_config.php';

class Client_Socket_OXD_RP{

    protected static $socket = null;
    protected  $base_url = './';
    /*
     * Socket_oxd constructor.
    */
    public function __construct($base_url)
    {
        if($base_url){
            $this->base_url = $base_url;
        }
        $configJSON = file_get_contents($this->base_url.'oxd-rp-settings.json');
        $configOBJECT = json_decode($configJSON);
        if(!$configOBJECT->authorization_redirect_uri){
            if(!$configJSON = file_get_contents($this->base_url.'oxd-rp-settings-test.json')){
                $error = error_get_last();
                $this->log("oxd-configuration-test: ", 'Error problem with json data.');
                $this->error_message("HTTP request failed. Error was: " . $error['message']);
            }
        }
        $configOBJECT = json_decode($configJSON);
        $this->define_variables($configOBJECT);
        if (filter_var(Oxd_RP_config::$oxd_host_ip, FILTER_VALIDATE_IP) === false) {
            $this->error_message(Oxd_RP_config::$oxd_host_ip." is not a valid IP address");
        }

        if(is_int(Oxd_RP_config::$oxd_host_port) && Oxd_RP_config::$oxd_host_port>=0 && Oxd_RP_config::$oxd_host_port<=65535){

        }else{
            $this->error_message(Oxd_RP_config::$oxd_host_port."is not a valid port for socket. Port must be integer and between from 0 to 65535.");
        }
        $this->oxd_socket_connection();
    }
    /**
     * request to oxd socket
     * @return object
     **/
    public function define_variables($configOBJECT){
        Oxd_RP_config::$oxd_host_ip = $configOBJECT->oxd_host_ip;
        Oxd_RP_config::$oxd_host_port = $configOBJECT->oxd_host_port;
        Oxd_RP_config::$authorization_redirect_uri = $configOBJECT->authorization_redirect_uri;
        Oxd_RP_config::$logout_redirect_uri = $configOBJECT->logout_redirect_uri;
        Oxd_RP_config::$scope = $configOBJECT->scope;
        Oxd_RP_config::$application_type = $configOBJECT->application_type;
        Oxd_RP_config::$redirect_uris = $configOBJECT->redirect_uris;
        Oxd_RP_config::$response_types = $configOBJECT->response_types;
        Oxd_RP_config::$grant_types = $configOBJECT->grant_types;
        Oxd_RP_config::$acr_values = $configOBJECT->acr_values;

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
        if (!self::$socket = stream_socket_client( Oxd_RP_config::$oxd_host_ip . ':' . Oxd_RP_config::$oxd_host_port, $errno, $errstr, STREAM_CLIENT_PERSISTENT)) {
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
        $OldFile  = $this->base_url.'logs/oxd-php-server-'.date("Y-m-d") .'.log';
        $person = "\n".date('l jS \of F Y h:i:s A')."\n".$process.$message."\n";
        file_put_contents($OldFile, $person, FILE_APPEND | LOCK_EX);

    }



}