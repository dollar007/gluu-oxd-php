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


echo '<br><br>Obtain_aat test:<br><br>';

echo '<br/>AatToken: '.Obtain_aat::$resp_aat_token;
echo '<br/>ExpiresInSeconds: '.Obtain_aat::$resp_expires_in_seconds;
echo '<br/>AatRefreshToken: '.Obtain_aat::$resp_aat_refresh_token;
echo '<br/>AuthorizationCode: '.Obtain_aat::$resp_authorization_code;
echo '<br/>Scope: '.Obtain_aat::$resp_scope;

$obtain_aat->disconnect();