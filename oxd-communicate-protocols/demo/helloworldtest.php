<p>Hello world user testing page...</p>
<?php

require_once '../Register_client.php';
require_once '../Client_read.php';
require_once '../Authorization_code_flow.php';
require_once '../Id_token_status.php';

$register_client = new Register_client('../');



$register_client->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$register_client->setRequestRedirectUrl(Oxd_config::$clientRedirectURL);
$register_client->setRequestLogoutRedirectUrl(Oxd_config::$logoutRedirectUrl);
$register_client->setRequestClientName("Your name");
$register_client->setRequestResponseTypes(Oxd_config::$responseTypes);
$register_client->setRequestAppType(Oxd_config::$appType);
$register_client->setRequestGrantTypes(Oxd_config::$grantTypes);
$register_client->setRequestContacts("Your_email@test.test");
$register_client->setRequestJwksUri(Oxd_config::$jwks);



$register_client->request();

echo '<p>Registration</p><br/>ClientId: '.$register_client->getResponseClientId();
echo '<br/>ClientSecret: '.$register_client->getResponseClientSecret();
echo '<br/>RegistrationAccessToken: '.$register_client->getResponseRegistrationAccessToken();
echo '<br/>ClientSecretExpiresAt: '.$register_client->getResponseClientSecretExpiresAt();
echo '<br/>RegistrationClientUri: '.$register_client->getResponseRegistrationClientUri();
echo '<br/>ClientIdIssuedAt: '.$register_client->getResponseClientIdIssuedAt();

$client_read = new Client_read('../');
$client_read->setRequestRegistrationAccessToken($register_client->getResponseRegistrationAccessToken());
$client_read->setRequestRegistrationClientUri($register_client->getResponseRegistrationClientUri());
$client_read->request();

echo '<p>Client Reading</p><br/>ClientId: '.$client_read->getResponseClientId();
echo '<br/>ClientIdIssuedAt: '.$client_read->getResponseClientIdIssuedAt();
echo '<br/>ClientSecret: '.$client_read->getResponseClientSecret();
echo '<br/>ClientSecretExpiresAt: '.$client_read->getResponseClientSecretExpiresAt();
echo '<br/>RegistrationAccessToken: '.$client_read->getResponseRegistrationAccessToken();
echo '<br/>RegistrationClientUri: '.$client_read->getResponseRegistrationClientUri();

$authorization_code_flow = new Authorization_code_flow('../');
$authorization_code_flow->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$authorization_code_flow->setRequestRedirectUrl($register_client->getRequestRedirectUrl());
$authorization_code_flow->setRequestClientId($client_read->getResponseClientId());
$authorization_code_flow->setRequestClientSecret($client_read->getResponseClientSecret());
$authorization_code_flow->setRequestUserId(Oxd_config::$userId);
$authorization_code_flow->setRequestUserSecret(Oxd_config::$userSecret);
$authorization_code_flow->setRequestScope("openid email");
$authorization_code_flow->setRequestNonce("7d97de04-2624-471c-94b4-dabf1134980e");


$authorization_code_flow->request();


echo '<br/><br/>authorization_code_flow<br/>'.$authorization_code_flow->getResponseStatus();


echo '<br/>AccessToken:'.$authorization_code_flow->getResponseAccessToken();
echo '<br/>ExpiresInSeconds:'.$authorization_code_flow->getResponseExpiresInSeconds();
echo '<br/>ResponseIdToken:'.$authorization_code_flow->getResponseIdToken();
echo '<br/>RefreshToken:'.$authorization_code_flow->getResponseRefreshToken();
echo '<br/>AuthorizationCode:'.$authorization_code_flow->getResponseAuthorizationCode();
echo '<br/>ResponseScope:'.$authorization_code_flow->getResponseScope();

$id_token_status = new Id_token_status('../');
$id_token_status->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$id_token_status->setRequestIdToken($authorization_code_flow->getResponseIdToken());

$id_token_status->request();

echo '<br/><br/>id_token_status<br/>';
echo '<br/><pre>';
print_r($id_token_status->getResponseObject());
echo '<br/></pre>';


$client_read->disconnect();
