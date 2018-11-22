 <?php
include_once 'config.php' ;
include_once 'Crypto.php' ;
include_once "header1.php";
include_once "library/OAuthStore.php";
include_once "library/OAuthRequester.php";
include_once "SSAPICaller.php"; 

$chosenbusid=$_POST['chosenbus'];
$sourceid=$_POST['chosensource'];
$destinationid=$_POST['chosendestination'];
$boardingpointid=$_POST['boardingpointsList'];
$checkbox_no=sizeof($_POST['chkchk']);
$boardingpointid=$_POST['boardingpointsList'];
$seatschosen=$_POST['seatnames'];

$tripdetails = getTripDetails($_POST['chosenbus']);
$tripdetails2 = json_decode($tripdetails);


foreach ($tripdetails2 as $key => $value) 
{
  if(is_array($value))
  {
      foreach ($value as $k => $v) 
      {                
          $data = $v->fare; 
      }
  }
}
unset($_POST['fare']);
$fare = $v->fare; 
$_SESSION['fare']   = $fare;
$totalPassengerFare = $checkbox_no * $fare;

?>
<section class="topfor-service-holder" >
    <div class="container">
         <div class="c-details">
         <div class="row">    
         <form method='POST' name='generateForm' action='block_req.php'>     
           <div class="col-md-9">
             <h4 class="info">Customer Information <span class="pull-right">Total Fare:&nbsp; <i class="fa fa-rupee"></i><?= $totalPassengerFare ?></span></h4>
               <?php for ($i=0; $i <$checkbox_no ; $i++) { ?>   
            <div class="cinfo">           
             <div class="row">
               <div class="col-md-3">
                 <div class="form-group">
                    <select name='Title<?php echo $i; ?>' class="form-control" required="">
                      <option value=''>-- select --</option>
                      <option value='Mr'>Mr.</option>
                      <option value='Mrs'>Mrs.</option>
                      <option value='Ms'>Ms.</option>
                    </select>
                 </div>
               </div>
               <div class="col-md-3">
                 <div class="form-group">
                   <input type="text" name="fname<?php echo $i; ?>" class="form-control" placeholder="Name" required="">                   
                 </div>
               </div>
               <div class="col-md-3">
                 <div class="form-group">
                  <div class="radio">
                    <label class="Gender"><strong>Gender:</strong></label>
                  <label class="radio-inline">                   
                   <input type='radio' name='sex<?php echo $i; ?>' value='male'> Male 
                 </label>
                   <label class="radio-inline"> 
                    <input type='radio' name='sex<?php echo $i; ?>' value='female'> Female
                   
                 </label>
               </div>
                 </div>
               </div>
                <div class="col-md-3">
                 <div class="form-group">
                   <input type="text" name="age<?php echo $i; ?>" class="form-control" placeholder="Age" required="">    
                 </div>
               </div>
             </div>
           </div><!-- ./cinfo -->
            <?php  } ?>

           </div>


           <div class="col-md-3">
            <h4 class="info">Contact Details</h4>
            <div class="cinfo">
              <?php if($_SESSION['email']!= ''){ 
                $con=mysqli_connect("localhost","root","R@tech$183","tabcii_db");
                $email=$_SESSION['email'];
                $query = "SELECT * FROM `users` WHERE email='$email'";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_assoc($result)) { ?>
                  <div class="form-group">                
                   <input type='hidden' name='userId' class='form-control' value="<?php echo $row['id'];?>">
                 </div>
              <?php } 
            }else{ ?>
              <input type='hidden' name='userId' class='form-control' value="">
                <div class="form-group">                
                   <input type='text' name='name' class='form-control' placeholder='Name' >
                 </div>       

                 <div class="form-group">                
                   <input type='text' name='mobile' class='form-control' placeholder='Mobile'>
                 </div>
                 
                 <div class="form-group">
                   <input type='email' name='email_id' id="email" class='form-control' placeholder='Email-Id' > 
                 </div>

                <div class="form-group">
                   <input type='password' name='password' class='form-control' placeholder='Password' > 

                 </div>
               <?php } ?>
                  <div class="form-group">
                       <select name='id_proof' class='form-control'>
                            <option value=''>-- select --</option>
                            <option value='Pan Card'>Pan Card</option>
                            <option value='Driving Licence'>Driving Licence</option>
                            <option value='Voting Card'>Voting Card</option>
                            <option value='Aadhar Card'>Aadhar Card</option>
                        </select>
                  </div>
                 <div class="form-group">
                   <input type='text' name='id_no' class='form-control' placeholder='Id-no'>
                 </div> 
                  <div class="form-group">
                    <input type="text" class="form-control" name="address" id="address" placeholder="Address">        
                 </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="additional_address" placeholder="Additional Address">
                    <input type="hidden" name="addressLat" id="addressLat" >
                    <input type="hidden" name="addressLng" id="addressLng" >  
                    <input type="hidden" name="addressZip" id="postal_code" >     
                  </div>           
           </div>
           </div>

               <input type='hidden' name='chosensource' class='btnclass' value='<?php echo $sourceid; ?>'/>
               <input type='hidden' name='chosendestination' class='btnclass' value='<?php echo $destinationid; ?>'/>
               <input type='hidden' name='chosenbus' class='btnclass' value='<?php echo $chosenbusid; ?>' />
               <input type='hidden' name='boardingpointsList' class='btnclass' value='<?php echo $boardingpointid; ?>' />
               <input type='hidden' name='chkchk' class='btnclass' value='<?php echo $checkbox_no; ?>' />
               <input type='hidden' name='seatnames' class='btnclass' value='<?php echo $seatschosen; ?>' />  

<div class="col-md-12 text-center">
  <!-- <button type="button" class="btn btn-primary btn1">SUBMIT</button> -->
  <input  type="submit" value="SUBMIT" class="btn btn-primary"/>
</div>
</form>
         </div> 
         </div>        
    </div>
</section> 

<?php include 'footer.php' ?>
<script type="text/javascript">    

// Wait for the DOM to be ready
$(function() {

  $("form[name='generateForm']").validate({
    rules: {      
      
      email_id: {
       
         remote: {
          data:{"email":$("#email" ).val()},
          type: "post",
          url: "bus_email_validation.php"
        }
      }, 
         
      id_no: "required",  
      id_proof: "required",  
      Title: "required",
      fname: "required",
      age: "required",
    },
    messages: {
     
      email_id:{
        
        remote:"Please login first or try another email id!"
      }, 
      
      id_no: "Enter your Id-no", 
      id_proof: "Enter your ID Proof Type",    
      
    },
    submitHandler: function(form) {
      form.submit();
    }
  });

});

</script>     

<script type="text/javascript">
  
 function initialize_auto() 
 {
    var pickuplocation = document.getElementById('address');
    var autocomplete = new google.maps.places.Autocomplete(pickuplocation);
    google.maps.event.addListener(autocomplete, 'place_changed', function () 
    {
      
    
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }    
        var address = '';
        if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
    
      
        //Location details
        for (var i = 0; i < place.address_components.length; i++) {
            if(place.address_components[i].types[0] == 'postal_code'){              
                document.getElementById('postal_code').value = place.address_components[i].long_name;
            }           
        }

        document.getElementById('addressLat').value = place.geometry.location.lat();
        document.getElementById('addressLng').value = place.geometry.location.lng();
    });
}

google.maps.event.addDomListener(window, 'load', initialize_auto); 
     
function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
      return true;
    }
};


</script>