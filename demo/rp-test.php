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

$obtain_aat->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$obtain_aat->setRequestUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$obtain_aat->setRequestRedirectUrl(Oxd_config::$clientRedirectURL);
$obtain_aat->setRequestClientId(Oxd_config::$clientId);
$obtain_aat->setRequestClientSecret(Oxd_config::$clientSecret);
$obtain_aat->setRequestUserId(Oxd_config::$userId);
$obtain_aat->setRequestUserSecret(Oxd_config::$userSecret);

$obtain_aat->request();


echo '<div style="display: inline-block !important;"><div><h1>Obtain_aat test:</h1><br>';

echo '<p><span>AatToken: </span>'.$obtain_aat->getResponseAatToken();
echo '<p><span>ExpiresInSeconds: </span>'.$obtain_aat->getResponseExpiresInSeconds();
echo '<p><span>AatRefreshToken: </span>'.$obtain_aat->getResponseAatRefreshToken();
echo '<p><span>AuthorizationCode: </span>'.$obtain_aat->getResponseAuthorizationCode();
echo '<p><span>Scope:</span>'.$obtain_aat->getResponseScope();
echo '</div>';
require_once '../Obtain_pat.php';

$obtain_pat = new Obtain_pat();

$obtain_pat->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$obtain_pat->setRequestUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$obtain_pat->setRequestRedirectUrl(Oxd_config::$clientRedirectURL);
$obtain_pat->setRequestClientId(Oxd_config::$clientId);
$obtain_pat->setRequestClientSecret(Oxd_config::$clientSecret);
$obtain_pat->setRequestUserId(Oxd_config::$userId);
$obtain_pat->setRequestUserSecret(Oxd_config::$userSecret);

$obtain_pat->request();


echo '<div><br><h1>Obtain_pat test:</h1><br>';



echo '<p><span>PatToken: </span>'.$obtain_pat->getResponsePatToken();
echo '<p><span>ExpiresInSeconds: </span>'.$obtain_pat->getResponseExpiresInSeconds();
echo '<p><span>PatRefreshToken: </span>'.$obtain_pat->getResponsePatRefreshToken();
echo '<p><span>AuthorizationCode: </span>'.$obtain_pat->getResponseAuthorizationCode();
echo '<p><span>Scope:</span>'.$obtain_pat->getResponseScope();
echo '</div>';
require_once '../Obtain_rpt.php';

$obtain_rpt = new Obtain_rpt();

$obtain_rpt->setRequestAatToken($obtain_aat->getResponseAatToken());

$obtain_rpt->setRequestAmHost(Oxd_config::$amHost);

$obtain_rpt->request();



echo '<div><br><h1>Obtain_rpt test:</h1><br>';


echo '<p><span>Status: </span>'.$obtain_rpt->getResponseStatus();


echo '<p><span>RptToken:</span>'. $obtain_rpt->getResponseRptToken();
echo '</div>';

require_once '../Rpt_status.php';

$rpt_status = new Rpt_status();

$rpt_status->setRequestUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$rpt_status->setRequestPat($obtain_pat->getResponsePatToken());
$rpt_status->setRequestRpt($obtain_rpt->getResponseRptToken());

$rpt_status->request();


echo '<div><br><h1>Rpt_status test:</h1><br>';

echo '<p><span>Active: </span>'.$rpt_status->getResponseActive();
echo '<p><span>ExpiresAt: </span>'.$rpt_status->getResponseExpiresAt();
echo '<p><span>IssuedAt: </span>'.$rpt_status->getResponseIssuedAt();
echo '<p><span>Permissions: </span>'.$rpt_status->getResponsePermissions();
echo '</div>';
echo '</div>';
$obtain_aat->disconnect();