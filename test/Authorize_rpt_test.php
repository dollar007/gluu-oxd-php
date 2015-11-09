<?php

include '../Authorize_rpt.php';

$client = new Authorize_rpt();
$client->setRequestAatToken("eyJ0eXAiOiJKV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1L");
$client->setRequestRptToken("fb17-409d-48a2-b793-a639c");
$client->setRequestAmHost("ce.gluu.info");
$client->setRequestTicket("48a2-b793-a639c8ac6cb2");
$client->setRequestClaims('{"uid":["user1"],"email":["user1@gluu.org","user1@gmail.com"]}');
$client->request();

echo '<br/>'.$client->getResponseStatus();

print_r($client->getResponseData());
echo '<br/>';
print_r($client->getResponseObject());
echo '<br/>';
print_r($client->getResponseJSON());


$client->disconnect();