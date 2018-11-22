<?php 

session_start();
$_SESSION['trip_type'] =$_POST['trip_type'];
$_SESSION['sourceCity'] =$_POST['sourceCity']; 
$_SESSION['destinationcity'] =$_POST['destinationcity'];
$_SESSION['pickuplocationLat'] =$_POST['pickuplocation_Lat']; 
$_SESSION['pickuplocationLng'] =$_POST['pickuplocation_Lng']; 
$_SESSION['droplocationLat'] =$_POST['droplocation_Lat']; 
$_SESSION['droplocationLng'] =$_POST['droplocation_Lng']; 
$_SESSION['pickup_date'] =$_POST['pickup_date'];
$_SESSION['drop_date'] =$_POST['drop_date'];
$_SESSION['seater'] =$_POST['seater'];
$_SESSION['carQueryActive']='active';

echo json_encode(array('status'=>'true','messages'=>'Session Begin'));

?>