<?php 
include_once 'config.php' ;
include_once "library/OAuthStore.php";
include_once "library/OAuthRequester.php";
include_once "SSAPICaller.php";
print_r(error_get_last());

  $user_name=array();
  $user_gender=array();
  $user_age=array();
  $user_primary=array();
  $user_title=array();
   $inventoryItems= array(array());
   $passenger = array(array());

  for ($i=0; $i <$_POST['chkchk']; $i++) 
  { 

    $user_name[$i]=$_POST['fname'.$i.''];
    $user_gender[$i]=$_POST['sex'.$i.''];
    $user_age[$i]=$_POST['age'.$i.''];
    $user_title[$i]=$_POST['Title'.$i.''];
  }

    $userId=$_POST['userId'];
    $user_mobile=$_POST['mobile'];
    $user_email=$_POST['email_id'];
    $user_address=$_POST['address'];
    $user_id_no=$_POST['id_no'];
    $user_idproof_type=$_POST['id_proof'];


  for ($i=0; $i <$_POST['chkchk'] ; $i++) 
  { 
    if ($i==0) 
    {
      $user_primary[$i]='true';
    }
    else
    { $user_primary[$i]='false';
       
    }
  }

    $tripdetails = getTripDetails($_POST['chosenbus']);
    $tripdetails2 = json_decode($tripdetails);

    $seatschosen=$_POST['seatnames'];

    $seats=explode(",", $seatschosen);

  for ($i=0; $i <$_POST['chkchk']; $i++) 
  { 
    
    foreach ($tripdetails2 as $key => $value) 
    {
       if(is_array($value))
       {
        foreach ($value as $k => $v) 
        { 
                 
          foreach ($v as $k1 => $v1)
           {
           if(isset($v->name))
            {

            if(!strcmp($v->name, $seats[$i]))
            {
                $passenger[$i]['age']=$user_age[$i];
                $passenger[$i]['primary']=$user_primary[$i];
                $passenger[$i]['name']=$user_name[$i]; 
                $passenger[$i]['title']=$user_title[$i];
                $passenger[$i]['gender']=$user_gender[$i];

                if ($i==0) 
                {
                    $passenger[$i]['idType']=$user_idproof_type;
                    $passenger[$i]['email']=$user_email;
                    $passenger[$i]['idNumber']=$user_id_no;
                    $passenger[$i]['address']=$user_address;
                    $passenger[$i]['mobile']=$user_mobile;
                }
                $inventoryItems[$i]['seatName']=$v->name;
                $inventoryItems[$i]['ladiesSeat']=$v->ladiesSeat;
                $inventoryItems[$i]['passenger']=$passenger[$i];
                $inventoryItems[$i]['fare']=$v->fare; 
            }
           }

          }
       }
      }
    }  
  }
  //print_r($passenger); die();

//print_r($_POST);

if($_POST)
{
   $userId                        =  $_POST['userId'];
   $availableTripId               =  $_POST['chosenbus'];
   $boardingPointId               =  $_POST['boardingpointsList'];
   $destination                   =  $_POST['chosendestination'];
   $seatName                      =  $_POST['seatnames'];
   $passengerEmail                =  $_POST['email_id'];
   $password                      =  $_POST['password'];
   $passengerMobile               =  $_POST['mobile'];
   $passengerAddress              =  $_POST['address'];
   $passengerAdditionalAddress    =  $_POST['additional_address'];
   $passengerIdNumber             =  $_POST['id_no'];
   $passengerIdType               =  $_POST['id_proof'];
   $source                        =  $_POST['chosensource'];
   $chkchk   			                =  $_POST['chkchk'];
   $fare   				                =  $_SESSION['fare'];

   $passFare =  $chkchk * $fare;
   $tax = $chkchk * 20;

   $passengerFare = $passFare + $tax; //print_r($passengerFare); die(); 

   //save user order info into table  
   
  $sql1 = "INSERT INTO tabcii_bus_booking (
      userId,
	    availableTripId,
	    boardingPointId,
	    destination,   
	    seatName, 
	    passengerEmail, 
      passengerPassword,
      passengerName,
	    passengerMobile,
	    passengerAddress,
      passengerLatitude,
      passengerLongitude,
      passengerZip,
      passengerAdditionalAddress,
	    passengerIdNumber,
	    passengerIdType,
	    passengerFare,
	    source,
	    createdDate) 
	    values(
       '".$_POST['userId']."',
	    '".$_POST['chosenbus']."',
	    '".$_POST['boardingpointsList']."',
	    '".$_POST['chosendestination']."', 
	    '".$_POST['seatnames']."',    
	    '".$_POST['email_id']."',  
      '".md5(trim($_POST['password']))."',  
      '".$_POST['name']."', 
	    '".$_POST['mobile']."',  
	    '".$_POST['address']."', 
      '".$_POST['addressLat']."', 
      '".$_POST['addressLng']."', 
      '".$_POST['addressZip']."', 
      '".$_POST['additional_address']."', 
	    '".$_POST['id_no']."', 
	    '".$_POST['id_proof']."',   
	    '".$passengerFare."', 
	    '".$_POST['chosensource']."',
	    '".date('Y-m-d H:i:s')."'
	    )";     

	$result2 =   mysqli_query($conn, $sql1) or die(mysql_error());
  $booking_id = mysqli_insert_id($conn);


      foreach($passenger as $data)
      {
        $booking_id  = $booking_id;
        $title  = $data['title']; 
        $name  = $data['name'];
        $gender  = $data['gender'];
        $age  = $data['age'];  
   
    
        $sql2 = "INSERT INTO `bus_passenger_detail` (booking_id,title,name,gender,age,passengerFare) 
         VALUES ('".$booking_id."','".$title."','".$name."','".$gender."', '".$age."', '".$fare."')";


      $result2 =   mysqli_query($conn, $sql2) or die(mysql_error()); 
      $txn_id = mysqli_insert_id($conn);   
    }


   $sql3 = "INSERT INTO users (
      first_name,
      mobile,     
      email,   
      password, 
      address, 
      created_date) 
      values(
      '".$_POST['name']."',
      '".$_POST['mobile']."',
      '".$_POST['email_id']."',
      '".md5(trim($_POST['password']))."',
      '".$_POST['address']."', 
      '".date('Y-m-d H:i:s')."'
      )";     

    $result2 =   mysqli_query($conn, $sql3) or die(mysql_error());

	if($result2)
	{

     sendEmailToAdmin($name,$_POST['mobile'], $_POST['email_id'],$_POST['address'],$_POST['id_proof'],$_POST['id_no'],$_POST['chosenbus'],$_POST['seatnames']);
    // check if email is not empty
    if($passengerEmail != "")
    {
      sendEmailToUser($name, $_POST['email_id'],$_POST['chosenbus'],$_POST['seatnames'],$passengerFare);
    } 


  include('Crypto.php');

  $merchant_data='';
  $working_key='A32E1B0582D9959E692E6E75FD5C3191';//Shared by CCAVENUES
  $access_code='AVTI01FF83CE48ITEC';//Shared by CCAVENUES

  $mobile = $_POST['mobile'];
  $address = $_POST['address'];
  $zip = $_POST['addressZip'];

  $state_data = explode(',',$address); 
  $city = $state_data[0];
  $state = $state_data[1];

  unset($_POST['email_id']);
  unset($_POST['id_no']);
  unset($_POST['id_proof']);
  unset($_POST['addressZip']);
  unset($_POST['addressLat']);
  unset($_POST['addressLng']);
  unset($_POST['chosensource']);
  unset($_POST['chosendestination']);
  unset($_POST['chosenbus']);
  unset($_POST['boardingpointsList']);
  unset($_POST['chkchk']);
  unset($_POST['seatnames']);

  $_POST['merchant_id'] = '179138';  
  $_POST['delivery_name'] = $name;  
  $_POST['amount'] = $passengerFare;
  $_POST['currency'] = 'INR';    
  $_POST['language'] = 'EN';  
  $_POST['redirect_url'] = 'http://tabcii.com/dev/thanks.php'; 
  $_POST['cancel_url'] = 'http://tabcii.com/dev/thanks.php'; 
  $_POST['delivery_address'] = $address;
  $_POST['delivery_state'] = $state;
  $_POST['delivery_city'] = $city;
  $_POST['delivery_zip'] = $zip;
  $_POST['order_id'] = $booking_id;
  $_POST['delivery_tel'] = $mobile;
  $_POST['delivery_country'] = 'India'; 

  /*print_r($_POST); die();*/

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

<?php 
	}
  else
  {
      echo "under development mode";
  }
}

function sendEmailToAdmin($reqName,$contact, $reqEmail='',$address,$id_proof,$id_no,$booking_id,$seats)
{
    $message = '<html><body>'; 
    $message .= '<img src="http://tabcii.com/assets/images/logo-header.png" alt="tabcii" />';
    $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $message .= "<tr style='background: #eee;'><td colspan='2'>A new Enquiry has been generated from Tabcii. </td></tr>";
    $message .= "<tr style='background: #eee;'><td><strong>Customer Name:</strong> </td><td>" . strip_tags($reqName) . "</td></tr>";
    $message .= "<tr><td><strong>Contact Number:</strong> </td><td>" . strip_tags($contact) . "</td></tr>";
    $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($reqEmail) . "</td></tr>";
    $message .= "<tr><td><strong> Address:</strong> </td><td>".$address."</td></tr>";
    $message .= "<tr><td><strong>Id Proof:</strong> </td><td>".$id_proof."</td></tr>";
    $message .= "<tr><td><strong>Id No. :</strong> </td><td>".$id_no."</td></tr>";
    $message .= "<tr><td><strong>Booking Id:</strong> </td><td>".$booking_id."</td></tr>";
    $message .= "<tr><td><strong>Seats:</strong> </td><td>".$seats."</td></tr>";   
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

    $subject = 'New Enquiry Regarding Tabcii-Bus ';

    // Sending email

    if(mail($to, $subject, $message, $headers))
    {
       return FALSE;

    } else{

       return FALSE;
    }
}

function sendEmailToUser($reqName, $reqEmail,$booking_id,$seats,$passenger_fare)
{
    $message = '<html><body>';
    $message .= '<img src="http://tabcii.com/assets/images/logo-header.png" alt="tabcii" />';
    $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $message .= "<tr style='background: #eee;'><td colspan='2'>A new Enquiry has been generated from Tabcii. </td></tr>";
    $message .= "<tr style='background: #eee;'><td><strong>Customer Name:</strong> </td><td>" . strip_tags($reqName) . "</td></tr>";
    $message .= "<tr><td><strong>Booking Id:</strong> </td><td>".$booking_id."</td></tr>";
    $message .= "<tr><td><strong>Seats:</strong> </td><td>".$seats."</td></tr>"; 
    $message .= "<tr><td><strong>Passenger Fare:</strong> </td><td>".$passenger_fare."</td></tr>";  
    $message .= "</table>";
    $message .= "</body></html>";

    $headers = "From: " . strip_tags('info@tabcii.com') . "\r\n";
    $headers .= "Reply-To: ". strip_tags('info@tabcii.com') . "\r\n";
    //$headers .= "CC: susan@example.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $to = $reqEmail;

    $subject = 'Tabcii Enquiry Generated ';

    // Sending email

    if(mail($to, $subject, $message, $headers))
    {

       return FALSE;

    } else{

       return FALSE;
    }
}

?>       