$(document).ready(function(){
	navigator.geolocation.getCurrentPosition(function(position){

		var koordinaten = {
			latitude: 	position.coords.latitude,
			longitude: 	position.coords.longitude
		};
		//Forecast.io Anfrage
		$.ajax({
			url: 'https://api.forecast.io/forecast/1b227f5bfda2a75058c33b2f109c7b0a/'+ koordinaten.latitude + ',' +koordinaten.longitude,
			data: {
				units: 'ca',
				lang: 'de'
			},
			dataType: 'jsonp'
		}).done(function(data){
			console.log(data);
			$('.temperatur').text(data.currently.apparentTemperature);
			//Google geocoding
			$.ajax({
				url: 'https://maps.googleapis.com/maps/api/geocode/json',
				data: {
					latlng: koordinaten.latitude + ',' +koordinaten.longitude,
					key: 'AIzaSyDgYh-UffzCV54XCcReML4WSqyb0_zv8x8',
					lang: 'de'
				}
			}).done(function(data){
				$('.titelort').text(data.results[0][formatted_address]);
				console.log(data);
				
			});



		});

		/*console.log(position);
	$('.latitude').text(position.coords.latitude);
	$('.longitude').text(position.coords.longitude);
	$('.accuracy').text(position.coords.accuracy);*/


	});


});