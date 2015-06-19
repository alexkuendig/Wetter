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
                        $('.w_text').text(data.daily.summary);
                        $('.w_temp_akt').text(data.currently.apparentTemperature);
                        $('.temp_0_max').text(data.daily.data[0].apparentTemperatureMax);
                        $('.temp_0_min').text(data.daily.data[0].apparentTemperatureMin);
                        $('.temp_1_max').text(data.daily.data[1].apparentTemperatureMax);
                        $('.temp_1_min').text(data.daily.data[1].apparentTemperatureMin);
                        $('.temp_2_max').text(data.daily.data[2].apparentTemperatureMax);
                        $('.temp_2_min').text(data.daily.data[2].apparentTemperatureMin);
                        $('.temp_3_max').text(data.daily.data[3].apparentTemperatureMax);
                        $('.temp_3_min').text(data.daily.data[3].apparentTemperatureMin);
                        $('.temp_4_max').text(data.daily.data[4].apparentTemperatureMax);
                        $('.temp_4_min').text(data.daily.data[4].apparentTemperatureMin);
                        $('.sunrise_0').text(data.daily.data[4].sunriseTime);
                        $('.sunset_0').text(data.daily.data[4].sunsetTime);
                        $('.wetterbedingungen_0').text(data.daily.data[0].summary);
                        $('.wetterbedingungen_1').text(data.daily.data[1].summary);
                        $('.wetterbedingungen_2').text(data.daily.data[2].summary);
                        $('.wetterbedingungen_3').text(data.daily.data[3].summary);
                        $('.wetterbedingungen_4').text(data.daily.data[4].summary);
			//Google geocoding
			$.ajax({
				url: 'https://maps.googleapis.com/maps/api/geocode/json',
				data: {
					latlng: koordinaten.latitude + ',' +koordinaten.longitude,
					key: 'AIzaSyDgYh-UffzCV54XCcReML4WSqyb0_zv8x8',
					lang: 'de'
				}
			}).done(function(data){
				$('.adresse').text(data.results[0].formatted_address);
				$('.w_ort').text(data.results[0].address_components[4].long_name);
                                $('.w_adresse').text(data.results[0].address_components[3].long_name);
				console.log(data);
				
			});
                       



		});

		/*console.log(position);*/
	$('.latitude').text(position.coords.latitude);
	$('.longitude').text(position.coords.longitude);
	$('.accuracy').text(position.coords.accuracy);


	});


});