<?php

require_once '../Register_ticket.php';
require_once '../Obtain_pat.php';

$register_ticket = new Register_ticket();

$register_ticket->setReqUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$register_ticket->setReqPat(Obtain_pat::$resp_pat_token);
$register_ticket->setReqAmHost(Oxd_config::$amHost);
$register_ticket->setReqRsHost("rs.gluu.org");
$register_ticket->setReqResourceSetId("1366810445313");
$register_ticket->setReqScopes([
    "http://photoz.example.com/dev/scopes/view",
    "http://photoz.example.com/dev/scopes/add"
]);
$register_ticket->setReqHttpMethod(Oxd_config::$httpMethod);
$register_ticket->setReqUrl("http://example.com/object/1234");

$register_ticket->request();

echo '<br/>Ticket: '.Register_ticket::$resp_ticket;

$register_ticket->disconnect();