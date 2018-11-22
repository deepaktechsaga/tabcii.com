<?php 

session_start();
$_SESSION['ambulanceSourceCity'] =$_POST['sourceCity']; 
$_SESSION['ambulanceDestinationcity'] =$_POST['destinationcity'];
$_SESSION['pickuplocationLat'] =$_POST['pickuplocation_Lat']; 
$_SESSION['pickuplocationLng'] =$_POST['pickuplocation_Lng']; 
$_SESSION['droplocationLat'] =$_POST['droplocation_Lat']; 
$_SESSION['droplocationLng'] =$_POST['droplocation_Lng']; 
$_SESSION['ambulance_pickup_date'] =$_POST['pickup_date'];
$_SESSION['ambulance_pickup_time'] =$_POST['pickup_time'];
$_SESSION['ambulanceQueryActive']='active';

echo json_encode(array('status'=>'true','messages'=>'Session Begin'));

?>