<?php
class Server {

    private $socket = null;
    private $protacol;
    private $ip;
    private $port;
    /**
     * Server constructor.
     */
    public function __construct($protacol='tcp', $ip='127.0.0.1', $port=8099)
    {
        if(!$this->socket = stream_socket_server($protacol.'://'.$ip.':'.$port, $errno, $errstr)){
            die($errno);
        }
        while(true){
            $socket = stream_socket_accept($this->socket,-1);
            //echo fread($socket, 8048);

            $k = fread($socket, 80048);
            $object = json_decode($k);
            $message = '';
            $response = array();
            if (!empty($object) && $object->command == 'register_client') {

                $response = array('status' => 'ok',
                    'data' => array(    "client_id"=>"@!1111!0008!0001",
                                        "client_secret"=>"ZJYCqe3GGRvdrudKyZS0XhGv_Z45DuKhCUk0gBR1vZk",
                                        "registration_access_token"=>"this.is.an.access.token.value.ffx83",
                                        "client_secret_expires_at"=> 1577858400,
                                        "registration_client_uri"=>"https://seed.gluu.org/oxauth/rest1/register?client_id=23523534",
                                        "client_id_issued_at"=>1577858300
                                      )
                );
                $message = json_encode($response);
                fwrite($socket, $message);
                fclose($socket);
            } elseif (!empty($object) && $object->command == 'access_token_status') {

                $response = array('status' => 'ok',
                    'data' => array("active"=>true,"expires_at"=>1256928856,"issued_at"=>1256923456)
                );
                $message = json_encode($response);
                fwrite($socket, $message);
                fclose($socket);
            }elseif (!empty($object) && $object->command == 'authorization_code_flow') {

                $response = array('status' => 'ok',
                    'data' => array("access_token"=>"eyJ0eXAiOiJKV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1L",
                                    "expires_in_seconds"=>3599,
                                    "id_token"=>"eyJ0eXAiOiJKV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1L",
                                    "refresh_token"=>"UzI1NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV",
                                    "authorization_code"=>"1e436c1a-6e96-4d98-81d6-8f4019ab4636",
                                    "scope"=>"openid email"
                                    )
                );
                $message = json_encode($response);
                fwrite($socket, $message);
                fclose($socket);
            }elseif (!empty($object) && $object->command == 'authorize_rpt') {

                $response = array('status' => 'ok',"data"=>null);
                $message = json_encode($response);
                fwrite($socket, $message);
                fclose($socket);
            } elseif (!empty($object) && $object->command == 'client_read') {

                $response = array(  'status' => 'ok',
                                    'data' => array("client_id"=>"@!1111!0008!0001",
                                                    "client_secret"=>"ZJYCqe3GGRvdrudKyZS0XhGv_Z45DuKhCUk0gBR1vZk",
                                                    "registration_access_token"=>"this.is.an.access.token.value.ffx83",
                                                    "client_secret_expires_at"=> 1577858400,
                                                    "registration_client_uri"=>"https://seed.gluu.org/oxauth/rest1/register?client_id=23523534",
                                                    "client_id_issued_at"=>1577858300
                                                    )
                );
                $message = json_encode($response);
                fwrite($socket, $message);
                fclose($socket);

            } elseif (!empty($object) && $object->command == 'obtain_rpt') {

                $response = array('status' => 'ok',
                                  'data' => array("rpt_token"=>"32c2fb17-409d-48a2-b793-a639c8ac6cb2")
                );
                $message = json_encode($response);
                fwrite($socket, $message);
                fclose($socket);
            } elseif (!empty($object) && $object->command == 'obtain_pat') {

                $response = array('status' => 'ok',
                                  'data' => array(  "pat_token"=>"eyJ0eXAiOiJKV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1L",
                                                    "expires_in_seconds"=>3599,
                                                    "pat_refresh_token"=>"UzI1NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV",
                                                    "authorization_code"=>"1e436c1a-6e96-4d98-81d6-8f4019ab4636",
                                                    "scope"=>"http://docs.kantarainitiative.org/uma/scopes/prot.json"
                                  )
                );
                $message = json_encode($response);
                fwrite($socket, $message);
                fclose($socket);
            } elseif (!empty($object) && $object->command == 'obtain_aat') {

                $response = array(  'status' => 'ok',
                                    'data' => array("aat_token"=>"eyJ0eXAiOiJKV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1L",
                                                    "expires_in_seconds"=>3599,
                                                    "aat_refresh_token"=>"UzI1NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV",
                                                    "authorization_code"=>"1e436c1a-6e96-4d98-81d6-8f4019ab4636",
                                                    "scope"=>"http://docs.kantarainitiative.org/uma/scopes/prot.json"
                                    )
                );
                $message = json_encode($response);
                fwrite($socket, $message);
                fclose($socket);
            } elseif (!empty($object) && $object->command == 'id_token_status') {

                $response = array(  'status' => 'ok',
                                    'data' => array("active"=> true,
                                                    "expires_at"=>1256928856,
                                                    "issued_at"=> 1256923456,
                                                    "claims"=> '{
                                                                "oxValidationURI"=>["https://seed.gluu.org/oxauth/opiframe.seam"],
                                                                "exp"=> [
                                                                            "1383836968"
                                                                        ],
                                                                "sub"=> [
                                                                            "mike"
                                                                        ],
                                                                "at_hash"=> [
                                                                            "fMdvIEy7RjdFy4Q-mGXOWw"
                                                                        ],
                                                                "aud"=> [
                                                                            "@!1111!0008!FF81!2D39"
                                                                        ],
                                                                "iss"=> [
                                                                            "https://seed.gluu.org"
                                                                        ],
                                                                "oxOpenIDConnectVersion"=> [
                                                                            "openidconnect-1.0"
                                                                        ],
                                                                "iat"=> [
                                                                            "1383833368"
                                                                        ],
                                                                "oxInum"=> [
                                                                            "@!1111!0000!D4E7"
                                                                        ]
                                                                }'
                    )
                );
                $message = json_encode($response);
                fwrite($socket, $message);
                fclose($socket);
            } elseif (!empty($object) && $object->command == 'discovery') {

                $response = array(  'status' => 'ok',
                                    'data' => array("issuer"=> "https://seed.gluu.org",
                                                    "authorization_endpoint"=>"https://seed.gluu.org/oxauth/seam/resource/restv1/oxauth/authorize",
                                                    "token_endpoint"=>"https://seed.gluu.org/oxauth/seam/resource/restv1/oxauth/token",
                                                    "userinfo_endpoint"=>"https://seed.gluu.org/oxauth/seam/resource/restv1/oxauth/userinfo",
                                                    "clientinfo_endpoint"=>"https://seed.gluu.org/oxauth/seam/resource/restv1/oxauth/clientinfo",
                                                    "check_session_iframe"=>"https://seed.gluu.org/oxauth/seam/resource/restv1/oxauth/check_session",
                                                    "end_session_endpoint"=>"https://seed.gluu.org/oxauth/seam/resource/restv1/oxauth/end_session",
                                                    "jwks_uri"=>"https://seed.gluu.org/oxauth/seam/resource/restv1/oxauth/jwks",
                                                    "registration_endpoint"=>"https://seed.gluu.org/oxauth/seam/resource/restv1/oxauth/register",
                                                    "validate_token_endpoint"=>"https://seed.gluu.org/oxauth/seam/resource/restv1/oxauth/validate",
                                                    "federation_metadata_endpoint"=>"https://seed.gluu.org/oxauth/seam/resource/restv1/oxauth/federationmetadata",
                                                    "federation_endpoint"=>"https://seed.gluu.org/oxauth/seam/resource/restv1/oxauth/federation",
                                                    "id_generation_endpoint"=>"https://seed.gluu.org/oxauth/seam/resource/restv1/id",
                                                    "scopes_supported"=>["openid",
                                                                         "address",
                                                                         "clientinfo",
                                                                         "http://docs.kantarainitiative.org/uma/scopes/prot.json",
                                                                         "profile",
                                                                         "phone",
                                                                         "http://docs.kantarainitiative.org/uma/scopes/authz.json",
                                                                         "email"
                                                    ],
                                                    "response_types_supported"=>[
                                                                "code",
                                                                "code id_token",
                                                                "token",
                                                                "token id_token",
                                                                "code token",
                                                                "code token id_token",
                                                                "id_token"
                                                            ],
                                                    "grant_types_supported"=>[
                                                                "authorization_code",
                                                                "implicit",
                                                                "urn:ietf:params:oauth:grant-type:jwt-bearer"
                                                            ],
                                                    "subject_types_supported"=>[
                                                                "public",
                                                                "pairwise"
                                                            ],
                                                    "service_documentation"=>"http://ox.gluu.org/doku.php?id=oxauth:home",
                                                    "claims_locales_supported"=>["en-US"],
                                                        "ui_locales_supported"=>["en-US"],
                                                    "claims_parameter_supported"=>true,
                                                    "request_parameter_supported"=>true,
                                                    "request_uri_parameter_supported"=>true,
                                                    "require_request_uri_registration"=>false,
                                                    "op_policy_uri"=>"http://ox.gluu.org/doku.php?id=oxauth:policy",
                                                    "op_tos_uri"=>"http://ox.gluu.org/doku.php?id=oxauth:tos"
                    )
                );
                $message = json_encode($response);
                fwrite($socket, $message);
                fclose($socket);
            } elseif (!empty($object) && $object->command == 'register_ticket') {

                $response = array(  'status' => 'ok',
                                    'data' => array("ticket"=>"mcvmstkrkrdfskdjdasldf")
                );
                $message = json_encode($response);
                fwrite($socket, $message);
                fclose($socket);
            } elseif (!empty($object) && $object->command == 'rpt_status') {

                $response = array(  'status' => 'ok',
                                    'data' => array("active" =>true,
                                                    "expires_at" =>1256928856,
                                                    "issued_at" => 1256923456,
                                                    "permissions" =>'
                                                        {
                                                            "resource_set_id" => "112210f47de98100",
                                                            "scopes" => ["http://photoz.example.com/dev/actions/view",
                                                                         "http://photoz.example.com/dev/actions/all"
                                                            ],
                                                             "expires_at"  => "1256923456"
                                                        }
                                                    ')
                );
                $message = json_encode($response);
                fwrite($socket, $message);
                fclose($socket);
            } elseif (!empty($object) && $object->command == 'register_resource') {

                $response = array(  'status' => 'ok',
                                    'data' => array(    "status"=>"created",
                                                        "_id"=>"1366810445313",
                                                        "_rev"=>"1"
                                                    )
                );
                $message = json_encode($response);
                fwrite($socket, $message);
                fclose($socket);
            }else {
                $response = array(  'status' => 'error',
                                    'data' => array("error"=>"Error code 404",
                                                    "error_description"=>"Error page!!!"
                    )
                );
                $message = json_encode($response);
                fwrite($socket, $message);
                fclose($socket);
            }
        }

        fclose($this->socket);

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

}

new Server();