<?php

header("Content-type:text/html; charset=utf8");
include '../lib/getRecordID.php';
include '../lib/getDomainID.php';

echo getRecordID(getDomainID("simread.com"),'test');


?>
