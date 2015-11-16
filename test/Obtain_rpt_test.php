<?php

require_once '../Obtain_rpt.php';
require_once '../Obtain_aat.php';
$obtain_rpt = new Obtain_rpt();

$obtain_rpt->setReqAatToken(Obtain_aat::$resp_aat_token);
$obtain_rpt->setReqAmHost(Oxd_config::$amHost);

$obtain_rpt->request();

echo '<br/>RptToken: '. Obtain_rpt::$resp_rpt_token;

$obtain_rpt->disconnect();