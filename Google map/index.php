<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
 <style>
      #map {
        height: 100%;
      }
     html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>

</head>
<body>




<?php

$link = mysqli_connect('localhost', 'wordpressuser', 'Passw0rd!', 'map');
if (!$link) 
{
    $output = 'Unable to connect.';
	echo $output;	
	exit();
       
}

$maxid = "SELECT * FROM list";
$result = $link->query($maxid);
$row = $result->fetch_assoc();


//$maxid = (int)$row['max(id)'];
//echo $maxid;
//echo "       ";

//$lat = array($maxid);
/*for ($counter = 1; $counter < $maxid; $counter++)
{

$id = "SELECT * FROM list WHERE id=$counter";
$result = $link->query($id);
$row = $result->fetch_assoc();
$lat = (double)$row['lat'];
$lng = (double)$row['lng'];
echo $lat[1];
echo $lat[2];
echo $lat[3];


echo "     ";
echo $lng; 
echo "   END   ";
} */
?>



<div id="map"></div>
  <script> 

      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 42.668535, lng: 0.304979},
          zoom: 3
        });
	 
/*	  var marker = new google.maps.Marker({
          position: {lat: <?php echo $lat[1]; ?>, lng: <?php echo $lng; ?>},
          map: map,
          title: '<?php echo $lat; ?>   <?php echo $lng; ?>'
        });
*/

 <?php
 foreach($result as $result){
 ?>
        var location = new google.maps.LatLng(<?php echo $result['lat']; ?>, <?php echo $result['lng']; ?>);
        var marker = new google.maps.Marker({
            position: location,
            map: map,
	    title: '<?php echo $result['name']; ?>'
        });
    <?php } ?>

      }



    </script>
 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgUnWsYO-MXLXTv9pPwkbEJsXjv3hRZMg&callback=initMap">
    </script>


</body>
</html>
