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
  <!--CONTENT CONTAINER-->
  <!--===================================================-->
  <div id="content-container">
    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="pageheader hidden-xs">
      <h3><i class="fa fa-home"></i> Vendors List</h3>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a></li>
          <li class="active">Vendors</li>
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
              <h3 class="panel-title">Vendors List</h3>
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
                      <th >Email</th>
                      <th >Mobile</th>
                      <th >Company Name</th>
                      <th >Company Address</th>                                        
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i=1; foreach($vendor as $data) { ?>            
                    <tr role="row" class="odd record">
                      <td> <?= $i ?> </td>
                      <td> <?= $data['name']?> </td>
                      <td> <?= $data['email_id']?> </td>
                      <td> <?= $data['contact_no']?> </td>
                      <td> <?= $data['company_name']?> </td>
                      <td> <?= $data['company_address']?> </td>
                  </tr>
                  <?php $i++;} ?>  
                </tbody>
              </table>
            </div>
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
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.dataTable').DataTable();
  });
</script>