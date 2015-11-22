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

echo '<br/>Pat Token: '.$obtain_pat->getResponsePatToken();
echo '<br/>Expires In Seconds: '.$obtain_pat->getResponseExpiresInSeconds();
echo '<br/>Pat Refresh Token: '.$obtain_pat->getResponsePatRefreshToken();
echo '<br/>Authorization Code: '.$obtain_pat->getResponseAuthorizationCode();
echo '<br/>Scope: '.$obtain_pat->getResponseScope();

$obtain_pat->disconnect();