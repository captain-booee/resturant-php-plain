<?php 
	session_start();
	if(isset($_SESSION['admin'])){
		unset($_SESSION['admin']);
		header('Location: login.php');
		exit;
	}
	unset($_SESSION['name']);
	unset($_SESSION['role']);
	unset($_SESSION['uid']);
	header('Location: ../index.php');
	exit;
?>