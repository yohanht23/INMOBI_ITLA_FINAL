var map;

		//OCULTANDO LOS PASOS
		$(".paso2").hide();
		$(".paso3").hide();
		$(".paso4").hide();
		$(".paso5").hide();

		//LOGICA PARA IR AL PASO 2
		$(".goStep2").click(function(){
			$(".paso1").hide();
			$(".paso2").show();
			$(".step1").removeClass("active");
			$(".step2").removeClass("disabled");
			$(".step2").addClass("active");
		});

		//LOGICA PARA IR AL PASO 3
		$(".goStep3").click(function(){
			$(".paso2").hide();
			$(".paso3").show();
			$(".step2").removeClass("active");
			$(".step3").removeClass("disabled");
			$(".step3").addClass("active");
		});

		//LOGICA PARA IR AL PASO 4
		$(".goStep4").click(function(){
			$(".paso3").hide();
			$(".paso4").show();
			$(".step3").removeClass("active");
			$(".step4").removeClass("disabled");
			$(".step4").addClass("active");
			google.maps.event.trigger(map, 'resize');
		});

		//LOGICA PARA IR AL PASO 5
		$(".goStep5").click(function(){
			$(".paso4").hide();
			$(".paso5").show();
			$(".step4").removeClass("active");
			$(".step5").removeClass("disabled");
			$(".step5").addClass("active");
			google.maps.event.trigger(map, 'resize');
		});

		//-----------VOLVER LOGICA ------------------- //

		//LOGICA VOLVER A PASO 1
		$(".volver1").click(function(){
			$(".paso2").hide();
			$(".paso1").show();
			$(".step1").addClass("active");
			$(".step2").removeClass("active");
		});

		//LOGICA VOLVER A PASO 2
		$(".volver2").click(function(){
			$(".paso3").hide();
			$(".paso2").show();
			$(".step2").addClass("active");
			$(".step3").removeClass("active");
		});

		//LOGICA VOLVER A PASO 3
		$(".volver3").click(function(){
			$(".paso4").hide();
			$(".paso3").show();
			$(".step4").removeClass("active");
			$(".step3").addClass("active");
		});

		//LOGICA VOLVER A PASO 4
		$(".volver4").click(function(){
			$(".paso5").hide();
			$(".paso4").show();
			$(".step5").removeClass("active");
			$(".step4").addClass("active");
			google.maps.event.trigger(map, 'resize');
		});






		//LOGICA PARA EL BROWSER DE LAS IMAGENES
		$(function() {
		  // We can attach the `fileselect` event to all file inputs on the page
		  $(document).on('change', ':file', function() {
		  	var input = $(this),
		  	numFiles = input.get(0).files ? input.get(0).files.length : 1,
		  	label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		  	input.trigger('fileselect', [numFiles, label]);
		  });
		  // We can watch for our custom `fileselect` event like this
		  $(document).ready( function() {
		  	$(':file').on('fileselect', function(event, numFiles, label) {

		  		var input = $(this).parents('.input-group').find(':text'),
		  		log = numFiles > 1 ? numFiles + ' files selected' : label;

		  		if( input.length ) {
		  			input.val(log);
		  		} else {
		  			if( log ) alert(log);
		  		}
		  	});
		  });
		  
		});

		//LOGICA DEL MAPA
		function initMap() {
			map = new google.maps.Map(document.getElementById('map'), {
				center: {lat: -33.8688, lng: 151.2195},
				zoom: 13
			});
			google.maps.event.trigger(map, 'resize');

			var input = document.getElementById('pac-input');

			var autocomplete = new google.maps.places.Autocomplete(input);
			autocomplete.bindTo('bounds', map);

			map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

			var infowindow = new google.maps.InfoWindow();
			var marker = new google.maps.Marker({
				map: map
			});
			marker.addListener('click', function() {
				infowindow.open(map, marker);		    
			});

			autocomplete.addListener('place_changed', function() {
				infowindow.close();
				var place = autocomplete.getPlace();
				if (!place.geometry) {
					return;
				}

				if (place.geometry.viewport) {
					map.fitBounds(place.geometry.viewport);
				} else {
					map.setCenter(place.geometry.location);
					map.setZoom(17);
				}

		    // Set the position of the marker using the place ID and location.
		    marker.setPlace({
		    	placeId: place.place_id,
		    	location: place.geometry.location
		    });
		    marker.setVisible(true);

		    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
		    	'Place ID: ' + place.place_id + '<br>' +
		    	place.formatted_address);
		    infowindow.open(map, marker);
		    $(".lat").val(place.geometry.location.lat());
		    $(".lng").val(place.geometry.location.lng());
		    $(".ubicacion").val(place.geometry.location.toString(6).match(/[^()]+/));
		});
		}	