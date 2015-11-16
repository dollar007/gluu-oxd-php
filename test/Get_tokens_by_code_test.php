<?php

require_once '../Get_tokens_by_code.php';
require_once '../Get_authorization_code.php';

$get_tokens_by_code = new Get_tokens_by_code();

$get_tokens_by_code->setReqOxdId(Oxd_config::$oxd_id);
$get_tokens_by_code->setReqCode("I6IjIifX0");
$get_tokens_by_code->setReqState(Get_authorization_url::$resp_state);

$get_tokens_by_code->request();

echo '<br/>AccessToken: '.Get_tokens_by_code::$resp_access_token;
echo '<br/>ExpiresIn: '.Get_tokens_by_code::$resp_expires_in;
echo '<br/>IdToken: '.Get_tokens_by_code::$resp_id_token;
echo '<br/>IdTokenClaims: ';
var_dump(Get_tokens_by_code::$resp_id_token_claims);

$get_tokens_by_code->disconnect();
