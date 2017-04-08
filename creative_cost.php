<?php
	ini_set("display_errors", 1);
	
	header('Content-Type: application/json');
	
	
	$csv = array_map('str_getcsv', file('cost.csv'));
	
	// 0 = platform, 1 = format, 2 = feature, 3 = cost
	
	$json_string = '{"creatives":[';
	
	foreach($csv as $json)
	{
		$json_string .= '{"platform":"'.$json[0].'","format":"'.$json[1].'","feature":"'.$json[2].'","cost":';
		if(!is_numeric($json[3])){
			$json_string .= "$json[3]";
		}else{
			$json_string .= $json[3];
		}
		
		$json_string .= "},";
	}
	
	$json_string = substr($json_string, 0, -1);
	
	
	echo trim(rtrim($json_string . "]}"));
	
?>
