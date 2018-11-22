<?php

define (DB_USER, "root");

define (DB_PASSWORD, "R@tech$183");

define (DB_DATABASE, "tabcii_db");

define (DB_HOST, "localhost");

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);


$sql = "SELECT destination_city.destination_id, destination_city.destination_name FROM destination_city 

		WHERE destination_name LIKE '%".$_GET['q']."%' order by destination_name asc "; 

$result = $mysqli->query($sql);

$arrayData = [];

while($row = $result->fetch_assoc()){

     $arrayData[] = ['id'=>$row['destination_id'], 'text'=>$row['destination_name']];
}

echo json_encode($arrayData);