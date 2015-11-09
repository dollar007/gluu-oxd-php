<?php

include '../Get_user_info.php';

$client = new Get_user_info();
$client->setRequestOxdId("@!DDB8.4688.02CB.F371!0001!F279.92D9");
$client->setRequestAccessToken("s6BhdRkqt3");

$client->request();

echo '<br/>'.$client->getResponseStatus();

print_r($client->getResponseData());
echo '<br/>';
print_r($client->getResponseObject());
echo '<br/>';
print_r($client->getResponseJSON());

echo '<br/>'.$client->getResponseSub();
echo '<br/>'.$client->getResponseName();
echo '<br/>'.$client->getResponseGivenName();
echo '<br/>'.$client->getResponseFamilyName();
echo '<br/>'.$client->getResponsePreferredUsername();
echo '<br/>'.$client->getResponseEmail();
echo '<br/>'.$client->getResponsePicture();

$client->disconnect();
