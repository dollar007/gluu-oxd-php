<?php

require_once '../Discovery.php';

$discovery = new Discovery();
$discovery->setReqDiscoveryUrl(Oxd_config::$discoveryUrl);
$discovery->request();

echo '<pre>';
print_r($discovery->getRespObject());
$discovery->disconnect();