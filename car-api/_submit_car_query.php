<?php 
//enable errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//session start
session_start();

// db connection params
$servername = "localhost";
$username   = "root";
$password   = "R@tech$183"; //R@hul1234567$
$dbname     = "tabcii_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name=$_POST['name'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$trip_type=$_POST['trip_type'];
$sourceCity=$_POST['sourceCity'];
$destinationcity=$_POST['destinationcity'];
$sourceLat=$_POST['pickuplocationLat'];
$sourceLng=$_POST['pickuplocationLng'];
$destinationLat=$_POST['droplocationLat'];
$destinationLng=$_POST['droplocationLng'];
$pickup_date=$_POST['pickup_date'];
$drop_date=$_POST['drop_date'];
$seater=$_POST['seater'];



$created_on=date('Y-m-d H:i:s');



$sql1= "insert into car_users (name,contact,email,created_on) values('$name','$contact','$email','$created_on')";
if(mysqli_query($conn,$sql1)){
 

  $id =mysqli_insert_id($conn);
  $sql1= "insert into car_users (name,contact,email,created_on) values('$name','$contact','$email','$created_on')";
  $sql2= "insert into car_enquiry (`user_id`, `trip_type`, `source`, `destination`,`source_latitude`, `source_longitude`, `destination_latitude`, `destination_longitude`, `pickup_date`, `drop_date`, `seater`, `created_on`) 
                                   values($id,'$trip_type','$sourceCity','$destinationcity','$sourceLat','$sourceLng','$destinationLat','$destinationLng','$pickup_date','$drop_date','$seater','$created_on')";
  mysqli_query($conn,$sql2);


  sendEmailToAdmin($name,$contact,$email,$trip_type,$sourceCity,$destinationcity,$pickup_date,$drop_date,$seater);
  echo json_encode(array('status'=>true,'messages'=>'Query submitted Successfully'));
}else{
  echo json_encode(array('status'=>false,'messages'=>'Request failed'));
}

function sendEmailToAdmin($name,$contact,$email,$trip_type,$source,$destination,$pickup_date,$drop_date,$seater)
{
    $message = '<html><body>'; 
    $message .= '<img src="http://tabcii.com/assets/images/logo-header.png" alt="tabcii" />';
    $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $message .= "<tr style='background: #eee;'><td colspan='2'>A new Enquiry has been generated from Tabcii. </td></tr>";
    $message .= "<tr style='background: #eee;'><td><strong>Customer Name:</strong> </td><td>" . strip_tags($name) . "</td></tr>";
    $message .= "<tr><td><strong>Contact Number:</strong> </td><td>" . strip_tags($contact) . "</td></tr>";
    $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($email) . "</td></tr>";
    $message .= "<tr><td><strong>Trip Type:</strong> </td><td>".$trip_type."</td></tr>";   
    $message .= "<tr><td><strong>Source:</strong> </td><td>".$source."</td></tr>";  
    $message .= "<tr><td><strong>Destination:</strong> </td><td>".$destination."</td></tr>";  
    $message .= "<tr><td><strong>Pickup date:</strong> </td><td>".$pickup_date."</td></tr>";
    $message .= "<tr><td><strong>Drop date:</strong> </td><td>".$drop_date."</td></tr>"; 
    $message .= "<tr><td><strong>Seat:</strong> </td><td>".$seater." Seaters</td></tr>"; 
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