$(document).ready(function(){
	navigator.geolocation.getCurrentPosition(function(position){

		var koordinaten = {
			latitude: 	position.coords.latitude,
			longitude: 	position.coords.longitude
		};

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
		});

		/*console.log(position);
	$('.latitude').text(position.coords.latitude);
	$('.longitude').text(position.coords.longitude);
	$('.accuracy').text(position.coords.accuracy);*/
	

	});


});