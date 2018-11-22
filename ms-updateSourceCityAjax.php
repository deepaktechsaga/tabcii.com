<?php 
	include_once 'config2.php' ;    
    

//	echo $_POST['data']; die();

	$jsonData = json_decode($_POST['data'],true);

	$status = FALSE;
	die('Stoped');
	foreach($jsonData as $key => $val)
	{		
		$sql = "insert into source_city (source_id,source_name) values('".$val['id']."','".$val['name']."')";    
    	$result =   mysqli_query($conn, $sql);    

	}

var_dump($result);
   
?>