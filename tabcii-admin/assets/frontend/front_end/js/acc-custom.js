$(document).ready(function() {
	
/*HEADER*/

(function($){
  $(function(){  
    var scroll = $(document).scrollTop();
    var headerHeight = $('.ac-nav1').outerHeight();
    
    $(window).scroll(function() {
      var scrolled = $(document).scrollTop();
      if (scrolled > headerHeight){
        $('.ac-nav1').addClass('off-canvas');
      } else {
        $('.ac-nav1').removeClass('off-canvas');
      }

        if (scrolled > scroll){
         $('.ac-nav1').removeClass('fixed');
        } else {
        $('.ac-nav1').addClass('fixed');
        }             
      scroll = $(document).scrollTop();  
     });
       
   });
})(jQuery);
	
	


/*DATE-PICKER*/

  $("#acc-checkin-datepicker").datepicker({
            minDate: 0,
            numberOfMonths: 1,
			dateFormat: 'dd-mm-yy',	
            beforeShow: function(input, inst) {
                var widget = $(inst).datepicker('widget');
            },
			
		   
            onClose: function(selectedDate) {
                var date = $('#acc-checkin-datepicker').datepicker('getDate');
                var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
                var monthNumbers = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
                var timestamp = date.getTime() + (1000 * 60 * 60 * 24);
                var newDate = new Date(timestamp);
				
          
						 
					 
                $('#acc-checkout-datepicker')
                        .attr('disabled', false)
                        .datepicker('option','minDate',newDate)
                        .val(newDate.getDate()+ '-' + monthNumbers[date.getMonth()]   + '-' + newDate.getFullYear())
                        .datepicker('show');
					}
        });
		
		
	 	 
      
					
	
        $("#acc-checkout-datepicker").datepicker({
			
			 minDate:1,
             numberOfMonths: 1,
			dateFormat: 'dd-mm-yy',
            onClose: function(selectedDate) {
                var date = $('#acc-checkout-datepicker').datepicker('getDate');
                var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
                var timestamp = date.getTime() + (1000 * 60 * 60 * 24);
                var newDate = new Date(timestamp);
				
               var date1= $('#acc-checkin-datepicker').datepicker('getDate');
			   var timeDiff = Math.abs(date.getTime() - date1.getTime());
               var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
			     
			   // document.getElementById("date_diff").value=diffDays;
			   
			   var scope = angular.element(document.body).scope();
					scope.$apply(function(){
						scope.search.days_diff = diffDays;
						if(scope.fetchDetails)
						scope.fetchDetails.days_diff = diffDays;
						 
						scope.search.check_out=selectedDate;
					 })
			   }
        });
	 
	   $("#pro-birthday-datepicker").datepicker({
		    changeMonth: true,
            changeYear: true,
			dateFormat: 'yy-mm-dd',	
			yearRange: '1900:' + new Date().getFullYear()
		});
	 
/*TITLE-SLIDER*/
	 
	 
	 var carousel = $("#carousel").slidingCarousel({
			autoPlay: true
				
			});
			
/*MAP*/

function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:5,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
  google.maps.event.trigger(map, 'resize');
}
google.maps.event.addDomListener(window, 'load', initialize);




/*RECENT-VIEW-SLIDER*/

      $('.acc-recently-viewed').mine({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay:true,
  autoplaySpeed: 2000,
});

/*PARALAX-SLIDER */

      $('.tw-slider').tw({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
});



/*RANGE-BAR*/

    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
	  
	  
	  $('.horizontal .progress-fill span').each(function(){
  var percent = $(this).html();
  $(this).parent().css('width', percent);
});

/*VERTICAL-CYLINDER-RATTING*/

$('.vertical .progress-fill span').each(function(){
  var percent = $(this).html();
  var pTop = 100 - ( percent.slice(0, percent.length - 1) ) + "%";
  $(this).parent().css({
    'height' : percent,
    'top' : pTop
  });
});





});