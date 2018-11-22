<html>
<head>
<title> Non-Seamless-kit</title>
</head>
<body>
<center>

<?php 
include('Crypto.php');

include_once 'config.php' ;

function randomPassword($length) {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < $length; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

?>
<?php 		
	$merchant_data='';
	$working_key='A32E1B0582D9959E692E6E75FD5C3191';//Shared by CCAVENUES
	$access_code='AVTI01FF83CE48ITEC';//Shared by CCAVENUES
	
//save user order info into table 
   
   $name =  $_POST['name'];
   $email =  $_POST['email'];
   $randomPassword = randomPassword(6);

   $sql = "INSERT INTO users (
   	role_id
    fname,    
    lname,
    phone_no,
    email,
    password,
    create_date) 
    values(2,
    '".$name."',
    '".$name."',       
    '".$_SESSION['phone']."',
    '".$_POST['email']."',        
    '".$randomPassword."',
    '".date('Y-m-d')."'
    )";   

	$result1  =   mysqli_query($conn, $sql) or die(mysql_error());
	$user_id = mysqli_insert_id($con);

//save query data
   $pickupdateconverted =  $_POST['pickupDate'];
   $material_type       =  $_POST['material_type'];
   $name    =  $_POST['name'];
   $email   =  $_POST['email'];
   $message =  $_POST['message'];

   $sql2 = "INSERT INTO front_queries (
    user_id,
    prepickuplocation,
    prepickuplocation_Lat,
    prepickuplocation_Lng, 
    predroplocation,
    predroplocation_Lat,
    predroplocation_Lng,
    num_of_truck,
    prevehicletype,    
    premobile,
    preemail,
    predateofpickup,
    message,
    create_date) 
    values(
    '".$user_id."',
    '".$_SESSION['pickuplocation']."',
    '".$_SESSION['pickuplocation_Lat']."',
    '".$_SESSION['pickuplocation_Lng']."',
    '".$_SESSION['droplocation']."',
    '".$_SESSION['droplocation_Lat']."',
    '".$_SESSION['droplocation_Lng']."',
    '".$_SESSION['num_of_truck']."',
    '".$_SESSION['vehicle_type']."',    
    '".$_SESSION['phone']."',
    '".$_POST['email']."',
    '".$_POST['pickupDate']."',
    '".$_POST['message']."',
    '".date('Y-m-d')."'
    )";   

	$result =   mysqli_query($conn, $sql2) or die(mysql_error());
	$query_id = mysqli_insert_id($con);

//create transaction row
      
   $sql3 = "INSERT INTO users (
   	user_id,
   	order_id,    
    create_date) 
    values(
    '".$user_id."',
    '".$query_id."',
    '".date('Y-m-d')."'
    )";   

	$result1  = mysqli_query($conn, $sql3) or die(mysql_error());
	$txn_id = mysqli_insert_id($con);

	//print_r($_POST); die();

	// append post data 
	$_POST['tid'] = $txn_id;
	$_POST['order_id'] = $query_id;
	
	foreach ($_POST as $key => $value){
		$merchant_data.=$key.'='.$value.'&';
	}

	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.

?>
<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>

