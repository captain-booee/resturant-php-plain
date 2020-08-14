<?php
require_once('include/config.php');
session_start();
if(!isset($_SESSION['admin'])){
		header('Location: login.php');
		exit;
	}
if(isset($_GET['id'])){
		$query = "DELETE FROM `contact` WHERE id='".$_GET['id']."'";
		if(mysql_query($query,$connection)){
			header('Location: contact-pannel.php');
			exit;	
		}
	}
?>