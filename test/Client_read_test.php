<?php

require_once '../Client_read.php';
require_once '../Register_client.php';

$client_read = new Client_read();
$client_read->setReqRegistrationClientUri(Register_client::$resp_registration_client_uri);
$client_read->setReqRegistrationAccessToken(Register_client::$resp_registration_access_token);

$client_read->request();

echo '<br/>ClientId: '.Client_read::$resp_client_id;
echo '<br/>ClientIdIssuedAt: '.Client_read::$resp_client_id_issued_at;
echo '<br/>ClientSecret: '.Client_read::$resp_client_secret;
echo '<br/>ClientSecretExpiresAt: '.Client_read::$resp_client_secret_expires_at;
echo '<br/>AccessToken:'.Client_read::$resp_registration_access_token;
echo '<br/>ClientUri: '.Client_read::$resp_registration_client_uri;

$client_read->disconnect();