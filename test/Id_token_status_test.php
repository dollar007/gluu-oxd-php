<?php

require_once '../Id_token_status.php';
require_once '../Authorization_code_flow.php';
$id_token_status = new Id_token_status();

$id_token_status->setReqDiscoveryUrl(Oxd_config::$discoveryUrl);
$id_token_status->setReqIdToken(Authorization_code_flow::$resp_id_token);

$id_token_status->request();

echo '<br/>Active: '.Id_token_status::$resp_active;
echo '<br/>ExpiresAt: '.Id_token_status::$resp_expires_at;
echo '<br/>IssuedAt: '.Id_token_status::$resp_issued_at;
echo '<br/>Claims: ';
var_dump(Id_token_status::$resp_claims);

$id_token_status->disconnect();