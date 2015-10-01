<?php

include '../Get_tokens_by_code.php';

$client = new Get_tokens_by_code();

$client->setRequestOxdId("6F9619FF-8B86-D011-B42D-00CF4FC964FF");
$client->setRequestCode("I6IjIifX0");
$client->setRequestState("af0ifjsldkj");

$client->request();

echo '<br/>'.$client->getResponseStatus();

print_r($client->getResponseData());
echo '<br/>';
print_r($client->getResponseObject());
echo '<br/>';
print_r($client->getResponseJSON());

echo '<br/>'.$client->getResponseAccessToken();
echo '<br/>'.$client->getResponseExpiresIn();
echo '<br/>'.$client->getResponseIdToken();
echo '<br/>'.$client->getResponseIdTokenClaims();

$client->disconnect();
