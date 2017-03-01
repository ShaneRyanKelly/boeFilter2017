<?php

require("connection.php");

$result = $conn->query("SELECT * FROM testTable");
if ($result->num_rows > 0)
{
		while($row = $result->fetch_row())
		{
	        echo "<br>"."ID: " . $row[0]. "<br>". "First Name: " . $row[1]. "<br>"."Last Name: ". $row[2];	
		}
}
else
{
	echo "Zero results.";
}
$conn->close();

?>