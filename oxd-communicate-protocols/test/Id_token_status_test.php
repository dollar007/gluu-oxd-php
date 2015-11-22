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

require_once '../Id_token_status.php';

$client = new Id_token_status('../');

$client->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$client->setRequestIdToken($authorization_code_flow->getResponseIdToken());

$client->request();


echo '<br/>Active: '.$client->getResponseActive();
echo '<br/>Expires At: '.$client->getResponseExpiresAt();
echo '<br/>Issued At: '.$client->getResponseIssuedAt();
echo '<br/>Claims: '.$client->getResponseClaims();

$client->disconnect();