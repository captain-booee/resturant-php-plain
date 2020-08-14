<?php 
	defined("SERVER") ? "" : define("SERVER","localhost");
	defined("UNAME") ? "" : define("UNAME","root");
	defined("PASS") ? "" : define("PASS","");
	defined("DB") ? "" : define("DB","resturant");
	
	$connection = mysql_connect(SERVER,UNAME,PASS) or die("SERVER");
	$db = mysql_select_db(DB,$connection) or die("DB");
	
?>