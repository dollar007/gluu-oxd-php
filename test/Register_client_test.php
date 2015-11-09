<?php

include_once '../Register_Client.php';

$client = new Register_client();

$client->setRequestDiscoveryUrl("https://ce.gluu.info/.well-known/openid-configuration");
$client->setRequestRedirectUrl("https://rs.gluu.info/resources");
$client->setRequestLogoutRedirectUrl("https://rs.gluu.info/resources");
$client->setRequestClientName("Vlad");
$client->setRequestResponseTypes("code id_token token");
$client->setRequestAppType("web");
$client->setRequestGrantTypes("authorization_code implicit");
$client->setRequestContacts("mike@gluu.org, yuriy@gluu.org");
$client->setRequestJwksUri("https://ce.gluu.info/jwks");

$client->request();

echo '<br/>'.$client->getResponseStatus();
print_r($client->getResponseData());
echo '<br/>';
print_r($client->getResponseObject());
echo '<br/>';
print_r($client->getResponseJSON());

echo '<br/>'.$client->getResponseClientId();
echo '<br/>'.$client->getResponseClientSecret();
echo '<br/>'.$client->getResponseRegistrationAccessToken();
echo '<br/>'.$client->getResponseClientSecretExpiresAt();
echo '<br/>'.$client->getResponseRegistrationClientUri();
echo '<br/>'.$client->getResponseClientIdIssuedAt();

$client->disconnect();
