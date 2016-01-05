<?php
/*
 * Created by Vlad Karapetyan
*/

    session_start();
    echo '<p>User login process via OpenID.</p>';
    require_once '../Logout.php';
    echo '<p>Logout.</p>';

    $logout = new Logout('../');
    $logout->setRequestOxdId($_SESSION['oxd_id']);
    $logout->setRequestPostLogoutRedirectUri("https://client.example.com/logout/index.php");
    $logout->setRequestIdToken($_SESSION['user_oxd_access_token']);
    $logout->request();

    unset($_SESSION['user_oxd_id_token']);
    unset($_SESSION['user_oxd_access_token']);
    header("Location: "."https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
