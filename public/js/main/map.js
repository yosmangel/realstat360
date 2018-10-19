	/* Google Maps Api */
	$(document).ready(function(){
		var myLatLng;
		myLatLng = {lat: -34.397, lng: 150.644};
		var map;
		createMap(myLatLng);
		geoLocationInit();

		var infoWindow = null;
		
		function geoLocationInit(){

			//var infoWindow = new google.maps.InfoWindow({map: map});
			
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(
					// If the Geolocation is success
					function(position){
					var pos = {
		              lat: position.coords.latitude,
		              lng: position.coords.longitude
		            };
		            
		            var marker = new google.maps.Marker({
					    position: pos,
					    draggable: true,
					    map: map,
					    title: 'Ejemplo de marcador arrastrable'
					 });

		            infoWindow = new google.maps.InfoWindow();

		            google.maps.event.addListener(marker, 'mouseup', function(){
				        openInfoWindow(marker);
				    });

		            //infoWindow.setPosition(pos);
		            //infoWindow.setContent('Geolocalización exitosa.');
					//createMap(myLatLng);
				
		            map.setCenter(pos);

		            /* Search Properties Near Position */
		            //nearbySearch(pos, "store");
		            searchProperties(pos['lat'],pos['lng']);

					},
					/* If Geolocation fails */ 
					fail);
			}else{
				// Browser doesn't support Geolocation
	        	handleLocationError(false, infoWindow, map.getCenter());
			}
		}

		function fail(){
			console.log("geolocation fails");
			//handleLocationError(true, infoWindow, map.getCenter());
		}

		function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	        infoWindow.setPosition(pos);
	        infoWindow.setContent(browserHasGeolocation ?
	                              'Error: Falló el servicio de Geolocalización.' :
	                              'Error: Tu navegador no soporta la Geolocalización.');
	      }
		
		/* Create a MAP object */
		function createMap(myLatLng){
		    map = new google.maps.Map(document.getElementById('map'), { 
			    center: myLatLng,
			   	zoom: 18
			});
		}

	    /* Create MARKER */
	    function createMarker(latlang, icn, name){
		    var marker = new google.maps.Marker({
			    position: latlang,
			    map: map,
			    icon: icn,
			    title: name
			  });
	    }

	    var rand = function() {
		    return Math.random().toString(36).substr(2); // remove `0.`
		};

		var the_token = function() {
		    return rand() + rand(); // to make it longer
		};

		function openInfoWindow(marker) {
		    var markerLatLng = marker.getPosition();
		    var latitude = markerLatLng.lat();
		    var longitude = markerLatLng.lng();
		    infoWindow.setContent([
		        'La posicion del marcador es: ',
		        latitude,
		        ', ',
		        longitude,
		        'Arrastrame para actualizar la posicion.'
		    ].join(''));
		    console.log(latitude);
		    console.log(longitude);
		    infoWindow.open(map, marker);
		}

	    function searchProperties(lat, lng){
	    	var url = 'maper';
	    	$.ajax({
	    		url: url,
	    		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
	    		dataType: 'json',
	    		type: 'POST',
	    		data: {lat:lat, lng: lng},
	    		beforeSend: function(){
	    			console.log('Request ...');
	    		},
	    		complete: function(){
	    			console.log('Complete');
	    		},
	    		error: function(result){
	    			console.log('Error ... '+result.responseJSON);
	    		},
	    		success: function(match){
	    			$.each(match.datos, function(i, val){
	    				var glatval = val.lat;
	    				var glngval = val.lng;
	    				var gTypeProperty = "placeProperty";
	    				var Pos = {
			              lat: glatval,
			              lng: glngval
			            };
			            var gicn = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
			            createMarker(Pos, gicn, gTypeProperty);
	    			});
	    		}
	    	});
	    	
	    }

	});

    /* Nearby Search */
    /*function nearbySearch(myLatLng, type){
	    var request = {
		    location: myLatLng,
		    radius: '2500',
		    types: [type]
		  };
		  console.log(request);
	    service = new google.maps.places.PlacesService(map);
		service.nearbySearch(request, callback);
		function callback(results, status) {
			//console.log(results);
		  if (status == google.maps.places.PlacesServiceStatus.OK) {
		    for (var i = 0; i < results.length; i++) {
		      var place = results[i];
		      console.log(place.name);
		      latlang = place.geometry.location;
		      var icn = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
			  var name = place.name;
		      createMarker(latlang, icn, name);
		    }
		  }
		}
    }*/