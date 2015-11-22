<?php
require_once '../Obtain_aat.php';


$obtain_aat = new Obtain_aat('../');

$obtain_aat->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$obtain_aat->setRequestUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$obtain_aat->setRequestRedirectUrl(Oxd_config::$clientRedirectURL);
$obtain_aat->setRequestClientId(Oxd_config::$clientId);
$obtain_aat->setRequestClientSecret(Oxd_config::$clientSecret);
$obtain_aat->setRequestUserId(Oxd_config::$userId);
$obtain_aat->setRequestUserSecret(Oxd_config::$userSecret);

$obtain_aat->request();

require_once '../Obtain_rpt.php';

$obtain_rpt = new Obtain_rpt('../');

$obtain_rpt->setRequestAatToken($obtain_aat->getResponseAatToken());
$obtain_rpt->setRequestAmHost(Oxd_config::$amHost);

$obtain_rpt->request();

echo '<br/>Rpt Token: '. $obtain_rpt->getResponseRptToken();

$obtain_rpt->disconnect();