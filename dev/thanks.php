<?php
  include_once('config.php'); 
  include ('header.php');
  include('Crypto.php');

  $workingKey='25A8F51D3DA8060A7F0777743F79CF83';   //Working Key should be provided here.
  $encResponse=$_POST["encResp"];                 //This is the response sent by the CCAvenue Server
  $rcvdString=decrypt($encResponse,$workingKey);    //Crypto Decryption used as per the specified working key.
  $order_status="";
  $decryptValues=explode('&', $rcvdString);
  $dataSize=sizeof($decryptValues);
  
  for($i = 0; $i < $dataSize; $i++) 
  {
    $information=explode('=',$decryptValues[$i]);
    if($i==3) $order_status=$information[1];
  }

  if($order_status==="Success")
  {
    echo "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";

    $statusData = array();

  for($i = 0; $i < $dataSize; $i++) 
  {
    $information=explode('=',$decryptValues[$i]);
      $statusData[] = array($information[0]=>$information[1]);
  }

$response = explode('=',$decryptValues);

$orderData = explode('=',$decryptValues[0] );
$orderData[0];
$orderData[1];

$trackingData = explode('=',$decryptValues[1] );
$trackingData[0];
$trackingData[1];

$bank_ref_noData = explode('=',$decryptValues[2] );
$bank_ref_noData[0];
$bank_ref_noData[1];

$order_statusData = explode('=',$decryptValues[3] );
$order_statusData[0];
$order_statusData[1];

$amountData = explode('=',$decryptValues[10] );
$amountData[0];
$amountData[1];

// create transaction row

$sql3 = "Update transaction set tracking_id = '".$trackingData[1]."', bank_ref_no = '".$bank_ref_noData[1]."', order_status = '".$order_statusData[1]."', amount = '".$amountData[1]."' where order_id =   $orderData[1]  ";   

  $result3  = mysqli_query($conn, $sql3) or die(mysql_error());  



/*
echo "<br>";
echo "<pre>";
var_dump($decryptValues);
echo "</pre>";*/


  
  }
  else if($order_status==="Aborted")
  {
    echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
  
  }
  else if($order_status==="Failure")
  {
    echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
  }
  else
  {
    echo "<br>Security Error. Illegal access detected";
  
  }
//check if tracking_id empty or not
$sqlCheckID="select * from transaction where order_id = '".$_SESSION['order_id']."' and order_status='Initiated' and tracking_id IS NULL ";
// echo $sqlCheckID;
$resultCheckID  = mysqli_query($conn, $sqlCheckID) or die(mysql_error());
$msg1='';
if($resultCheckID->num_rows > 0)
{
  $msg1="Order has been failer with order ID #".$_SESSION['order_id'].". You need to make new order now.";
}

?>
        <!-- Main -->
        <div class="main thank">
            <div class="container-fluid">
                <div class="row">  
                            <div class="col-md-6">
                                <div class="row"> 
                                    <div class="text-side">
                                        <?php
                                        if($resultCheckID->num_rows > 0)
                                        {
                                            echo '<h3>'.$msg1.'</h3>';
                                        }
                                        else
                                        {
                                        ?>
                                        <h3>Thank You for your request</h3>
                                        <p>we have received your request, one of our customer representative will contact you soon.</p>
                                        <?php
                                        }
                                        ?>
                                        <div class="thank-img">
                                            <img src="assets/images/tabcii-thanks.png" class="img-responsive" alt="">
                                        </div>
                                    </div><!-- ./ text-side-->
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row"> 

                                    <div class="map">
                                       <div id="googleMap" style="width: 100%; height: 460px; background-color:green;"> </div>
                                        <div class="map-location">
                                            <table class="table"> 
                                                    <tbody>
                                                      <tr>
                                                        <td>Pickup Location</td>
                                                        <td><?= $_SESSION['pickuplocation']; ?></td>
                                                        
                                                      </tr>
                                                      <tr>
                                                        <td>Drop Location</td>
                                                        <td><?= $_SESSION['droplocation']; ?></td>
                                                         
                                                      </tr>
                                                      <tr>
                                                        <td>Distance</td>
                                                        <td>0 KM</td> 
                                                      </tr>
                                                      <tr>
                                                          <td>Freight Est</td>
                                                          <td>₹ 0</td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div><!-- ./row -->
            </div><!-- ./ -->
        </div><!-- ./main -->
<?php

#######################################SMS INTEGRATION 2FACTOR###############################################
// echo $_SESSION['pickuplocation'];
// echo $_SESSION['droplocation'];
if($order_status==="Success")
{
  $YourAPIKey='22618647-de8d-11e8-a895-0200cd936042';
  $From='tabcii';
  $To=$_SESSION['phone'];
  $var=$_SESSION['pickuplocation'];
  $exp=explode(',', $var);
  $count=count($exp);
  $stateCode='';
  if($count==2)
  {
    $key=$exp[0];
    $pickupcity=$exp[0];
  }
  else if($count==3)
  {
    $key=$exp[1];
    $pickupcity=$exp[0];
  }
  else if($count==4)
  {
    $key=$exp[2];
    $pickupcity=$exp[0];
  }


  $var_drop=$_SESSION['droplocation'];
  $exp_drop=explode(',', $var_drop);
  $count_drop=count($exp_drop);
  $stateCodeDrop='';
  if($count_drop==2)
  {
    $keyDrop=$exp_drop[0];
    $dropcity=$exp_drop[0];
  }
  else if($count_drop==3)
  {
    $keyDrop=$exp_drop[1];
    $dropcity=$exp_drop[0];
  }
  else if($count_drop==4)
  {
    $keyDrop=$exp_drop[2];
    $dropcity=$exp_drop[0];
  }  

$sqlUp="select state_code from state_codes where state_name like '%".trim($key)."%'";
// echo $sqlUp;
$resultUp  = mysqli_query($conn, $sqlUp) or die(mysql_error());
// print_r($resultUp);
$stateCode = mysqli_fetch_array($resultUp,MYSQLI_ASSOC);
// echo $stateCode['state_code'];

$sqlDrop="select state_code from state_codes where state_name like '%".trim($keyDrop)."%'";
// echo $sqlDrop;
$resultDrop  = mysqli_query($conn, $sqlDrop) or die(mysql_error());
// print_r($resultDrop);
$stateCodeDrop = mysqli_fetch_array($resultDrop,MYSQLI_ASSOC);
// echo $stateCodeDrop['state_code'];

  $Msg='Thanks For Booking The Truck With Load ID '.$_SESSION['order_id'].' From '.$pickupcity.', '.$stateCode['state_code'].', to '.$dropcity.', '.$stateCodeDrop['state_code'];

  ### DO NOT Change anything below this line
sendSms($from,$to,$Msg);


$pickupCord = mysqli_fetch_array(mysqli_query($conn, "Select * from front_queries where id=".$_SESSION['order_id'].""),MYSQLI_ASSOC);

$vendorsQry = mysqli_query($conn, "Select *,(((acos(sin((".$pickupCord['prepickuplocation_Lat']."*pi()/180)) * sin((`company_latitude`*pi()/180))+cos((".$pickupCord['prepickuplocation_Lat']."*pi()/180)) * cos((`company_latitude`*pi()/180)) * cos(((".$pickupCord['prepickuplocation_Lng']."- `company_longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) AS distance from vendor where (((acos(sin((".$pickupCord['prepickuplocation_Lat']."*pi()/180)) * sin((`company_latitude`*pi()/180))+cos((".$pickupCord['prepickuplocation_Lat']."*pi()/180)) * cos((`company_latitude`*pi()/180)) * cos(((".$pickupCord['prepickuplocation_Lng']."- `company_longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) < 30 ");

$while ($row = mysqli_fetch_array($vendorsQry,MYSQLI_ASSOC)) {
  $vndMsg = "Dear Vendor, there is a Truk booking enquiry with Load ID ".$_SESSION['order_id']." for you, Please check on tabcii.com";
  sendSms($from,$row['contact_no'],$vndMsg);
}



}
###################################################END########################################################





public function sendSms($from,$to,$Msg) {

  $agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';

  $url = "http://2factor.in/API/V1/$YourAPIKey/ADDON_SERVICES/SEND/PSMS"; 

  $ch = curl_init(); 
  curl_setopt($ch,CURLOPT_URL,$url); 
  curl_setopt($ch,CURLOPT_POST,true);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch,CURLOPT_POSTFIELDS,"From=$From&To=$To&Msg=$Msg");
  curl_setopt($ch, CURLOPT_USERAGENT, $agent);
  curl_exec($ch); 
  $err = curl_error($ch);
  curl_close($ch);
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    // echo $response;
  }
}


?>
<script>

var point_A_lat = parseFloat("<?= $_SESSION['pickuplocation_Lat']  ?>");
var point_A_lng = parseFloat("<?= $_SESSION['pickuplocation_Lng']  ?>");

var point_B_lat = parseFloat("<?= $_SESSION['droplocation_Lat']  ?>");
var point_B_lng = parseFloat("<?= $_SESSION['droplocation_Lng']  ?>");

function initMap() {
  var pointA = new google.maps.LatLng(point_A_lat, point_A_lng),
    pointB = new google.maps.LatLng(point_B_lat, point_B_lng),
    myOptions = {
      zoom: 7,
      center: pointA
    },
    map = new google.maps.Map(document.getElementById('googleMap'), myOptions),
    // Instantiate a directions service.
    directionsService = new google.maps.DirectionsService,
    directionsDisplay = new google.maps.DirectionsRenderer({
      map: map
    }),
    markerA = new google.maps.Marker({
      position: pointA,
      title: "point A",
      label: "A",
      map: map
    }),
    markerB = new google.maps.Marker({
      position: pointB,
      title: "point B",
      label: "B",
      map: map
    });

  // get route from A to B
  calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);

}


function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
  directionsService.route({
    origin: pointA,
    destination: pointB,
    travelMode: google.maps.TravelMode.DRIVING
  }, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
}

initMap();
</script>
        
<?php include 'footer.php' ?>