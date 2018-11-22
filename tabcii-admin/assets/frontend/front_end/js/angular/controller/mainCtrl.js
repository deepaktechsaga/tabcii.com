App.controller('MainCtrl', function ($scope, $window, webService, $rootScope, $timeout) {
 
    $scope.loader = false;
    $scope.search = {};
    $scope.loginstatus = false;
    $scope.become_host_status = false;
    $scope.inner_search_details_status = false;
    $scope.list_finish = false;
    $scope.noProfileUrl = siteUrl + '/assets/front_end/img/no_profile.jpg';
    $scope.nogalleryUrl = siteUrl + '/assets/front_end/img/no_gallery.jpeg';
    $scope.host = {};
    $scope.sortBy = [];
	 $scope.guest_arr = [];
    $scope.params = [];
    $scope.selection = [];
	$scope.onlyNumbers = /^\d+$/;
	
    $scope.initialize = function (placename, name) {
        googleAutocomplete(placename, name);
    }

    function googleAutocomplete(placename, name) {
        var places = new google.maps.places.Autocomplete(document.getElementById('txtPlaces'));
        google.maps.event.addListener(places, 'place_changed', function () {
            var place = places.getPlace();
            $scope.search.geometry = place.geometry.location;
            $scope.search.place_id = place.place_id;
            $scope.search.address = place.formatted_address;

            if (name == 'filter') {
                $scope.getAllRestaurents($scope.search.place, '');
            } 
			if (name == 'inner-search') {
				
				$scope.$apply(function () {
						 $scope.inner_search_details_status = true;
				});
            }
        }); 
    }

    $scope.quantity = function (count, symbol, action) {
        quantityIncrease(count, symbol, action);
    }
    function quantityIncrease(count, symbol, action) {
        //var $button = $(this);
        var oldValue = count;
        if (symbol == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        if (action == 'number_bathrooms') {
            $scope.host.number_bathrooms = newVal;
        } else {
            $scope.host.available_beds = newVal;
        }
    }

    $scope.initialize_location = function () {
        locationAutocomplete();
    }
    function locationAutocomplete() {
        var autocompleteA = new google.maps.places.Autocomplete(
                $("#place_name")[0],
                {types: ['(cities)']}
        );

        google.maps.event.addListener(autocompleteA, 'place_changed', function () {
            var placeA = autocompleteA.getPlace();
			 
			
            var address = autocompleteA.getPlace().formatted_address;
			// address = address.replace(/\s+/g, '');
			//console.log(autocompleteA.getPlace().geometry);
            var boundsByViewport = autocompleteA.getPlace().geometry.viewport;
            var json = JSON.stringify(autocompleteA.getPlace().geometry.location);
            var par = JSON.parse(json);
            var viewport = JSON.stringify(boundsByViewport);
			
            //alert(JSON.stringify(placeA));
            $timeout(function () {
			
                $scope.host.place_name = address;  
                // $scope.host.location_lat = par.lat;
                // $scope.host.location_lng = par.lng;
                $scope.host.location_viewport = viewport;
	
						 var place = autocompleteA.getPlace();
						
    for (var i = 0; i < place.address_components.length; i++) {
      for (var j = 0; j < place.address_components[i].types.length; j++) {
		  console.log(place.address_components[i].types[j]);
		  
		  
		if (place.address_components[i].types[j] == "country") {
		 $scope.host.country = place.address_components[i].long_name;
        }
		  
		if (place.address_components[i].types[j] == "administrative_area_level_1") {	
		 $scope.host.state = place.address_components[i].long_name;
		   
        }
		
		if (place.address_components[i].types[j] == "administrative_area_level_2") {	
		 $scope.host.city = place.address_components[i].long_name;
        }
		  
        if (place.address_components[i].types[j] == "postal_code") {
		 $scope.host.zipcode = place.address_components[i].long_name;
        } else {
			$scope.host.zipcode = '';
		}
		
      }
    }
            }, 500);


        });
    }

    $scope.getAutoResultForGeo = function () {
        autocompleteResultForGeo();
    }
    function autocompleteResultForGeo() {
        -$("#place_name").geocomplete({
            details: ".geo-details",
            detailsAttribute: "data-geo"
        });
    }

    $scope.initialize_streetaddress = function () {
        streetAutocomplete();
    }
    function streetAutocomplete() {
        var place = $scope.host.city;
        var placeSplit = place.split(',');
        //var longitude = $scope.host.location_lng;
        var boundsByViewport = JSON.parse($scope.host.location_viewport);
        //var viewport = JSON.stringify(boundsByViewport);

        var autocompleteB = new google.maps.places.Autocomplete($("#street_change")[0], {
            bounds: boundsByViewport,
            types: ['address']
        });

        google.maps.event.addListener(autocompleteB, 'place_changed', function () {
            var placeB = autocompleteB.getPlace();

            var address = placeB.formatted_address;
            var latLong = placeB.geometry.location;
            var address_components = placeB.address_components;

            var json = JSON.stringify(autocompleteB.getPlace().geometry.location);
            var par = JSON.parse(json);

            var match = false;
            //$scope.homeSubmitted = false;
            for (var i = 0; i < placeB.address_components.length; i++) {
                if (placeSplit[0] === (placeB.address_components[i].long_name)) {
                    {
                        var selectedcomponents = {
                            address: address,
                            city: place
                        };

                        $scope.host.street = address_components[0].long_name;  
                        $scope.host.location_lat = par.lat;
                        $scope.host.location_lng = par.lng;
						
	// alert($scope.host.location_lat);
	// alert($scope.host.location_lng);
					
    for (var i = 0; i < placeB.address_components.length; i++) {
      for (var j = 0; j < placeB.address_components[i].types.length; j++) {
		  
		if (placeB.address_components[i].types[j] == "country") {
		 $scope.host.country = placeB.address_components[i].long_name;
        }
		  
		if (placeB.address_components[i].types[j] == "administrative_area_level_1") {	
		 $scope.host.state = placeB.address_components[i].long_name;
        }
		
		if (placeB.address_components[i].types[j] == "administrative_area_level_2") {	
		 $scope.host.city = placeB.address_components[i].long_name;
        }
		  
        if (placeB.address_components[i].types[j] == "postal_code") {
		 $scope.host.zipcode = placeB.address_components[i].long_name;
        } else {
			$scope.host.zipcode = '';
		}
		
      }
    }

                        //$scope.host.country = placeB.address_components[3].long_name;
                        //$scope.host.city = placeB.address_components[1].long_name;
                        //$scope.host.state = placeB.address_components[2].long_name;
                        //$scope.host.zipcode = placeB.address_components[4].long_name;

                        match = true;
                        $scope.matchCityMessage = '';
                        break;
                    }
                }
            }
            if (!match) {
                // $scope.matchCityMessage = "The city names didn't match";
                $("#street_change").val('');
            }
        });
    }

    $scope.submitForm = function (isValid) {
        if (isValid) {
            var params = $scope.search;
            // console.log($scope.search.check_out);
			// return;
            var str = params.address;
//         var str = str.trim();

            var address = str.replace(/, /g, '--');
			
			

            if (params.check_in) {
                var checkin = params.check_in;
                var checkin = checkin.replace(/[\/\\]/g, '-');
            } else {
                var checkin = '';
            }
            if (params.check_out) {
                var checkout = params.check_out;
                var checkout = checkout.replace(/[\/\\]/g, '-');
            } else {
                var checkout = '';
            }
            if (params.guest) {
                var guest = params.guest;
            } else {
                var guest = '';
            }
            if (params.days_diff) {

                var date_difference = params.days_diff;
            } else {
                var date_difference = '';
            }
		 
			
            var address = address.replace(/ /g, '-');
//          var address = str.replace(/-/g, '~');

           $window.location.href = siteUrl + '/s/' + address + '?guests=' + guest + '&ss_id=' + btoa(params.place_id) + '&checkin=' + checkin + '&checkout=' + checkout + '&days_diff=' + date_difference;

        }
    };
	
	    $scope.submitsForm = function (isValid) {
        if (isValid) {
			
            var params = $scope.fetchDetails;
              // console.log($scope.fetchDetails);
			 // return;
            var str = params.place;
//         var str = str.trim();

            var place = str.replace(/, /g, '--');
			
			

            if (params.check_in) {
                var checkin = params.check_in;
                var checkin = checkin.replace(/[\/\\]/g, '-');
            } else {
                var checkin = '';
            }
            if (params.check_out) {
                var checkout = params.check_out;
                var checkout = checkout.replace(/[\/\\]/g, '-');
            } else {
                var checkout = '';
            }
            if (params.guest) {
                var guest = params.guest;
            } else {
                var guest = '';
            }
            if (params.days_diff) {

                var date_difference = params.days_diff;
            } else {
                var date_difference = '';
            }
		 
			
            var place = place.replace(/ /g, '-');
//          var address = str.replace(/-/g, '~');

           $window.location.href = siteUrl + '/s/' + place + '?guests=' + guest + '&ss_id=' + btoa(params.place_id) + '&checkin=' + checkin + '&checkout=' + checkout + '&days_diff=' + date_difference;

        }
    };

    $scope.doLogin = function (isValid) {
        if (isValid) {
            //console.log($scope.loginform);
            var params = $scope.login;
            var link = '/index/doLogin';
            $scope.service = webService.send_data(link, params);
            $scope.service.then(function (data) {
                var message = (JSON.stringify(data));
                var parse = JSON.parse(message);
                if (parse.status == 'success') {
                    $scope.userdetails = parse;
                    $scope.loginstatus = true;
                } else {
                    $scope.errorMesageLogin = parse.error;
                }
            });
        }
    }    
	
	$scope.reset_password = function (isValid) {
        if (isValid) {
            var params = $scope.password_field;
            var link = '/index/reset_password';
            $scope.service = webService.send_data(link, params);
            $scope.service.then(function (data) {
				console.log(data);
                var message = (JSON.stringify(data));
                var parse = JSON.parse(message);
                if (data.status == 'success') {
					$scope.errorMesageReset = false;
                    $scope.password_resetted = true;
					
					$timeout(function () {
                       $window.location.href = siteUrl + '/#signin';
                    }, 2000);
					 
                } else {
					$scope.password_resetted = false;
                    $scope.errorMesageReset= data.status;
                }
            });
        }
    }

    $scope.doSignup = function (isValid) {
        if (isValid) {
            //console.log($scope.signup);
            var params = $scope.signup;
            var link = '/index/doSignup';
            $scope.service = webService.send_data(link, params);
            $scope.service.then(function (data) {
                //console.log(data);
                var message = (JSON.stringify(data));
                var parse = JSON.parse(message);
                //console.log(parse);
                $scope.loader = false;
                if ( parse.status == 'success' ) {
					 $scope.errorMesageSign=false;
                    //$scope.userdetails = parse;
                    $scope.registrationSuccess = true;
					$scope.successMesageSign = parse.message;
					$('#acc_log_close').click();
                    $timeout(function () {
                        $scope.registrationSuccess = false;
                    }, 2000);
                    $scope.loginstatus = true;
                } else {
					$scope.successMesageSign = false;
                    $scope.errorMesageSign = parse.message;
                }
            });
        }
    };
    $scope.logout = function () {
        var link = '/index/doLogout';
        var id = {item: 'l'};
        $scope.logoutDetails = webService.send_data(link, id);
        $scope.logoutDetails.then(function (data) {
            window.location = siteUrl + '?status=success';
        });
    }
    $scope.doForgot = function () {
        var params = $scope.forgot;
        var link = '/index/forgotLink';
        $scope.forgotDetails = webService.send_data(link, params);
        $scope.forgotDetails.then(function (data) {
console.log(data);
//            return;
            var message = (JSON.stringify(data));
            var parse = JSON.parse(message);
            $scope.loader = false;
             if (data.status == 'success') {
                $scope.forgotlink = true;
				$timeout(function () {
                        $scope.forgotlink = false;
                }, 2000);
            } else {
                $scope.errorMesageforgotlink = parse.message;
            }
        });
    }
    $scope.getMapData = function (fetchArrayVAlue) {
		 
		
		 if(Array.isArray(fetchArrayVAlue)){

        var selectedArray = [];

        if (fetchArrayVAlue[0]['listing_title']) {
            for (var i in fetchArrayVAlue) {
                selectedArray.push({
                    DisplayText: fetchArrayVAlue[i]['listing_title'],
                    Type: fetchArrayVAlue[i]['place_type'],
                    Price: fetchArrayVAlue[i]['base_price'],
                    Image: fetchArrayVAlue[i]['cover_photo'],
                    LatitudeLongitude: fetchArrayVAlue[i]['lat'] + ',' + fetchArrayVAlue[i]['lng']
                });
            }
        }
		 
		}else{
			
			 var selectedArray = [];

        if (fetchArrayVAlue.roomDetail.listing_title) {
           
                selectedArray.push({
                    DisplayText: fetchArrayVAlue.roomDetail.listing_title,
                    Type:fetchArrayVAlue.roomDetail.place_type,
                    Price: fetchArrayVAlue.roomDetail.base_price,
					Image: fetchArrayVAlue.roomDetail.cover_image,
					LatitudeLongitude: fetchArrayVAlue.roomDetail.lat + ',' + fetchArrayVAlue.roomDetail.lng
                });
           
        }
			
		}
       $scope.initMap(selectedArray);
    }
	
    //$scope.initMap(selectedArray);
	
    $scope.initMap = function (mapPassData) {

        $scope.map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: {lat: 10.0178, lng: 76.3333},
            zoom: 7,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
		map = $scope.map;
		LatLngList = [];
        if (mapPassData.length >= 1)
        {
            for (var i = 0; i < mapPassData.length; i++)
            {

                var myarr = mapPassData[i].LatitudeLongitude.split(",");
                if (myarr[0].length > 1) {
                    $scope.ViewCustInGoogleMap(mapPassData);

                }
				LatLngList.push(new google.maps.LatLng(myarr[0],myarr[1]));
				
            }
			latlngbounds = new google.maps.LatLngBounds();

                    LatLngList.forEach(function(latLng){
                        latlngbounds.extend(latLng);
                    });

                   map.setCenter(latlngbounds.getCenter());
                   map.fitBounds(latlngbounds); 
        }
    }
	
	
	
	$scope.displayMap = function () {
		
		//map = new google.maps.Map(document.getElementById('map-canvas'));
		setTimeout(function() {
		google.maps.event.trigger(map, 'resize');
							},1000);
		
		//$("#map-canvas").css("width", 400).css("height", 400);
		//google.maps.event.trigger($("#map-canvas")[0], 'resize');
		/*$('a[href="#location"]').on('shown', function (e){
       		google.maps.event.trigger($scope.map, 'resize'); moveTo(); 
     	});*/
	}
	
    $scope.ViewCustInGoogleMap = function (mapPassData, merge_json) {
        merge_json = merge_json || false;

        if (merge_json) {
            new_data = JSON.parse(mapPassData);
            $.merge(people, new_data);
        } else {
            people = mapPassData;
        }
        for (var i = 0; i < people.length; i++) {
            $scope.setMarker(people[i]);
        }
        /*zoom map pointer 
        var LatLngList = [];

        if (people.length > 1)
        {
            for (var i = 0; i < people.length; i++)
            {

                var myarr = people[i].LatitudeLongitude.split(",");
                LatLngList.push(new google.maps.LatLng(myarr[0], myarr[1]));
            }

            latlngbounds = new google.maps.LatLngBounds();

            LatLngList.forEach(function (latLng) {
                latlngbounds.extend(latLng);
            });

            $scope.map.setCenter(latlngbounds.getCenter());
            $scope.map.fitBounds(latlngbounds);

        } else {
            var myarr = people[0].LatitudeLongitude.split(",");
            latlng = new google.maps.LatLng(myarr[0], myarr[1]);
            $scope.map.setCenter(latlng);
        }
        end zoom map pointer*/
    }
    $scope.setMarker = function (people) {
        geocoder = new google.maps.Geocoder();
        infowindow = new google.maps.InfoWindow();
        if ((people["LatitudeLongitude"] == null) || (people["LatitudeLongitude"] == 'null') || (people["LatitudeLongitude"] == '')) {
            geocoder.geocode({'address': people["Location"]}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    latlng = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
                    marker = new google.maps.Marker({
                        position: latlng,
                        map: $scope.map,
                        icon: siteUrl + '/assets/front_end/img/map_locatior.png',
                        draggable: false,
                        html: '<div class="acc-map-loc-div"><div class="acc-map-loc-inner"><div class="acc-loc-pic"><div class="acc-loc-price">$' + people["Price"] + '</div><img src="' + people["Image"] + '"></div><h1>' + people["DisplayText"] + '</h1><p>' + people["Type"] + '<strong style="float: right;">56 Reviews</strong></p></div><div class="arrow-down"></div></div>'
                    });
					
                    google.maps.event.addListener(marker, 'click', function (event) {
                        infowindow.setContent(this.html);
                        infowindow.setPosition(event.latLng);
                        infowindow.open($scope.map, this);
                    });
                } else {
                    alert(people["DisplayText"] + " -- " + people["Location"] + ". This address couldn't be found");
                }
            });
        } else {
            var latlngStr = people["LatitudeLongitude"].split(",");
            var lat = parseFloat(latlngStr[0]);
            var lng = parseFloat(latlngStr[1]);
            latlng = new google.maps.LatLng(lat, lng);
            marker = new google.maps.Marker({
                position: latlng,
                map: $scope.map,
                icon: siteUrl + '/assets/front_end/img/map_locatior.png',
                draggable: false, // cant drag it
                html: '<div class="acc-map-loc-div"><div class="acc-map-loc-inner"><div class="acc-loc-pic"><div class="acc-loc-price">$' + people["Price"] + '</div><img src="' + people["Image"] + '"></div><h1>' + people["DisplayText"] + '</h1><p>' + people["Type"] + '<strong style="float: right;">56 Reviews</strong></p></div><div class="arrow-down"></div></div>'
            });

            google.maps.event.addListener(marker, 'click', function (event) {
                infowindow.setContent(this.html);
                infowindow.setPosition(event.latLng);
                infowindow.open($scope.map, this);
				
            });
        }
    }

    $scope.roomBy = [
        {key: 'Entire home/apt', name: 'Entire home/apt'},
        {key: 'Private room', name: 'Private room'},
        {key: 'Shared room', name: 'Shared room'}
    ];

    $scope.currency = [
        {key: 'USD', name: 'USD'}
    ];

    $scope.goodFor = ["Couples", "Solo adventurers", "Business travelers", "Big groups", "Families (with kids)", "Furry friends (pets)"];

    for (var i = 1; i <= 16; i++) {
        $scope.sortBy.push({"key": i, "name": i + ' GUEST'});
    };
	 
	 $scope.guest_no = function guest_no() {
	  
	 for (var i = 1; i <= $scope.fetchDetails.roomDetail.number_guest; i++) {
         $scope.guest_arr.push({"key": i, "name": i + ' GUEST'});
    };
	 };
	
	$scope.search = {guest : $scope.sortBy[0].key};

 	 
	
    $scope.toggleSelection = function toggleSelection(parameters, action) {

        if (action != 'host') {
            $scope.loader = true;
        }

        if ($scope.params.length > 0) {
            $scope.params = [];
        }

        if ($scope.selection.param) {
            $scope.params.push({
                selectHotalName: $scope.selection.param
            });
        }

        var idx = $scope.selection.indexOf(parameters);
        // is currently selected
        if (idx > -1) {
            $scope.selection.splice(idx, 1);
        } else {
            $scope.selection.push(parameters);
        }

        if (action != 'host') {
            $scope.loader = false;

            $scope.getAllRestaurents($scope.selection, $scope.params);
        }
    };


    $scope.minRangeSlider = {
        minValue: 500,
        maxValue: 50000,
        options: {
            floor: 500,
            ceil: 50000,
            step: 1,
            onEnd: function () {
                $scope.getAllRestaurents('', '');
            }
        }
    };

    $scope.getAllRestaurents = function (params, action) {

        $scope.loader = true;
        var selectedArray = [];
        if (action == 'loadmore') {
            var loadmore = $scope.nextPageToken;
        } else {
            var loadmore = false;
        }
		 
        var priceMin = $scope.minRangeSlider.minValue;
        var priceMax = $scope.minRangeSlider.maxValue;

        selectedArray.push({
            selectParam: $scope.search.place,
            viewSelectedParams: params,
            place_id: $scope.search.place_id,
            loadmore: loadmore,
            checkin: $scope.search.check_in,
            checkout: $scope.search.check_out,
            guest: $scope.search.guest,
            minPrice: priceMin,
            maxPrice: priceMax,
            days_diff: $scope.search.days_diff
        });

        var link = '/search/getAllRestaurents';

        $scope.restaurents = webService.send_data(link, selectedArray);
        $scope.restaurents.then(function (data) {
            console.log(data);
            $scope.loader = false;
            //console.log(data.fetchArrayVAlue.fetchData);
            $scope.search = data.fetchArrayVAlue;
			
            // $scope.nextPageToken = data.nextPageToken;
            $timeout(function () {
                $scope.getMapData(data.fetchArrayVAlue.fetchData);
			 
                //$scope.rating();
            }, 1000);
        });
    }

    $scope.propery_type = function () {
        var link = '/Host/property_type';
        var params = {};
        $scope.properyDetails = webService.send_data(link, params);
        $scope.properyDetails.then(function (data) {
            $scope.propery_type = data;
        });
    }

    $scope.amenities = function () {
        var link = '/Host/getAllAmenities';
        var params = {};
        $scope.properyDetails = webService.send_data(link, params);
        $scope.properyDetails.then(function (data) {
            $scope.allAmenities = data;
        });
    }

    $scope.spaces = function () {
        var link = '/Host/getAllSpaces';
        var params = {};
        $scope.properyDetails = webService.send_data(link, params);
        $scope.properyDetails.then(function (data) {
            $scope.allSpaces = data;
        });
    }

    $scope.locationFormSubmit = function (isValid, page) {
        if (isValid) {
            $scope.loader = true;
            var params = $scope.host;
            if (page == 'amenities' || page == 'spaces') {
                var params = $scope.selection;
                // params.push({
                // 'amenity': $scope.selection
                // });
            }

            if (page == 'highlights') {
                $scope.host.good_for = $scope.selection;
            }

            if (page == 'house-rules') {
                var params = $scope.settingsList;
            }


            if (page == 'local-laws') {
                $scope.list_finish = true;
                $window.location.href = siteUrl + '/' + $scope.host.hid + '/become-a-host';
            }

            if (page != 'location') {
                var link = '/become-a-host/' + $scope.host.hid + '/' + page;
            } else {
                var link = '/Host/' + page;
            }
            var passParams = {'formData': params, 'actionPage': page, 'hid': $scope.host.hid};
            $scope.locations = webService.send_data(link, passParams);
            $scope.locations.then(function (data) {
                $scope.host.url = data.url;
                $scope.host.new_host_id = data.s;
                console.log(data);
                //return;
                $timeout(function () {
                    $window.location.href = siteUrl + data.url;
                }, 1000);
                $scope.loader = false;

            });
        }
    }

    $scope.settingsList = [
        {text: "Child-friendly (3-12 years)", checked: false},
        {text: "Infant-friendly (0-2 years) ", checked: false},
        {text: "Suitable for pets", checked: false},
        {text: "Smoking allowed ", checked: false},
        {text: "Events or parties allowed", checked: false},
    ];

    $scope.init = function (id) {
        var link = '/Host/check_settings_tab';
        var params = {'id': id};
        $scope.properyDetails = webService.send_data(link, params);
        $scope.properyDetails.then(function (result) {

            if (result.status == 'success') {
                $scope.settingsList = result.data;
            } else {
                $scope.settingsList = $scope.settingsList;
            }

        });
    }
	
	$scope.delete_host = function (id) {
		 if (confirm('Are you sure you want to delete?')) {
        var link = '/Users/delete_host_users';
        var params = {'id': id};
        $scope.properyDetails = webService.send_data(link, params);
        $scope.properyDetails.then(function (result) {
            if (result.status == 'success') {
				$('#hostList'+id).hide();
            } else {
                alert('error');
            }

        });
		 }
    }

    $scope.publish_listing = function (id) {
        var link = '/Host/publish_listing';
        var params = {'id': id};
        $scope.properyDetails = webService.send_data(link, params);
        $scope.properyDetails.then(function (result) {

            if (result.status == 'success') {
                $window.location.href = siteUrl + '/users/dashboard/' + result.s  ;
            } else {
                alert("ooo");
            }

        });
    }
	
	 $scope.activeTabs = function (page) {

       $('#dash').removeClass("in active");
       $('#listing').removeClass("in active");
       $('#profile').removeClass("in active");
       $('#account').removeClass("in active");

	   $('#li_dash').removeClass("active");
       $('#li_listing').removeClass("active");
       $('#li_profile').removeClass("active");
       $('#li_account').removeClass("active");

	   if(page == 'listing'){
	     $('#listing').addClass("in active"); 
		 $('#li_listing').addClass("active");
	   } else if(page == 'profile'){ 
	    $('#profile').addClass("in active"); 
		$('#li_profile').addClass("active");
	   } else if(page == 'account'){ 
	    $('#account').addClass("in active");
        $('#li_account').addClass("active");		
	   }
	   
	   $('#myaccount').removeClass("in");
	   $('#myaccount').addClass("out");	
	   
	   $('#hostaccount').removeClass("in");
	   $('#hostaccount').addClass("out");	
    }
	
	$scope.delete_uploaded_host_image = function (name,id) {
	   delete_fun(name,id);
    }
	
	$scope.calenderFormSubmit = function (isValid) {
        if (isValid) {
            $scope.loader = true;
            var params = $scope.details.perticular_host_details_by_id;
			
			var link = '/become-a-host/'+$scope.details.perticular_host_details_by_id.id+'/calender/';
			var params = {'params': params};
			$scope.calenderDetails = webService.send_data(link, params);
			$scope.calenderDetails.then(function (result) {
				 $scope.loader = false;
				console.log(result);
				if (result.status == 'success') {
					//$window.location.href = siteUrl + '/users/dashboard/' + result.s  ;
				} else {
				}

			});
		}
	}
	$scope.calc_total = function(){
		
		$timeout(function () {
				var base_price = $scope.fetchDetails.roomDetail.base_price;
		var days_diff = $scope.fetchDetails.days_diff;
		var cleaning_price = $scope.fetchDetails.roomDetail.cleaning_price;
		var security_price = $scope.fetchDetails.roomDetail.security_price;
		  var params = {'base_price': base_price,'days_diff': days_diff,'cleaning_price': cleaning_price,'security_price': security_price};
		 var link = '/search/calc_total';
      
        $scope.calcDetails = webService.send_data(link, params);
        $scope.calcDetails.then(function (result) {
	 
            if (result) {
				console.log(result);
                $scope.fetchDetails.total_price=result.total_price;
				  $scope.fetchDetails.room_price = result.room_price;
            }  

        });  }, 1000); }
	
	
	$scope.paymentAction = function(isValid){
		 if (isValid) {

			 $scope.loader = true;
			 var data = $scope.fetchDetails;
			 if(data.method_type == 'paypal') {
				 var action = 'paypal';
				 var params = $scope.fetchDetails;
				 //$window.location.href = siteUrl + '/products/buy/' + $scope.fetchDetails.roomDetail.host_id  ;
			 } else if(data.method_type == 'authorize'){
				 var action = 'authorize';
				 
				 
				 
				 if(angular.isUndefined(data.card_number) || data.card_number == null || angular.isUndefined(data.expiry_month) || data.expiry_month == null || angular.isUndefined(data.expiry_year) || data.expiry_year == null || angular.isUndefined(data.cvv) || data.cvv == null){
					  $scope.payment_authorize_error_message = true;
					  $scope.loader = false;
					  return;
				 } else {
					 var params = $scope.fetchDetails;
				 }
			 }
			var link = '/search/booking_rooms/';
			var params = {'params': params,'action': action};
			$scope.paymentDetails = webService.send_data(link, params);
			$scope.paymentDetails.then(function (result) {
				$scope.loader = false;
				 
				if(result.method_type == 'paypal') {
					if(result.status == 'Completed') {
						$window.location.href = siteUrl + '/products/buy/' + result.order_id  ;
					}
				} else if(result.method_type == 'authorize'){
					if(result.status == 'Completed') {
						$window.location.href = siteUrl + '/paypal/success?tx='+ result.approval_code ;
					}else{
					 
						$scope.authorize_error = result.error_message;
					}
				}
			});
			
		 }	 
	}
	
//oliviya//

    $scope.search_details = function search_details(parameter1, id , format_address,place_id) {

        var params = parameter1;
        if (params.check_in) {
            var checkin = params.check_in;
            var checkin = checkin.replace(/[\/\\]/g, '-');
        } else {
            var checkin = '';
        }
        if (params.check_out) {
            var checkout = params.check_out;
            var checkout = checkout.replace(/[\/\\]/g, '-');
        } else {
            var checkout = '';
        }
        if (params.guest) {
            var guest = params.guest;
        } else {
            var guest = '';
        }
		var days_diff=$scope.search.days_diff;
		var url_param = siteUrl + '/rooms/' + id + '?guests=' + guest + '&checkin=' + checkin + '&checkout=' + checkout + '&days_diff=' + days_diff + '&format_address=' + format_address + '&place_id=' + place_id;
		window.open(url_param, '_blank');

    };
	
	 $scope.chooseCountry = function(item1) {
		 
		alert(item1.name);
		 // alert($scope.country_chng.attributes['data-prefix'].value);
		 // console.log(item.currentTarget.getAttribute("data-id"));
		// var lat=$item1.find('option:selected').attr("data-viewport");
		// alert(lat);
	 } 
	 
	  $scope.sms_verification = function (param) {
		  
	   var params = param;
	   var link = '/users/sms_verification';
        $scope.forgotDetails = webService.send_data(link, params);
        $scope.forgotDetails.then(function (data) {
console.log(data);
//            return;
            var message = (JSON.stringify(data));
            var parse = JSON.parse(message);
            $scope.loader = false;
			console.log(data);
            if (data == 'success') {
                $scope.smslink = true;
				 
            } else {
				 $scope.smslink = false;
                
            }
        });
    }
	 
	 	  $scope.code_verification = function () {
		  
	   var params = $scope.details.userDetails.sms_code;
		console.log(params);
		 
        var link = '/users/code_verification';
        $scope.forgotDetails = webService.send_data(link, params);
        $scope.forgotDetails.then(function (data) {
console.log(data);
//            return;
            var message = (JSON.stringify(data));
            var parse = JSON.parse(message);
            $scope.loader = false;
			console.log(data);
            if (data == 'success') {
                 $scope.smslink = false;
				 
            } else {
                $scope.smslink = true;
            }
        });
    }
	 
	  
	 
	 $scope.book_room = function () {
		 
	   var params = $scope.fetchDetails;
		// console.log(params);
		var link = '/search/booking_rooms';
        $scope.forgotDetails = webService.send_data(link, params);
        $scope.forgotDetails.then(function (data) {
console.log(data);
//            return;
            var message = (JSON.stringify(data));
            var parse = JSON.parse(message);
            $scope.loader = false;
			console.log(data.status);
            if (data.status == 'success') {
                $scope.forgotlink = true;
				$timeout(function () {
                        $scope.forgotlink = false;
                }, 2000);
            } else {
                $scope.errorMesageforgotlink = parse.message;
            }
        });
    }
	
	
	
	
	 $scope.review_fetch = function () {
	
	 
	   var params = $scope.fetchDetails.roomDetail.host_id;
	   
		// console.log(params);
		var link = '/search/review_fetch';
        $scope.forgotDetails = webService.send_data(link, params);
        $scope.forgotDetails.then(function (data) {
		if (data) {
			
				$scope.fetchDetails.review_get=data;
				$scope.fetchDetails.review_chk=true;
                
            } else {
                $scope.error_reviewlink = parse.message;
            }
        });
    }
		 $scope.review_save = function () {
		 
		  
		 
	   var params = $scope.fetchDetails.roomDetail;
	   
		// console.log(params);
		var link = '/search/writing_review';
        $scope.forgotDetails = webService.send_data(link, params);
        $scope.forgotDetails.then(function (data) {
			$(".modal .close").click();
 
//            return;
            var message = (JSON.stringify(data));
            var parse = JSON.parse(message);
            $scope.loader = false;
			 
            if (data.status == 'success') {
                $scope.forgotlink = true;
				$timeout(function () {
                        $scope.forgotlink = false;
                }, 2000);
            } else {
                $scope.error_reviewlink = parse.message;
            }
        });
    }
	
	
			 $scope.avail_calendar = function () {
		 
		  
		 console.log($scope.details.perticular_host_details_by_id.id);
		 
	   var params = $scope.details.perticular_host_details_by_id;
	    
		// console.log(params);
		var link = '/host/avail_calendar';
        $scope.forgotDetails = webService.send_data(link, params);
        $scope.forgotDetails.then(function (data) {
console.log(data);
//            return;
            var message = (JSON.stringify(data));
            var parse = JSON.parse(message);
            $scope.loader = false;
			console.log(data.status);
            if (data.status == 'success') {
                $scope.forgotlink = true;
				$timeout(function () {
                        $scope.forgotlink = false;
                }, 2000);
            } else {
                $scope.errorMesageforgotlink = parse.message;
            }
        });
    }
	
				 $scope.blocked_calendar = function () {
		 
		  
		 
		 
	   var params = $scope.details.perticular_host_details_by_id;
	    
		// console.log(params);
		var link = '/host/blocked_calendar';
        $scope.forgotDetails = webService.send_data(link, params);
        $scope.forgotDetails.then(function (data) {
console.log(data);
//             
            var message = (JSON.stringify(data));
            var parse = JSON.parse(message);
            $scope.loader = false;
			console.log(data.status);
            if (data.status == 'success') {
				location.reload(); 
                $scope.forgotlink = true;
				$timeout(function () {
                        $scope.forgotlink = false;
                }, 2000);
				
            } else {
                $scope.errorMesageforgotlink = parse.message;
            }
        });
    }
	
	
	 $scope.avail = true;
	$scope.blockd = false;
	$scope.show_tab = function(tab) {
	if(tab == 'avail'){
	$scope.avail = true;
	$scope.blockd = false;
	}
	else if(tab == 'blockd'){
	$scope.avail = false;
	$scope.blockd = true;
	}
	}
	
    $scope.profilerequiredFormSubmit = function () {
		 if ($('#profilerequiredForm').parsley().validate() ) {
		 
        var params = $scope.details.userDetails;
		 
		var link = '/users/update_profile';
        $scope.updateProfile = webService.send_data(link, params);
        $scope.updateProfile.then(function (data) {
  
//            return;
            var message = (JSON.stringify(data));
            var parse = JSON.parse(message);
            $scope.loader = false;
			
			
			if (data == 'success') {
				 
                $scope.updatelink = true;
				$timeout(function () {
                        $scope.updatelink = false;
                }, 5000);
            } else {
                $scope.errorMesageupdatelink = parse.message;
            }
        });
    }
	}
	
     $scope.wishListClick = function (id,place,place_id) {
		 
        var type = "atag";
        var action = 'add';
        if ($('#wishId' + id).attr("type") == "button") {
            type = "button";
        }
        if (type == "atag") {
            if ($('#wishId' + id).hasClass("active")) {
                action = 'remove';
            }
        } else {
            if (($('#wishId' + id).val()) == 'Remove this from wishlist') {
                action = 'remove';
            }
        }
		 
		var link = '/search/add_to_wishlist';
        var post_data = {'WishId': id, 'action': action,'place':place,'place_id':place_id};
        $scope.wish = webService.send_data(link, post_data);
        $scope.wish.then(function (result) {
            console.log(result);
            var message = (JSON.stringify(result));
            var parse = JSON.parse(message);
            if (parse.message == "added") {
                $scope.fetchDetails.wishlist = '1';
            } else if (parse.message == "removed") {
                $scope.fetchDetails.wishlist = '0';
            }
            else if (parse.status == "faild") {
                $('#loginButton').click();
            }
        });
    };
	
	$scope.change_status = function (param) {
		$scope.details.perticular_host_details_by_id.type = param;
		alert($scope.details.perticular_host_details_by_id.type);
    }
	
	
	
});