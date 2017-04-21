<!DOCTYPE HTML>

<html>

<head>

	<title>Calculator</title>

	<link rel="shortcut icon" href="../favicon.ico">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<style>

	.nav-tabs li{

		font-weight:600;

	}

	

	#formatbudget li{

		margin-bottom:1em;

	}

	</style>

</head>

<body style="background:none">



<div style="width:1000px;margin:auto;height:600px;margin:auto">









			<table class="table" style="font-size:17px;float:left;width:45%">

					<tr>

						<td colspan="2">

							<h3>Enter Details</h3>

						</td>

					</tr>

					<tr>

						<td>Campaign Name</td>

						<td><input type="text" id="name" value=""></td>

					</tr>		

					<tr>

						<td>Salesforce ID</td>

						<td><input type="text" id="salesforce" value=""></td>

					</tr>

						<tr>

						<td colspan="2">

							<h3>Add Format</h3>

						</td>

					</tr>				

					<tr>

						<td>Gross Format Budget</td>

						<td><input type="text" id="gcb" value="20000"></td>

					</tr>

					<tr>

						<td>Creative Serving Cost</td>

						<td><input type="text" id="csc" value="0.65"></td>

					</tr>

					<tr>

						<td>Creative Build</td>

						<td><input type="text" id="creativebuild" value="0" readonly></td>

					</tr>

					<tr>

						<td>R1 Ratecard Gross CPM</td>

						<td><input type="text" id="rgcpm" value="1.50"></td>

					</tr>

					

					<tr>

						<td>Format details</td>

						<td>

							<select id="platform" onchange="javascript: getData($(this).val(), 'platform', 'format', 'format')" style="min-width:200px;margin-bottom:1em"></select><br>

							<select id="format" onchange="javascript: getData($(this).val(), 'format', 'feature', 'feature')" style="min-width:200px;margin-bottom:1em;">

							</select><br>

							<select id="feature" style="min-width:200px;height:300px" multiple>

							</select>

							</td>

						</tr>

						<tr>

							<td colspan="2">

							<button id="getFormatCost" style="width:100%">Add Format</button>

							</td>

						</tr>



				</table>

				

				<div style="float:right;width:45%">

					<h3>Total Spend</h3>

					<ul id="formatbudget"></ul>

				</div>

				

				<br style="clear:both">

</div>







<script>



var json;

var platform = new Array();





$(document).ready(function(){

	$("#getFormatCost").on("click", function(){

		var selectedPlatform = $("#platform").find(":selected").text();

		var selectedFormat = $("#format").find(":selected").text();

		var selectedFeatures = $("#feature").val();

				

		getCost(selectedPlatform, selectedFormat, selectedFeatures);

	});

});





$.getJSON( "creative_cost.php", function( data ) {

	json = data.creatives;

	$.each(json, function(index, val){

		platform.push(val.platform);

	});

	var unique = new Array();

	for(i=0;i<platform.length;i++){

		if($.inArray(platform[i], unique) === -1){

			$("#platform").append("<option>" + platform[i] + "</option>");

		}

		unique.push(platform[i]);

	}

});



function getCost(platform, format, feature)

{

	var totalformatcost = 0;

	

	for(i in feature)

	{

		$.each(json, function(key, val){

			if(val.platform == platform && val.format == format && val.feature == feature[i])

			{

				if(val.cost > totalformatcost) totalformatcost = val.cost;

			}

		});

	}

	$("#formatbudget").append("<li>" + platform + " - " + format + " - " + feature  + " - &pound;" + totalformatcost + "</li>");	

	$("#creativebuild").val((parseInt($("#creativebuild").val()) + parseInt(totalformatcost)).toString());

}



function getFormatCost(select) {

  var result = [];

  var options = select && select.options;

  var opt;



  for (var i=0, iLen=options.length; i<iLen; i++) {

    opt = options[i];



    if (opt.selected) {

      result.push(opt.value || opt.text);

    }

  }

  return result;

}



// selected_value, selected_field, wanted_field



function getData(selectedvalue, selectedfield, wantedfield, dropboxid)

{



	var unique = new Array();

	$("#" + dropboxid).html("");

	

	$.each(json, function(index, val){

		if(val[selectedfield] == selectedvalue){

			unique.push(val[wantedfield]);

		}		

	});

	

	var dedupe = new Array();	

	for(i=0;i<unique.length;i++){

		if($.inArray(unique[i], dedupe) === -1){

			$("#" + dropboxid).append("<option>" + unique[i] + "</option>");

		}

		dedupe.push(unique[i]);

	}

}





</script>





</body>

</html>