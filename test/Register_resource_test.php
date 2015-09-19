<?php

include '../Register_resource.php';

$client = new Register_resource();

$client->setRequestUmaDiscoveryUrl("https://seed.gluu.org/.well-known/uma-configuration");
$client->setRequestPat("eyJ0eXAiOiJKV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1L");
$client->setRequestName("My Resource");
$client->setRequestScopes([
    "http://photoz.example.com/dev/scopes/view",
    "http://photoz.example.com/dev/scopes/all"
]);

$client->request();

echo '<br/>'.$client->getResponseStatus();

print_r($client->getResponseData());
echo '<br/>';
print_r($client->getResponseObject());
echo '<br/>';
print_r($client->getResponseJSON());

echo '<br/>'.$client->getResponseStatus();
echo '<br/>'.$client->getResponseId();
echo '<br/>'.$client->getResponseRev();

$client->disconnect();