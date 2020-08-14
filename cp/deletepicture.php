<?php
	require_once('include/config.php');
	session_start();
	
	if(isset($_GET['id'])){
		$query = "SELECT * FROM `slideshow` WHERE id='".$_GET['id']."'";
		$pictures = mysql_query($query,$connection);
		$images = mysql_fetch_array($pictures);
		if(unlink("../images/slideshow/".$images['source'])){
			$query = "DELETE FROM `slideshow` WHERE id='".$_GET['id']."'";
			if(mysql_query($query,$connection)){
				header('Location: home.php');
				exit;	
			}
		}
	}
?>