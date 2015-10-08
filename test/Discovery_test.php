<?php

include '../Discovery.php';
$client = new Discovery();
$client->setRequestDiscoveryUrl('https://seed.gluu.org/.well-known/openid-configuration');
$client->request();

echo '<br/>'.$client->getResponseStatus();

print_r($client->getResponseData());
echo '<br/>';
print_r($client->getResponseObject());
echo '<br/>';
print_r($client->getResponseJSON());

echo '<br/>'.$client->getResponseIssuer();
echo '<br/>'.$client->getResponseTokenEndpoint();
echo '<br/>'.$client->getResponseUserinfoEndpoint();
echo '<br/>'.$client->getResponseClientinfoEndpoint();
echo '<br/>'.$client->getResponseCheckSessionIframe();
echo '<br/>'.$client->getResponseEndSessionEndpoint();
echo '<br/>'.$client->getResponseJwksUri();
echo '<br/>'.$client->getResponseRegistrationEndpoint();
echo '<br/>'.$client->getResponseValidateTokenEndpoint();
echo '<br/>'.$client->getResponseFederationMetadataEndpoint();
echo '<br/>'.$client->getResponseFederationEndpoint();
echo '<br/>'.$client->getResponseIdGenerationEndpoint();
echo '<br/>';
print_r($client->getResponseScopesSupported());
echo '<br/>';
print_r($client->getResponseTypesSupported());
echo '<br/>';
print_r($client->getResponseGrantTypesSupported());
echo '<br/>';
print_r($client->getResponseSubjectTypesSupported());
echo '<br/>';
print_r($client->getResponseServiceDocumentation());
echo '<br/>';
print_r($client->getResponseClaimsLocalesSupported());
echo '<br/>';
print_r($client->getResponseUiLocalesSupported());
echo '<br/>'.$client->getResponseClaimsParameterSupported();
echo '<br/>'.$client->getResponseRequestParameterSupported();
echo '<br/>'.$client->getResponseRequestUriParameterSupported();
echo '<br/>'.$client->getResponseRequireRequestUriRegistration();
echo '<br/>'.$client->getResponseOpPolicyUri();
echo '<br/>'.$client->getResponseOpTosUri();

$client->disconnect();