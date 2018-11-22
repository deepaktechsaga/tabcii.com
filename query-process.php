<?php 
include_once 'config.php' ;
print_r(error_get_last());

if($_POST)
{
  $amount = $_SESSION['num_of_truck'] * 200;
  
   $pickupdateconverted =  $_POST['pickupDate'];
   $material_type       =  $_POST['material_type'];
   $name                =  $_POST['name'];
   $email               =  $_POST['email'];
   $phone               =  $_SESSION['phone'];
   $message             =  $_POST['message'];

   //save user order info into table    
   $randomPassword = randomPassword(6);
   $user_id = 0;

   unset($_POST['order_id']);
   
  $sql1 = "INSERT INTO front_queries (
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

	$result2 =   mysqli_query($conn, $sql1) or die(mysql_error());
  $order_id = mysqli_insert_id($conn);
  $_SESSION['order_id']  = $order_id;

  // create transaction row
    $sql3 = "INSERT INTO transaction (   
    order_id,    
    trans_date,
    order_status) 
    values(   
    '".$order_id."',
    '".date('Y-m-d H:i:s')."',
    'Initiated'
    )";   

  $result3  = mysqli_query($conn, $sql3) or die(mysql_error());
  $txn_id = mysqli_insert_id($conn);

	if($result3)
	{		
		/*sendEmailToAdmin($name,$_SESSION['phone'], $_POST['email'],$_SESSION['pickuplocation'],$_SESSION['droplocation'],$_SESSION['vehicle_type'],$_SESSION['num_of_truck'],$_POST['pickupDate'],$_POST['message']);
    // check if email is not empty
    if($email != "")
    {
      sendEmailToUser($_POST['name'], $_POST['email']);
    }	*/

  include('Crypto.php');

  $merchant_data='';
  $working_key='25A8F51D3DA8060A7F0777743F79CF83';//Shared by CCAVENUES
  $access_code='AVMG81FK38AB91GMBA';//Shared by CCAVENUES

  unset($_POST['phone']);
  unset($_POST['pickupDate']);
  unset($_POST['vehicle_type']);
  unset($_POST['material_type']);
  unset($_POST['name']);
  unset($_POST['num_of_truck']);
  unset($_POST['message']);
  unset($_POST['email']);

  $_POST['merchant_id'] = '179138';  
  $_POST['amount'] = $amount;
  $_POST['currency'] = 'INR';    
  $_POST['language'] = 'EN';  
  $_POST['redirect_url'] = 'http://tabcii.com/dev/thanks.php'; 
  $_POST['cancel_url'] = 'http://tabcii.com/dev/cancel.php'; 
  $_POST['delivery_name'] = $name;  
  $_POST['tid'] = $txn_id;
  $_POST['order_id'] = $order_id;
  $_POST['delivery_tel'] = $phone;
  $_POST['delivery_country'] = 'India';  

  //print_r($_POST); die();

  foreach ($_POST as $key => $value){
    $merchant_data.=$key.'='.$value.'&';
  }

  $encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.	

?>

<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
alert("123");
<?php 
	}
  else
  {
      echo "under development mode";
  }
}


// generate password 
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

function dateConvert($date,$format)
{
    $date = new DateTime($date);
    return $date->format($format);
}

function sendEmailToAdmin($reqName,$contact, $reqEmail='',$pickuplocation,$droplocation,$vehicle_type,$num_of_truck,$dob,$messageData)
{

$message = '<html><body>';
$message .= '<img src="http://tabcii.com/assets/images/logo-header.png" alt="tabcii" />';
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr style='background: #eee;'><td colspan='2'>A new Enquiry has been generated from Tabcii. </td></tr>";
$message .= "<tr style='background: #eee;'><td><strong>Customer Name:</strong> </td><td>" . strip_tags($reqName) . "</td></tr>";
$message .= "<tr><td><strong>Contact Number:</strong> </td><td>" . strip_tags($contact) . "</td></tr>";
$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($reqEmail) . "</td></tr>";
$message .= "<tr><td><strong> Pickuplocation:</strong> </td><td>".$pickuplocation."</td></tr>";
$message .= "<tr><td><strong>Droplocation:</strong> </td><td>".$droplocation."</td></tr>";
$message .= "<tr><td><strong>Vehicle :</strong> </td><td>".$vehicle_type."</td></tr>";
$message .= "<tr><td><strong>Num. Of Truck:</strong> </td><td>".$num_of_truck."</td></tr>";
$message .= "<tr><td><strong>Date of booking:</strong> </td><td>".$dob."</td></tr>";
$message .= "<tr><td><strong>Message:</strong> </td><td>".$messageData."</td></tr>";
$message .= "</table>";
$message .= "</body></html>";

$headers = "From: " . strip_tags('info@tabcii.com') . "\r\n";
$headers .= "Reply-To: ". strip_tags('info@tabcii.com') . "\r\n";
//$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers .= 'Cc: sumit@techsaga.net' . "\r\n";

//send mail to owner email - galaxyworld.nmg@yahoo.com 

// set admin email
$to = 'suman.techsaga@gmail.com';

$subject = 'New enquiry regarding logistick ';

// Sending email

if(mail($to, $subject, $message, $headers))
{
   return FALSE;

} else{

   return FALSE;
}

}


function sendEmailToUser($reqName, $reqEmail)
{

$message = '<html><body>';
$message .= '<img src="http://tabcii.com/assets/images/logo-header.png" alt="tabcii" />';
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($reqName) . "</td></tr>";
$message .= "<tr><td>Thank your contacting us.</td><td></td></tr>";
$message .= "<tr><td>Our team will be response soon </td><td> </td></tr>";
$message .= "<tr><td>Reagrds </td><td></td></tr>";
$message .= "<tr><td>Tabcii.com </td><td></td></tr>";
$message .= "<tr><td>Contact us at: +91-9149-602-313 </td><td></td></tr>";
$message .= "</table>";
$message .= "</body></html>";

$headers = "From: " . strip_tags('info@tabcii.com') . "\r\n";
$headers .= "Reply-To: ". strip_tags('info@tabcii.com') . "\r\n";
//$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$to = $reqEmail;

$subject = 'Tabcii enquiry generated ';

// Sending email

if(mail($to, $subject, $message, $headers))
{

   return FALSE;

} else{

   return FALSE;
}

}

?>
       