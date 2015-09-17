<?php

class Client{

    private $socket = null;
    private $data = array();
    private $response;
    private $protacol;
    private $ip;
    private $port;
    /**
     * Args: port (integer) - the port number to bind to the 127.0.0.1, default is 8099
     **/
    public function __construct($protacol='tcp', $ip='127.0.0.1', $port=8099)
    {
        /*
         *  A class which takes care of the socket communication with oxD Server.
         *  The object is initialized with the port number
        */
        $this->protacol =  $protacol;
        $this->ip =  $ip;
        $this->port =  $port;

    }
    /**
     * @return null
     **/
    public function getSocket()
    {
        return $this->socket;
    }
    /**
     * send function sends the command to the oxD server.
    Args:
    command (dict) - Dict representation of the JSON command string
     **/
    public function send($command,$params)
    {
        if(!$this->socket = stream_socket_client($this->protacol.'://'.$this->ip.':'.$this->port,$errno,$errstr,STREAM_CLIENT_PERSISTENT)){
            die($errno);
        }
        $this->data = array('command'=>$command,'params'=>$params);
        $this->data= json_encode($this->data,JSON_PRETTY_PRINT);
        fwrite($this->socket,$this->data);
        $this->getResult($this->socket,'command:'.$command);
        $this->disconnect($this->socket);
    }
    public function send_test_register_client(
        $command='register_client',
        $params = array( "discovery_url"=>"https://seed.gluu.org/.well-known/openid-configuration",
            "redirect_url"=>"https://rs.gluu.org/resources",
            "client_name"=>"oxD Client",
            "response_types"=>"code id_token token",
            "app_type"=>"web",
            "grant_types"=>"authorization_code implicit",
            "contacts"=>"mike@gluu.org yuriy@gluu.org",
            "jwks_uri"=>"https://seed.gluu.org/jwks")
    )
    {
        $this->send($command,$params);
    }
    public function send_test_client_read(
        $command='client_read',
        $params = array( "registration_client_uri"=>"https://seed.gluu.org/oxauth/rest1/register?client_id=23523534",
            "registration_access_token"=>"this.is.an.access.token.value.ffx83"
        )
    ){
        $this->send($command,$params);
    }
    public function send_test_obtain_pat(
        $command='obtain_pat',
        $params = array( "discovery_url"=>"https://seed.gluu.org/.well-known/openid-configuration",
            "uma_discovery_url"=>"http://seed.gluu.org/.well-known/uma-configuration",
            "redirect_url"=>"https://rs.gluu.org/resources",
            "client_id"=>"@!1111!0008!0068.3E20",
            "client_secret"=>"32c2fb17-409d-48a2-b793-a639c8ac6cb2",
            "user_id"=>"yuriy",
            "user_secret"=>"secret"
        )
    ){
        $this->send($command,$params);
    }
    public function send_test_obtain_aat(
        $command='obtain_aat',
        $params = array( "discovery_url"=>"https://seed.gluu.org/.well-known/openid-configuration",
            "uma_discovery_url"=>"http://seed.gluu.org/.well-known/uma-configuration",
            "redirect_url"=>"https://rs.gluu.org/resources",
            "client_id"=>"@!1111!0008!0068.3E20",
            "client_secret"=>"32c2fb17-409d-48a2-b793-a639c8ac6cb2",
            "user_id"=>"yuriy",
            "user_secret"=>"secret"
        )
    ){
        $this->send($command,$params);
    }
    public function send_test_obtain_rpt(
        $command='obtain_rpt',
        $params =  array( "aat_token"=>"eyJ0eXAiOiJKV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1L",
            "am_host"=>"seed.gluu.org"
        )
    ){
        $this->send($command,$params);
    }
    public function send_test_authorize_rpt(
        $command='authorize_rpt',
        $params =   array(  "aat_token"=>"eyJ0eXAiOiJKV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1L",
            "rpt_token"=>"fb17-409d-48a2-b793-a639c",
            "am_host"=>"seed.gluu.org",
            "ticket"=>"48a2-b793-a639c8ac6cb2",
            "claims"=>'{"uid":["user1"],"email":["user1@gluu.org","user1@gmail.com"]}'
        )
    ){
        $this->send($command,$params);
    }
    public function send_test_register_resource(
        $command='register_resource',
        $params =   array(  "uma_discovery_url"=>"https://seed.gluu.org/.well-known/uma-configuration",
            "pat"=>"eyJ0eXAiOiJKV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1L",
            "name"=> "My Resource",
            "scopes"=> [
                "http://photoz.example.com/dev/scopes/view",
                "http://photoz.example.com/dev/scopes/all"
            ]
        )
    ){
        $this->send($command,$params);
    }
    public function send_test_rpt_status(
        $command='rpt_status',
        $params =   array(  "uma_discovery_url"=>"https://seed.gluu.org/.well-known/uma-configuration",
            "pat"=>"eyJ0eXAiOiJKV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0",
            "rpt"=>"KV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1Lm9yZy9veGF1dGgvc2VhbS9yZXNvdXJjZS9yZXN0djEvb3hhd"

        )
    ){
        $this->send($command,$params);
    }
    public function send_test_id_token_status(
        $command='id_token_status',
        $params =   array(  "discovery_url"=>"https://seed.gluu.org/.well-known/openid-configuration",
            "id_token"=>"eyJ0eXAiOiJKV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0"

        )
    ){
        $this->send($command,$params);
    }
    public function send_test_access_token_status(
        $command='access_token_status',
        $params =   array(  "discovery_url"=>"https://seed.gluu.org/.well-known/openid-configuration",
            "id_token"=>"NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1Lm9yZy9veGF1dGgvc2VhbS9yZXNvdXJjZS9yZ",
            "access_token"=>"KV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1Lm9yZy9veGF1dGgvc2VhbS9yZXNvdXJjZS9yZXN0djEvb3hhd"

        )
    ){
        $this->send($command,$params);
    }

    public function send_test_register_ticket(
        $command='register_ticket',
        $params =   array(  "uma_discovery_url"=>"https://seed.gluu.org/.well-known/uma-configuration",
            "pat"=>"eyJ0eXAiOiJKV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0",
            "am_host"=>"seed.gluu.org",
            "rs_host"=>"rs.gluu.org",
            "resource_set_id"=>"1366810445313",
            "scopes"=> [
                "http://photoz.example.com/dev/scopes/view",
                "http://photoz.example.com/dev/scopes/add"
            ],
            "request_http_method"=>"DELETE",
            "request_url"=>"http://example.com/object/1234"

        )
    ){
        $this->send($command,$params);
    }
    public function send_test_discovery(
        $command='discovery',
        $params =   array("discovery_url"=>"https://seed.gluu.org/.well-known/openid-configuration")
    ){
        $this->send($command,$params);
    }
    public function send_test_authorization_code_flow(
        $command='authorization_code_flow',
        $params =   array(  "discovery_url"=>"https://seed.gluu.org/.well-known/openid-configuration",
            "redirect_url"=>"https://rs.gluu.org/resources",
            "client_id"=>"@!1111!0008!0068.3E20",
            "client_secret"=>"32c2fb17-409d-48a2-b793-a639c8ac6cb2",
            "user_id"=>"yuriy",
            "user_secret"=>"secret",
            "scope"=>"openid email",
            "nonce"=>"409d-48a2-b793",
            "acr"=>"basic")
    ){
        $this->send($command,$params);
    }
    /**
     * getResult function geting result from oxD server.
    Print:
    response - The JSON response from the oxD Server and print
     **/
    public function getResult($socket,$command){

        $this->response = fread($this->socket, 80048);
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
    public function disconnect($socket){
        fclose($socket);
    }
}

$client = new Client();
$client->send_test_register_client();
$client->send_test_access_token_status();
$client->send_test_authorization_code_flow();
$client->send_test_authorize_rpt();
$client->send_test_client_read();
$client->send_test_obtain_rpt();
$client->send_test_obtain_pat();
$client->send_test_obtain_aat();
$client->send_test_id_token_status();
$client->send_test_discovery();
$client->send_test_register_ticket();
$client->send_test_rpt_status();
$client->send_test_register_resource();
