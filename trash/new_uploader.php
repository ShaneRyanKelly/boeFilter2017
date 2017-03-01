<?php
session_start();
require("connection.php");
//require("head.php");
ini_set('memory_limit', '256M');

$tableName = "newTable";
$data = array();
$handle = fopen("CCBOE2017.csv", 'r');

// read data in from csv, save to array
while ($row = fgetcsv($handle, 0, ",")){
	array_push($data, $row);
}

if (count($data) > 200001) {
	$_SESSION["max_on_importer"] = "SET";
	header("location: uploadForm.php");
	die(count($data));
}

?>