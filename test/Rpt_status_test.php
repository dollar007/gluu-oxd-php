<?php

require_once '../Rpt_status.php';
require_once '../Obtain_pat.php';
require_once '../Obtain_rpt.php';
$rpt_status = new Rpt_status();

$rpt_status->setReqUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$rpt_status->setReqPat(Obtain_pat::$resp_pat_token);
$rpt_status->setReqRpt(Obtain_rpt::$resp_rpt_token);

$rpt_status->request();

echo '<br/>Active: '.Rpt_status::$resp_active;
echo '<br/>ExpiresAt: '.Rpt_status::$resp_expires_at;
echo '<br/>IssuedAt: '.Rpt_status::$resp_issued_at;
echo '<br/>Permissions: ';
var_dump(Rpt_status::$resp_permissions);

$rpt_status->disconnect();