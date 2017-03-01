<?php
	
	require("connection.php");
	// Retreive County Name from importform
	$countyName = $_POST['countyDropDown'];
	
	// confirm county name
	//echo $countyName;
	echo "<br>";
	
	// query to database to find table for respective county
	$result = mysqli_query($conn, "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '".$countyName."'");
		
		// construct table to display fields associated with given table
		echo "<table id = 'import_table' border='1'>
		<tr>
			<td align=center> <b>Data Field</b></td><td>File Field</td>";
			// display fields
		if($result -> num_rows>0){
			while($data = $result->fetch_assoc()){
				if($data["COLUMN_NAME"] != "mark" && $data["COLUMN_NAME"] != "import_date" && $data["COLUMN_NAME"] != "import_id" && $data["COLUMN_NAME"] != "import_name" && $data["COLUMN_NAME"] != "import_status" && $data["COLUMN_NAME"] != "crid" && $data["COLUMN_NAME"] != "non_profit")
				{
					echo "<tr>";
					echo "<td align=center>$data[COLUMN_NAME]</td><td><select class = 'import_dropdown' name= $data[COLUMN_NAME] form = 'importForm' ><option value = 'selections' style = 'display: selections'></option></select></td>";
					echo "</tr>";
				}
			}
		}else
			echo "no result";
		echo "</table>";
?>