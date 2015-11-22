<?php

require_once '../Client_read.php';
require_once '../Register_client.php';

$register_client = new Register_client('../');

$register_client->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$register_client->setRequestRedirectUrl(Oxd_config::$clientRedirectURL);
$register_client->setRequestLogoutRedirectUrl(Oxd_config::$logoutRedirectUrl);
$register_client->setRequestClientName("Your name");
$register_client->setRequestResponseTypes(Oxd_config::$responseTypes);
$register_client->setRequestAppType(Oxd_config::$appType);
$register_client->setRequestGrantTypes(Oxd_config::$grantTypes);
$register_client->setRequestContacts("Your_email@test.test");
$register_client->setRequestJwksUri(Oxd_config::$jwks);

$register_client->request();

$client_read = new Client_read('../');
$client_read->setRequestRegistrationAccessToken($register_client->getResponseRegistrationAccessToken());
$client_read->setRequestRegistrationClientUri($register_client->getResponseRegistrationClientUri());
$client_read->request();

echo '<p>Client Reading</p><br/>ClientId: '.$client_read->getResponseClientId();
echo '<br/>Client Id IssuedAt: '.$client_read->getResponseClientIdIssuedAt();
echo '<br/>Client Secret: '.$client_read->getResponseClientSecret();
echo '<br/>Client Secret Expires At: '.$client_read->getResponseClientSecretExpiresAt();
echo '<br/>Registration Access Token: '.$client_read->getResponseRegistrationAccessToken();
echo '<br/>Registration Client Uri: '.$client_read->getResponseRegistrationClientUri();

$client_read->disconnect();