<?php
require_once '../Obtain_pat.php';

$obtain_pat = new Obtain_pat('../');

$obtain_pat->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$obtain_pat->setRequestUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$obtain_pat->setRequestRedirectUrl(Oxd_config::$clientRedirectURL);
$obtain_pat->setRequestClientId(Oxd_config::$clientId);
$obtain_pat->setRequestClientSecret(Oxd_config::$clientSecret);
$obtain_pat->setRequestUserId(Oxd_config::$userId);
$obtain_pat->setRequestUserSecret(Oxd_config::$userSecret);

$obtain_pat->request();

require_once '../Register_resource.php';

$register_resource = new Register_resource('../');

$register_resource->setRequestUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$register_resource->setRequestPat($obtain_pat->getResponsePatToken());
$register_resource->setRequestName("My Resource Name");
$register_resource->setRequestScopes([
    "http://photoz.example.com/dev/scopes/view",
    "http://photoz.example.com/dev/scopes/all"
]);

$register_resource->request();

echo '<br/>Resource Status: '.$register_resource->getResponseResourceStatus();
echo '<br/>Id: '.$register_resource->getResponseId();
echo '<br/>Rev: '.$register_resource->getResponseRev();

$register_resource->disconnect();