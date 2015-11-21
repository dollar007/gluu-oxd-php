<?php

require_once '../Client_read.php';

$client = new Client_read();
$client->setRequestRegistrationClientUri('https://ce-dev.gluu.org/oxauth/seam/resource/restv1/oxauth/register?client_id=@!EDFB.879F.2DAE.D95A!0001!0442.B31E!0008!778C.9634');
$client->setRequestRegistrationAccessToken('8117eacd-8095-45cc-b637-a5822ee82d80');

$client->request();

echo '<br/>'.$client->getResponseStatus();

print_r($client->getResponseData());
echo '<br/>';
print_r($client->getResponseObject());
echo '<br/>';
print_r($client->getResponseJSON());

echo '<br/>'.$client->getResponseClientId();
echo '<br/>'.$client->getResponseClientIdIssuedAt();
echo '<br/>'.$client->getResponseClientSecret();
echo '<br/>'.$client->getResponseClientSecretExpiresAt();
echo '<br/>'.$client->getResponseRegistrationAccessToken();
echo '<br/>'.$client->getResponseRegistrationClientUri();

$client->disconnect();