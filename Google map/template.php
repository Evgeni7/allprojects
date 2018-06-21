<?php /* Template Name: template */ ?>

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

<div id="header-image" class="custom-header " style="background: url(http://localhost/wp-content/themes/minimalisticky/images/header-bg.png); background-size: cover;">
<div class="header-wrapper">
  <div class="site-branding-header">
      <p class="site-title">
                 </p>
 
</div>

<div class="top-bar-title">

                  <div class="site-branding">

                   
                                        <p class="site-title"><a href="http://localhost/" rel="home">Evgeni</a></p>
                   
</div>

<div class="site-description" >
<br>
       
 WordPress
</div>
<br><br>
 

<form method="post">
Country: <input type="text" name="country">
Region: <input type="text" name="region"><br>
Dot 1: LAT: <input type="text" name="lat1"> LNG: <input type="text" name="lng1"><br>
Dot 2: LAT: <input type="text" name="lat2"> LNG: <input type="text" name="lng2">
<input type="submit">
</form>   
<br>


</div>
</div>
</div>







<?php

$link = mysqli_connect('localhost', 'wordpressuser', 'Passw0rd!', 'map');
if (!$link) 
{
    $output = 'Unable to connect.';
	echo $output;	
	exit();
       
}

if ($_POST["lat1"] > $_POST["lat2"])
{
	$changer = $_POST["lat1"];
	$_POST["lat1"] = $_POST["lat2"];
	$_POST["lat2"] = $changer;
}
if ($_POST["lng1"] > $_POST["lng2"])
{
	$changer = $_POST["lng1"];
	$_POST["lng1"] = $_POST["lng2"];
	$_POST["lng2"] = $changer;
}


if ($_POST["country"] == null)
{
	if ($_POST["region"] == null)
		{
			if ($_POST["lng2"] == 0)
			{
				$maxid = "SELECT * FROM list";
				$result = $link->query($maxid);
				$row = $result->fetch_assoc();
				echo "Showing all results";
			}
			else
			{
				$maxid = "SELECT * FROM list where lat between '".$_POST["lat1"]."' and '".$_POST["lat2"]."' and lng between '".$_POST["lng1"]."' and '".$_POST["lng2"]."'";
				$result = $link->query($maxid);
				$row = $result->fetch_assoc();
				echo "Showing results in the (", $_POST["lat1"],"), (",$_POST["lng1"],") - (",$_POST["lat2"],"), (",$_POST["lng2"], ") square";
			}
		
		}
	else
		{
			if ($_POST["lng2"] == 0)
			{
				$maxid = "SELECT * FROM list where region = '".$_POST["region"]."'";
				$result = $link->query($maxid);
				$row = $result->fetch_assoc();
			}
			else
			{
				$maxid = "SELECT * FROM list where region = '".$_POST["region"]."' and lat between '".$_POST["lat1"]."' and '".$_POST["lat2"]."' and lng between '".$_POST["lng1"]."' and '".$_POST["lng2"]."'";
				$result = $link->query($maxid);
				$row = $result->fetch_assoc();
			}
		}
}
else
{
	if ($_POST["region"] == null)
		{
			if ($_POST["lng2"] == 0)
			{
				$maxid = "SELECT * FROM list where country = '".$_POST["country"]."'";
				$result = $link->query($maxid);
				$row = $result->fetch_assoc();
			}
			else
			{
				$maxid = "SELECT * FROM list where country = '".$_POST["country"]."' and lat between '".$_POST["lat1"]."' and '".$_POST["lat2"]."' and lng between '".$_POST["lng1"]."' and '".$_POST["lng2"]."'";
				$result = $link->query($maxid);
				$row = $result->fetch_assoc();
			}
		
		}
	else
		{
			if ($_POST["lng2"] == 0)
			{
				$maxid = "SELECT * FROM list where country = '".$_POST["country"]."' and region = '".$_POST["region"]."'";
				$result = $link->query($maxid);
				$row = $result->fetch_assoc();
			}
			else
			{
				$maxid = "SELECT * FROM list where country = '".$_POST["country"]."' and region = '".$_POST["region"]."' and lat between '".$_POST["lat1"]."' and '".$_POST["lat2"]."' and lng between '".$_POST["lng1"]."' and '".$_POST["lng2"]."'";
				$result = $link->query($maxid);
				$row = $result->fetch_assoc();
			}
		}
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
	 


 <?php
 foreach($result as $result){
 ?>
        var location = new google.maps.LatLng(<?php echo $result['lat']; ?>, <?php echo $result['lng']; ?>);
        var marker = new google.maps.Marker({
            position: location,
            map: map,
	    title: '<?php echo $result['url']; echo " ", $result['lat']," "; echo $result['lng'] ?>'
        });
    <?php } ?>

      }



    </script>
 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgUnWsYO-MXLXTv9pPwkbEJsXjv3hRZMg&callback=initMap">
    </script>


</body>
</html>
