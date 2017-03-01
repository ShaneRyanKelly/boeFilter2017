<?php 
require "connection.php";
	if (isset($_POST['fields'])) 
	{
		$fields = $_POST['fields'];
		$count = 0;
		echo '<div id="fields" name="fields">';
		foreach($fields as $field=>$value){
			if($count == count($fields) - 1){
				echo $value;
			}
			else{
				echo $value . ", ";
			}	
			$count++;
		}
		
		echo '</div>';
		$query = "SELECT DISTINCT " . $fields[6] . " FROM columbia";
		$getdatabaseTable = mysqli_query($conn, $query);
		while ($row = mysqli_fetch_array($getdatabaseTable)){
			echo $row[$fields[6]] . " ";
		}
	}
?>