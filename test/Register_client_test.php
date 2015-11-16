<?php

require_once '../Register_Client.php';

$register_client = new Register_client();

$register_client->setReqDiscoveryUrl(Oxd_config::$discoveryUrl);
$register_client->setReqRedirectUrl(Oxd_config::$clientRedirectURL);
$register_client->setReqLogoutRedirectUrl(Oxd_config::$logoutRedirectUrl);
$register_client->setReqClientName("Your_name");
$register_client->setReqResponseTypes(Oxd_config::$responseTypes);
$register_client->setReqAppType(Oxd_config::$appType);
$register_client->setReqGrantTypes(Oxd_config::$grantTypes);
$register_client->setReqContacts("Your_email@test.com");
$register_client->setReqJwksUri(Oxd_config::$gluuServerUrl."/jwks");

$register_client->request();

echo '<br/>ClientId:'.Register_client::$resp_client_id;
echo '<br/>ClientSecret:'.Register_client::$resp_client_secret;
echo '<br/>RegistrationAccessToken:'.Register_client::$resp_registration_access_token;

echo '<br/>ClientSecretExpiresAt:'.Register_client::$resp_client_secret_expires_at;
echo '<br/>RegistrationClientUri:'.Register_client::$resp_registration_client_uri;
echo '<br/>ClientIdIssuedAt:'.Register_client::$resp_client_id_issued_at;

$register_client->disconnect();
