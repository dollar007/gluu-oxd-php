<?php

include '../Access_token_status.php';

$client = new Access_token_status();
$client->setRequestDiscoveryUrl('https://seed.gluu.org/.well-known/openid-configuration');
$client->setRequestIdToken('NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1Lm9yZy9veGF1dGgvc2VhbS9yZXNvdXJjZS9yZ');
$client->setRequestAccessToken('KV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1Lm9yZy9veGF1dGgvc2VhbS9yZXNvdXJjZS9yZXN0djEvb3hhd');
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

$client->disconnect();
