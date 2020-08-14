<?php 
require_once('include/config.php');
	session_start();
	if(!isset($_SESSION['admin'])){
		header('Location: login.php');
		exit;
	}
	
	
	
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>home</title>
<link href="../css/dashboard.css" rel="stylesheet" type="text/css"/>
<link type="text/css" rel="stylesheet" href="../fonts/css/font-awesome.min.css"/>
<script type="text/javascript" src="../libs/jquery.js"></script>
<script type="text/javascript" src="../js/scripts.js"></script>
<script type="text/javascript">
	function deletepicture(id){
		var check = confirm("Do you realy want to delete this file?Please be sure you have more than 2 picture for slideshow");
		if(check){
			window.location = "deletepicture.php?id="+id;
		}
	}
</script>
<script type="text/javascript">
$(document).ready(function(e) {
   $(".hidden-row").hide();
	$(".show-row").on("click",function(){
		$(this).parent().parent().next().fadeToggle(700);
		});
});

</script>
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
                        <li class="sublinks"><a href="contact-pannel.php">contact</a></li>
                    </ol>
                <li class="links"><a href="users-pannel.php"><i class="fa fa-user"></i>&nbsp;users</a></li>
                <li class="links"><a href="carts.php"><i class="fa fa-shopping-cart"></i>&nbsp;deals</a></li>
            </ul>
        </div>
    </div>
    <div class="right-navigation">
        <div class="top-nav">
        <div class="signout-btn">
        <a href="sign-out.php">Sign Out</a>
        </div>
        <div class="home-btn">
        <a href="../index.php"><i class="fa fa-home fa-2x"></i></a>
        </div>
        </div>
    
        <div class="containers">
        <div class="form-holder">
        <div class="message"><?php echo isset($message) ? "*".$message : ""; ?></div>
     
    </div>
    <div class="table-holder">
	<table width="700" cellpadding="5" cellspacing="5" align="center">
    	<tr class="head-row">
            <th>full name</th>
            <th>username</th>
            <th>phone</th>
            <th>address</th>
            <th>more</th>
        </tr>
        <?php 
        $query = "SELECT * FROM `cart`";
        $carts = mysql_query($query,$connection);
        while($cart = mysql_fetch_array($carts)){
		if($cart["user_id"]>0){
        ?>
        
        <?php
		$query = "SELECT * FROM `users` WHERE `id` = '".$cart["user_id"]."'";
		$users = mysql_query($query,$connection);?>
		<tr class="middle-row">
		<?php while($user = mysql_fetch_array($users)){?>
			<td align="center"><?php echo $user["fname"]." ".$user["lname"]; ?></td>
            <td align="center"><?php echo $user["uname"]; ?></td>
            <td align="center"><?php echo $user["phone"]; ?></td>
            <td align="center"><?php echo $user["address"]; ?></td>
            <td align="center"><span class="show-row" style="cursor:pointer;">more</span></td>
		<?php } ?>
		 </tr>
        <?php
		$query = "SELECT * FROM `product_cart` WHERE `cart_id` = '".$cart["id"]."'";
		$product_carts = mysql_query($query,$connection);
		echo "<tr class='hidden-row inner-row'>";
		while($product_cart = mysql_fetch_array($product_carts)){?>
        
			
                <td align="center"><?php echo "product id=".$product_cart["product_id"]." , "; ?>
                <?php echo "count=".$product_cart["count"]." , "; ?>
                <?php
				$query = "SELECT * FROM `products` WHERE `id` = '".$product_cart["product_id"]."'";
				$product_names = mysql_query($query,$connection);
				$product_name = mysql_fetch_array($product_names);
				 ?>
           <?php echo "food=".$product_name["name"]; ?></td>
				<?php } 
				echo "</tr>";
			?>
		
		
            
            
            
            
        <?php } ?>
		<?php } ?>
        </table>
        </div>
    </div>

    
</div>
</body>

</html>