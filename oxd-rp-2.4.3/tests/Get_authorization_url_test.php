<?php
session_start();
require_once '../Get_authorization_url.php';

$get_authorization_url = new Get_authorization_url('../');
$get_authorization_url->setRequestOxdId($_SESSION['oxd_id']);

$get_authorization_url->request();

echo $get_authorization_url->getResponseAuthorizationUrl();

