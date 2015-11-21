<style>
    h1{
        color: blue;
        font-weight: bold;
    }
    p span{
        color: red;
        font-weight: bold;
    }
    div{
        float: left;
        margin-left: 100px;
    }
</style>

<?php

require_once '../Obtain_aat.php';

$obtain_aat = new Obtain_aat();

$obtain_aat->setReqDiscoveryUrl(Oxd_config::$discoveryUrl);
$obtain_aat->setReqUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$obtain_aat->setReqRedirectUrl(Oxd_config::$clientRedirectURL);
$obtain_aat->setReqClientId(Oxd_config::$clientId);
$obtain_aat->setReqClientSecret(Oxd_config::$clientSecret);
$obtain_aat->setReqUserId(Oxd_config::$userId);
$obtain_aat->setReqUserSecret(Oxd_config::$userSecret);

$obtain_aat->request();


echo '<div style="display: inline-block !important;"><div><h1>Obtain_aat test:</h1><br>';

echo '<p><span>AatToken: </span>'.$obtain_aat->getRespAatToken();
echo '<p><span>ExpiresInSeconds: </span>'.$obtain_aat->getRespExpiresInSeconds();
echo '<p><span>AatRefreshToken: </span>'.$obtain_aat->getRespAatRefreshToken();
echo '<p><span>AuthorizationCode: </span>'.$obtain_aat->getRespAuthorizationCode();
echo '<p><span>Scope:</span>'.$obtain_aat->getRespScope();
echo '</div>';
require_once '../Obtain_pat.php';

$obtain_pat = new Obtain_pat();

$obtain_pat->setReqDiscoveryUrl(Oxd_config::$discoveryUrl);
$obtain_pat->setReqUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$obtain_pat->setReqRedirectUrl(Oxd_config::$clientRedirectURL);
$obtain_pat->setReqClientId(Oxd_config::$clientId);
$obtain_pat->setReqClientSecret(Oxd_config::$clientSecret);
$obtain_pat->setReqUserId(Oxd_config::$userId);
$obtain_pat->setReqUserSecret(Oxd_config::$userSecret);

$obtain_pat->request();


echo '<div><br><h1>Obtain_pat test:</h1><br>';



echo '<p><span>PatToken: </span>'.$obtain_pat->getRespPatToken();
echo '<p><span>ExpiresInSeconds: </span>'.$obtain_pat->getRespExpiresInSeconds();
echo '<p><span>PatRefreshToken: </span>'.$obtain_pat->getRespPatRefreshToken();
echo '<p><span>AuthorizationCode: </span>'.$obtain_pat->getRespAuthorizationCode();
echo '<p><span>Scope:</span>'.$obtain_pat->getRespScope();
echo '</div>';
require_once '../Obtain_rpt.php';

$obtain_rpt = new Obtain_rpt();

$obtain_rpt->setReqAatToken($obtain_aat->getRespAatToken());

$obtain_rpt->setReqAmHost(Oxd_config::$amHost);

$obtain_rpt->request();



echo '<div><br><h1>Obtain_rpt test:</h1><br>';


echo '<p><span>Status: </span>'.$obtain_rpt->getRespStatus();


echo '<p><span>RptToken:</span>'. $obtain_rpt->getRespRptToken();
echo '</div>';

require_once '../Rpt_status.php';

$rpt_status = new Rpt_status();

$rpt_status->setReqUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$rpt_status->setReqPat($obtain_pat->getRespPatToken());
$rpt_status->setReqRpt($obtain_rpt->getRespRptToken());

$rpt_status->request();


echo '<div><br><h1>Rpt_status test:</h1><br>';

echo '<p><span>Active: </span>'.$rpt_status->getRespActive();
echo '<p><span>ExpiresAt: </span>'.$rpt_status->getRespExpiresAt();
echo '<p><span>IssuedAt: </span>'.$rpt_status->getRespIssuedAt();
echo '<p><span>Permissions: </span>'.$rpt_status->getRespPermissions();
echo '</div>';
echo '</div>';
$obtain_aat->disconnect();