<?php

require_once '../Obtain_pat.php';

$otain_pat = new Obtain_pat();

$otain_pat->setReqDiscoveryUrl(Oxd_config::$discoveryUrl);
$otain_pat->setReqUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$otain_pat->setReqRedirectUrl(Oxd_config::$clientRedirectURL);
$otain_pat->setReqClientId(Oxd_config::$clientId);
$otain_pat->setReqClientSecret(Oxd_config::$clientSecret);
$otain_pat->setReqUserId(Oxd_config::$userId);
$otain_pat->setReqUserSecret(Oxd_config::$userSecret);

$otain_pat->request();

echo '<br/>PatToken: '.Obtain_pat::$resp_pat_token;
echo '<br/>ExpiresInSeconds: '.Obtain_pat::$resp_expires_in_seconds;
echo '<br/>PatRefreshToken: '.Obtain_pat::$resp_pat_refresh_token;
echo '<br/>AuthorizationCode: '.Obtain_pat::$resp_authorization_code;
echo '<br/>Scope: '.Obtain_pat::$resp_scope;


$otain_pat->disconnect();