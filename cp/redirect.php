<?php 
session_start();
if(isset($_SESSION['role'])){
	if($_SESSION['role']==1){
		header('Location: adminpanel.php');
		exit;
	}
	if($_SESSION['role']==3){
		header('Location: profile.php');
		exit;
	}
}else{
	header('Location: ../pages/login.php');
	exit;
}
?>