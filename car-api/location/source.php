<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../../config2.php');
$sql = "SELECT source_id,source_name from source_city order by source_name";
$data=array();
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{array_push($data,$row);}
echo json_encode(array('status'=>true,'data'=>$data));
?>


