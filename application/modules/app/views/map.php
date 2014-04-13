<?php
	$time = date('d-m-y h:i a',time());
?>
<!DOCTYPE html>
<html>
<head>
<title>Know Your Earth</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'styles/style.css';?>" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<style>
</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  <script>
  var time= ('<?=$time; ?>');

    var map;
    function initialize() {
    	var myLatlng = new google.maps.LatLng(27.700000, 85.333333);
        var mapOptions = {
            zoom: 4,
            center: myLatlng,
           
        };
      
        
        /*
         wheather
         **/
        
        
  
        var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Kathmandu</h1>'+
      '<div id="bodyContent">'+
      '<p><b>Kathmandu</b>,' + 
      '<p>Current time: </p>'+ time +
      '<p>More About:, <a href="">'+
      'http://en.wikipedia.org/w/index.php?title=Uluru</a> '+
      '(last visited June 22, 2009).</p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString,
      maxWidth: 500
  });
  		var marker = new google.maps.Marker({
		      position: myLatlng,
		      map: map,
		      title: ''
		  });
		  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
   var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
  var weatherLayer = new google.maps.weather.WeatherLayer({
    temperatureUnits: google.maps.weather.TemperatureUnit.CELCIUS
  });
  weatherLayer.setMap(map);

  var cloudLayer = new google.maps.weather.CloudLayer();
  cloudLayer.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    function pan() {
    	
        var panPoint = new google.maps.LatLng(document.getElementById("lat").value, document.getElementById("lng").value);
        map.panTo(panPoint);
         var contentString1 = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
      '<div id="bodyContent">'+
      '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
      'sandstone rock formation in the southern part of the '+
      'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
      'south west of the nearest large town, Alice Springs; 450&#160;km '+
      '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
      'features of the Uluru - Kata Tjuta National Park. Uluru is '+
      'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
      'Aboriginal people of the area. It has many springs, waterholes, '+
      'rock caves and ancient paintings. Uluru is listed as a World '+
      'Heritage Site.</p>'+
      '<p>Attribution: Uluru, <a href="http://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
      'http://en.wikipedia.org/w/index.php?title=Uluru</a> '+
      '(last visited June 22, 2009).</p>'+
      '</div>'+
      '</div>';
        
       
        var iconBase = 'icon1.png';
        var marker = new google.maps.Marker({
		      position: panPoint,
		      map: map,
		      
		      title: 'new point'
		  }); 
		  
		  var infowindow1 = new google.maps.InfoWindow({
      content: contentString1,
      maxWidth: 200
  });
  
   google.maps.event.addListener(marker, 'click', function() {
    infowindow1.open(map,marker);
  });
		  
     }
</script>
</head>
<body>
 <!--
 <label>lat</label><input type="text" id="lat" />
 <br/>
   <label>lng</label><input type="text" id="lng" />
  <input type="button" value="updateCenter" onclick="pan()" />-->
 
<img src="images/kn2.png">
<?php
	echo form_open('app/check');
	echo validation_errors();
?>
		<input type="text" name="location" id="loc" /><br>
		<input type="image" src="images/srb.png" onclick="pan()" id="button" />
	</form>


 <div id="map-canvas"></div>
 <div class="footer">
 </div>
 </body>
</html>