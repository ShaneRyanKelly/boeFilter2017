<?php
session_start();
// verify connection to database
require("connection.php");
// specify file name
$fileName = "CCBOE2017.csv";

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
    $importSQL = "INSERT INTO testtable2 VALUES('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."','".$line[6]."','".$line[7]."','".$line[8]."','".$line[9]."','".$line[10]."','".$line[11]."','".$line[12]."','".$line[13]."','".$line[14]."','".$line[15]."','".$line[16]."','".$line[17]."','".$line[18]."','".$line[19]."','".$line[20]."','".$line[21]."','".$line[22]."','".$line[23]."')";

    mysqli_query($conn, $importSQL);  

}
//$removeDupes = "CREATE TABLE testTable_verify AS SELECT DISTINCT * FROM testTable";
//mysqli_query($conn, $removeDupes);
//$removeDupes = "DELETE FROM testTable";
//mysqli_query($conn, $removeDupes);
//$removeDupes = "INSERT INTO testTable SELECT * FROM testTable_verify";
//mysqli_query($conn, $removeDupes);
//$removeDupes = "DROP TABLE testTable_verify";
//mysqli_query($conn, $removeDupes);
fclose($fp);
mysqli_close($conn);
echo "Data imported successfully";

?>