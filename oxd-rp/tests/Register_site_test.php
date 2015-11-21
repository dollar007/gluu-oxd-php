<?php

session_start();
include_once '../Register_site.php';

$register_site = new Register_site('../');

$register_site->setRequestAcrValues([""]);
$register_site->setRequestAuthorizationRedirectUri(Oxd_RP_config::$authorization_redirect_uri);
$register_site->setRequestRedirectUris(Oxd_RP_config::$redirect_uris);
$register_site->setRequestLogoutRedirectUri(Oxd_RP_config::$logout_redirect_uri);
$register_site->setRequestContacts(["vlad@gluu.org"]);
$register_site->setRequestClientJwksUri("");
$register_site->setRequestClientRequestUris([]);
$register_site->setRequestClientTokenEndpointAuthMethod("");

$register_site->request();
$_SESSION['oxd_id'] = $register_site->getResponseOxdId();

print_r($register_site->getResponseObject());

$register_site->disconnect();
