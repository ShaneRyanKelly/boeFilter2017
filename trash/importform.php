<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>BOE Import Form</title>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
		<!-- county drop down selection -->
	<div id="dropDown">
			<button >
				<table id="countyTable">
					<tbody>
					<tr><td><select name="countyDropDown" id="countyDropDown">
					</select></td></tr>
					</tbody>
				</table>
		
				<button type="button" name="selectCounty" id="selectCounty">Select County</button>
			</button>
	</div>
	<ul id="currentSelection">
		<h1>Current Selection: </h1>
		<div id="delete">
		</div>
	</ul>
	<div id="map">
		<img src="new-york-county-map.gif" id="map"></img>
	</div>

	<div id="buttons">
		<button type="button" name="previous">Previous</button>
		<button type="button" name="next">Next</button>
	</div>

	
	<!--<div id="county"></div>
	<div id="columns"></div>
	<div id="dvCSV"></div>-->
	
	<script>
		<!-- Function to Remove Additional DropDown -->
		$("#delete")
		.on("click", "#remove", function(){
			var countyName = $("countyName").text();
			var option = '<option value="' + $("#countyName").text() + '">' + $("#countyName").text() + '</option>';
			alert("Would you like to remove " + $("#countyName").text() + " from selection?");
			console.log("button pressed");
			$("countyDropDown").html(option);
		});
		<!-- Populate Drop Downs -->
		$(document).ready(function(){
			var counties = [ "Columbia", "Ulster" ];
			var option='';
			for (var i = 0; i < counties.length; i++){
				option += '<option value="' + counties[i] + '">' + counties[i] + '</option>'; 
			}
			$('#countyDropDown').html(option);
		});
		<!-- function to handle drop down selection
		$( "#selectCounty" )
		.click(function () {
			var countyName = "";
			$( "select option:selected" ).each(function() {
				$( "#selectCounty")
				countyName += $( this ).text();
		});
		<!-- ajax call to retreive table information -->
		$.ajax({
			url: 'generatetable.php',
			type: "POST",
			data:({countyDropDown: countyName}),
			success:function(result){
					alert("Your data has been submitted! " + countyName);
					$("#delete").append('<li id="name" value="' + countyName + '"><button type="button" name="remove" class="remove" id="remove"><div id="countyName">' + countyName + "</div> " + 'X</button></li>' );
					$("#columns").empty();
					$("#columns").html(result);
					$("select option[value='" + countyName + "']").remove();
				}
		});
		<!-- display selected county information -->
		$( "#county" ).html("<br><br>");
		$( "#county" ).text( countyName  + " County");
		})
		.change();
		

		

	</script>

</body>
</html>