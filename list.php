<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Stunt Hunt</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">

<!--
/* @license
 * MyFonts Webfont Build ID 2551130, 2013-05-08T16:01:53-0400
 * 
 * The fonts listed in this notice are subject to the End User License
 * Agreement(s) entered into by the website owner. All other parties are 
 * explicitly restricted from using the Licensed Webfonts(s).
 * 
 * You may obtain a valid license at the URLs below.
 * 
 * Webfont: Museo 300 by exljbris
 * URL: http://www.myfonts.com/fonts/exljbris/museo/300/
 * Copyright: Copyright (c) 2008 by Jos Buivenga/exljbris. All rights reserved.
 * Licensed pageviews: Unlimited
 * 
 * 
 * License: http://www.myfonts.com/viewlicense?type=web&buildid=2551130
 * 
 * © 2013 MyFonts Inc
*/

-->

<link rel="stylesheet" type="text/css" href="MyFontsWebfontsKit.css">
<link rel="stylesheet" type="text/css" href="css/college.css">
<link rel="stylesheet" href="css/normalize.min.css">
<link rel="stylesheet" href="css/main.css">


<script src="js/libs/d3.v2.min.js"></script>

<script src="js/libs/modernizr-2.5.3.min.js"></script>
<script src="js/libs/jquery-1.7.2.min.js"></script>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDDgpxglxLASkwzsSiEpcJnhoDlAeCYePA&sensor=false"></script>
    <script>
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();

function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  var mapOptions = {
    zoom: 7,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: new google.maps.LatLng(41.850033, -87.6500523)
  };
  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
  directionsDisplay.setMap(map);
  directionsDisplay.setPanel(document.getElementById('directions-panel'));

  var control = document.getElementById('control');
  control.style.display = 'block';
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);
}

function calcRoute() {
  var start = document.getElementById('start').value;
  var end = document.getElementById('end').value;
  var request = {
    origin: start,
    destination: end,
    travelMode: google.maps.TravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</head>

<!-- 
<script type="text/javascript" src="//use.typekit.net/pnb8lnm.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
-->
 
<article>

 <script>

 	// Set the Map variable
	
      	var map;
      	function initialize() {	
            var myOptions = {
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var all = [
            ["The Silos", "I hold grain and I'm tall, Climb me and Don't fall", "39.509107", "-84.748095"], 
            ["Alumni Hall", "I'm often in the Public Eye, Go real high until I Underlie", "39.50789", "-84.736371"],
            ["Feeding Time", "Go down the Rocky Path and Bring a Carrot, Find a big creature with whom you can share it", "39.508643", "-84.723923"],
            ["Ghost Light", "In your car you will go, Flash your lights down low, Three times a charm in the dead of night, Do it correctly and you'll see a fright", "39.557396", "-84.702922"],
            ["Skate Park", "A meeting place of kids of twenty, Grab a board there will be plenty, Do a trick a drop a flip, Show your skills but don't dare trip", "39.506549", "-84.754366"],
			["Cat Daddy", "Ferocious and Fierce a creature once stood, No need to be careful, it would bite you if it could", "39.582308", "-84.761839"],
            ["10,000 Inches Under the Sea", "Down and Deep the muck sticks heavy, go as far as you can and grab as much as you can levy", "39.577181", "-84.752741"],
            ["High Dive", "This particular challenge will make such a splash, Do the highest level and make a quick dash", "39.502654", "-84.738482"],
			["Tombstone Treasure", "I was born here and I died then, Find me and become my friend", "39.49664", "-84.727938"],
            ["Home Run Derby", "Enter here and put on your cap, If your friend hits it home give him a clap, Be aware of the hours though, If you make a scene the police will show", "39.513229", "-84.73242"],
            ["Cold Feet", "Slippery, Slidy, Glistening Ice, Doesn't it sound nice? Why not take off your shoes, If you don't, you will loose", "39.503498", "-84.737034"],
			["Taxidermy", "Stuffed and Hung according to species, find the right one and it's yours for keepsies", "39.508453", "-84.733713"],
            ["Every Kiss Begins With K", "Find someone you like, A friend, A lover, Even if it's raining you will have a cover",  "39.508738", "-84.733703"],
            ["Krishna", "Do you dare to up your level? If 6 is the maximum, 20s the devil", "39.510634", "-84.743546"],
			["Covered Bridge", "All you must do is prove you were there, many don't know this game is unfair", "39.523984", "-84.734762"]
      	];							
        var infoWindow = new google.maps.InfoWindow;
        map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
        // Set the center of the map
       	var pos = new google.maps.LatLng(39.5069, -84.7453);
		
        map.setCenter(pos);
        function infoCallback(infowindow, marker) { 
            return function() {
            infowindow.open(map, marker);
        };
   }		
	
   function setMarkers(map, all) {	
   	for (var i in all) {										
            var name 	= all[i][0];
            var clue = all[i][1];
            var lat 	= all[i][2];
            var lng 	= all[i][3];
			
            var latlngset;
            latlngset = new google.maps.LatLng(lat, lng);
            var marker = new google.maps.Marker({  
              map: map,  title: name,  position: latlngset  
            });

            var content = '<div class="map-content"><h3>' + name + '<br />' + clue  + '<br /><a href="http://maps.google.com/?daddr=' + lat + ' ' + lng + ' " target="_self">Get Directions</a></div>'+'<form action="toPost.php" method="POST" enctype="multipart/form-data" id="photoForm"><label for="photo">Photo Upload:</label><input type="file" name="photo" id="photo" /><input type="hidden" name="user" id="user" value="user001" /><input type="submit" value="Submit!" id="submitButton" /></form>';					
            var infowindow = new google.maps.InfoWindow();
              infowindow.setContent(content);
              google.maps.event.addListener(marker, 'click', infoCallback(infowindow, marker), function() {
				infowindow.close();
				infowindow.setContent(content);
				infowindow.open(map,this)
  			  });
          }
        }	
	
        // Set all markers in the all variable
        setMarkers(map, all);
      };
      // Initializes the Google Map
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script>
	  $(function() {
	    $( "#tabs" ).tabs();
	  });
	  </script>
  </head>

    
  
<style>

body.listPage {
	background-image: url('img/graybackground.png');
}
.background {
  fill: none;
  pointer-events: all;
}
a.listLink {
	text-decoration: none;
}
.switcher {
	list-style-type: none;
	
}
ol {
	margin-left:-40px;
	
}

.logo {
	width:80px;
	margin-left:23px;
	margin-top:-30px;
}

li.listView {
	list-style-type: none;
	background-color: #fff;
	margin: 20px;
	padding-top: 10px;
	padding-bottom: 10px;
	box-shadow: 3px 3px 1px #888888;
	
}
span.listNumb {
	font-family: 'CollegeRegular';
	font-size: 1.2em;
	margin-right: 30px;
	color: #3e687c;
}


span.listItem {
	font-family: MuseoSans-500;
	font-size: .9em !important;
	margin-left: 30px;
	color: #000;
}

a.map:visited {
	font-family: 'CollegeRegular';
	font-size: 1.5em;	
	color:black;
	list-style:none;
}

.map {
	font-family: 'CollegeRegular';
	font-size: 1.5em;
	color:black;
	list-style:none;
	text-decoration:none;
	float:right;
	margin-top:35px;
	margin-right:24px;
}

.mapImage img{
	width:129px;
	height:95px;
	float:right;
	margin-right:18px;
	margin-top:-30px;
}
.navBottom {
	background-color: #000;
	width: 100%;
	position: fixed;
	bottom: 0;
	left: 0;
	padding-top: 10px;
	padding-bottom: 10px;
}
tr {
	padding-top: 10px;
	padding-bottom: 10px;
}
td {
	background-color: #000;
	padding-left: 30px;
	padding-top: 10px;
	padding-bottom: 10px;
}
img.mapView {
	width: 45px;
	height: 45px;
}
</style>
<body class="listPage">
	
	<?php
			echo "<div id=\"topBar\"/><a href=\"map.php\"><img id=\"backB\" src=\"img/back.png\"/></a><span class=\"listNumb\"><h3 id=\"huntTitle\">Scavenger Stunt Hunt</h3></h3></div>";
			echo '<hr>';
	?>
	<img class="logo" src="img/logo.png" />

	
	<a class="mapImage" href="map.php"><img class="mapView" src="img/map.png" /></a>
	<a class="map" href="map.php">LIST VIEW</a>
	
		   
	<ol>
		<a class="listLink" href="underTheSea.php"><li class="listView"><span class="listNumb">1<span class="listItem">10,000 Inches Under the Sea</span></li></a>
		<a class="listLink" href="alumni.php"><li class="listView"><span class="listNumb">2<span class="listItem">Alumni Hall</span></li></a>
		<a class="listLink" href="catDaddy.php"><li class="listView"><span class="listNumb">3<span class="listItem">Cat Daddy</span></li></a>
		<a class="listLink" href="coldFeet.php"><li class="listView"><span class="listNumb">4<span class="listItem">Cold Feet</span></li></a>
		<a class="listLink" href="coveredBridge.php"><li class="listView"><span class="listNumb">5<span class="listItem">Covered Bridge</span></li></a>
		<a class="listLink" href="everyKiss.php"><li class="listView"><span class="listNumb">6<span class="listItem">Every Kiss Begins With K</span></li></a>
		<a class="listLink" href="feedingTime.php"><li class="listView"><span class="listNumb">7<span class="listItem">Feeding Time</span></li></a>
		<a class="listLink" href="ghostLight.php"><li class="listView"><span class="listNumb">8<span class="listItem">Ghost Light</span></li></a>
		<a class="listLink" href="highDive.php"><li class="listView"><span class="listNumb">9<span class="listItem">High Dive</span></li></a>
		<a class="listLink" href="homeRun.php"><li class="listView"><span class="listNumb">10<span class="listItem">Home Run Derby</span></li></a>
		<a class="listLink" href="krishna.php"><li class="listView"><span class="listNumb">11<span class="listItem">Krishna</span></li></a>
		<a class="listLink" href="silos.php"><li class="listView"><span class="listNumb">12<span class="listItem">The Silos</span></li></a>
		<av href="skatePark.php"><li class="listView"><span class="listNumb">13<span class="listItem">Skate Park</span></li></a>
		<a class="listLink" href="taxidermy.php"><li class="listView"><span class="listNumb">14<span class="listItem">Taxidermy</span></li></a>
		<a class="listLink" href="tombstone.php"><li class="listView"><span class="listNumb">15<span class="listItem">Tombstone Treasure</span></li></a>
		
		</ol>
		
		  
	

<script>
  function getLocation() {
			//Set an error message if user location cannot be gathered
			document.getElementById("locationFeedback").innerHTML="Your device or browser does not support location services, so your location cannot be determined.";
			if(navigator.geolocation) {
				//Location can be gathered, show a spinning wheel until it's found
				document.getElementById("locationFeedback").innerHTML="Determining your location... <img src='../img/loader.gif' />";
				navigator.geolocation.getCurrentPosition(function(position) {  
					//location found, set the hidden form values to store long/lat of the location, hide the spinning wheel, and activate the submit button
					document.getElementById("long").value = position.coords.longitude;
					document.getElementById("lat").value = position.coords.latitude;
					document.getElementById("locationFeedback").innerHTML="";
					document.getElementById("submitButton").disabled = false;
					document.getElementById("submitButton").value = "Submit!";
				});
			}
		}
	
		getLocation();
</script>

<table class="navBottom">
	<tr>
		<td><a href="stats.php"><img class="mapView" src="img/stats.png"/></a></td>
		<td><a href="profile.php"><img class="mapView" src="img/profile-1.png"/></a></td>
		<td><img class="mapView" src="img/play.png"/></td>
		</tr>
	</table>

</body>