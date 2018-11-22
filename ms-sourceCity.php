<?php

define (DB_USER, "root");

define (DB_PASSWORD, "R@tech$183");

define (DB_DATABASE, "tabcii_db");

define (DB_HOST, "localhost");

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);


$sql = "SELECT source_city.source_id, source_city.source_name FROM source_city 

		WHERE source_name LIKE '%".$_GET['q']."%' order by source_name asc "; 

$result = $mysqli->query($sql);

$arrayData = [];

while($row = $result->fetch_assoc()){

     $arrayData[] = ['id'=>$row['source_id'], 'text'=>$row['source_name']];
}

echo json_encode($arrayData);