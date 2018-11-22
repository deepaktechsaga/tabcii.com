<?php
	include_once 'config2.php' ; 
	include_once "library/OAuthStore.php";
	include_once "library/OAuthRequester.php";
	include_once "SSAPICaller.php";

	$storesource = $_POST['sourceID'];
	
	$json_encoded_data = getAllDestinations($storesource);
	
	$json_decoded =json_decode($json_encoded_data,true);
		
	$cityData = [];
	
	foreach ($json_decoded['cities'] as $key => $value) {
		$cityData[] = ['id'=>$value['id'],'text'=>$value['name']];
	}

	// clear destination table 
	$deleteQuery = "delete from destination_city";
	mysqli_query($conn, $deleteQuery);    

	// fill destination table 
	foreach($json_decoded['cities'] as $key => $val)
	{		
		$sql = "insert into destination_city (destination_id,destination_name) values('".$val['id']."','".$val['name']."')";    
    	$result =   mysqli_query($conn, $sql);    

	}

	/*Debuging*/
	//echo json_encode($cityData);
	//print_r($json_decoded);
	/*Debuging end*/

	/*$fp = fopen('destination.json', 'w+');
	fwrite($fp,json_encode($cityData));
	fclose($fp);*/

	echo json_encode($cityData);

