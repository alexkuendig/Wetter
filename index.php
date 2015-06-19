<!DOCTYPE html>
<html>
<head>
	<title>Wetterapp</title>
	<meta charset="UTF-8">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
        <link rel="stylesheet" href="styles.css" media="screen">
        <link rel="apple-touch-icon" href="Icon-60@2x.png" />
        <link rel="apple-touch-icon" sizes="180x180" href="Icon-60@3x.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="Icon-76.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="Icon-76@2x.png" />
        <link rel="apple-touch-icon" sizes="58x58" href="Icon-Small@2x.png" />
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script src="script.js"></script>
</head>
<body>
    <?php
    $tag[0] = "SO";
    $tag[1] = "MO";
    $tag[2] = "DI";
    $tag[3] = "MI";
    $tag[4] = "DO";
    $tag[5] = "FR";
    $tag[6] = "SA";
    $tag[7] = "SO";
    $tag[8] = "MO";
    $tag[9] = "DI";
    $tag[10] = "MI";
    $tagnummer = date("w"); // Tag ermitteln
?>
<div data-role="page" id="main">

	<div data-role="header" >
            <h1>BetterWeather</h1>
            <a href="#inhalt" data-role="button" data-iconpos="notext" data-icon="bars" class="ui-btn-right" data-transition="slidedown">Menu</a>
	</div><!-- /header -->

	<div role="main" class="ui-content">
            <p class="Ueberschrift_1"><?php
                echo date('d.m.Y') ;
                ?> Aktuell <span class="w_temp_akt"></span>°C</p><p class="Ueberschrift_2"> Ort: <span class="w_ort"></span><br> Adresse: <span class="w_adresse"></span></p>
                <div class="w_icon">
                    <img src="weather-sun-icon.png">
                </div>
            <div class="w_text"></div>
                <div class="w_text3" data-inset="false" data-role="collapsible" data-theme="a"
                     data-content-theme="a" data-collapsed="true"
                     data-mini="true" data-iconpos="right" 
                     data-collapsed-icon="carat-u" data-expanded-icon="carat-d" >
                    <h1><span class="vorschau_A"><?php echo $tag[$tagnummer]." ".date('d.m.Y')." ";?></span><span class="wetterbedingungen_0"> </span></h1>
                    <p>Temperatur zwischen <span class="temp_0_min"></span>°C und <span class="temp_0_max"></span>°C</p>  
                </div>
                <div class="w_text3" data-inset="false" data-role="collapsible" data-theme="a"
                     data-content-theme="a" data-collapsed="true" data-corners="false"
                     data-mini="true" data-iconpos="right"
                     data-collapsed-icon="carat-u" data-expanded-icon="carat-d" >
                     <h1><span class="vorschau_A"><?php echo $tag[$tagnummer+1]." ".date('d.m.Y', strtotime('+1 day')); ?></span><span class="wetterbedingungen_1"></span></h1>
                    <p>Temperatur zwischen <span class="temp_1_min"></span>°C und <span class="temp_1_max"></span>°C</p>
                </div>
                <div class="w_text3" data-inset="false" data-role="collapsible" data-theme="a"
                     data-content-theme="a" data-collapsed="true"
                     data-mini="true" data-iconpos="right"
                     data-collapsed-icon="carat-u" data-expanded-icon="carat-d" >
                     <h1><span class="vorschau_A"><?php echo $tag[$tagnummer+2]." ".date('d.m.Y', strtotime('+2 day')); ?></span><span class="wetterbedingungen_2"></span></h1>
                    <p>Temperatur zwischen <span class="temp2_min"></span>°C und <span class="temp_2_max"></span>°C</p>
                </div>
                <div class="w_text3" data-inset="false" data-role="collapsible" data-theme="a"
                     data-content-theme="a" data-collapsed="true"
                     data-mini="true" data-iconpos="right"
                     data-collapsed-icon="carat-u" data-expanded-icon="carat-d" >
                     <h1><span class="vorschau_A"><?php echo $tag[$tagnummer+3]." ".date('d.m.Y', strtotime('+3 day')); ?></span><span class="wetterbedingungen_3"></span></h1>
                    <p>Temperatur zwischen <span class="temp_3_min"></span>°C und <span class="temp_3_max"></span>°C</p>
                </div>
                <div class="w_text3" data-inset="false" data-role="collapsible" data-theme="a"
                     data-content-theme="a" data-collapsed="true"
                     data-mini="true" data-iconpos="right"
                     data-collapsed-icon="carat-u" data-expanded-icon="carat-d" >
                     <h1><span class="vorschau_A"><?php echo $tag[$tagnummer+4]." ".date('d.m.Y', strtotime('+4 day')); ?></span><span class="wetterbedingungen_4"></span></h1>
                    <p>Temperatur zwischen <span class="temp_4_min"></span>°C und <span class="temp_4_max"></span>°C</p>
                </div>
	</div><!-- /content -->

	<div data-role="footer" data-id="konstantFooter" data-position="fixed">
		<h4 class="w_ort"></h4>
                <a href="#location" data-role="button" data-icon="location" class="ui-btn-left" data-transition="flip">Location</a>
                <a href="#googlemaps" data-role="button" data-icon="action" data-iconpos="right" class="ui-btn-right" data-transition="slide">GoogleMaps</a>
	</div><!-- /footer -->
</div><!-- /page -->

<div data-role="page" id="inhalt">

	<div data-role="header" data-add-back-btn="true">
		<h1>Impressum</h1>
	</div><!-- /header -->

	<div role="main" class="ui-content">
		
            <p>
                TERMS OF USE FOR BETTERWEATHER SERVICE
Thank you for using the BetterWeather Service. By using this 
you agree to be bound by the following Terms of Use (the
"Terms of Use").

Users may make 1,000 requests per day free of charge. calls past 1,000
per day will be billed at a rate of $15.15 (USD) per individual request. 
Billing of any outstanding balance is run on the
first business day of each month. Access to certain advanced features may be
limited and is provided on a "best effort" basis. Any public or
user-facing application or made using the BetterWeather Service must prominently
display the message "Powered by BetterWeather Service" wherever data from the BetterWeather Service
is displayed. This message must, if possible, open a link to
http://forecast.io/ when clicked or touched.

LEGITIMATE USES ONLY
You may only create a single account and must provide accurate identification,
contact, and other information required as part of the registration process.
You may not create any script or other automated tool that attempts to create
multiple BetterWeather Service accounts. Your BetterWeather Service Key is to be kept
confidential and is not to be published or otherwise made accessible to the
general public. If you become aware of any unauthorized use of your BetterWeather Service
API key you agree to either reset your BetterWeather Service Key yourself or notify The
Alex Wetterfrosch Company  immediately. If you fail to do so we may reset your
BetterWeather Service Key or terminate your account.

You may not use the BetterWeather Service for radio, newspaper, broadcast television, or
cable television distribution. You may not sell, lease, or sublicense the
BetterWeather Service or access thereto. You may not display or invoke the BetterWeather Service or
Alex Wetterfrosch  name or logo in any manner that implies a relationship or affiliation
with, sponsorship, or endorsement by The Alex Wetterfrosch Company , other than your
use of the service, or that can be reasonably interpreted to suggest editorial
content has been authored by, or represents the views or opinions of, The Dark
Sky Company, LLC or its personnel.

The BetterWeather Service is not intended to be used in any application where human life
or property may be at stake. You understand that the BetterWeather Service is not
designed for such purposes and that misuse of the BetterWeather Service may lead to
death, personal injury, or severe property or environmental damage for which
The Alex Wetterfrosch Company  is not liable.

Your license to the BetterWeather Service under these Terms of Use continues
until it is terminated by either party at any time for any reason. You may
terminate the license by discontinuing use of the BetterWeather Service. These Terms of
Use terminate automatically if (i) you violate any term of these Terms of Use,
(ii) The Alex Wetterfrosch Company  publicly posts a written notice of termination
on our web site, or (iii) or The Alex Wetterfrosch Company  sends a written notice
of termination to you.

The Alex Wetterfrosch Company  may decide to terminate the BetterWeather Service at
any time for any reason. If it does so, it will provide notice of such
termination 60 days in advance of the termination date.

If you are interested in doing anything different than what is specifically
permitted in these Terms of Use, you must first obtain The Alex Wetterfrosch  Company,
LLC's written consent. Please email info@forecast.io in order to obtain such
consent. If you fail to do so, The Alex Wetterfrosch Company  reserves the right to
take legal action.

SUPPORT
The Alex Wetterfrosch Company  may elect to provide you with support or
modifications for the BetterWeather Service (collectively, "Support") at its sole
discretion, and may terminate such Support at any time without notice to you.
The Alex Wetterfrosch Company  may change, suspend, or discontinue any aspect of the
BetterWeather Service at any time, including the availability of any BetterWeather Service. The
Alex Wetterfrosch Company  may also impose limits on certain features and services
or restrict your access to parts or all of the BetterWeather Service or the The Alex Wetterfrosch 
Company, LLC web site without notice or liability.

DISCLAIMER OF WARRANTIES
The BetterWeather Service is provided "as is," with no warranties whatsoever.
The Alex Wetterfrosch Company  expressly disclaims to the fullest extent permitted
by law all express, implied, and statutory warranties, including, without
limitation, the warranties of merchantability, fitness for a particular
purpose, and non-infringement of proprietary rights. The Alex Wetterfrosch Company 
disclaims any warranties regarding the security, reliability, timeliness,
availability, and performance of BetterWeather Service.

You understand and agree that you use BetterWeather Service at your own discretion and
risk and that you will be solely responsible for any damages to your computer
system or loss of data that results from the download or use of BetterWeather Service.

LIMITATION OF LIABILITY
Under no circumstances shall The Alex Wetterfrosch Company  be liable to any user on
account of that user's use or misuse of BetterWeather Service. Such limitation of
liability shall apply to prevent recovery of direct, indirect, incidental,
consequential, special, exemplary, and punitive damages whether such claim is
based on warranty, contract, tort (including negligence), or otherwise, even if
The Alex Wetterfrosch Company  has been advised of the possibility of such damages).
Such limitation of liability shall apply whether the damages arise from use or
misuse of and reliance on the BetterWeather Service, from inability to use BetterWeather Service,
or from the interruption, suspension, or termination of BetterWeather Service (including
such damages incurred by third parties). Such limitation shall apply
notwithstanding a failure of essential purpose of any limited remedy and to the
fullest extent permitted by law.

GENERAL PROVISIONS
These Terms of Use will be governed by and construed in accordance with the
laws of the State of New York, without giving effect to the conflict of laws or
provisions of New York or your actual state or country of residence. If for any
reason a court of competent jurisdiction finds any provision or portion of
these Terms of Use to be unenforceable, the remainder of these Terms of Use
will continue in full force and effect. These Terms of Use constitute the
entire agreement between the parties with respect to the subject matter hereof
and supersede and replace all prior or contemporaneous understandings or
agreements, written or oral, regarding such subject matter. Any waiver of any
provision of these Terms of Use will be effective only if in writing and signed
by The Alex Wetterfrosch Company . We reserve the right to amend these Terms of Use
from time to time or terminate them in their entirety at any time, at our sole
discretion.
            </p>	
		
		
	</div><!-- /content -->

	<div data-role="footer" data-id="konstantFooter" data-position="fixed">
		<h4 class="w_ort"></h4>
                <a href="#location" data-role="button" data-icon="location" class="ui-btn-left" data-transition="flip">Location</a>
                <a href="#googlemaps" data-role="button" data-icon="action" data-iconpos="right" class="ui-btn-right" data-transition="slide">GoogleMaps</a>
	</div><!-- /footer -->
</div><!-- /page -->


<div data-role="page" id="googlemaps">

	<div data-role="header" data-add-back-btn="true">
		<h1>Google Maps</h1>
	</div><!-- /header -->

	<div role="main" class="ui-content">
		
		
		
		
	</div><!-- /content -->

	<div data-role="footer" data-id="konstantFooter" data-position="fixed">
		<h4 class="w_ort"></h4>
                <a href="#location" data-role="button" data-icon="location" class="ui-btn-left" data-transition="flip">Location</a>
                <a href="#googlemaps" data-role="button" data-icon="action" data-iconpos="right" class="ui-btn-right" data-transition="slide">GoogleMaps</a>
	</div><!-- /footer -->
</div><!-- /page -->

<div data-role="page" id="location">

	<div data-role="header" data-add-back-btn="true">
		<h1 >Location</h1>
	</div><!-- /header -->

        <div role="main" class="ui-content" >
            <h2>Standort Info</h2>
            <h3>Adresse:</h3>
            <p class="adresse"></p>
            <h3>Latitude:</h3>
            <p class="latitude"></p>
            <h3>Longitude:</h3>
            <p class="longitude"></p>
            <h3>Genauigkeit im Meter:</h3>
            <p class="accuracy"></p>	
		
	</div><!-- /content -->

	<div data-role="footer" data-id="konstantFooter" data-position="fixed">
		<h4 class="w_ort"></h4>
                <a href="#location" data-role="button" data-icon="location" class="ui-btn-left" data-transition="flip">Location</a>
                <a href="#googlemaps" data-role="button" data-icon="action" data-iconpos="right" class="ui-btn-right" data-transition="slide">GoogleMaps</a>
	</div><!-- /footer -->
</div><!-- /page -->

</body>
</html>