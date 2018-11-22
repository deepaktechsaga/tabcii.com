<div class="boxed">
  <!--CONTENT CONTAINER-->
  <!--===================================================-->
  <div id="content-container">
    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="pageheader hidden-xs">
      <h3><i class="fa fa-home"></i> Log List</h3>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>user_admin/userlist">Dashboard</a></li>
          <li class="active">Logs</li>
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
              <h3 class="panel-title">User Listing</h3>
            </div>
            <div class="panel-body">
              <div class="alert alert-success text-center <?php if($this->session->flashdata('success')|| $this->session->flashdata('updated')){echo 'show';}else{echo 'hide';}?>" style="margin: 10px 0; padding: 10px 30px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?= $this->session->flashdata('success'); ?> <?= $this->session->flashdata('updated'); ?>
</div>
              <!--Hover Rows-->
              <!--===================================================-->
              <div class="row">
                <table class="table table-bordered table-hover dataTable" >
                  <thead>
                    <tr role="row">
                      <th >#</th>
                      <th >Name</th>
                      <th>Email</th>
                      <th>Mobile No</th>
                      <th>Address</th>
                      <th >Gender</th>
                      <th>Seat No</th>
                      <th>Available Trip ID</th>
                      <th >Passenger Fare</th>
                      <th >Id Type</th>
                      <th >Id Number</th>                                        
                    </tr>
                  </thead>
                  <tbody>

                  <?php foreach($log_data as $key => $data) { 
                   // print_r($log_data);
                    ?>            
                    <tr role="row" class="odd record">
                      <td> <?= $key+1; ?> </td>
                      <td> <?= $data['name'];?> </td>
                      <td><?= $data['passengerEmail'];?></td>
                      <td><?= $data['passengerMobile'];?></td>
                      <td><?= $data['passengerAddress']?></td>
                      <td> <?= $data['gender']?> </td>
                      <td> <?= $data['seatName']?> </td>
                      <td><?= $data['availableTripId']?></td>
                      <td> <?= $data['passengerFare']?> </td>
                      <td> <?= $data['passengerIdType']?> </td>
                      <td> <?= $data['passengerIdNumber']?> </td>                               
                  </tr>
                  <?php } ?>  
                </tbody>
              </table>
            </div>
              <div class="row"><div class="col-sm-5">
               <div class="dataTables_info" id="example2_info" style="margin-top:25px;" role="status" aria-live="polite">Showing 1 to 10 of <?php echo $total_rows; ?> entries</div>
              </div>
              <div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
              <?php echo  $this->pagination->create_links(); ?>         
              </div></div></div>
            <!--===================================================-->
            <!--End Hover Rows-->
            
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
    
//Active Property

$(function(){

  $(".user_active_btn").click(function(){
  var row_id = $(this).attr("value");

  var statusVal = $(this).attr("data-info");
  if(statusVal==0) 
  {
    var msg = "Are you sure want to Disable this Employer ?"
  }
  if(statusVal==1) 
  {
    var msg = "Are you sure want to Enable this Employer ?"
  }
  
  var  activationData = {"id":row_id,"active_val":statusVal}; 

if(confirm(msg))
  {
    $.ajax({
    type:"POST",
    data:activationData,
    url:"<?php echo base_url();?>admin/active_user",
    statusCode:{
      200:function(data)
      {        
        if(data = 1)
        {

          window.location.href="<?php echo current_url();?>";
        }
        else
        {
         $("#error_del").removeClass('show');   
         $("#error_del").addClass('hide');
        }  
        
      },
      500:function(data){
        console.log("Error :  Internal Server Error");
      },
      404:function(data){
        console.log("Error :  Page not found");
      },
      502:function(data){
        console.log("Error :  Internal Server Error");
      }
    }
  }); //ajax close
/*
    $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
    .animate({ opacity: "hide" }, "slow");*/
  }
  return false;
  });

});

</script>

<script type="text/javascript">
    
//Inactive equipment

$(function(){

  $(".user_inactive_btn").click(function(){
  var row_id = $(this).attr("value");

  var statusVal = $(this).attr("data-info");
  if(statusVal== 0) 
  {
    var msg = "Are you sure want to Inactive this User ?"
  }
  
  var  activationData = {"id":row_id,"active_val":statusVal}; 

if(confirm(msg))
  {
    $.ajax({
    type:"POST",   
    data:{"id":row_id,"active_val":statusVal},
    url:"<?php echo base_url();?>admin/inactive_user",
    statusCode:{
      200:function(data)
      {        
        if(data = 1)
        {
          //window.location.href="<?php echo current_url();?>";
        }
        else
        {
         $("#error_del").removeClass('show');   
         $("#error_del").addClass('hide');
        }  
        
      },
      500:function(data){
        console.log("Error :  Internal Server Error");
      },
      404:function(data){
        console.log("Error :  Page not found");
      },
      502:function(data){
        console.log("Error :  Internal Server Error");
      }
    }
  }); //ajax close

    $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
    .animate({ opacity: "hide" }, "slow");
  }
  return false;
  });

});

</script>