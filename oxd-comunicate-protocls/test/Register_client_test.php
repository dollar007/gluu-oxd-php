<?php

include_once '../Register_client.php';

$register_client = new Register_client();

$register_client->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$register_client->setRequestRedirectUrl("https://client.example.com/cb");
$register_client->setRequestLogoutRedirectUrl(Oxd_config::$logoutRedirectUrl);
$register_client->setRequestClientName("Vlad");
$register_client->setRequestResponseTypes(Oxd_config::$responseTypes);
$register_client->setRequestAppType(Oxd_config::$appType);
$register_client->setRequestGrantTypes(Oxd_config::$grantTypes);
$register_client->setRequestContacts("yuriy@gluu.org test_user@gluu.org");
$register_client->setRequestJwksUri(Oxd_config::$jwks);

$register_client->request();

echo '<pre>';
print_r($register_client->getResponseObject());

$register_client->disconnect();
