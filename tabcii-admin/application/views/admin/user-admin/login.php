<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Travel Booking |User Admin Login</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
    body {
        color: #999;
        background: #f5f5f5;
        font-family: 'Varela Round', sans-serif;
    }
    .form-control {
        box-shadow: none;
        border-color: #ddd;
    }
    .form-control:focus {
        border-color: #4aba70; 
    }
    .login-form {
        width: 380px;
        margin: 0 auto;
        padding: 100px 0;
    }
    .login-form form {
        color: #434343;
        border-radius: 1px;
        margin-bottom: 15px;
        background: #fff;
        border: 1px solid #f3f3f3;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h4 {
        text-align: center;
        font-size: 22px;
        margin-bottom: 20px;
    }
    .login-form .avatar {
        color: #fff;
        margin: 0 auto 30px;
        text-align: center;       
        padding: 15px;
        
    }
    .login-form .avatar i {
        font-size: 62px;
    }
    .login-form .form-group {
        margin-bottom: 20px;
    }
    .login-form .form-control, .login-form .btn {
        min-height: 40px;
        border-radius: 2px; 
        transition: all 0.5s;
    }
    .login-form .close {
        position: absolute;
        top: 15px;
        right: 15px;
    }
    .login-form .btn {
        background: #1d6db6;
        border: none;
        line-height: normal;
    }
    .login-form .btn:hover, .login-form .btn:focus {
        background: #1d6db6;
    }
    .login-form .checkbox-inline {
        float: left;
    }
    .login-form input[type="checkbox"] {
        margin-top: 2px;
    }
    .login-form .forgot-link {
        float: right;
    }
    .login-form .small {
        font-size: 13px;
    }
    .login-form a {
        color: #1d6db6;
    }
    .error p{color: red; font-size: 12px;}
</style>
</head>
<body>
<div class="login-form">    
    <form action="<?php echo base_url();?>user_admin/index" method="post">
      <div class="avatar"><img style="width:130px; height: 90px;" src="<?= base_url(); ?>assets/tabcii-logo.png" alt="Holiday Letins Logo" /></div>
        <h4 class="modal-title">Login to Your Accounttttt</h4>
             <label style="padding:3px 0 0 7px; color:red; font-weight:normal;" class="error ">
           <?php  echo validation_errors(); ?> 
           <?php if($this->session->flashdata('login_error')){ echo $this->session->flashdata('login_error'); }?>           
         </label>
      <div class="form-group has-feedback">
        <input type="text" class="form-control user_email" name="passengerMobile" placeholder="Enter Your Mobile No.">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control user_pass" name="passengerPassword" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">       
        <!-- /.col -->
        <div class="col-xs-12 text-center">
          <button type="submit" class="btn btn-primary btn-block btn-flat" id="submitForm">Sign In</button>        
        </div>
        <!-- /.col -->
      </div>
    </form>     
    
</div>
</body>
</html>                                                                 