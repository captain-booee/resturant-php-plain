<?php 

require_once('../cp/include/config.php');
session_start();

if(isset($_POST["submit"])){
	$query = "INSERT INTO `contact`(`name`, `email`, `comment`) VALUES ('".$_POST["name"]."','".$_POST["email"]."','".$_POST["comment"]."')";
	
	if(mysql_query($query,$connection)){
	$message = "done!";
	}
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>contact</title>
<link href="../css/about-contact.css" rel="stylesheet" type="text/css"/>

</head>

<body>

<div class="mother">

<div class="navigation-menu-holder-fixed">
    	<ul class="btn-holder">
        	<li class="menu-btns"><a href="../index.php"><span class="menu-btn">Home</span></a></li>
          
            <li class="menu-btns"><a href="../cp/login.php"><span class="menu-btn">Order!</span></a></li>
            <li class="menu-btns"><a href="about.php"><span class="menu-btn">About</span></a></li>
            <li class="menu-btns"><a href="#"><span class="menu-btn">Contact</span></a></li>
        </ul>
    </div>
	
    <div class="contact">
    <div class="message-holder">
    <?php
	echo isset($message) ? $message : "";
	?>
    </div>
    	<form name="contactform" method="post" action="contact.php">
        <div>
        <span>enter your name:</span>
        <input class="inputs" type="text" required="required" name="name"/>
        </div>
        <div>
        <span>Email:</span>
        <input class="inputs" type="email" required="required" name="email"/>
        </div>
        <div>
        <span>comment:</span>
        <input class="comment" type="text" required="required" name="comment"/>
        </div>
        <input id="submit" type="submit" value="submit" name="submit"/>
        <input type="hidden" name="ips" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" /> 
        </form>
    </div>
    

</div>

</body>
</html>