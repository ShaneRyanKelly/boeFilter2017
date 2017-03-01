<?php

require("connection.php");

$result = $conn->query("SELECT * FROM testtable2");
if ($result->num_rows > 0)
{
		while($row = $result->fetch_row())
		{
	        echo "<br>"."ID: " . $row[0]. "<br>". "Name: " . $row[1]. "<br>"."address: ". $row[2];	
		}
}
else
{
	echo "Zero results.";
}
$conn->close();

?>