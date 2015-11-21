<?php

require_once '../Access_token_status.php';

$access_token_status = new Access_token_status();
$access_token_status->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$access_token_status->setRequestIdToken('NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1Lm9yZy9veGF1dGgvc2VhbS9yZXNvdXJjZS9yZ');
$access_token_status->setRequestAccessToken('KV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1Lm9yZy9veGF1dGgvc2VhbS9yZXNvdXJjZS9yZXN0djEvb3hhd');
$access_token_status->request();

echo '<br/>'.$access_token_status->getResponseStatus();

print_r($access_token_status->getResponseData());
echo '<br/>';
print_r($access_token_status->getResponseObject());
echo '<br/>';
print_r($access_token_status->getResponseJSON());

echo '<br/>'.$access_token_status->getResponseActive();
echo '<br/>'.$access_token_status->getResponseExpiresAt();
echo '<br/>'.$access_token_status->getResponseIssuedAt();

$access_token_status->disconnect();
