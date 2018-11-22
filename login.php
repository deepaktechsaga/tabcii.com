<style>
.page {
     background-image: url("images/bg.jpg");
     background-attachment: fixed;
     background-repeat: no-repeat;
    background-size: cover;
    padding: 50px 0;
}  
  .page-form {
    width: 400px;
    margin:auto;
    background: #eeeeee;
    background: rgba(255, 255, 255, 0.87);
    border-radius: 4px;
}
.page-form .header-content {
    padding: 15px 20px 0px 20px;
    background: #2c3c87b3;
}
.sign-logo {
    display: block;
    text-align: center;
}
.page-form .header-content h1 {
    font-family: 'oswald';
    font-size: 30px;
    font-weight: bold;
    line-height: 46px;
    text-align: center;
    margin: 0;
    text-transform: uppercase;
    clear: both;
    background: #0378ce;
    color: #fff;
    margin: 12px -20px 0 -20px;
}

.page-form .body-content {
    padding: 15px 20px;
    position: relative;
}
.page-form .input-icon {
    position: relative;
}

.page-form .input-icon.right i {
    right: 8px;
    float: right;
}
.page-form .input-icon i {

    margin-top: 12px;

}
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

.icheckbox_minimal-grey, .iradio_minimal-grey {

    display: inline-block;
    
    vertical-align: middle;
    margin: 0;
    padding: 0;
    width: 18px;
    height: 18px;
    background: url(grey.png) no-repeat;
        
    border: none;
    cursor: pointer;
    border: 1px solid #a4a4a4;

}
</style>
<?php
$con=mysqli_connect("localhost","root","","tabcii_db");
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['email'])){
        // removes backslashes
    $email = stripslashes($_REQUEST['email']);
        //escapes special characters in a string
    $email = mysqli_real_escape_string($con,$email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    //Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE email='$email' and password='".md5($password)."'";
    $result = mysqli_query($con,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
        if($rows==1){
        $_SESSION['email'] = $email;
            // Redirect user to index.php
        header("Location: index.php");
         }else{
   header("Location: login.php");
    }
    }
?>
<?php include 'header.php' ?>

<section class="page">
  <div class="page-form">
    <form action=""  method="post">

        <div class="header-content"><a href="http://tabcii.com" style="" class="sign-logo"><img alt="" title="" class="main-logo img-responsive" src="images/logo_1.png"></a><h1>Log In</h1></div>
                <div class="body-content">

             <div id="output" style="display:none;">
                <div id="output_div" class="alert alert-danger">
                    <span id="output_body"></span>
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-icon right">
                  <i class="fa fa-phone"></i><input type="text" placeholder="Email ID" name="email"  class="form-control" >
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon right">
                  <i class="fa fa-key"></i>
                  <input type="password" placeholder="Password" name="password"  class="form-control" >
                </div>
            </div>
            <div class="form-group pull-left">
                <div class="checkbox-list">
                  <label>
                  <!-- <div class="icheckbox_minimal-grey" style="position: relative;">
                    <input style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;" type="checkbox">
                    <ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;">
                       </ins>
                    </div> --> <input type="checkbox" />&nbsp;
                  Keep me signed in</label>
                  </div>
                   
            </div>
             <div class="form-group l-btn">
                                           
                <img src="http://tabcii.com/online-truck-booking/assets/front/images/loading.gif" class="img-responsive" alt="Image" id="loading1" style="display:none;">
                 </div>
                <input name="return" id="inputReturn" class="form-control" value="" type="hidden">
            
                    <div class="form-group pull-right">
                         <input type="submit" value=" Log In " name="submit" class="btn btn-info">
                <!-- <button type="submit" class="btn btn-info">Log In
                    &nbsp;<i class="fa fa-chevron-circle-right"></i></button> -->
            </div>
            <div class="clearfix">
              
            </div>
            <div class="forget-password">
              <h4>Forgotten your Password?</h4>

                <p>no worries, click<a href="#"> here</a> to reset your password.</p>
              </div>
            <hr>
            <p>Don't have an account? <a id="btn-register" href="sign-up.php">Register Now</a></p></div>
    </form>
</div>


</section>

 

<?php include 'footer.php' ?>

 