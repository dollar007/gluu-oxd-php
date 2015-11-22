<?php
require_once '../Obtain_pat.php';

$obtain_pat = new Obtain_pat('../');

$obtain_pat->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$obtain_pat->setRequestUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$obtain_pat->setRequestRedirectUrl(Oxd_config::$clientRedirectURL);
$obtain_pat->setRequestClientId(Oxd_config::$clientId);
$obtain_pat->setRequestClientSecret(Oxd_config::$clientSecret);
$obtain_pat->setRequestUserId(Oxd_config::$userId);
$obtain_pat->setRequestUserSecret(Oxd_config::$userSecret);

$obtain_pat->request();

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

require_once '../Rpt_status.php';

$rpt_status = new Rpt_status('../');

$rpt_status->setRequestUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$rpt_status->setRequestPat($obtain_pat->getResponsePatToken());
$rpt_status->setRequestRpt($obtain_rpt->getResponseRptToken());

$rpt_status->request();


echo '<br/>Active: '.$rpt_status->getResponseActive();
echo '<br/>Expires At: '.$rpt_status->getResponseExpiresAt();
echo '<br/>Issued At: '.$rpt_status->getResponseIssuedAt();
echo '<br/>Permissions: '.$rpt_status->getResponsePermissions();

$rpt_status->disconnect();