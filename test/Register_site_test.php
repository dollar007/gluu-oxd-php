<?php

include_once '../Register_site.php';

$register_site = new Register_site();

$register_site->setRequestAcrValues([""]);
$register_site->setRequestAuthorizationRedirectUri('http://localhost/news/');
$register_site->setRequestRedirectUris(["http://localhost/news//cb"]);
$register_site->setRequestLogoutRedirectUri('http://localhost/news/cb');
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
