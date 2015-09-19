<?php

include '../Authorize_rpt.php';

$client = new Authorize_rpt();
$client->request();

echo '<br/>'.$client->getResponseStatus();

print_r($client->getResponseData());
echo '<br/>';
print_r($client->getResponseObject());
echo '<br/>';
print_r($client->getResponseJSON());


$client->disconnect();