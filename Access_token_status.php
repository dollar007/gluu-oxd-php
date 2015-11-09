<?php
require_once 'Client_OXD.php';

class Access_token_status extends Client_oxd
{
    /**start parameter for request!**/
    private $request_discovery_url = null;
    private $request_id_token = null;
    private $request_access_token = null;
    /**end request parameter**/

    /**start parameter for response!**/
    private $response_active;
    private $response_expires_at;
    private $response_issued_at;

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
     * @return mixed
     */
    public function getResponseActive()
    {
        $this->response_active = $this->getResponseData()->active;
        return $this->response_active;
    }

    /**
     * @return mixed
     */
    public function getResponseExpiresAt()
    {
        $this->response_expires_at = $this->getResponseData()->expires_at;
        return $this->response_expires_at;
    }

    /**
     * @return mixed
     */
    public function getResponseIssuedAt()
    {
        $this->response_issued_at = $this->getResponseData()->issued_at;
        return $this->response_issued_at;
    }

    /**
     * @return null
     */
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
    public function getRequestIdToken()
    {
        return $this->request_id_token;
    }

    /**
     * @param null $request_id_token
     */
    public function setRequestIdToken($request_id_token)
    {
        $this->request_id_token = $request_id_token;
    }

    /**
     * @return null
     */
    public function getRequestAccessToken()
    {
        return $this->request_access_token;
    }

    /**
     * @param null $request_access_token
     */
    public function setRequestAccessToken($request_access_token)
    {
        $this->request_access_token = $request_access_token;
    }

    public function setCommand()
    {
        $this->command = 'access_token_status';
    }

    public function setParams()
    {
        $this->params = array(
            "discovery_url" => $this->getRequestDiscoveryUrl(),
            "id_token" => $this->getRequestIdToken(),
            "access_token" => $this->getRequestAccessToken()
        );
    }

}