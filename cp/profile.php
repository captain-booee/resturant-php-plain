<?php 
require_once('include/config.php');
session_start();
if(!isset($_SESSION['uid'])){
		header('Location: login.php');
		exit;
}

if(isset($_POST["submit"])){
$query = "UPDATE `users` SET `email`='".$_POST["email"]."',`phone`='".$_POST["phone"]."',`address`='".$_POST["address"]."' WHERE `id` = '".$_SESSION['uid']."'";
$users = mysql_query($query,$connection);
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>profile</title>
<link href="../css/profile-styles.css" rel="stylesheet" type="text/css"/>

</head>

<body>

<div class="mother">

<div class="navigation-menu-holder-fixed">
    	<ul class="btn-holder">
        	<li class="menu-btns"><a href="../index.php"><span class="menu-btn">Home</span></a></li>
          
            <li class="menu-btns"><a href="login.php"><span class="menu-btn">Order!</span></a></li>
            <li class="menu-btns"><a href="../pages/about.php"><span class="menu-btn">About</span></a></li>
            <li class="menu-btns"><a href="../pages/contact.php"><span class="menu-btn">Contact</span></a></li>
        </ul>
    </div>
	
    <div class="updateform">
    <div class="head-update">
    Update your Info's...
    </div>
    	<form name="updateuser" method="post" action="profile.php">
        <div>
        <span>phone:</span>
        <input class="inputs" type="text" name="phone"/>
        </div>
        <div>
        <span>Email:</span>
        <input class="inputs" type="email" name="email"/>
        </div>
        <div>
        <span>address:</span>
        <input class="address" type="text" name="address"/>
        </div>
        <div>
        <input id="submit" type="submit" value="submit" name="submit"/>
        </div>
        </form>
        
    </div>
    <div class="left-nav">
    <div class="littles">
    <a href="sign-out.php"><span style="color:#FFFFFF;font-weight:bold;">sign out</span></a>
    </div>
    <div class="littles">
    <a href="cart-page.php"><span style="color:#FFFFFF;font-weight:bold;">go buy</span></a>
    </div>
    </div>

</div>

</body>
</html>