<style type="text/css">
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<div class="boxed">
  <div id="content-container">
    <div class="pageheader hidden-xs">
      <h3><i class="fa fa-home"></i> Log List</h3>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a></li>
          <li class="active">Logs</li>
        </ol>
      </div>
    </div>
    <div id="page-content">      
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Booking Log</h3>
            </div>
            <div class="panel-body">
              <div class="alert alert-success text-center <?php if($this->session->flashdata('success')|| $this->session->flashdata('updated')){echo 'show';}else{echo 'hide';}?>" style="margin: 10px 0; padding: 10px 30px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?= $this->session->flashdata('success'); ?> <?= $this->session->flashdata('updated'); ?>
      </div>
              <div class="row">
                <table class="table table-bordered table-hover dataTable" >
                  <thead>
                    <tr role="row">
                      <th >#</th>
                      <th >Name</th>
                      <th >Email</th>
                      <th >Mobile</th>
                      <th >Address</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($log_data as $data) { ?>            
                    <tr role="row" class="odd record">
                      <td> <?= $data['id']?> </td>
                      <td> <?= $data['first_name'].' '. $data['last_name']?> </td>
                      <td> <?= $data['email']?> </td>
                      <td> <?= $data['mobile']?> </td>
                      <td> <?= $data['address']?> </td>                            
                      <!-- <td>
                       <a href="javascript:;" class="editad openAnswerBox" id="modalid" data="<?php echo $data['id'];?>"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $data['id']?>" style="background-color: #00afab;border-color: #00afab;"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                    </td> -->
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
          </div>
        </div>
      </div>      
    </div>
    
  </div>
 
</div>
</div>

<div class="container" >
 <?php foreach ($log_data as $key => $data) { ?>
  <!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $data['id'];?>" role="dialog">
    <div class="modal-dialog" style="width: auto;">
   
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Logistic Details</h4>
        </div>
        <div class="modal-body">
         
<table id="customers">
  <tr>
     <th >#</th>
     <th >Pick up</th>
     <th >Drop</th>
     <th >Mobile</th>
     <th >Email</th>
     <th >Vehicle Type</th>                                        
     <th >Pick-up Date</th>
     <th >No of Truck</th>
     <th >Message</th>
     <th >Created date</th>
  </tr>
  <tr>
    <td> <?= $data['id']?> </td>
    <td> <?= $data['prepickuplocation']?> </td>
    <td> <?= $data['predroplocation']?> </td>
    <td> <?= $data['premobile']?> </td>
    <td> <?= $data['preemail']?> </td>
    <td> <?= $data['prevehicletype']?> </td>
    <td> <?= $data['predateofpickup']?> </td>    
    <td> <?= $data['num_of_truck']?> </td>
    <td> <?= $data['message']?> </td>
    <td> <?= $data['create_date']?> </td>
  </tr>

</table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        
      </div> 
     
    </div>
  </div>
   <?php } ?> 
</div>
<script>
$(document).ready(function(){      
$('.openAnswerBox').on('click',function(){
  
    $('#myModal').modal();
        //show edit input
        $(this).closest("tr").find(".editInput1").show();       
        $(this).closest("tr").find(".editInput2").show();     
    });
  });
</script>


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