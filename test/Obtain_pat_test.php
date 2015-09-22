<?php

include '../Obtain_pat.php';

$client = new Obtain_pat();

$client->setRequestDiscoveryUrl("https://seed.gluu.org/.well-known/openid-configuration");
$client->setRequestUmaDiscoveryUrl("http://seed.gluu.org/.well-known/uma-configuration");
$client->setRequestRedirectUrl("https://rs.gluu.org/resources");
$client->setRequestClientId("@!1111!0008!0068.3E20");
$client->setRequestClientSecret("32c2fb17-409d-48a2-b793-a639c8ac6cb2");
$client->setRequestUserId("yuriy");
$client->setRequestUserSecret("secret");

$client->request();

echo '<br/>'.$client->getResponseStatus();
print_r($client->getResponseData());
echo '<br/>';
print_r($client->getResponseObject());
echo '<br/>';
print_r($client->getResponseJSON());

echo '<br/>'.$client->getResponsePatToken();
echo '<br/>'.$client->getResponseExpiresInSeconds();
echo '<br/>'.$client->getResponsePatRefreshToken();
echo '<br/>'.$client->getResponseAuthorizationCode();
echo '<br/>'.$client->getResponseScope();