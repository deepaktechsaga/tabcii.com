<html>
<head>
<title> Non-Seamless-kit</title>
</head>
<body>
<center>

<?php 
include('Crypto.php');

include_once 'config.php' ;

?>
<?php 
		
		//print_r($_POST); die();

	$merchant_data='';
	$working_key='A32E1B0582D9959E692E6E75FD5C3191';//Shared by CCAVENUES
	$access_code='AVTI01FF83CE48ITEC';//Shared by CCAVENUES
	
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

