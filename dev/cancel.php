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

// check if tracking_id and order_id is already exist or not for security purpose
$sqlCheck="select * from transaction where tracking_id = '".$trackingData[1]."' and order_id = '".$_SESSION['order_id']."' and order_status='' ";
$resultCheck  = mysqli_query($conn, $sqlCheck) or die(mysql_error());
$msg='';
// $numRows=mysql_num_rows($resultCheck);
// echo $trackingData[1]; die();
if($resultCheck->num_rows == 0)
{
  // create transaction row
  $sql3 = "Update transaction set tracking_id = '".$trackingData[1]."', order_status = '".$order_statusData[1]."', amount = '".$amountData[1]."'where order_id = '".$_SESSION['order_id']."'  ";   

  $result3  = mysqli_query($conn, $sql3) or die(mysql_error());
  // echo $sql3; die();
}
else
{
  $msg="This transaction is failed due to transaction id #".$trackingData[1]." already exists.";
}  
// echo $result3;

//check if tracking_id empty or not
$sqlCheckID="select * from transaction where order_id = '".$_SESSION['order_id']."' and order_status='Initiated' and tracking_id IS NULL ";
$resultCheckID  = mysqli_query($conn, $sqlCheckID) or die(mysql_error());
$msg1='';
if($resultCheckID->num_rows > 0)
{
  $msg1="Order has been failer with order ID #'".$_SESSION['order_id']."'. You need to make new order now.";
}
?>
        <!-- Main -->
        <div class="main thank">
            <div class="container-fluid">
                <div class="row">  
                            <div class="col-md-6">
                                <div class="row"> 
                                    <div class="text-side">
                                        <h3>
                                          <?php
                                          if($resultCheck->num_rows == 0){
                                          ?>
                                          Your transaction (Booking id: <?= $_SESSION['order_id'] ?>, Tracking id: <?= $trackingData[1]?>, Amount: <?= $amountData[1]?>) has been cancelled.
                                          <?php
                                          }
                                          else if($resultCheckID->num_rows > 0)
                                          {
                                            echo $msg1;
                                          }
                                          else 
                                          {
                                            echo $msg;
                                          }
                                          ?>
                                        </h3>
                                        <p><a href="http://tabcii.com/" class="btn btn-primary">Continue to tabcii.com</a></p>
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