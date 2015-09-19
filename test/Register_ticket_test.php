<?php

include '../Register_ticket.php';

$client = new Register_ticket();

$client->setRequestUmaDiscoveryUrl("https://seed.gluu.org/.well-known/uma-configuration");
$client->setRequestPat("eyJ0eXAiOiJKV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0");
$client->setRequestAmHost("seed.gluu.org");
$client->setRequestRsHost("rs.gluu.org");
$client->setRequestResourceSetId("1366810445313");
$client->setRequestScopes([
    "http://photoz.example.com/dev/scopes/view",
    "http://photoz.example.com/dev/scopes/add"
]);
$client->setRequestHttpMethod("DELETE");
$client->setRequestUrl("http://example.com/object/1234");

$client->request();

echo '<br/>'.$client->getResponseStatus();
print_r($client->getResponseData());
echo '<br/>';
print_r($client->getResponseObject());
echo '<br/>';
print_r($client->getResponseJSON());

echo '<br/>'.$client->getResponseTicket();

$client->disconnect();