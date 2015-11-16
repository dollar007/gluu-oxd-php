<?php

require_once '../Register_site.php';

$register_site = new Register_site();

$register_site->setReqAcrValues([""]);
$register_site->setReqAuthorizationRedirectUri(Oxd_config::$authorizationRedirectUri);
$register_site->setReqRedirectUris([Oxd_config::$clientRedirectURL]);
$register_site->setReqLogoutRedirectUri(Oxd_config::$logoutRedirectUrl);
$register_site->setReqContacts("demo@example.com");
$register_site->setReqClientJwksUri("");
$register_site->setReqClientRequestUris([""]);
$register_site->setReqClientTokenEndpointAuthMethod("");

$register_site->request();

echo '<br/>'.Register_site::$resp_oxd_id;

$register_site->disconnect();
