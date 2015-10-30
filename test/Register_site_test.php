<?php

include_once '../Register_site.php';

$register_site = new Register_site();

$register_site->setRequestAcrValues([""]);
$register_site->setRequestAuthorizationRedirectUri('https://client.example.org/cb');
$register_site->setRequestRedirectUris(["https://client.example.org/cb"]);
$register_site->setRequestLogoutRedirectUri('https://client.example.org/cb');
$register_site->setRequestContacts(["yuriy@gluu.org"]);
$register_site->setRequestClientJwksUri("");
$register_site->setRequestClientRequestUris([]);
$register_site->setRequestClientTokenEndpointAuthMethod("");

$register_site->request();

echo '<br/>'.$register_site->getResponseStatus();
print_r($register_site->getResponseData());
echo '<br/>';
print_r($register_site->getResponseObject());
echo '<br/>';
print_r($register_site->getResponseJSON());

echo '<br/>'.$register_site->getResponseOxdId();

$register_site->disconnect();
