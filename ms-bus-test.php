<?php 
	include_once 'config2.php' ;    
    include_once "library/OAuthStore.php";
    include_once "library/OAuthRequester.php";
    include_once "SSAPICaller.php";
?>

<html lang='en'>
<head>
<meta charset="utf-8" />
<title>Travel Booking </title>

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400%7COpen+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <!-- End Font Google -->
    <!-- Library CSS -->
    <link rel="stylesheet" href="assets/css/library/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/library/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/library/jquery-ui.min.css">   

    <!-- Include Bootstrap Datepicker -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css"> 
    <!-- homepage fonticon CSS -->
    <link rel="stylesheet" href="assets/homepage-iocn/flaticon.css">
    <!-- homepage fonticon CSS -->
<!-- Library JS -->
<script src="assets/js/library/jquery-1.11.0.min.js"></script>
   
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<!-- choosen plugin -->
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">
<!-- JS -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>

 
</head>

<body>

<div class="" style="background: #fff; min-height: 300px;">

<?php     	

    $sourceList = getSourcesAsDropDownList();    

    function getSourcesAsDropDownList(){   
        global $scr,$sourceId , $sourcename;

        $scr = getAllSources();
        $json_o=json_decode($scr);
        $cities = $json_o->cities;

        function my_sort($a,$b)
        {

            if (strcasecmp($a->name , $b->name)<0)
            { return 1;
            }
            elseif (strcasecmp($a->name, $b->name)>0)
            {
                return -1;
            }
            else 
            {
                return 0;
            }
        }

        usort($cities, 'my_sort');

        $selectControlForSources = "<span> Update latest data into source table  : </span> <select onChange='getDestination(this.value)' id='sourceList' class='form-control ' name='sourceList' > ";


        if(is_array($cities))
        { 
            foreach($cities as $cities)
            {
                $selectControlForSources = $selectControlForSources."<option value=". $cities->id." selected='selected'>"
                        .$cities->name."</option>";
            }
            $selectControlForSources = $selectControlForSources."</select>";
        }
        return $selectControlForSources ;
    }


?> 

<div class="container">
	
<div class="col-sm-6">
	<div class="row">
		<div class="form-group">
		<?php echo $sourceList; ?>

		</div>
	</div>
	<div class="row">
		<button class="btn btn-primary" id="updateSourceList"> Update Source List </button>
	</div>
</div>


<!-- test1  -->

<div class="row">

<div class="col-sm-12">
<hr>
	<div class="col-sm-6">
        <div class="row">
		<div class="form-group">
		  <label>Source </label>
		  <select class="soucerCityName sourceCity form-control"  name="soucerCityName"></select>
		</div>
        </div>
        
    </div>

    <div class="col-sm-6">
        <div class="row">
            <div class="form-group">
            <label>Destination </label>
            <select class="form-control tabciiDestinationCity2" id="tabciiDestinationCity2">
                            
            </select>
            </div>
        </div>       
    </div>
     <div class="row">
            <button class="btn btn-primary" id="searchTrip"> Search </button>
     </div>

</div>
</div>

</div>

</div>


<script type="text/javascript">
$( document ).ready(function() {

$('.soucerCityName').select2({
placeholder: 'Type to search',
ajax: {
  url: 'select2Result.php',
  dataType: 'json',
  delay: 250,
  processResults: function (data) {
    return {
      results: data
    };
  },
  cache: true
}

});
//close city name search

// set source city id in variable 

var arrayDestinationResult = [];

$('.sourceCity').on('select2:select', function (e) {
    var data = e.params.data;
    sourceID = data.id;    
    console.log(data); 

    $.ajax({
      url: 'ms-getDestination.php',
      type: 'post',
      data: {'sourceID':sourceID},
      dataType: 'json',      
      success: function(data) {
        console.log(data);       
      },
      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    }); // end ajax call   

});

// start destination search

$(".tabciiDestinationCity2").select2({
  
placeholder: 'Type to search',
ajax: {
  url: 'destination.json',
  dataType: 'json',
  delay: 250,
  processResults: function (data) {
    return {
      results: data
    };
  },
  cache: true
}
});

});
</script>

<script type="text/javascript">
	
$( document ).ready(function() {
console.log( "ready!" );

// updateSourceList from API

$('#updateSourceList').on('click', function(e){
    e.preventDefault();

alert("Don't click update this already updayted!");

var availableSourceList = new Array();

$('#sourceList option').each(function(){
    
    availableSourceList.push({'id':this.value,'name':this.text});
});

//console.log(availableSourceList);
var availableSourceListJSON = JSON.stringify(availableSourceList);

	$.ajax({
      url: 'updateSourceCityAjax.php',
      type: 'post',
      data: {'data':availableSourceListJSON},
      success: function(data) {
        console.log(data);
      },
      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    }); // end ajax call
});

// close updating list




});




</script>

</body>
</html>