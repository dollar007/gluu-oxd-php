<?php

include_once '../Register_client.php';

$client = new Register_client();

$client->setRequestDiscoveryUrl("https://seed.gluu.org/.well-known/openid-configuration");
$client->setRequestRedirectUrl("https://rs.gluu.org/resources");
$client->setRequestClientName("oxD Client");
$client->setRequestResponseTypes("code id_token token");
$client->setRequestAppType("web");
$client->setRequestGrantTypes("authorization_code implicit");
$client->setRequestContacts("mike@gluu.org yuriy@gluu.org");
$client->setRequestJwksUri("https://seed.gluu.org/jwks");

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
