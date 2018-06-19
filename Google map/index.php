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

<form method="post">
Country: <input type="text" name="country">
Region: <input type="text" name="region"><br>
LAT: <input type="text" name="lat">
LNG: <input type="text" name="lng">
<input type="submit">
</form>


<?php
$link = mysqli_connect('localhost', 'wordpressuser', 'Passw0rd!', 'map');
if (!$link) 
{
    $output = 'Unable to connect.';
	echo $output;	
	exit();
       


}
if ($_POST["region"] == null){
$maxid = "SELECT * FROM list where country = '".$_POST["country"]."' or lat = '".$_POST["lat"]."' or lng = '".$_POST["lng"]."'";
$result = $link->query($maxid);
$row = $result->fetch_assoc();
echo $_POST["country"];
echo " ";
echo $_POST["lat"];
echo " ";
echo $_POST["lng"];
}
else
{
$maxid = "SELECT * FROM list where region = '".$_POST["region"]."' or country = '".$_POST["country"]."' or lat = '".$_POST["lat"]."' or lng = '".$_POST["lng"]."'";
$result = $link->query($maxid);
$row = $result->fetch_assoc();
echo $_POST["country"];
echo " ";
echo $_POST["region"];
echo " ";
echo $_POST["lat"];
echo " ";
echo $_POST["lng"];
}


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
	    title: '<?php echo $result['url']; ?>'
        });
    <?php } ?>

      }



    </script>
 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgUnWsYO-MXLXTv9pPwkbEJsXjv3hRZMg&callback=initMap">
    </script>


</body>
</html>
