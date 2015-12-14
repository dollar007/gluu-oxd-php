<?php

session_start();
include_once '../Register_site.php';
include_once '../Get_authorization_code.php';
$register_site = new Register_site('../');

$register_site->setRequestAcrValues(Oxd_RP_config::$acr_values);
$register_site->setRequestAuthorizationRedirectUri(Oxd_RP_config::$authorization_redirect_uri);
$register_site->setRequestRedirectUris(Oxd_RP_config::$redirect_uris);
$register_site->setRequestLogoutRedirectUri(Oxd_RP_config::$logout_redirect_uri);
$register_site->setRequestContacts(["vlad@gluu.org"]);
$register_site->setRequestClientJwksUri("");
$register_site->setRequestClientRequestUris([]);
$register_site->setRequestClientTokenEndpointAuthMethod("");

$register_site->request();
$_SESSION['oxd_id'] = $register_site->getResponseOxdId();

echo '<br/>Get_authorization_code <br/>';
$get_authorization_code = new Get_authorization_code('../');
$get_authorization_code->setRequestUsername('admin');
$get_authorization_code->setRequestPassword('ubuntu');
$get_authorization_code->setRequestOxdId($_SESSION['oxd_id']);
$get_authorization_code->setRequestAcrValues(Oxd_RP_config::$acr_values);
$get_authorization_code->request();
echo $get_authorization_code->getResponseJSON();
