<?php

include '../Get_authorization_url.php';

$client = new Get_authorization_url();
$client->setRequestOxdId();

$client->request();

echo '<br/>'.$client->getResponseStatus();

print_r($client->getResponseData());
echo '<br/>';
print_r($client->getResponseObject());
echo '<br/>';
print_r($client->getResponseJSON());

echo '<br/>'.$client->getResponseAuthorizationUrl();

$client->disconnect();
