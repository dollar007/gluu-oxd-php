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

require_once '../Access_token_status.php';

$access_token_status = new Access_token_status('../');
$access_token_status->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$access_token_status->setRequestIdToken($authorization_code_flow->getResponseIdToken());
$access_token_status->setRequestAccessToken($authorization_code_flow->getResponseAccessToken());
$access_token_status->request();

echo '<br/>Active: '.$access_token_status->getResponseActive();
echo '<br/>Expires At:'.$access_token_status->getResponseExpiresAt();
echo '<br/>Issued At: '.$access_token_status->getResponseIssuedAt();

$access_token_status->disconnect();
