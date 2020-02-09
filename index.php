
<!DOCTYPE HTML> 
<html> 
<head> 
	<title>Calculator</title> 
	<link rel="shortcut icon" href="../favicon.ico"> 
	<link rel="stylesheet" type="text/css" href="../style.css"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
	<style> 
	.nav-tabs li{ 
		font-weight:600; 
	} 
	</style> 
</head> 
<body> 
	</div> 
	<div id="top"> 
		<p style="font-weight:bold"></p> 
		<p style="width:99%; text-align:right; top:7px; position:absolute; font-size:small;">v0.2</p> 
	</div> 
	<div class="container" style="margin-top:2em;min-height: 90mvh"> 
		<ul class="nav nav-tabs"> 
		    <li class="active"><a data-toggle="tab" href="#metric">Media Cost Calculator</a></li> 
		    <li><a data-toggle="tab" href="#creative">Creative Cost Calculator</a></li> 
		  </ul> 
		  <div class="tab-content"> 
		    <div id="metric" class="tab-pane fade in active"> 
				<table class="table" style="font-size:17px;"> 
					<tr> 
						<td colspan="2"> 
							<h3>Enter Details</h3> 
						</td> 
					</tr> 
					<tr> 
						<td>Billing Metric</td> 
						<td> 
							<select id="type" onchange="javascript:calculateMetric();"> 
								<option value="cpm" selected>CPM</option> 
								<option value="cpc">CPC</option> 
								<option value="cpa">CPA</option> 
							</select> 
						</td> 
					</tr> 
					<tr> 
						<td>Billing Rate</td> 
						<td><input type="text" id="rate" value="0.50"></td> 
					</tr> 
					<tr> 
						<td>Delivered Impressions</td> 
						<td><input type="text" id="imp" value="1000"></td> 
					</tr> 
					<tr> 
						<td>Delivered Clicks</td> 
						<td><input type="text" id="clk" value="1"></td> 
					</tr> 
					<tr> 
						<td>Delivered Conversions</td> 
						<td><input type="text" id="conv" value="10"></td> 
					</tr> 
					<tr> 
						<td>Completed Views</td> 
						<td><input type="text" id="completedviews" value="10"></td> 
					</tr> 
					<tr> 
						<td colspan="2"> 
							<h3>Results</h3> 
						</td> 
					</tr> 
					<tr> 
						<td>Total Spend</td> 
						<td>&pound;<span id="spend"></span></td> 
					</tr> 
					<tr> 
						<td>CTR</td> 
						<td><span id="ctr">0</span>&#37;</td> 
					</tr>			 
					<tr> 
						<td>eCPC</td> 
						<td>&pound;<span id="ecpc">0</span></td> 
					</tr> 
					<tr> 
						<td>eCPA</td> 
						<td>&pound;<span id="ecpa">0</span></td> 
					</tr> 
					<tr> 
						<td>eCPM</td> 
						<td>&pound;<span id="ecpm">0</span></td> 
					</tr> 
					<tr> 
						<td>eCPCV</td> 
						<td>&pound;<span id="costpercompleted">0</span></td> 
					</tr>					 
				</table> 
		    </div> 
		    <div id="creative" class="tab-pane fade"> 
				<table class="table" style="float:right;width:400px;"> 
					<tr> 
						<td colspan="2"><h2>Total Costs</h2></td> 
					</tr>	 
					<tr> 
						<td>Creative Serving Cost</td> 
						<td><input type="text" id="csc" value="0.65"></td> 
					</tr> 
					<tr> 
						<td>Ratecard Gross CPM</td> 
						<td><input type="text" id="rgcpm" value="1.50"></td> 
					</tr> 
					<tr> 
						<td colspan="2"> 
							<h3>Results</h3> 
						</td> 
					</tr> 
					<tr> 
						<td>Adserver Net CPM</td> 
						<td>&pound;<span id="ancpm">0</span></td> 
					</tr>			 
					<tr> 
						<td>Creative Partner Adserving Costs</td> 
						<td>&pound;<span id="cpcadserver">0</span></td> 
					</tr> 
					<tr> 
						<td>Salesforce Net CPM</td> 
						<td>&pound;<span id="sfncpm">0</span></td> 
					</tr> 
					<tr> 
						<td>Total Imps</td> 
						<td><span id="totalimps">0</span></td> 
					</tr> 
					<tr> 
						<td colspan="2"> 
						</td> 
				</table> 
				<table class="table" style="font-size:17px;float:left;width:400px;"> 
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
						<td>Gross Format Budget</td> 
						<td><input type="text" id="gcb" value="20000"></td> 
					</tr> 
					<tr> 
						<td colspan="2">Creative Build Cost</td> 
					</tr> 
					<tr> 
						<td colspan="2"> 
							<input type="text" id="cbc" value="0" readonly>						 
						</td> 
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
				<br style="clear:both"> 
					<h3>Total Spend</h3> 
					<div id="sendhtml"> 
						<table class="table" id="allformatstotal"> 
								<tr> 
									<th>Platform</th> 
									<th>Format</th> 
									<th>Features</th> 
									<th>Format Cost</th> 
									<th>Creative Serving</th> 
									<th>Media Rate</th> 
									<th>Adserver Net CPM</th> 
									<th>Creative Partner Cost</th> 
									<th>Salesforce Net CPM</th> 
									<th>Total Imps</th> 
								</tr> 
							</table> 
						<button onclick="javascript:mail_content($('#sendhtml').html())">Send</button> 
				</div> 
		    </div> 
		  </div> 
	</div> 
<script> 
var json; 
var platform = new Array(); 
$(document).ready(function(){ 
	$("#feature").change(function(){ 
		if($(this).val().length > 4){ 
			alert("YOU CAN ONLY CHOOSE 3"); 
			$(this).val(''); 
		} 
	}); 
}); 
	function mail_content(table) {    
	$.post('sendmail.php',{content:table},function(data) { 
		alert("sent"); 
	}); 
} 
window.onload = function(){ 
	var input = document.getElementsByTagName("input"); 
	for(var x in input){ 
		input[x].onkeyup = function(){ 
			calculateMetric(); 
			calculateCreative(); 
		} 
	} 
	calculateMetric(); 
	calculateCreative(); 
	$("#getFormatCost").on("click", function(){ 
		var selectedPlatform = $("#platform").find(":selected").text(); 
		var selectedFormat = $("#format").find(":selected").text(); 
		var selectedFeatures = $("#feature").val(); 
		if(selectedFeatures.length < 1) 
		{ 
			alert("You need to select at least one feature"); 
		} 
		else 
		{						 
			getCost(selectedPlatform, selectedFormat, selectedFeatures); 
			calculateMetric(); 
			calculateCreative(); 
		} 
	});			 
} 
function roundToTwo(num) {    
	return +(Math.round(num + "e+2")  + "e-2"); 
} 
function numberWithCommas(x) { 
	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); 
} 
function calculateMetric(){ 
	// get selected metric 
	var metric = document.getElementById("type"); 
	metric = metric.options[metric.selectedIndex].value; 
	//swtich on metric to calculate spend 
	var spend = document.getElementById("spend"); 
	var imp = document.getElementById("imp").value; 
	var clk = document.getElementById("clk").value; 
	var rate = document.getElementById("rate").value; 
	var conv = document.getElementById("conv").value; 
	var comviews = document.getElementById("completedviews").value; 
	switch(metric) 
	{ 
		case "cpm": 
			spend.innerText = parseFloat(rate * imp / 1000).toFixed(2); 
			break; 
		case "cpc": 
			spend.innerText = parseFloat(rate * clk).toFixed(2); 
			break; 
		case "cpa": 
			spend.innerText = parseFloat(rate * conv).toFixed(2); 
			break; 
	} 
	document.getElementById("ecpm").innerText = parseFloat(spend.innerText / (imp / 1000)).toFixed(2); 
	document.getElementById("ecpc").innerText = parseFloat(spend.innerText / clk).toFixed(2); 
	document.getElementById("ecpa").innerText = parseFloat(spend.innerText / conv).toFixed(2); 
	document.getElementById("ctr").innerText = parseFloat(clk/imp*100).toFixed(3); 
	document.getElementById("costpercompleted").innerText = parseFloat(spend.innerText / comviews).toFixed(2); 
} 
function calculateCreative() 
{ 
	// get selected metric 
	var net_campaign_budget = parseFloat($("#gcb").val()).toFixed(2) * 0.85; 
	var raw_media_budget = net_campaign_budget - parseInt($("#cbc").val()).toFixed(2); 
	var r1_ratecard = parseFloat($("#rgcpm").val()) * 0.85; 
	var total = r1_ratecard + parseFloat($("#csc").val()); 
	var imps = (raw_media_budget/total)*1000; 
	var creative_build_cpm = parseFloat($("#cbc").val())/imps*1000; 
	var client_cpm = total + creative_build_cpm; 
	var client_gross_cpm = client_cpm / 0.85; 
	//update results 
	$("#ancpm").text(roundToTwo(r1_ratecard)); 
	$("#cpcadserver").text((creative_build_cpm+parseFloat($("#csc").val())).toFixed(2)); 
	$("#sfncpm").text((creative_build_cpm+total).toFixed(2)); 
	$("#totalimps").text(numberWithCommas(parseInt(imps))); 
} 
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
	/* 
		csc - creative serving cost
		rgcpm - rate card 
		ancpm - Ad server net cpm 
		cpcadserver - creative partner cost on ad server 
		sfncpm - salesforce net cpm 
		totalimps - total impressions 
		Platform | Format | Features | Format Cost | Creative serving Cost | R1 Rate | Ad Server Net CPM | Creative Partner Cost | Salesforce net CPM | Total Imps 
	*/ 
	var updateBuildCost = parseInt(totalformatcost);	 
	$("#cbc").val(updateBuildCost.toString()); 
	var appendString = "<tr>"; 
	appendString += "<td>" +platform+ "</td>"; 
	appendString += "<td>" +format+ "</td>"; 
	appendString += "<td>" +feature+ "</td>"; 
	appendString += "<td>" +totalformatcost+ "</td>"; 
	appendString += "<td>" +$("#csc").val()+ "</td>"; 
	appendString += "<td>" +$("#rgcpm").val()+ "</td>"; 
	appendString += "<td>" +$("#ancpm").text()+ "</td>"; 
	appendString += "<td>" +$("#cpcadserver").text()+ "</td>"; 
	appendString += "<td>" +$("#sfncpm").text()+ "</td>"; 
	appendString += "<td>" +$("#totalimps").text()+ "</td>"; 
	appendString += "</tr>"; 
	$("#allformatstotal").append(appendString);	 
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
