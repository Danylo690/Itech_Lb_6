<?php
use MongoDB\Operation\Distinct;
require_once __DIR__ . '/mongo/vendor/autoload.php';
$con = new MongoDB\Client("mongodb://localhost:27017");
$db = $con->LB_2;
$tbl = $db->Computer;
?>