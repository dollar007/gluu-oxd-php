<?php

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

echo '<p>Registration</p><br/>Client Id: '.$register_client->getResponseClientId();
echo '<br/>Client Secret: '.$register_client->getResponseClientSecret();
echo '<br/>Registration Access Token: '.$register_client->getResponseRegistrationAccessToken();
echo '<br/>Client Secret Expires At: '.$register_client->getResponseClientSecretExpiresAt();
echo '<br/>Registration Client Uri: '.$register_client->getResponseRegistrationClientUri();
echo '<br/>Client Id Issued At: '.$register_client->getResponseClientIdIssuedAt();

$register_client->disconnect();
