<?php

require_once '../Access_token_status.php';
require_once '../Authorization_code_flow.php';

$access_token_status = new Access_token_status();
$access_token_status->setReqDiscoveryUrl(Oxd_config::$discoveryUrl);
$access_token_status->setReqIdToken(Authorization_code_flow::$resp_id_token);
$access_token_status->setReqAccessToken(Authorization_code_flow::$resp_access_token);
$access_token_status->request();

echo '<br/>Active: '.Access_token_status::$resp_active;
echo '<br/>ExpiresAt: '.Access_token_status::$resp_expires_at;
echo '<br/>IssuedAt: '.Access_token_status::$resp_issued_at;

$access_token_status->disconnect();
