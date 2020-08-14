<?php
	require_once('include/config.php');
	session_start();
	if(!isset($_SESSION['admin'])){
		header('Location: login.php');
		exit;
	}
	if(isset($_GET['id'])){
		$query = "SELECT `name`,`image` FROM `products` WHERE id='".$_GET['id']."'";
		$production = mysql_query($query,$connection);
		$brand = mysql_fetch_array($production);
		if(unlink("../images/img/".$brand['image'])){
			$query = "DELETE FROM `products` WHERE id='".$_GET['id']."'";
			if(mysql_query($query,$connection)){
				header('Location: admin-dashboard.php?page=products');
				exit;	
			}
		}
	}
?>