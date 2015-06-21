<?php include_once 'wochentage.inc.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Wetterapp</title>
        <meta charset="UTF-8">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
        <link rel="stylesheet" href="styles.css" media="screen">
        <link rel="apple-touch-icon" href="Icon-60@2x.png" />
        <link rel="apple-touch-icon" sizes="180x180" href="Icon-60@3x.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="Icon-76.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="Icon-76@2x.png" />
        <link rel="apple-touch-icon" sizes="58x58" href="Icon-Small@2x.png" />
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
        <link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgYh-UffzCV54XCcReML4WSqyb0_zv8x8"></script>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script src="script.js"></script>
        <script src="skycons.js"></script>
    </head>
    <body>
        <div data-role="page" id="main">
            <div data-role="header" >
                <h1>BetterWeather</h1>
                <a href="#inhalt" data-role="button" data-iconpos="notext" data-icon="bars" class="ui-btn-right" data-transition="slidedown"></a>
            </div><!-- /HEADER -->
            <div role="main" class="ui-content">
                <p class="Ueberschrift_1"><?php echo date('d.m.Y'); ?> Aktuell <span class="w_temp_akt"></span>°C</p>
                <p class="Ueberschrift_2">
                    <a href="#location" data-role="button" data-icon="location" data-mini="true"  data-transition="flip">
                        <span class="w_adresse"></span><span class="w_ort"></span><br><span class="w_region"></span><span class="w_kanton"></span></a>
                </p>
                <div class="w_icon"><canvas class="js-icon" ></canvas></div>
                <div class="w_text"></div>
                <p class="Ueberschrift_3"> Heute: <span class="w_heute"></span><br></p>
                <!-- AUSKLAPPMENU WOCHE -->
                <?php
                for ($i = 0; $i < 8; $i++) {
                    echo '<div class="w_text3" data-inset="false" data-role="collapsible" data-theme="a"';
                    echo 'data-content-theme="a" data-collapsed="true"';
                    echo 'data-mini="true" data-iconpos="right"';
                    echo 'data-collapsed-icon="carat-u" data-expanded-icon="carat-d">';
                    echo '<h1><span class="vorschau_datum_' . $i . '">';
                    echo $tag[$tagnummer + $i] . " " . date('d.m') . " ";
                    echo '</span><span class="wetterbedingungen_' . $i . '"></span><canvas class="js-icon_' . $i . '" ></canvas></h1>';
                    echo '<p>Temperatur zwischen <span class="temp_' . $i . '_min"></span>°C und <span class="temp_' . $i . '_max"></span>°C</p>';
                    echo '</div>';}
                ?>
            </div><!-- /CONTENT -->
            <div data-role="footer" data-id="Footer_main" data-position="fixed">
                <h4 class="w_ort"></h4>
                <a href="#googlemaps" data-role="button" data-icon="arrow-r" data-iconpos="right" class="ui-btn-right" data-transition="slide">GoogleMaps</a>
            </div><!-- /FOOTER -->
        </div><!-- /PAGE MAIN -->
        <div data-role="page" id="inhalt">
            <div data-role="header" data-add-back-btn="true">
                <h1>Terms Of Use</h1>
                <a href="#main" data-role="button" data-iconpos="notext" data-icon="home" class="ui-btn-right" data-transition="slidedown">Menu</a>
            </div><!-- /HEADER -->
            <div role="main" class="ui-content">
                <?php
                include_once 'terms.inc.php';
                ?>
            </div><!-- /CONTENT -->
            <div data-role="footer" data-id="Footer_Impressum" data-position="fixed">
                <h4 class="w_ort"></h4>
                <a href="#location" data-role="button" data-icon="location" class="ui-btn-left" data-transition="flip">Location</a>
                <a href="#googlemaps" data-role="button" data-icon="arrow-r" data-iconpos="right" class="ui-btn-right" data-transition="slide">GoogleMaps</a>
            </div><!-- /FOOTER -->
        </div><!-- /PAGE INHALT -->
        <div data-role="page" id="googlemaps">
            <div data-role="header" data-add-back-btn="true">
                <h1>Google Maps</h1>
                <a href="#main" data-role="button" data-iconpos="notext" data-icon="home" class="ui-btn-right" data-transition="slidedown">Menu</a>
            </div><!-- /HEADER -->
            <div role="main" class="ui-content">
                <div class="map_canvas"></div>
            </div><!-- /CONTENT -->
            <div data-role="footer" data-id="Footer_Map" data-position="fixed">
                <h4 class="w_ort"></h4>
                <a href="#location" data-role="button" data-icon="location" class="ui-btn-left" data-transition="flip">Location</a>
            </div><!-- /FOOTER -->
        </div><!-- /PAGE GOOGLEMAPS -->
        <div data-role="page" id="location">
            <div data-role="header" data-add-back-btn="true">
                <h1 >Location</h1>
                <a href="#main" data-role="button" data-iconpos="notext" data-icon="home" class="ui-btn-right" data-transition="slidedown">Menu</a>
            </div><!-- /HEADER -->
            <div role="main" class="ui-content" >
                <h2>Standort Info</h2>
                <h3>Adresse:</h3><p class="adresse"></p>
                <h3>Latitude:</h3><p class="latitude"></p>
                <h3>Longitude:</h3><p class="longitude"></p>
                <h3>Genauigkeit in Meter:</h3><p class="accuracy"></p>	
            </div><!-- /CONTENT -->
            <div data-role="footer" data-id="Footer_Location" data-position="fixed">
                <h4 class="w_ort"></h4>
                <a href="#googlemaps" data-role="button" data-icon="arrow-r" data-iconpos="right" class="ui-btn-right" data-transition="slide">GoogleMaps</a>
            </div><!-- /FOOTER -->
        </div><!-- /PAGE LOCATION -->
    </body>
</html>