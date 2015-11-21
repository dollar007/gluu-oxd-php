<?php

require_once '../Obtain_rpt.php';

$client = new Obtain_rpt();

$client->setRequestAatToken("eyJ0eXAiOiJKV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1L");
$client->setRequestAmHost("ce-dev.gluu.org");

$client->request();
echo '<br/>'.$client->getResponseStatus();

print_r($client->getResponseData());
echo '<br/>';
print_r($client->getResponseObject());
echo '<br/>';
print_r($client->getResponseJSON());

echo '<br/>'. $client->getResponseRptToken();

$client->disconnect();