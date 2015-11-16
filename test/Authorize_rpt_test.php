<?php

require_once '../Authorize_rpt.php';
require_once '../Obtain_aat.php';
require_once '../Obtain_rpt.php';
require_once '../Register_ticket.php';
require_once '../Id_token_status.php';

$authorize_rpt = new Authorize_rpt();
$authorize_rpt->setReqAatToken(Obtain_aat::$resp_aat_token);
$authorize_rpt->setReqRptToken(Obtain_rpt::$resp_rpt_token);
$authorize_rpt->setReqAmHost(Oxd_config::$amHost);
$authorize_rpt->setReqTicket(Register_ticket::$resp_ticket);
$authorize_rpt->setReqClaims(Id_token_status::$resp_claims);

$authorize_rpt->request();

echo '<br/>';
print_r($authorize_rpt->getRespJSON());


$authorize_rpt->disconnect();