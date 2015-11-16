<?php

require_once '../Register_resource.php';
require_once '../Obtain_pat.php';
require_once '../Rpt_status.php';
$register_resource = new Register_resource();

$register_resource->setReqUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$register_resource->setReqPat(Obtain_pat::$resp_pat_token);
$register_resource->setReqName("Your name");
$register_resource->setReqScopes(Rpt_status::$resp_permissions_scopes);

$register_resource->request();

echo '<br/>Id:'.Register_resource::$resp_id;
echo '<br/>Rev: '.Register_resource::$resp_rev;
echo '<br/>Status: '.Register_resource::$resp_resource_status;
$register_resource->disconnect();