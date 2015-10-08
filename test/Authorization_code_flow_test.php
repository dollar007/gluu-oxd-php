<?php

include '../Authorization_code_flow.php';

$client = new Authorization_code_flow();
$client->setRequestDiscoveryUrl("https://seed.gluu.org/.well-known/openid-configuration");
$client->setRequestRedirectUrl("https://client.example.com/cb");
$client->setRequestClientId("@!D79B.BDA4.A74F.453F!0001!9573.5466!0008!FF81!2D39");
$client->setRequestClientSecret("oxauth_client_test_password");
$client->setRequestUserId("mike");
$client->setRequestUserSecret("secret");
$client->setRequestScope("openid");
$client->setRequestNonce("835783d0-4070-4c6f-a951-a85cc1035785");
$client->setRequestAcr('basic');

$client->request();

echo '<br/>'.$client->getResponseStatus();

print_r($client->getResponseData());
echo '<br/>';
print_r($client->getResponseObject());
echo '<br/>';
print_r($client->getResponseJSON());

echo '<br/>'.$client->getResponseAccessToken();
echo '<br/>'.$client->getResponseExpiresInSeconds();
echo '<br/>'.$client->getResponseIdToken();
echo '<br/>'.$client->getResponseRefreshToken();
echo '<br/>'.$client->getResponseAuthorizationCode();
echo '<br/>'.$client->getResponseScope();

$client->disconnect();
