<?php include 'header.php' ?>


<div class="page">
  <div class="vendor">
    <div class="logo">
      <a href="#"><img src="images/logo_1.png" alt=""></a>
    </div>
    <h1 class="title">Vendor Registration</h1>

    <form action="">
      <div class="col-md-12">

        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" class="form-control" name="" placeholder="First Name">
                 <span class="input-group-addon"><i class="fa fa-user"></i></span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" class="form-control" name="" placeholder="Last Name">
                 <span class="input-group-addon"><i class="fa fa-user"></i></span>
              </div>
            </div>
          </div>
        </div><!-- ./form-group -->
         
        <div class="form-group">
          <div class="row">
            <div class="col-md-6 add-phoneNo">
            <div class="input-group phone-a">
                <input type="text" class="form-control" name="" placeholder="Phone">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <span class="input-group-addon" id="add"><i class="fa fa-plus"></i></span>
            </div> 
            <!-- <div class="add-phone"></div> -->

            </div>

             <div class="col-md-6">
            <div class="input-group">
                <input type="email" class="form-control" name="" placeholder="Email">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            </div> 
            </div>
          </div>
        </div><!-- ./form-group -->

        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" class="form-control" name="" placeholder="Company Name">
                 <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group">
                <input type="email" class="form-control" name="" placeholder="Company Email">
                 <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              </div>
            </div>
          </div>
        </div><!-- ./form-group -->

        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" class="form-control" name="" placeholder="Company Phone">
                 <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" class="form-control" name="" placeholder="Map">
                 <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              </div>
            </div>
          </div>
        </div><!-- ./form-group -->

        <div class="form-group">
          <div class="row"> 
            <div class="col-md-12">
              <div class="input-group">
                <textarea class="form-control" name="" placeholder="Address"></textarea>
                 <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              </div>
            </div>
          </div>
        </div><!-- ./form-group -->
        <h4>Add vehicle <span id="AddMore">Add More</span></h4>
        <div class="addVehicle">
          
        <div class="form-group">
          <div class="row"> 
            <div class="col-md-6">
               <select class="form-control">
                 <option>Select Type</option>
                 <option>LOGISTICS</option>
                 <option>BUS</option>
                 <option>CAR/TAXI</option>
                 <option>AMBULANCE</option>
               </select>
            </div>

             <div class="col-md-6">
             <input type="text" class="form-control" name="" placeholder="Truck No">
            </div>
          </div>
        </div><!-- ./form-group -->

        <div class="form-group">
          <div class="row"> 
            <div class="col-md-6">
            <input type="text" class="form-control" name="" placeholder="RC">
            </div>

             <div class="col-md-6">
             <input type="text" class="form-control" name="" placeholder="">
            </div>
          </div>
        </div><!-- ./form-group -->

        </div>

      </div>
    </form>

  </div>
  <!-- /.vendor -->
</div>

<script>
$(document).ready(function(){
  var i=1;
    $("#add").click(function(){
      i++;
        $(".add-phoneNo").append('<div id="add-phone'+i+'" class="phone-space" ><div class="input-group"><input type="text" class="form-control" name="" placeholder="Phone"><span class="input-group-addon"><i class="fa fa-phone"></i></span><span class="input-group-addon delete" id="'+i+'"><i class="fa fa-minus"></i></span></div></div>');
    });
 
    $("#AddMore").click(function(){
        $(".addVehicle").append('<div id="Vehicle'+i+'"><i class="fa fa-times V-delete" id="'+i+'"></i><div class="form-group"><div class="row"><div class="col-md-6"><select class="form-control"><option>Select Type</option><option>4 Wheeler</option><option>10 Wheeler</option></select></div><div class="col-md-6"><input type="text" class="form-control" name="" placeholder="Truck No"></div></div></div><div class="form-group"><div class="row"><div class="col-md-6"><input type="text" class="form-control" name="" placeholder="RC"></div><div class="col-md-6"><input type="text" class="form-control" name="" placeholder=""></div></div></div></div>')

    });
    
});


$(document).on('click', '.delete', function(){
		var button_id = $(this).attr("id"); 
		$('#add-phone'+button_id+'').remove();
	});

  $(document).on('click', '.V-delete', function(){
		var button_id = $(this).attr("id"); 
		$('#Vehicle'+button_id+'').remove();
	});
// $(document).ready(function(){
//     $("#delete").click(function(){
//         $(".input-group").remove();
//     });
// });
</script>


<?php include 'footer.php' ?>