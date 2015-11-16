<?php
require_once '../Get_authorization_url.php';

$get_authorization_url = new Get_authorization_url();
$get_authorization_url->setReqOxdId(Oxd_config::$oxd_id);

$get_authorization_url->request();

echo '<br/>AuthorizationUrl: '.Get_authorization_url::$resp_authorization_url;

$get_authorization_url->disconnect();
