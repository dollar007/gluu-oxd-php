<?php
/*
 * Created by Vlad Karapetyan
*/
session_start();

if (isset($_SESSION['oxd_id']) && isset($_SESSION['id_token'])) {

    echo '<p>User login process via OpenID.</p>';
    require_once '../Logout.php';
    echo '<p>Logout.</p>';

    $logout = new Logout('../');

    $logout->setRequestOxdId($_SESSION['oxd_id']);
    $logout->setRequestIdToken($_SESSION['id_token']);
    //$logout->setRequestPostLogoutRedirectUri(Oxd_RP_config::$logout_redirect_uri);
    $logout->request();
    unset($_SESSION['oxd_id']);
    unset($_SESSION['id_token']);
    header("Location: "."https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
} else {
    echo 'Logout property is empty';
}