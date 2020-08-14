<?php 
require_once('cp/include/config.php');
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
<link href="css/extra-styles.css" rel="stylesheet" type="text/css"/>
<link type="text/css" rel="stylesheet" href="fonts/css/font-awesome.min.css"/>
</head>

<body>
<div class="mother">
    <div class="slide-holder">
    <div class="brand"><img src="images/brand/logo.png"/></div>
    <div class="number"><i class="fa fa-phone"></i>
	<?php 
	$query = "SELECT * FROM `about`";
	$abouts = mysql_query($query,$connection);
	$about = mysql_fetch_array($abouts);
	echo $about["number"];
	?>
    </div>
    <div class="log-state-box">
    <?php 
	if(isset($_SESSION['name'])){
	echo "<a href='cp/sign-out.php'><i class='fa fa-sign-out'></i></a>"." ";
	echo "Hi".",".$_SESSION['name'];
	}elseif(isset($_SESSION['name'])){
		echo "<a href='cp/sign-out.php'><i class='fa fa-sign-out'></i></a>"." ";
		echo "Hi".",".$_SESSION['god'];
		}else{
		 echo "<i class='fa fa-user'></i>"." ";
		 echo "log-in / sing-up";
		}
	?>
   
    
    </div>
        <div id="hero">
        <?php
			$query = "SELECT * FROM `slideshow` ";
			$slideshow = mysql_query($query,$connection);
			?>
			<?php
			while($row = mysql_fetch_array($slideshow)){
			?>
            <div class="children">
            <img height="100%" width="100%" src="<?php echo "images/slideshow/".$row['source']; ?>">
            </div>
            <?php }?>
         </div>
    </div>
    <div class="navigation-menu-holder">
    	<ul class="btn-holder">
        	<li class="menu-btns"><a href="#"><span class="menu-btn">Home</span></a></li>
          
            <li class="menu-btns"><a href="cp/login.php"><span class="menu-btn">Order!</span></a></li>
            <li class="menu-btns"><a href="pages/about.php"><span class="menu-btn">About</span></a></li>
            <li class="menu-btns"><a href="pages/contact.php"><span class="menu-btn">Contact</span></a></li>
        </ul>
    </div>
    
    <div class="containers-box">
    	<div class="day-food">
        	<div class="head">Today's food!</div>
            <div class="off-percent">40% off</div>
            <div class="details">
             It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </div>
            <div class="buy-now"><a href="#"><span class="btn-color">Buy now!</span></a></div>
        </div>
        
        <div class="how">
        <div class="how-details">
        <i class="fa fa-info-circle" style="font-size:35px;"></i>
        <div class="head" style="top:-20px;">it's easy as 1,2,3</div>
        <div style="position:relative;top:-40px;">
        1.register as a member<br>
        2.log in to your account<br>
        3.choose what you want<br>
        And it's there at the door:)
        </div>
        <div class="buy-now" style="top:-20px;"><a href="#"><span class="btn-color">Sign Up</span></a></div>
        </div>
        
        <div class="stores">
        <i class="fa fa-cart-arrow-down" style="font-size:35px;"></i>
        <div class="head" style="top:-20px;">services</div>
        <div style="position:relative;top:-40px;">
        deliver to your home...<br>
        reserve your table...<br>
        tell your ideas...<br>
        and help us prove!
        </div>
        <div class="buy-now" style="top:-20px;"><a href="#"><span class="btn-color">Log in</span></a></div>
        </div>
        
        </div>
        
        
        <div class="categuries">
        	<div class="categuries-lists">
                <div class="cats">
                <img class="cats-pics" src="images/cuisines/brazil.jpg"/>
                <div class="cats-details">brazilian</div>
                </div>
                <div class="cats">
                <img class="cats-pics" src="images/cuisines/italian.jpg"/>
                <div class="cats-details">italian</div>
                </div>
                <div class="cats">
                <img class="cats-pics" src="images/cuisines/japanese.jpg"/>
                <div class="cats-details">japanese</div>
                </div>
                <div class="cats">
                <img class="cats-pics" src="images/cuisines/mexiacan.jpg"/>
                <div class="cats-details">mexican</div>
                </div>
                <div class="cats">
                <img class="cats-pics" src="images/cuisines/iranian.jpg"/>
                <div class="cats-details">iranian</div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="footer-container">
    	<div class="bottom-brand">
        My Resturant
        </div>
    	<div class="socials-container">
        	<i class="fa fa-4x fa-facebook-square"></i>
            <i class="fa fa-4x fa-twitter-square"></i>
            <i class="fa fa-4x fa-instagram"></i>
            <i class="fa fa-4x fa-linkedin-square"></i>
            <i class="fa fa-4x fa-google-plus-square"></i>
        </div>
        
    	<div class="site-links">
        	www.resturant.com<br><br>
        	Home | Menu | Gallary | Register | About us | Contact us
        </div>
        
        <div class="copyright">
        	All Rights Reserved | &copy;2015 by Captain Booee
        </div>
    </div>
</div>


</body>
<script type="text/javascript" src="libs/jquery.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
</html>