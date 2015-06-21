$(document).ready(function () {
    var skycons = new Skycons({
        /*"color": "pink",
         resizeClear: true*/
    });
    var koordinaten;
    navigator.geolocation.getCurrentPosition(function (position) {
        koordinaten = {
            latitude: position.coords.latitude,
            longitude: position.coords.longitude
        };
        drawMap(new google.maps.LatLng(koordinaten.latitude, koordinaten.longitude));
        //Forecast.io Anfrage
        $.ajax({
            url: 'https://api.forecast.io/forecast/1b227f5bfda2a75058c33b2f109c7b0a/' + koordinaten.latitude + ',' + koordinaten.longitude,
            data: {
                units: 'ca',
                lang: 'de'
            },
            dataType: 'jsonp'
        }).done(function (data) {
            //console.log(data);
            $('.temperatur').text(data.currently.apparentTemperature);
            $('.temperatur').text(data.currently.icon);
            skycons.add($('.js-icon')[0], data.currently.icon);
            skycons.add($('.js-icon_0')[0], data.daily.data[0].icon);
            skycons.add($('.js-icon_1')[0], data.daily.data[1].icon);
            skycons.add($('.js-icon_2')[0], data.daily.data[2].icon);
            skycons.add($('.js-icon_3')[0], data.daily.data[3].icon);
            skycons.add($('.js-icon_4')[0], data.daily.data[4].icon);
            skycons.add($('.js-icon_5')[0], data.daily.data[5].icon);
            skycons.add($('.js-icon_6')[0], data.daily.data[6].icon);
            skycons.add($('.js-icon_7')[0], data.daily.data[7].icon);
            skycons.play();
            //skycons.add($('.js-icon_1')[0], data.daily.data[1].icon);
            //skycons.play();
            $('.w_text').text(data.daily.summary);
            $('.w_temp_akt').text(data.currently.apparentTemperature);
            $('.w_heute').text(data.currently.summary);
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
            $('.temp_5_max').text(data.daily.data[5].apparentTemperatureMax);
            $('.temp_5_min').text(data.daily.data[5].apparentTemperatureMin);
            $('.temp_6_max').text(data.daily.data[6].apparentTemperatureMax);
            $('.temp_6_min').text(data.daily.data[6].apparentTemperatureMin);
            $('.temp_7_max').text(data.daily.data[7].apparentTemperatureMax);
            $('.temp_7_min').text(data.daily.data[7].apparentTemperatureMin);
            $('.sunrise_0').text(data.daily.data[4].sunriseTime);
            $('.sunset_0').text(data.daily.data[4].sunsetTime);
            $('.wetterbedingungen_0').text(data.daily.data[0].summary);
            $('.wetterbedingungen_1').text(data.daily.data[1].summary);
            $('.wetterbedingungen_2').text(data.daily.data[2].summary);
            $('.wetterbedingungen_3').text(data.daily.data[3].summary);
            $('.wetterbedingungen_4').text(data.daily.data[4].summary);
            $('.wetterbedingungen_5').text(data.daily.data[5].summary);
            $('.wetterbedingungen_6').text(data.daily.data[6].summary);
            $('.wetterbedingungen_7').text(data.daily.data[7].summary);
            //Google geocoding
            $.ajax({
                url: 'https://maps.googleapis.com/maps/api/geocode/json',
                data: {
                    latlng: koordinaten.latitude + ',' + koordinaten.longitude,
                    key: 'AIzaSyDgYh-UffzCV54XCcReML4WSqyb0_zv8x8',
                    lang: 'de'
                }
            }).done(function (data) {
                $('.adresse').text(data.results[0].formatted_address);
                $('.w_kanton').text(data.results[0].address_components[4].long_name);
                $('.w_region').text(data.results[0].address_components[3].long_name);
                $('.w_ort').text(data.results[0].address_components[2].long_name);
                $('.w_adresse').text(data.results[0].address_components[1].long_name);
                //console.log(data);
            });
        });
        //console.log(position);
        $('.latitude').text(position.coords.latitude);
        $('.longitude').text(position.coords.longitude);
        $('.accuracy').text(position.coords.accuracy);
    });
//console.log($('.js-icon'));
//console.log($('.js-icon')[0]);
//skycons.add($('.js-icon')[0], Skycons.RAIN);
//skycons.play();
    /*setTimeout(function(){
     skycons.set($('.js-icon')[0], Skycons.PARTLY_CLOUDY_DAY);
     }, 5000);
     */
    /*function test(){
     alert(123);
     }
     setTimeout(Test, 5000);*/
    $(document).on('pageshow', '#googlemaps', function () {
        console.log(koordinaten);
        drawMap(new google.maps.LatLng(koordinaten.latitude, koordinaten.longitude));
    });
    function drawMap(latlng) {
        var myOptions = {
            zoom: 12,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map($('.map_canvas')[0], myOptions);
        var marker = new google.maps.Marker({
            position: latlng,
            map: map
        });
    }
});