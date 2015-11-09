<p>Hello world user testing page...</p>
<?php
require_once '../Register_Client.php';
require_once '../Client_read.php';

$client = new Register_client();
$client_read = new Client_read();



$client->curl_oxd_request();



$client->setRequestDiscoveryUrl("https://ce.gluu.info/.well-known/openid-configuration");
$client->setRequestRedirectUrl("https://rs.gluu.org/resources");
$client->setRequestLogoutRedirectUrl("https://rs.gluu.org/resources");
$client->setRequestClientName("oxD Client");
$client->setRequestResponseTypes("code id_token token");
$client->setRequestAppType("web");
$client->setRequestGrantTypes("authorization_code implicit");
$client->setRequestContacts("mike@gluu.org, yuriy@gluu.org");
$client->setRequestJwksUri("https://ce.gluu.info/jwks");

$client->request();

echo '<p>Registration</p><br/>ClientId: '.$client->getResponseClientId();
echo '<br/>ClientSecret: '.$client->getResponseClientSecret();
echo '<br/>RegistrationAccessToken: '.$client->getResponseRegistrationAccessToken();
echo '<br/>ClientSecretExpiresAt: '.$client->getResponseClientSecretExpiresAt();
echo '<br/>RegistrationClientUri: '.$client->getResponseRegistrationClientUri();
echo '<br/>ClientIdIssuedAt: '.gmdate("Y-m-d\TH:i:s\Z", $client->getResponseClientIdIssuedAt());

$client_read->setRequestRegistrationAccessToken($client->getResponseRegistrationAccessToken());
$client_read->setRequestRegistrationClientUri($client->getResponseRegistrationClientUri());
$client_read->request();

echo '<p>Client Reading</p><br/>ClientId: '.$client_read->getResponseClientId();
echo '<br/>ClientIdIssuedAt: '.$client_read->getResponseClientIdIssuedAt();
echo '<br/>ClientSecret: '.$client_read->getResponseClientSecret();
echo '<br/>ClientSecretExpiresAt: '.$client_read->getResponseClientSecretExpiresAt();
echo '<br/>RegistrationAccessToken: '.$client_read->getResponseRegistrationAccessToken();
echo '<br/>RegistrationClientUri: '.$client_read->getResponseRegistrationClientUri();
$client_read->disconnect();
