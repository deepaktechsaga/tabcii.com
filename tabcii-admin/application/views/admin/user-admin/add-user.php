<div class="boxed">
  <!--CONTENT CONTAINER-->
  <!--===================================================-->
  <div id="content-container">
    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="pageheader hidden-xs">
      <h3><i class="fa fa-home"></i>Add User </h3>
      <div class="breadcrumb-wrapper">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
        <li><a href="javascript:;">User</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>admin/manage_user"> Back </a> </li>
        </ol>
      </div>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->
    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
      
      <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
              <div class="panel">
                  <div class="panel-heading">
                     
                      <h3 class="panel-title">User Details</h3>
                  </div>
                  <!--Block Styled Form -->
                  <!--===================================================-->
                  <form method="post"  enctype="multipart/form-data" id="edit-user">
                      <div class="panel-body">
                          <div class="row">
                            <div class="col-md-9">
                              <div class="row">
                                 <div class="col-md-12">
                                  <div class="form-group">
                                      <label class="control-label">First Name* </label>
                                      <input class="form-control" type="text"  name="first_name" placeholder="First Name" value="<?= set_value('first_name')?>">
                                       <span class="error"><?php echo form_error('first_name'); ?> </span>
                                  </div>
                              </div>
                               <div class="col-md-12">
                                   <div class="form-group">
                                      <label class="control-label">Last Name*</label>
                                         <input class="form-control" type="text"  name="last_name" placeholder="Last Name" value="<?= set_value('last_name')?>">
                                       <span class="error"><?php echo form_error('last_name'); ?> </span>
                                  </div>
                              </div> 
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="control-label">Email Address</label>
                                     <input class="form-control" type="text" placeholder="Email" name="email_id" value="<?= set_value('email_id')?>">
                                     <span class="error"><?php echo form_error('email_id'); ?> </span>
                                  </div>
                              </div> 
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="control-label">Password</label>
                                     <input class="form-control" type="password" placeholder="Password" name="password" value="<?= set_value('password')?>">
                                     <span class="error"><?php echo form_error('password'); ?> </span>
                                  </div>
                              </div> 
                              </div>
                            </div>

                            <div class="col-md-3">
                                
                                  <div class="form-group">
                                     <label class="control-label">User Image</label>
                                     <div class="edit-user-img">                           
                                      <img src="<?=base_url('assets/user-img.jpg')?>" id="getFileLabel" class="img-responsive" alt="Image">
                                      <input type="file" name="profile_image" id="profile-image">
                                     
                                  </div>
                                </div>
                              </div>  
                             

                          </div>
                            

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="control-label">Gender</label>
                                        <div class="">
                                            <select class="form-control" name="gender">
                                              <option value="">Select Gender</option>
                                              <option value="male"> Male </option>
                                              <option value="female"> Female </option>
                                              <option value="unspecified"> Unspecified </option>
                                            </select>
                                        </div> 
                                  </div>
                              </div> 

                              <div class="col-md-6">
                                <div class="form-group">
                                      <label class="control-label">Date of Birth</label>
                                     <div class="input-group date">
                                            <input class="form-control datepicker" type="text" placeholder="MM/DD/YYYY"  name="dob" type="text" value="<?= set_value('dob')?>">
                                            <span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span> 
                                        </div>                                        
                                  </div>
                                </div>

                               <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="control-label">Phone no</label>
                                      <input class="form-control only_no" type="text"  name="phone" placeholder="Phone no" value="<?= set_value('phone')?>">
                                  </div>
                              </div>

                               <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="control-label">School</label>
                                     <input class="form-control" type="text"  name="school" placeholder="School" value="<?= set_value('school')?>">                
                                  </div>
                              </div> 

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="control-label">Address</label>
                                     <input class="form-control" type="text"  name="address" value="<?= set_value('address')?>">
                                  </div>
                              </div> 

                              <div class="col-md-6">
                                   <div class="form-group">
                                      <label class="control-label">Describe Yourself</label>
                                      <textarea class="form-control" type="text"  name="description" rows="3"></textarea>       
                                  </div>
                              </div> 
                              

                              <div class="col-md-6">
                                 <div class="form-group">
                                      <label class="control-label">Work</label>
                                     <input class="form-control" type="text"  name="work" placeholder="Work" value="<?= set_value('work')?>">
                                  </div>
                              </div> 

                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="control-label">&nbsp;</label>
                                     <button class="btn btn-success btn-block" type="submit">Submit</button>
                                  </div>
                              </div> 
 
                          </div>
                             
                          
                      </div>

                      
                  </form>
                
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

<script>
$(function() {
$('#edit-user').on('keydown', '.only_no', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})
</script>
<script type="text/javascript">
// Wait for the DOM to be ready
$(function() {
// bs date picker
$('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        endDate:'today'
    })
});
</script>

<script type="text/javascript">
  $(function(){

   $("#edit-user").validate({   

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

<script type="text/javascript">
 // Wait for the DOM to be ready
$(function() {
  
//profile image preview on change 
$('#profile-image').change(function(e){
  e.preventDefault();
  //alert('Test ok');
    readURL(this);  
});

// method for show set image data on img src
function readURL(input) {

if (input.files && input.files[0]) 
{
    var reader = new FileReader();
    reader.onload = function(e) {
    $('#getFileLabel').attr('src', e.target.result);
    }
      reader.readAsDataURL(input.files[0]);
}
}


});

</script>