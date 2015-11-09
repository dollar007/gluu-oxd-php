<?php

require_once 'Client_OXD.php';

class Authorization_code_flow extends Client_oxd
{
    /**start parameter for request!**/
    private $request_discovery_url = null;
    private $request_redirect_url = null;
    private $request_client_id = null;
    private $request_client_secret = null;
    private $request_user_id = null;
    private $request_user_secret = null;
    private $request_scope = null;
    private $request_nonce = null;
    private $request_acr = null;

    /**end request parameter**/

    /**start parameter for response!**/
    private $response_access_token;
    private $response_expires_in_seconds;
    private $response_id_token;
    private $response_refresh_token;
    private $response_authorization_code;
    private $response_scope;

    /**end response parameter**/

    public function __construct()
    {
        /**
         * request_access_token_status constructor.
         * @param  $ip='127.0.0.1', $port=8099
         **/
        parent::__construct(); // TODO: Change the autogenerated stub
    }

    /**
     * @return mixed+++++++++++++++++++++++++++++
     */
    public function getRequestDiscoveryUrl()
    {
        return $this->request_discovery_url;
    }

    /**
     * @param mixed $request_discovery_url
     */
    public function setRequestDiscoveryUrl($request_discovery_url)
    {
        $this->request_discovery_url = $request_discovery_url;
    }

    /**
     * @return null
     */
    public function getRequestRedirectUrl()
    {
        return $this->request_redirect_url;
    }

    /**
     * @param null $request_redirect_url
     */
    public function setRequestRedirectUrl($request_redirect_url)
    {
        $this->request_redirect_url = $request_redirect_url;
    }

    /**
     * @return null
     */
    public function getRequestClientId()
    {
        return $this->request_client_id;
    }

    /**
     * @param null $request_client_id
     */
    public function setRequestClientId($request_client_id)
    {
        $this->request_client_id = $request_client_id;
    }

    /**
     * @return null
     */
    public function getRequestClientSecret()
    {
        return $this->request_client_secret;
    }

    /**
     * @param null $request_client_secret
     */
    public function setRequestClientSecret($request_client_secret)
    {
        $this->request_client_secret = $request_client_secret;
    }

    /**
     * @return null
     */
    public function getRequestUserId()
    {
        return $this->request_user_id;
    }

    /**
     * @param null $request_user_id
     */
    public function setRequestUserId($request_user_id)
    {
        $this->request_user_id = $request_user_id;
    }

    /**
     * @return null
     */
    public function getRequestUserSecret()
    {
        return $this->request_user_secret;
    }

    /**
     * @param null $request_user_secret
     */
    public function setRequestUserSecret($request_user_secret)
    {
        $this->request_user_secret = $request_user_secret;
    }

    /**
     * @return null
     */
    public function getRequestScope()
    {
        return $this->request_scope;
    }

    /**
     * @param null $request_scope
     */
    public function setRequestScope($request_scope)
    {
        $this->request_scope = $request_scope;
    }

    /*
     * @return null
    */
    public function getRequestNonce()
    {
        return $this->request_nonce;
    }

    /*
     * @param null $request_nonce
    */
    public function setRequestNonce($request_nonce)
    {
        $this->request_nonce = $request_nonce;
    }

    /*
     * @return null
    */
    public function getRequestAcr()
    {
        return $this->request_acr;
    }

    /*
     * @param null $request_acr
    */
    public function setRequestAcr($request_acr)
    {
        $this->request_acr = $request_acr;
    }

    /*
     * @return mixed
    */
    public function getResponseAccessToken()
    {
        $this->response_access_token = $this->getResponseData()->access_token;
        return $this->response_access_token;
    }

    /*
     * @return mixed
    */
    public function getResponseExpiresInSeconds()
    {
        $this->response_expires_in_seconds = $this->getResponseData()->expires_in_seconds;
        return $this->response_expires_in_seconds;
    }

    /*
     * @return mixed
    */
    public function getResponseIdToken()
    {
        $this->response_id_token = $this->getResponseData()->id_token;
        return $this->response_id_token;
    }

    /**
     * @return mixed
     */
    public function getResponseRefreshToken()
    {
        $this->response_refresh_token = $this->getResponseData()->refresh_token;
        return $this->response_refresh_token;
    }

    /**
     * @return mixed
     */
    public function getResponseAuthorizationCode()
    {
        $this->response_authorization_code = $this->getResponseData()->authorization_code;
        return $this->response_authorization_code;
    }

    /*
     * @return mixed
    */
    public function getResponseScope()
    {
        $this->response_scope = $this->getResponseData()->scope;
        return $this->response_scope;
    }

    public function setCommand()
    {
        $this->command = 'authorization_code_flow';
    }

    public function setParams()
    {
        $this->params = array(
            "discovery_url" => $this->getRequestDiscoveryUrl(),
            "redirect_url" => $this->getRequestRedirectUrl(),
            "client_id" => $this->getRequestClientId(),
            "client_secret" => $this->getRequestClientSecret(),
            "user_id" => $this->getRequestUserId(),
            "user_secret" => $this->getRequestUserSecret(),
            "scope" => $this->getRequestScope(),
            "nonce" => $this->getRequestNonce(),
            "acr" => $this->getRequestAcr()
        );
    }

}