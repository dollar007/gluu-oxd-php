<?php
/**
 * Created by PhpStorm.
 * User: Vlad Karapetyan
 */
trait Obtain_trait
{
    /**start parameter for request!**/
        private $req_discovery_url = null;
        private $req_uma_discovery_url = null;
        private $req_redirect_url = null;
        private $req_client_id = null;
        private $req_client_secret = null;
        private $req_user_id = null;
        private $req_user_secret = null;
    /**end request parameter**/
    public function getReqDiscoveryUrl()
    {
        return $this->req_discovery_url;
    }

    /**
     * @param null $req_discovery_url
     */
    public function setReqDiscoveryUrl($req_discovery_url)
    {
        $this->req_discovery_url = $req_discovery_url;
    }

    /**
     * @return null
     */
    public function getReqUmaDiscoveryUrl()
    {
        return $this->req_uma_discovery_url;
    }

    /**
     * @param null $req_uma_discovery_url
     */
    public function setReqUmaDiscoveryUrl($req_uma_discovery_url)
    {
        $this->req_uma_discovery_url = $req_uma_discovery_url;
    }

    /**
     * @return null
     */
    public function getReqRedirectUrl()
    {
        return $this->req_redirect_url;
    }

    /**
     * @param null $req_redirect_url
     */
    public function setReqRedirectUrl($req_redirect_url)
    {
        $this->req_redirect_url = $req_redirect_url;
    }

    /**
     * @return null
     */
    public function getReqClientId()
    {
        return $this->req_client_id;
    }

    /**
     * @param null $req_client_id
     */
    public function setReqClientId($req_client_id)
    {
        $this->req_client_id = $req_client_id;
    }

    /**
     * @return null
     */
    public function getReqClientSecret()
    {
        return $this->req_client_secret;
    }

    /**
     * @param null $req_client_secret
     */
    public function setReqClientSecret($req_client_secret)
    {
        $this->req_client_secret = $req_client_secret;
    }

    /**
     * @return null
     */
    public function getReqUserId()
    {
        return $this->req_user_id;
    }

    /**
     * @param null $req_user_id
     */
    public function setReqUserId($req_user_id)
    {
        $this->req_user_id = $req_user_id;
    }

    /**
     * @return null
     */
    public function getReqUserSecret()
    {
        return $this->req_user_secret;
    }

    /**
     * @param null $req_user_secret
     */
    public function setReqUserSecret($req_user_secret)
    {
        $this->req_user_secret = $req_user_secret;
    }
    public function setParams()
    {
        $this->params = array(
            "discovery_url" => $this->getReqDiscoveryUrl(),
            "uma_discovery_url" => $this->getReqUmaDiscoveryUrl(),
            "redirect_url" => $this->getReqRedirectUrl(),
            "client_id" => $this->getReqClientId(),
            "client_secret" => $this->getReqClientSecret(),
            "user_id" => $this->getReqUserId(),
            "user_secret" => $this->getReqUserSecret()
        );
    }
}