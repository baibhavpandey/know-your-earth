<?php
	foreach($query->result() as $row){
		$location = $row->location;
		$lati = $row->latitude;
		$long = $row->longitude;

	}
	$loc_id = $this->session->userdata('location_id');
	$time = date('d-M-Y h:i A',time());
	$url = base_url().'more_info/';
?>

<!DOCTYPE html>
<html>
<head>
<title>Know Your Earth</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'styles/style.css';?>" />
<script type="text/javascript">
	var loc_url = ('<?=$url;?>');
	var place = ('<?=$location; ?>');
	var time = ('<?=$time; ?>');
	var x = ('<?=$lati; ?>');
	var y = ('<?=$long; ?>');
</script>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  <script>
    var map;
    function initialize() {
    	var myLatlng = new google.maps.LatLng(x, y);
        var mapOptions = {
            zoom: 8,
            center: myLatlng,
           
        };
        map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
        
        var contentString ='<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">'+ place+'</h1>'+
      '<div id="bodyContent">'+
      '<p><b>'+place +'</b>,' +
      '<p>Current date&time: '+ time + '</p>' +
      '<p>For more details about: '+place+', <a href="' +loc_url +'">'+
      'Click here.</a> '+
      '</p>'+
      '</div>'+
      '</div>';


  var infowindow = new google.maps.InfoWindow({
      content: contentString,
      maxWidth: 500
  });
  		var marker = new google.maps.Marker({
		      position: myLatlng,
		      map: map,
		      title: place
		  });
		  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
  
    }

    google.maps.event.addDomListener(window, 'load', initialize);
   /*
    function pan() {
           var x=('<?=$lati;?>');
           var y =('<?=$long?>');
           alert(x);
           var panPoint = new google.maps.LatLng(x, y);
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
                             }*/
   
</script>

</head>
<body>
 <!--
 <label>lat</label><input type="text" id="lat" />
 <br/>
   <label>lng</label><input type="text" id="lng" />
  <input type="button" value="updateCenter" onclick="pan()" />-->
 
<img src="../images/kn2.png">
<?php
	echo form_open('app/check');
	echo validation_errors();
?>
		<input type="text" name="location" id="loc" /><br>
		<input type="image" src="../images/srb.png" onclick="pan()" id="button" />
	</form>


 <div id="map-canvas"></div>
 <div class="footer">
 </div>
 </body>
</html>
