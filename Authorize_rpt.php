<?php

class Authorize_rpt extends Client
{
    private $aat_token = null;
    private $am_host = null;
    private $rpt_token = null;
    private $ticket = null;
    private $claims = null;
    /**
     * Authorize_rpt constructor.
     * @param $protacol='tcp', $ip='127.0.0.1', $port=8099
    **/
    public function __construct($protacol, $ip, $port)
    {
          parent::__construct($protacol, $ip, $port); // TODO: Change the autogenerated stub
    }

    /**
     * @return null
     */
    public function getAatToken()
    {
        return $this->aat_token;
    }

    /**
     * @param null $aat_token
     */
    public function setAatToken($aat_token)
    {
        $this->aat_token = $aat_token;
    }

    /**
     * @return null
     */
    public function getAmHost()
    {
        return $this->am_host;
    }

    /**
     * @param null $am_host
     */
    public function setAmHost($am_host)
    {
        $this->am_host = $am_host;
    }

    /**
     * @return null
     */
    public function getRptToken()
    {
        return $this->rpt_token;
    }

    /**
     * @param null $rpt_token
     */
    public function setRptToken($rpt_token)
    {
        $this->rpt_token = $rpt_token;
    }

    /**
     * @return null
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * @param null $ticket
     */
    public function setTicket($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * @return null
     */
    public function getClaims()
    {
        return $this->claims;
    }

    /**
     * @param null $claims
     */
    public function setClaims($claims)
    {
        $this->claims = $claims;
    }

    public function setCommand(){
          $this->command = 'authorize_rpt';
    }
    public function setParams()
    {
          $this->params =  array( "aat_token"=>$this->getAatToken(),
                                  "rpt_token"=>$this->getRptToken(),
                                  "am_host"=>$this->getAmHost(),
                                  "ticket"=>$this->getTicket(),
                                  "claims"=>$this->getClaims()
          );
    }

}