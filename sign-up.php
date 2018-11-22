<?php include_once 'config.php' ; ?>
<style>
.page {

     background-image: url("images/bg.jpg");
     background-attachment: fixed;
     background-repeat: no-repeat;
    background-size: cover;
    padding: 50px 0;


}	 
.sign-logo img.main-logo {
    margin: 0 auto;
}


.page-form {
  width: 400px;
  margin:auto ;
  background: #eeeeee;
  background: rgba(255, 255, 255, 0.87);
  border-radius: 4px;
}
.page-form .input-icon i {
  margin-top: 12px;
}
.page-form input[type='text'],
.page-form input[type='password'],
.page-form input[type='email'],
.page-form select {
	height: 40px;
	border-color: #c5c5c5;
	-webkit-box-shadow: none !important;
	box-shadow: none !important;
	color: #999999;
	background: none;
}
.page-form .header-content {
  padding: 15px 20px 0px 20px;
  background: #2c3c87b3;
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
}
.page-form .header-content h1 {
  font-family: 'oswald';
  font-size: 30px;
  font-weight: bold;
  line-height: 60px;
  text-align: center;
  margin: 0;
  text-transform: uppercase;
}

.page-form .header-content h1 {font-family: Arial,Verdana;
    font-size: 30px;
    font-weight: 900;
    line-height: 46px;
    text-align: center;
    margin: 0;
    text-transform: uppercase;
    clear: both;
    background: #0378ce;
    color: #fff;
    margin:12px -20px 0 -20px ;}
.page-form .body-content {
  padding: 15px 20px;
  position: relative;
}
.page-form .body-content .btn-twitter {
  background: #5bc0de;
  margin-bottom: 10px;
  color: #ffffff;
}
.page-form .body-content .btn-twitter i {
  margin-right: 5px;
}
.page-form .body-content .btn-twitter:hover,
.page-form .body-content .btn-twitter:focus {
  color: #ffffff;
}
.page-form .body-content .btn-facebook {
  background: #418bca;
  margin-bottom: 10px;
  color: #ffffff;
}
.page-form .body-content .btn-facebook i {
  margin-right: 5px;
}
.page-form .body-content .btn-facebook:hover,
.page-form .body-content .btn-facebook:focus {
  color: #ffffff;
}
.page-form .body-content .btn-google-plus {
  background: #dd4c39;
  margin-bottom: 10px;
  color: #ffffff;
}
.page-form .body-content .btn-google-plus i {
  margin-right: 5px;
}
.page-form .body-content .btn-google-plus:hover,
.page-form .body-content .btn-google-plus:focus {
  color: #ffffff;
}
.page-form .body-content p a {
  color:#e74c3c;
}
.page-form .body-content p a:hover,
.page-form .body-content p a:focus {
  color: #777777;
  text-decoration: none;
}
.page-form .body-content .forget-password h4 {
  text-transform: uppercase;
  font-size: 15px;
  color: #636363;text-align: center;
}
.page-form .body-content .forget-password h4 + p{text-align: center;}
.page-form .body-content hr {
  border-color: #e0e0e0;
}
.page-form .state-error + em {
  display: block;
  margin-top: 6px;
  padding: 0 1px;
  font-style: normal;
  font-size: 11px;
  line-height: 15px;
  color: #d9534f;
}
.page-form .rating.state-error + em {
  margin-top: -4px;
  margin-bottom: 4px;
}
.page-form .state-success + em {
  display: block;
  margin-top: 6px;
  padding: 0 1px;
  font-style: normal;
  font-size: 11px;
  line-height: 15px;
  color: #d9534f;
}
.page-form .state-error input,
.page-form .state-error select {
  background: #f2dede;
}
.page-form .state-success input,
.page-form .state-success select {
  background: #dff0d8;
}
.page-form .note-success {
  color: #5cb85c;
}
.page-form label {
  font-weight: normal;
  margin-bottom: 0;
}
.page-form .input-icon{position:relative;}
.page-form .input-icon i {

    color: #999999;
    display: block;
    position: absolute;
    margin: 10px 2px 4px 10px;
        margin-top: 10px;
    width: 16px;
    height: 16px;
    font-size: 16px;
    text-align: center;

}

.page-form .input-icon.right i {

    right: 8px;
    float: right;

}
</style>


<?php
if(isset($_POST["submit"])){
$servername = "localhost";
$username = "root";
$password = "R@tech$183";
$dbname = "tabcii_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$date = date('Y-m-d H:i:s');
$sql = "INSERT INTO users (first_name, last_name, email,mobile,password,address,created_date) VALUES ('".$_POST["first_name"]."', '".$_POST["last_name"]."', '".$_POST["email"]."','".$_POST["mobile"]."','".md5($_POST['password'])."','".$_POST['address']."','".$date."')";

if ($conn->query($sql) === TRUE) {
    echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>




<?php include 'header.php' ?>


 <section class="page">
 <div class="page-form" style="width:500px;">
    <form id="signup-form" action="" class="form signup-form" name="signup-form" method="post" novalidate="novalidate">
        <div class="header-content">
        	<a href="http://tabcii.com" style="" class="sign-logo">
        		<img alt="" class="main-logo img-responsive" src="images/logo_1.png"></a>
        		<h1>Register</h1>
        	</div>
            <div id="output" style="display:none;">
                <div id="output_div">
                     <span class="text-danger" id="output_body"></span>
                </div>
            </div>
        <div class="body-content">
            
             <div style="margin-bottom: 15px" class="row">
                <div class="col-lg-6">
                 <input type="text" placeholder="First Name" name="first_name"  value="" class="form-control" >
               </div>

                <div class="col-lg-6">
                	<input placeholder="Last Name" name="last_name" value="" class="form-control" type="text">
                </div>
            </div>

            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-envelope"></i>
                  <input placeholder="Email address" value=""  name="email" class="form-control" type="email">
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-phone"></i>
                  <input type="phone" placeholder="Phone Number" name="mobile" class="form-control" >
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-key"></i>
                  <input type="password" placeholder="Password" name="password" id="password" class="form-control" >
                </div>
            </div>

            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-key"></i>
                  <input type="password" placeholder="Confirm Password" name="password_confirm"  class="form-control" >
                </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <input  type="text" id="pickuplocation" placeholder="Address" class="form-control" name="address" value="" >
                <span class="input-group-addon">
                <i class="fa fa-map-marker"></i></span>
              </div>
               <input type="hidden" name="pickuplocation_Lat" id="pickuplocation_Lat" >
               <input type="hidden" name="pickuplocation_Lng" id="pickuplocation_Lng" >
            </div>
           
             <div class="form-group" style="margin-bottom:10px;">
                         </div>
           
            <div class="form-group">
                <div class="checkbox-list"><input type="checkbox" />
                  &nbsp;
                    I agree with the <a href="http://tabcii.com/online-truck-booking/terms" class="color-white" target="_blank">Terms and Conditions</a></label></div>
            </div>
            
            <div class="form-group mbn">

               <input type="submit" value=" Submit " name="submit" class="btn btn-info">
               <!-- <a href="http://tabcii.com/online-truck-booking/login" class="btn btn-danger pull-right">Login&nbsp;<i class="fa fa-chevron-circle-right"></i></a> -->               

            </div>
        </div>
    </form>
</div>
</section>
<style type="text/css">
  
.icheckbox_minimal-grey,
.iradio_minimal-grey {
  display: inline-block;
  *display: inline;
  vertical-align: middle;
  margin: 0;
  padding: 0;
  width: 18px;
  height: 18px;
  background: url(http://dhhwnwoe6yq9g.cloudfront.net/masterpages/pics/forms/icheck.png) no-repeat;
  border: none;
  cursor: pointer;
}

.icheckbox_minimal-grey {
  background-position: 0 0;
}

.icheckbox_minimal-grey.hover {
  background-position: -20px 0;
}

.icheckbox_minimal-grey.checked {
  background-position: -40px 0;
}

.icheckbox_minimal-grey.disabled {
  background-position: -60px 0;
  cursor: default;
}

.icheckbox_minimal-grey.checked.disabled {
  background-position: -80px 0;
}

.iradio_minimal-grey {
  background-position: -100px 0;
}

.iradio_minimal-grey.hover {
  background-position: -120px 0;
}

.iradio_minimal-grey.checked {
  background-position: -140px 0;
}

.iradio_minimal-grey.disabled {
  background-position: -160px 0;
  cursor: default;
}

.iradio_minimal-grey.checked.disabled {
  background-position: -180px 0;
}


/* HiDPI support */

@media (-o-min-device-pixel-ratio: 5/4),
(-webkit-min-device-pixel-ratio: 1.25),
(min-resolution: 120dpi),
(min-resolution: 1.25dppx) {
  .icheckbox_minimal-grey,
  .iradio_minimal-grey {
    background-image: url(http://dhhwnwoe6yq9g.cloudfront.net/masterpages/pics/forms/icheck@2x.png);
    -webkit-background-size: 200px 20px;
    background-size: 200px 20px;
  }
}

</style>

<script type="text/javascript"> 


$(function() {
  $("form[name='signup-form']").validate({
    rules: { 
      first_name: "required",
      last_name: "required",
      email:{
        required:true,
        remote: {
          data:{"email":$("#email" ).val()},
          type: "post",
          url: "sign_up_validation.php"
        }
      },
       mobile:{
        required:true,
        digits: true
      },
      password : {
        required:true,
        minlength : 5,
      },
      password_confirm:{
        equalTo : "#password",
      },
      address: "required",
    },
    errorPlacement: function(error, element) 
     {
      error.insertAfter(element);
     },
    messages:{
      first_name:{
        required:"Please enter first name"
      },
      last_name:{
        required:"Please enter last name"
      },
      email:{
        required:"Please Enter Email",
        remote:"email Already Exist !"
      },
      mobile:{
        required:"Please enter mobile",
        //remote:"Mobile no Already Exist !"
      },
      password:{
        required:"Please enter password"
      },
       address:{
        required:"Please enter address"
      }
     
   
    }
   
  }); 
});
</script>
<script type="text/javascript">
  
 function initialize_auto() {

        var pickuplocation = document.getElementById('pickuplocation');
        var autocomplete = new google.maps.places.Autocomplete(pickuplocation);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('pickuplocation_Lat').value = place.geometry.location.lat();
            document.getElementById('pickuplocation_Lng').value = place.geometry.location.lng();

        });

        var droplocation = document.getElementById('droplocation');
        var autocomplete2 = new google.maps.places.Autocomplete(droplocation);
        google.maps.event.addListener(autocomplete2, 'place_changed', function () {
            var place2 = autocomplete2.getPlace();
            document.getElementById('droplocation_Lat').value = place2.geometry.location.lat();
            document.getElementById('droplocation_Lng').value = place2.geometry.location.lng();
            
        });
    }

google.maps.event.addDomListener(window, 'load', initialize_auto); 
     
function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
      return true;
    }
};


</script>
 


<?php include 'footer.php' ?>

 