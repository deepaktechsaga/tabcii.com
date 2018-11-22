<?php 
session_start();
include 'header.php' ?>
 
        <!-- Main -->
        <div class="main thank">
            <div class="container-fluid">
                <div class="row">  
                            <div class="col-md-6">
                                <div class="row"> 
                                    <div class="text-side">
                                        <h3>Thank You for your request</h3>
                                        <p>we have received your request, one of our customer representative will contact you soon.</p>
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