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
.page-form .inner{
  width: 500px;
}
.boot{margin-bottom: 15px;}



/*******************responsive
****************************/
@media (max-width:768px) {
  .page-form,
  .page-form .inner{
    width: 100%;
  }
}

</style>







<?php include 'header.php' ?>


 <section class="page">
 <div class="page-form inner">
    <form action="#">
        <div class="header-content">
        	<a href="http://tabcii.com" style="" class="sign-logo">
        		<img alt="" class="main-logo img-responsive" src="http://tabcii.com/online-truck-booking/asset/img/icon/logo_1.png"></a>
        		<h1>Register</h1>
        	</div>
            <div id="output" style="display:none;">
                <div id="output_div">
                     <span class="text-danger" id="output_body"></span>
                </div>
            </div>
        <div class="body-content">
            <div class="form-group">
                <div class="input-icon right">
                  <select class="form-control">
                  							<option>Select</option>
                                          <option>--Select--</option>
                                          <option>--Select--</option>
                                          <option>--Select--</option>
                                       </select>
                </div>
            </div>
             <div class="row">
               <div class="form-group">
                <div class="col-lg-6 boot ">
                 <input type="text" placeholder="First Name" name="firstname"  value="" class="form-control" >
               </div>
                <div class="col-lg-6">
                	<input type="text"  placeholder="Last Name" name="lastname" value="" class="form-control" >
                </div>
              </div>
            </div>
            
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-envelope"></i>
                  <input placeholder="Email address" value=""  name="email" class="form-control" type="email">
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-phone"></i>
                  <input type="phone" placeholder="Phone Number" name="phone" class="form-control" >
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-key"></i>
                  <input type="password" placeholder="Password" name="password" class="form-control" >
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-key"></i>
                  <input type="password" placeholder="Confirm Password" name="passwordConfirm"  class="form-control" >
                </div>
            </div>

            <div class="form-group">
                  <div class="input-group">
                    <input  type="text"  placeholder="Address" class="form-control" name="address" value="" >
                    <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i></span></div>
                  <input id="pickuplocation_city" name="pickuplocation_city" type="hidden">
                  <input id="pickuplocation_Lat" name="latitude" type="hidden">
                  <input id="pickuplocation_Lng" name="longitude" type="hidden">
            </div>
           
            <!--  <div class="form-group" style="margin-bottom:10px;">
                         </div> -->
           
            <div class="form-group">
                <div class="checkbox-list"><label class=""><div class="icheckbox_minimal-grey" style="position: relative;"><input id="terms" name="terms" required="" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>&nbsp;
                    I agree with the <a href="http://tabcii.com/online-truck-booking/terms" class="color-white" target="_blank">Terms and Conditions</a></label></div>
            </div>
            
            <div class="form-group mbn">

               <button type="submit" class="btn btn-info"><i class="fa fa-chevron-circle-left"></i>&nbsp;Submit</button>
               <!-- <a href="http://tabcii.com/online-truck-booking/login" class="btn btn-danger pull-right">Login&nbsp;<i class="fa fa-chevron-circle-right"></i></a> -->               

            </div>
          
        </div>
    </form>
</div>
</section>

<?php include 'footer.php' ?>

 