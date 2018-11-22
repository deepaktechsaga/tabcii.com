
<style type="text/css">
 .form-control {
        font-size: 16px;
        background: #f2f2f2;
        box-shadow: none !important;
        border-color: transparent;
    }
    .form-control:focus {
        border-color: #d3d3d3;
    }
    .form-control, .btn {        
        border-radius: 2px;
    }
    .login-form {
        width: 380px;
        margin: 0 auto;
    }
    .login-form h2 {        
        margin: 0;
        padding: 30px 0;
        font-size: 34px;
    }
    .login-form .avatar {
        margin: 0 auto 30px;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        z-index: 9;
        background: #621e66;
        padding: 15px;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }
    .login-form .avatar img {
        width: 100%;
    }
    .login-form form {
        color: #7a7a7a;
        border-radius: 4px;
        margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;      
    }   
    .login-form .btn {
        font-weight: bold;
        background: #621e66;
        border: none;
        margin-bottom: 20px;
    }
    .login-form .btn:hover, .login-form .btn:focus {
        background: #00afab;
        outline: none !important;
    }
    .login-form a {
        color: #621e66;
    }   
    .login-form form a {
        color: #621e66;
    }
    .login-form a:hover, .login-form form a:hover {
        text-decoration: underline;
    }
    .hint-text {
        color: #999;
        text-align: center;
    }
    .form-footer {
        padding-bottom: 15px;
        text-align: center;
    }

</style>

<div class="listpgWraper gray-bg" >
  <div class="container">
    <div class="row">

<div class="col-sm-6 col-sm-offset-3">
    <div class="alert alert-success alert-dismissable <?php if($this->session->flashdata('success')){echo 'show';}else{echo 'hide';}?>">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success</strong> <?= $this->session->flashdata('success'); ?>
  </div>
</div>

<div class="col-sm-6 col-sm-offset-3">
    <div class="alert alert-danger alert-dismissable <?php if($this->session->flashdata('error')){echo 'show';}else{echo 'hide';}?>">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Error!</strong> <?= $this->session->flashdata('error'); ?>
  </div>
</div>

<div style="clear: both;"></div>


<div class="login-form">
    <h3 class="text-center">Login to account</h3>
    <form action="" method="post">
        <div class="avatar">
            <img src="<?php echo base_url(); ?>assets/avatar.png" alt="Avatar">
        </div>           
        <div class="form-group">
            <input type="text" class="form-control " name="username" placeholder="Username" required="required">
            <span class="error"><?= form_error('username'); ?></span>
        </div>
        <div class="form-group">
            <input type="password" class="form-control " name="password" placeholder="Password" required="required">
            <span class="error"><?= form_error('password'); ?></span> 
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
        </div>
        <p class="hint-text">Don't have an account? <a href="<?= base_url() ?>site/signup">Sign up here</a></p>
    </form>
    <div class="form-footer"><a href="#">Forgot Your Password?</a></div>
</div>

    
    </div>
  </div>
</div>


