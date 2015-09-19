<?php

include '../Rpt_status.php';

$client = new Rpt_status();

$client->setRequestUmaDiscoveryUrl("https://seed.gluu.org/.well-known/uma-configuration");
$client->setRequestPat("eyJ0eXAiOiJKV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0");
$client->setRequestRpt("KV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1Lm9yZy9veGF1dGgvc2VhbS9yZXNvdXJjZS9yZXN0djEvb3hhd");

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
echo '<br/>'.$client->getResponsePermissions();

$client->disconnect();