<?php
session_start();
// verify connection to database
require("connection.php");
// specify file name
$fileName = "sample.csv";

// select database
mysqli_select_db($conn,"boe_database");

// open csv file 
$fp = fopen($fileName, "r");

// while not end of file
while( !feof($fp) ) {
	// break loop if no further line
  if( !$line = fgetcsv($fp, 1000, ',', '"')) {
     continue;
  }
	// insert query
    $importSQL = "INSERT INTO testTable VALUES('".$line[0]."','".$line[1]."','".$line[2]."')";

    mysqli_query($conn, $importSQL);  

}
$removeDupes = "CREATE TABLE testTable_verify AS SELECT DISTINCT * FROM testTable";
mysqli_query($conn, $removeDupes);
$removeDupes = "DELETE FROM testTable";
mysqli_query($conn, $removeDupes);
$removeDupes = "INSERT INTO testTable SELECT * FROM testTable_verify";
mysqli_query($conn, $removeDupes);
$removeDupes = "DROP TABLE testTable_verify";
mysqli_query($conn, $removeDupes);
fclose($fp);
mysqli_close($conn);
echo "Data imported successfully";

?>