
<!DOCTYPE html>
<html>
   
<head>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Holiday letins</title>
	
    <!-- Bootstrap -->
    <link href="http://techsaga.es/holidayletins/assets/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="http://techsaga.es/holidayletins/assets/css/custom.css" rel="stylesheet" media="screen">

    <!-- Carousel -->
	<link href="http://techsaga.es/holidayletins/assets/css/carousel.css" rel="stylesheet">
    
	
    <!-- Fonts -->	
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>	
	<!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="http://techsaga.es/holidayletins/assets/css/font-awesome.css" media="screen" />
	
    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" href="http://techsaga.es/holidayletins/assets/css/fullwidth.css" media="screen" />
	<link rel="stylesheet" href="http://techsaga.es/holidayletins/assets/css/settings2.css" media="screen" />

    <!-- Picker UI-->	
	<link rel="stylesheet" href="http://techsaga.es/holidayletins/assets/css/jquery-ui.css" />		
	  

	 <script src="http://techsaga.es/holidayletins/assets/js/jquery-ui.js"></script>	
    <!-- jQuery -->	
    <script src="http://techsaga.es/holidayletins/assets/js/jquery.v2.0.3.js"></script>

        <!-- jquery validation  -->
	<script src="<?=base_url()?>assets/js/jquery.validate.js" ></script>

<style type="text/css">
	
	.login-fullwidith {
    width: 100%;
    height: 100%;
    background: url(http://titanicthemes.com/travel/blue/images/login-bg.jpg) #fff scroll center center no-repeat;
    position: relative;
}
.login-c1 {
    height: auto !important;
}
.login-c2{ margin-top: 50%; }
.login-c3{ margin-top: 50%; }
.login-c3{margin-top: 112% !important;}

label.error {
color: red;
}
</style>
	
  </head>
  <body id="top" class="thebg">
    
	 <div class="login-fullwidith" style="width: 1350px; height: 635px;">
		
		<!-- Login Wrap  -->
		<div class="login-wrap" style="margin-left: 489px; margin-top:55.5px; text-align: center;">
      <div class="alert alert-success text-center <?php if($this->session->flashdata('success')|| $this->session->flashdata('updated')){echo 'show';}else{echo 'hide';}?>" style="margin: 10px 0; padding: 10px 30px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?= $this->session->flashdata('success'); ?> <?= $this->session->flashdata('updated'); ?>
    </div>
			<form  method="POST" action="<?php echo base_url();?>site/userRegister" id="create-registration-form">
			<img src="<?php echo base_url();?>assets/holiday-logo.png" class="login-img" alt="logo"><br>
			<div class="login-c1">
				<div class="cpadding50">
					<input type="text" name="first_name" value="<?= set_value('first_name')?>" class="form-control logpadding" placeholder="First Name">
          <span class="error"><?= form_error('first_name') ?></span>
					<br>
					<input type="text" name="last_name" value="<?= set_value('last_name')?>" class="form-control logpadding" placeholder="Last Name">
          <span class="error"><?= form_error('last_name') ?></span>
					<br>
					<input type="email" name="email_id" value="<?= set_value('email_id')?>" class="form-control logpadding" placeholder="Email">
          <span class="error"><?= form_error('email_id') ?></span>
					<br>
					<input type="password" name="password" value="<?= set_value('password')?>" class="form-control logpadding" placeholder="Password">
          <span class="error"><?= form_error('password') ?></span>
				</div>
			</div>
			<div class="login-c2">
				<div class="logmargfix">
					<div class="chpadding50">
							<div class="alignbottom">
								<button class="btn-search4" type="submit">Submit</button>												
							</div>
							<!-- <div class="alignbottom2">
							  <div class="checkbox">
								<label>
								  <input type="checkbox">Remember
								</label>
							  </div>
							</div> -->
					</div>
				</div>
			</div>
			<div class="login-c3">
				<div class="left"><a href="<?php echo base_url();?>" class="whitelink"><span></span>Home</a></div>
				<div class="right"><a href="<?php echo base_url();?>site/userLogin" class="whitelink">Login</a></div>
			</div>	
		</form>		
		</div>
		<!-- End of Login Wrap  -->
	
	</div>

<script type="text/javascript">
  $(function(){

   $("#create-registration-form").validate({   

     rules:{     
      first_name:{
        required:true
      },
       last_name:{
        required:true
      },
      email_id:{
        required:true,
        remote: {
            		data:{"email_id":$("#email_id" ).val()},
            		type: "post",
            		url: "<?= base_url();?>site/is_new_email_exist"
            }
      },
      password:{
        required:true
      }
     },
     errorPlacement: function(error, element) 
     {

      error.insertAfter(element);
     },
     messages:{
      first_name:{
        required:'Please Enter First Name'       
      },
      last_name:{
        required:"Please Enter Last Name"
      },
      email_id:{
        required:"Please Enter Email",
        remote:"email Already Exist !"
      },
      password:{
        required:"Please Enter Password"
      }
    }

   });
  });
</script>
