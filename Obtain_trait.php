<?php

trait Obtain_trait
{
    /**start parameter for request!**/
    private $request_discovery_url = null;
    private $request_uma_discovery_url = null;
    private $request_redirect_url = null;
    private $request_client_id = null;
    private $request_client_secret = null;
    private $request_user_id = null;
    private $request_user_secret = null;
    /**end request parameter**/

    /**start parameter for response!**/
    private $response_aat_token;
    private $response_expires_in_seconds;
    private $response_authorization_code;
    private $response_scope;
    /**end response parameter**/

    public function getRequestDiscoveryUrl()
    {
        return $this->request_discovery_url;
    }

    /**
     * @param null $request_discovery_url
     */
    public function setRequestDiscoveryUrl($request_discovery_url)
    {
        $this->request_discovery_url = $request_discovery_url;
    }

    /**
     * @return null
     */
    public function getRequestUmaDiscoveryUrl()
    {
        return $this->request_uma_discovery_url;
    }

    /**
     * @param null $request_uma_discovery_url
     */
    public function setRequestUmaDiscoveryUrl($request_uma_discovery_url)
    {
        $this->request_uma_discovery_url = $request_uma_discovery_url;
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
     * @return mixed
     */
    public function getResponseExpiresInSeconds()
    {
        $this->response_expires_in_seconds = $this->getResponseData()->expires_in_seconds;
        return $this->response_expires_in_seconds;
    }
    /**
     * @return mixed
     */
    public function getResponseAuthorizationCode()
    {
        $this->response_authorization_code = $this->getResponseData()->authorization_code;
        return $this->response_authorization_code;
    }

    /**
     * @return mixed
     */
    public function getResponseScope()
    {
        $this->response_scope = $this->getResponseData()->scope;

        return $this->response_scope;
    }
}