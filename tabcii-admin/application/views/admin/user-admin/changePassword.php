<div class="boxed">
  <!--CONTENT CONTAINER-->
  <!--===================================================-->
  <div id="content-container">
    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="pageheader hidden-xs">
      <h3><i class="fa fa-key" aria-hidden="true"></i> Change password </h3>
      <div class="breadcrumb-wrapper">
        
        <ol class="breadcrumb">
          <li> <a href="<?php echo base_url(); ?>index.php/admin/dashboard"> Home </a> </li>
          <li class="active"> Change password </li>
        </ol>
      </div>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->
    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
      
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title"></h3>
            </div>
            <div id="" class="panel-body">
              <div class="change-pass">
                  <div class="icon"><i class="fa fa-pencil"></i></div>
                  <?php if($this->session->flashdata('success')){ ?>
                  <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success ! </strong> <?php echo $this->session->flashdata('success'); ?>.
                  </div>
                  <?php } ?>
                  <?php if($this->session->flashdata('error')){ ?>
                  <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Alert ! </strong> <?php echo $this->session->flashdata('error'); ?>.
                  </div>
                  <?php } ?>
                 <form role="form" method="post" action="" id="changePassword"> 
                  
                  <div class="form-group"> 
                       <input type="password" name="old_password"  class="form-control" placeholder="Enter current password">
                       <span class="error"><?php  echo form_error('old_password'); ?></span>
                  </div>      
                  <div class="form-group">     
                       <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Enter new password"> 
                       <span class="error"><?php  echo form_error('new_password'); ?></span>
                  </div>     
                  <div class="form-group">     
                       <input type="password" name="confirm_password"   class="form-control" placeholder="Enter confirm password">
                       <span class="error"><?php  echo form_error('confirm_password'); ?></span>
                         </div>   
                  <div class="form-group" style="margin-top: 20px;">
                     
                     <button type="submit" class="btn btn-primary btn-block">Change Now</button>
                      
                  </div>
                   
                  </form>
                </div>
             
            </div>
          </div>
        </div>
        
        
      </div>
      
    </div>
    <!--===================================================-->
    <!--End page content-->
  </div>
  <!--===================================================-->
  <!--END CONTENT CONTAINER-->
  </div>      

  <script type="text/javascript">
  
  $(function(){
   $('#changePassword').validate({
     
     rules:{
      old_password:{
        required:true,
        remote:{
           type: "post",
           url: "<?php echo base_url(); ?>index.php/user/isPasswordExist"

        }
      },
      new_password:{
        required:true,
        remote:{
           type: "post",
           url: "<?php echo base_url(); ?>index.php/user/isPasswordPrevious"

        }
      },
      confirm_password:{
        required:true,
        equalTo: "#new_password"
      }
     },
     messages:{
      confirm_password:{
        equalTo:"Confirm password not match"
      },
      old_password:{
      remote:"Old password is invalid"
      },
      new_password:{
      remote:"This is your old password try new"
      }
     }
   });
  });
</script>
