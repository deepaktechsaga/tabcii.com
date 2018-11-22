<?php 
$con=mysqli_connect("localhost","root","R@hul1234567$","tabcii_db");

//print_r($_POST); die;
    $email 	= $_POST['email']; 
	$query 		="select * from users where email = '".$email."' ";	
	$result = mysqli_query($con,$query);
	$row = mysqli_num_rows($result);
	//print_r($row); die;

	if($row > 0)
	{
		echo "false";
	}
	else
	{
		echo "true";	
	}
	?>

	