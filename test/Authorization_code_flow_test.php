<?php

require_once '../Authorization_code_flow.php';
require_once '../Get_authorization_url.php';

$authorization_code_flow = new Authorization_code_flow();
$authorization_code_flow->setReqDiscoveryUrl(Oxd_config::$discoveryUrl);
$authorization_code_flow->setReqRedirectUrl(Oxd_config::$authorizationRedirectUri);
$authorization_code_flow->setReqClientId(Oxd_config::$clientId);
$authorization_code_flow->setReqClientSecret(Oxd_config::$clientSecret);
$authorization_code_flow->setReqUserId(Oxd_config::$userId);
$authorization_code_flow->setReqUserSecret(Oxd_config::$userSecret);
$authorization_code_flow->setReqScope(Get_authorization_url::$resp_scope);
$authorization_code_flow->setReqNonce(Get_authorization_url::$resp_nonce);

echo '<br/>AccessToken: '.Authorization_code_flow::$resp_access_token;
echo '<br/>ExpiresInSeconds: '.Authorization_code_flow::$resp_expires_in_seconds;
echo '<br/>IdToken: '.Authorization_code_flow::$resp_id_token;
echo '<br/>RefreshToken: '.Authorization_code_flow::$resp_refresh_token;
echo '<br/>AuthorizationCode: '.Authorization_code_flow::$resp_authorization_code;
echo '<br/>Scope: '.Authorization_code_flow::$resp_scope;

$authorization_code_flow->disconnect();
