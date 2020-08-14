<?php 
require_once('include/config.php');
	session_start();
	if(!isset($_SESSION['admin'])){
		header("location: login.php");
		exit;
		}
		
		
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>cpanel</title>
<link href="../css/dashboard.css" rel="stylesheet" type="text/css"/>
<link type="text/css" rel="stylesheet" href="../fonts/css/font-awesome.min.css"/>
<script type="text/javascript" src="../libs/jquery.js"></script>
<script type="text/javascript" src="../js/scripts.js"></script>


</head>

<body>
<div class="mother">
    <div class="left-navigation">
        <div class="headers">
        <img src="../images/admin/admin.png" width="200" height="150"/>
        </div>
        <div class="dashboard-links-header">
        	dashboard menu
        </div>
        <div class="dashboard-links">
        	<ul>
            	<li class="links"><i class="fa fa-pencil"></i>&nbsp;pages</li>
                	<ol>
                    	<li class="sublinks">
                        <a href="home.php">home</a>
                        </li>
                        <li class="sublinks"><a href="products.php">products</a></li>
                        <li class="sublinks"><a href="about-edit.php">about</a></li>
                        <li class="sublinks"><a href="#">contact</a></li>
                    </ol>
                <li class="links"><a href="users-pannel.php"><i class="fa fa-user"></i>&nbsp;users</a></li>
                <li class="links"><a href="carts.php"><i class="fa fa-shopping-cart"></i>&nbsp;deals</a></li>
            </ul>
        </div>
    </div>
    <div class="right-navigation">
    <div class="welcome-message">
    this is admin pannel.<br/>
    Welcome
    </div>
    </div>

    
</div>
</body>

</html>
	