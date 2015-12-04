<?php
session_start();
require_once '../Logout.php';

$logout = new Logout('../');
$logout->setRequestOxdId($_SESSION['oxd_id']);
$logout->setRequestPostLogoutRedirectUri(Oxd_RP_config::$logout_redirect_uri);
$logout->setRequestIdToken($_SESSION['id_token']);
$logout->request();

echo $logout->getResponseHtml();

$logout->disconnect();
