<?php

include '../Client_read.php';

$client = new Client_read();
$client->setRequestRegistrationAccessToken('https://seed.gluu.org/oxauth/rest1/register?client_id=23523534');
$client->setRequestRegistrationClientUri('this.is.an.access.token.value.ffx83');
$client->request();

echo '<br/>'.$client->getResponseStatus();

print_r($client->getResponseData());
echo '<br/>';
print_r($client->getResponseObject());
echo '<br/>';
print_r($client->getResponseJSON());

echo '<br/>'.$client->getResponseClientId();
echo '<br/>'.$client->getResponseClientIdIssuedAt();
echo '<br/>'.$client->getResponseClientSecret();
echo '<br/>'.$client->getResponseClientSecretExpiresAt();
echo '<br/>'.$client->getResponseRegistrationAccessToken();
echo '<br/>'.$client->getResponseRegistrationClientUri();

$client->disconnect();