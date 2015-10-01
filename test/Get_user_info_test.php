<?php

include '../Get_user_info.php';

$client = new Get_user_info();
$client->setRequestOxdId("6F9619FF-8B86-D011-B42D-00CF4FC964FF");
$client->setRequestAccessToken("SlAV32hkKG");

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
