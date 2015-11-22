<?php

require_once '../Discovery.php';
$discovery = new Discovery('../');
$discovery->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$discovery->request();

echo '<br/>'.$discovery->getResponseIssuer();
echo '<br/>'.$discovery->getResponseTokenEndpoint();
echo '<br/>'.$discovery->getResponseUserinfoEndpoint();
echo '<br/>'.$discovery->getResponseClientinfoEndpoint();
echo '<br/>'.$discovery->getResponseCheckSessionIframe();
echo '<br/>'.$discovery->getResponseEndSessionEndpoint();
echo '<br/>'.$discovery->getResponseJwksUri();
echo '<br/>'.$discovery->getResponseRegistrationEndpoint();
echo '<br/>'.$discovery->getResponseValidateTokenEndpoint();
echo '<br/>'.$discovery->getResponseFederationMetadataEndpoint();
echo '<br/>'.$discovery->getResponseFederationEndpoint();
echo '<br/>'.$discovery->getResponseIdGenerationEndpoint();
echo '<br/>';
print_r($discovery->getResponseScopesSupported());
echo '<br/>';
print_r($discovery->getResponseTypesSupported());
echo '<br/>';
print_r($discovery->getResponseGrantTypesSupported());
echo '<br/>';
print_r($discovery->getResponseSubjectTypesSupported());
echo '<br/>';
print_r($discovery->getResponseServiceDocumentation());
echo '<br/>';
print_r($discovery->getResponseClaimsLocalesSupported());
echo '<br/>';
print_r($discovery->getResponseUiLocalesSupported());
echo '<br/>'.$discovery->getResponseClaimsParameterSupported();
echo '<br/>'.$discovery->getResponseRequestParameterSupported();
echo '<br/>'.$discovery->getResponseRequestUriParameterSupported();
echo '<br/>'.$discovery->getResponseRequireRequestUriRegistration();
echo '<br/>'.$discovery->getResponseOpPolicyUri();
echo '<br/>'.$discovery->getResponseOpTosUri();

$discovery->disconnect();
