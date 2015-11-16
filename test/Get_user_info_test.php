<?php

require_once '../Get_user_info.php';
require_once '../Get_tokens_by_code.php';

$get_user_info = new Get_user_info();
$get_user_info->setReqOxdId(Oxd_config::$oxd_id);
$get_user_info->setReqAccessToken(Get_tokens_by_code::$resp_access_token);

$get_user_info->request();

echo '<br/>Sub: '.Get_user_info::$resp_sub;
echo '<br/>Name: '.Get_user_info::$resp_name;
echo '<br/>GivenName: '.Get_user_info::$resp_given_name;
echo '<br/>FamilyName: '.Get_user_info::$resp_family_name;
echo '<br/>Preferred Username: '.Get_user_info::$resp_preferred_username;
echo '<br/>Email: '.Get_user_info::$resp_email;
echo '<br/>Picture: ';Get_user_info::$resp_picture;

$get_user_info->disconnect();
