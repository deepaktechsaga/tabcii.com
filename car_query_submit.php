<?php 
include_once 'config.php';
$trip_type=$_SESSION['trip_type'];
$sourceCity=$_SESSION['sourceCity'];
$destinationcity=$_SESSION['destinationcity'];
$sourceLat=$_SESSION['pickuplocationLat'];
$sourceLng=$_SESSION['pickuplocationLng'];
$destinationLat=$_SESSION['droplocationLat'];
$destinationLng=$_SESSION['droplocationLng'];
$pickup_date=$_SESSION['pickup_date'];
$drop_date=$_SESSION['drop_date'];
$seater=$_SESSION['seater'];
$name=$_POST['name'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$created_on=date('Y-m-d H:i:s');

$sql1= "insert into car_users (name,contact,email,created_on) values('$name','$contact','$email','$created_on')";
if(mysqli_query($conn,$sql1)){
  sendEmailToAdmin($name,$contact,$email);

  $id =mysqli_insert_id($conn);
  $sql2= "insert into car_enquiry (`user_id`, `trip_type`, `source`, `destination`, `source_latitude`, `source_longitude`, `destination_latitude`, `destination_longitude`, `pickup_date`, `drop_date`, `seater`, `created_on`) 
                                   values($id,'$trip_type','$sourceCity','$destinationcity','$sourceLat','$sourceLng','$destinationLat','$destinationLng','$pickup_date','$drop_date','$seater','$created_on')";
  mysqli_query($conn,$sql2);
  session_unset($_SESSION['trip_type']);
  session_unset($_SESSION['sourceCity']);
  session_unset($_SESSION['destinationcity']);
  session_unset($_SESSION['pickuplocationLat']);
  session_unset($_SESSION['pickuplocationLng']);
  session_unset($_SESSION['droplocationLat']);
  session_unset($_SESSION['droplocationLng']);
  session_unset($_SESSION['pickup_date']);
  session_unset($_SESSION['drop_date']);
  session_unset($_SESSION['seater']);
  session_unset($_SESSION['carQueryActive']);
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
    $message .= "<tr><td><strong>Trip Type:</strong> </td><td>".$_SESSION['trip_type']."</td></tr>";   
    $message .= "<tr><td><strong>Source:</strong> </td><td>".$_SESSION['sourceCity']."</td></tr>";  
    $message .= "<tr><td><strong>Destination:</strong> </td><td>".$_SESSION['destinationcity']."</td></tr>";  
    $message .= "<tr><td><strong>Pickup date:</strong> </td><td>".$_SESSION['pickup_date']."</td></tr>";
    $message .= "<tr><td><strong>Drop date:</strong> </td><td>".$_SESSION['drop_date']."</td></tr>"; 
    $message .= "<tr><td><strong>Seat:</strong> </td><td>".$_SESSION['seater']." Seaters</td></tr>"; 
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

    $subject = 'New Enquiry Regarding Tabcii-Car ';

    // Sending email

    if(mail($to, $subject, $message, $headers))
    {
       return FALSE;

    } else{

       return FALSE;
    }
}
?>