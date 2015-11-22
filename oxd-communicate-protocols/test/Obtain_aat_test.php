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

echo '<br/>Pat Token: '.$obtain_aat->getResponseAatToken();
echo '<br/>Expires In Seconds: '.$obtain_aat->getResponseExpiresInSeconds();
echo '<br/>Pat Refresh Token: '.$obtain_aat->getResponseAatRefreshToken();
echo '<br/>Authorization Code: '.$obtain_aat->getResponseAuthorizationCode();
echo '<br/>Scope: '.$obtain_aat->getResponseScope();

$obtain_aat->disconnect();