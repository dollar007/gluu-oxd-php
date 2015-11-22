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

require_once '../Register_ticket.php';

$register_ticket = new Register_ticket('../');

$register_ticket->setRequestUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$register_ticket->setRequestPat($obtain_pat->getResponsePatToken());
$register_ticket->setRequestAmHost(Oxd_config::$amHost);
$register_ticket->setRequestRsHost("rs.gluu.org");
$register_ticket->setRequestResourceSetId("1366810445313");
$register_ticket->setRequestScopes([
    "http://photoz.example.com/dev/scopes/view",
    "http://photoz.example.com/dev/scopes/add"
]);
$register_ticket->setRequestHttpMethod(Oxd_config::$httpMethod);
$register_ticket->setRequestUrl("http://example.com/object/1234");

$register_ticket->request();

echo '<br/>Ticket: '.$register_ticket->getResponseTicket();

$register_ticket->disconnect();