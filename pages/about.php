<?php
require_once('../cp/include/config.php');
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>about</title>
<link href="../css/about-contact.css" rel="stylesheet" type="text/css"/>
<script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
      function initialize() {
        var mapCanvas = document.getElementById('map');
        var mapOptions = {
          center: new google.maps.LatLng(35.745037, 51.477954),
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

</head>

<body>

<div class="mother">

<div class="navigation-menu-holder-fixed">
    	<ul class="btn-holder">
        	<li class="menu-btns"><a href="../index.php"><span class="menu-btn">Home</span></a></li>
          
            <li class="menu-btns"><a href="../cp/login.php"><span class="menu-btn">Order!</span></a></li>
            <li class="menu-btns"><a href="#"><span class="menu-btn">About</span></a></li>
            <li class="menu-btns"><a href="contact.php"><span class="menu-btn">Contact</span></a></li>
        </ul>
    </div>

	<div class="left-box">
    <div id="map"></div>

    </div>
     <?php 
		$query = "SELECT * FROM `about`";
		$abouts = mysql_query($query,$connection);
		$about = mysql_fetch_array($abouts);
		 ?>
    <div class="right-box">
  		<p class="about-content">
       	<?php echo $about['content']; ?>
        </p>
        <p class="about-address">
       	<?php echo $about['address']; ?>
        </p>
        <p class="about-number">
       	TELL: <?php echo $about['number']; ?>
        </p>
    </div>

</div>

</body>
</html>