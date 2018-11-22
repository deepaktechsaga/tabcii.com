<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "SSAPICaller.php";

// http://api.seatseller.travel/tripdetails?id=100000005664300609
$chosenbusid='2000295827840074208';

 echo $tripdetails = getTripDetails($chosenbusid);     

?>

       

