<?php

include '../Id_token_status.php';

$client = new Id_token_status();

$client->setRequestDiscoveryUrl('https://ce.gluu.info/.well-known/openid-configuration');
$client->setRequestIdToken('eyJ0eXAiOiJKV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0');

$client->request();

echo '<br/>'.$client->getResponseStatus();

print_r($client->getResponseData());
echo '<br/>';
print_r($client->getResponseObject());
echo '<br/>';
print_r($client->getResponseJSON());

echo '<br/>'.$client->getResponseActive();
echo '<br/>'.$client->getResponseExpiresAt();
echo '<br/>'.$client->getResponseIssuedAt();
echo '<br/>'.$client->getResponseClaims();

$client->disconnect();