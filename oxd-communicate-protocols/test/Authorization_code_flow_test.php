<?php

require_once '../Authorization_code_flow.php';

$authorization_code_flow = new Authorization_code_flow('../');
$authorization_code_flow->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$authorization_code_flow->setRequestRedirectUrl(Oxd_config::$clientRedirectURL);
$authorization_code_flow->setRequestClientId(Oxd_config::$clientId);
$authorization_code_flow->setRequestClientSecret(Oxd_config::$amHost);
$authorization_code_flow->setRequestUserId(Oxd_config::$userId);
$authorization_code_flow->setRequestUserSecret(Oxd_config::$userSecret);
$authorization_code_flow->setRequestNonce("409d-48a2-b793");
$authorization_code_flow->setRequestScope();
$authorization_code_flow->setRequestAcr();
$authorization_code_flow->request();


echo '<br/>Access Token: '.$authorization_code_flow->getResponseAccessToken();
echo '<br/>Expires In Seconds: '.$authorization_code_flow->getResponseExpiresInSeconds();
echo '<br/>Id Token: '.$authorization_code_flow->getResponseIdToken();
echo '<br/>Refresh Token: '.$authorization_code_flow->getResponseRefreshToken();
echo '<br/>Authorization Code: '.$authorization_code_flow->getResponseAuthorizationCode();
echo '<br/>Scope: '.$authorization_code_flow->getResponseScope();

$authorization_code_flow->disconnect();
