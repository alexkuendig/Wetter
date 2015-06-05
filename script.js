$(document).ready(function(){
	navigator.geolocation.getCurrentPosition(function(position){
		console.log(position);
	$('.latitude').text(position.coords.latitude);
	$('.longitude').text(position.coords.longitude);
	$('.accuracy').text(position.coords.accuracy);

		});


});