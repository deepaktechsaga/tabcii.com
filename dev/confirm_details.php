<?php 
include_once 'config.php' ;
include_once 'Crypto.php' ;

$sql = "SELECT * FROM load_categories where is_active = 1";    
$result =   mysqli_query($conn, $sql);    

$material_type = array();

while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
  //will output all data on each loop.
  $material_type[] = array('id'=>$data['id'],'name'=>$data['name']);  
}

$sql2 = "SELECT * FROM vehicles where is_active = 1";    
$result =   mysqli_query($conn, $sql2);    

$vehicles = array();

while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
  //will output all data on each loop.
  $vehicles[] = array('id'=>$data['id'],'name'=>$data['name']);  
}  

//include header file
include 'header.php' 

?>
        <!-- Main -->
        <div class="main thank">
            <div class="container-fluid">
                <div class="row">  
                            <div class="col-md-6">
                                <div class="row"> 
                                    <div class="text-side">
                                        <h3>Confirm Details</h3>
                                        <form method="post" name="confirmBookingForm" action="query-process.php">
                                            <div class="form-group">
                                                <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input type="tel" name="phone" class="form-control" value="<?= $_SESSION['phone'] ?>" placeholder="Phone">
                                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                    </div>
                                                </div>

                                                 <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input type="text" name="pickupDate" class="form-control datePicker" placeholder="DD/MM/YY">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            </div><!-- ./form-group -->

                                            <div class="form-group">
                                                <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input type="text" name="vehicle_type" class="form-control" placeholder="vehicle type" value="<?= $_SESSION['vehicle_type'] ?>">
                                                        <span class="input-group-addon"><i class="fa fa-truck"></i></span>
                                                    </div>
                                                </div>

                                                 <div class="col-md-6">
                                                    <div class="input-group">
                                                        <select class="select" name="material_type">
                                                           <option>Material Type</option>
                                                            <?php foreach ($material_type as $value) { ?>                                   
                                                        <option value="<?= $value['name']; ?>"><?= $value['name']; ?></option>
                                                        <?php } ?>
                                                        </select>
                                                        <span class="input-group-addon"><i class="fa fa-truck"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            </div><!-- ./form-group -->

                                            <div class="form-group">
                                                <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input type="text" name="name" class="form-control" placeholder="Your Name">
                                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    </div>
                                                </div>

                                                 <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input type="text" name="num_of_truck" class="form-control" placeholder="Num of Truck" value="<?= $_SESSION['num_of_truck'] ?>">
                                                        <span class="input-group-addon"><i class="fa fa-sort-numeric-asc "></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            </div><!-- ./form-group -->
                                             <div class="form-group">
                                                <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input class="form-control" name="email" placeholder="Email">
                                                        <span class="input-group-addon"><i class="fa fa-envelop "></i></span>
                                                    </div>
                                                </div> 
                                            </div>
                                            </div><!-- ./form-group -->
                                            <div class="form-group">
                                                <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <textarea class="form-control" name="message" rows="2" placeholder="Message"></textarea>
                                                        <span class="input-group-addon"><i class="fa fa-comment "></i></span>
                                                    </div>
                                                </div> 
                                            </div>
                                            </div><!-- ./form-group -->
                                            <input type="hidden" name="merchant_id" value="179138"/>
                                            <input type="hidden" name="amount" id="amount" value="<?= $_SESSION['totalAmount'];?>"/>
                                            <input type="hidden" name="currency" value="INR"/>
                                            <input type="hidden" name="language" value="EN"/>
                                            <input type="hidden" name="redirect_url" value="http://tabcii.com/dev/thanks.php"/>
                                            <input type="hidden" name="cancel_url" value="http://tabcii.com/dev/thanks.php"/>

                                             <div class="form-group">
                                                <div class="row">
                                                <div class="col-md-12">
                                                     <button type="submit" class="btn btn-primary btn-block">Book Now</button>
                                                </div> 
                                            </div>
                                            </div><!-- ./form-group -->
                                        </form>
                                    </div><!-- ./ text-side-->
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row"> 

                                    <div class="map" id="">
                                        <div id="googleMap" style="width: 100%; height: 460px; background-color:green;"> </div>
                                        <div class="map-location">
                                             <div class="col-md-6">
                                                <p> <i class="fa fa-map-marker"></i> <?= $_SESSION['pickuplocation']; ?></p>
                                             </div>
                                              <div class="col-md-6">
                                                 <p><i class="fa fa-map-marker"></i> <?= $_SESSION['droplocation']; ?></p>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div><!-- ./row -->
            </div><!-- ./ -->
        </div><!-- ./main -->

<script>
  window.onload = function() {
    var d = new Date().getTime();
    document.getElementById("tid").value = d;
  };
</script>        

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

<script type="text/javascript">    
$(function() {
  
  $("form[name='confirmBookingForm']").validate({
    // Specify validation rules
    rules: {      
      pickupDate: "required",
      name: "required",
      phone: {required:true,number:true,minlength: 10},
      vehicle_type: "required",
      num_of_truck:"required",
            
    },
    // Specify validation error messages
    messages: {
           
    },
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });


});

</script>        


<?php include 'footer.php' ?>