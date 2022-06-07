<?php
require_once __DIR__ . '/vendor/autoload.php';
$con = new MongoDB\Client("mongodb://localhost:27017");

$db = $con->test2021;

$tbl = $db->table2021;

$tbl->insertOne(["Name" => "Wide-Web","Year" => 2021]);

?>