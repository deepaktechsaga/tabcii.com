<?php 
include_once 'config.php';
$sourceCity=$_SESSION['ambulanceSourceCity'];
$destinationcity=$_SESSION['ambulanceDestinationcity'];
$sourceLat=$_SESSION['pickuplocationLat'];
$sourceLng=$_SESSION['pickuplocationLng'];
$destinationLat=$_SESSION['droplocationLat'];
$destinationLng=$_SESSION['droplocationLng'];
$pickup_date=$_SESSION['ambulance_pickup_date'];
$pickup_time=$_SESSION['ambulance_pickup_time'];
$name=$_POST['name'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$address=$_POST['address'];
$created_on=date('Y-m-d H:i:s');

$sql1= "insert into ambulance_users (name,contact,email,address,created_on) values('$name','$contact','$email','$address','$created_on')";
if(mysqli_query($conn,$sql1)){
  sendEmailToAdmin($name,$contact,$email);

  $id =mysqli_insert_id($conn);
  $sql2= "insert into ambulance_enquiry (`user_id`, `source`, `destination`, `source_latitude`, `source_longitude`, `destination_latitude`, `destination_longitude`, `pickup_date`, `pickup_time`, `created_on`) 
                                   values($id,'$sourceCity','$destinationcity','$sourceLat','$sourceLng','$destinationLat','$destinationLng','$pickup_date','$pickup_time','$created_on')";
  mysqli_query($conn,$sql2);

  session_unset($_SESSION['ambulanceSourceCity']);
  session_unset($_SESSION['ambulanceDestinationcity']);
  session_unset($_SESSION['pickuplocationLat']);
  session_unset($_SESSION['pickuplocationLng']);
  session_unset($_SESSION['droplocationLat']);
  session_unset($_SESSION['droplocationLng']);
  session_unset($_SESSION['ambulance_pickup_date']);
  session_unset($_SESSION['ambulance_pickup_time']);
  session_unset($_SESSION['ambulanceQueryActive']);
  $_SESSION['messages']='Query submitted Successfully';
  echo json_encode(array('status'=>'true','messages'=>'Query submitted Successfully'));
}

function sendEmailToAdmin($name,$contact,$email)
{
    $message = '<html><body>'; 
    $message .= '<img src="http://tabcii.com/assets/images/logo-header.png" alt="tabcii" />';
    $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $message .= "<tr style='background: #eee;'><td colspan='2'>A new Enquiry has been generated from Tabcii. </td></tr>";
    $message .= "<tr style='background: #eee;'><td><strong>Customer Name:</strong> </td><td>" . strip_tags($name) . "</td></tr>";
    $message .= "<tr><td><strong>Contact Number:</strong> </td><td>" . strip_tags($contact) . "</td></tr>";
    $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($email) . "</td></tr>";     
    $message .= "<tr><td><strong>Source:</strong> </td><td>".$_SESSION['ambulanceSourceCity']."</td></tr>";  
    $message .= "<tr><td><strong>Destination:</strong> </td><td>".$_SESSION['ambulanceDestinationcity']."</td></tr>";  
    $message .= "<tr><td><strong>Pickup date:</strong> </td><td>".$_SESSION['ambulance_pickup_date']."</td></tr>";
    $message .= "<tr><td><strong>Drop date:</strong> </td><td>".$_SESSION['ambulance_pickup_time']."</td></tr>";    
    $message .= "</table>";
    $message .= "</body></html>";

    $headers = "From: " . strip_tags('info@tabcii.com') . "\r\n";
    $headers .= "Reply-To: ". strip_tags('info@tabcii.com') . "\r\n";
    //$headers .= "CC: susan@example.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $headers .= 'Cc: galaxyworld.nmg@yahoo.com' . "\r\n";

    //send mail to owner email - galaxyworld.nmg@yahoo.com 

    // set admin email
    $to = 'suman.techsaga@gmail.com';

    $subject = 'New Enquiry Regarding Tabcii-Ambulance ';

    // Sending email

    if(mail($to, $subject, $message, $headers))
    {
       return FALSE;

    } else{

       return FALSE;
    }
}
?>