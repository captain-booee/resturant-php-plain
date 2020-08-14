<?php 
require_once('include/config.php');
	session_start();
	if(!isset($_SESSION['admin'])){
		header('Location: login.php');
		exit;
	}
	$query = "SELECT * FROM `about`";
	$abouts = mysql_query($query,$connection);
	$about = mysql_fetch_array($abouts);
	
	if(isset($_POST["submit"])){
		mysql_query("UPDATE `about` SET `content`='".$_POST["content"]."',`number`='".$_POST["number"]."',`address`='".$_POST["address"]."'");
		header("location: about-edit.php");
		
	}
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>about</title>
<link href="../css/dashboard.css" rel="stylesheet" type="text/css"/>
<link type="text/css" rel="stylesheet" href="../fonts/css/font-awesome.min.css"/>
<script type="text/javascript" src="../libs/jquery.js"></script>
<script type="text/javascript" src="../js/scripts.js"></script>

<script type="text/javascript">
$(window).ready(function(e) {
    $("#search").on("click",function(){
		location.reload();
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
                        <li class="sublinks"><a href="#">about</a></li>
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
     <form action="about-edit.php" method="post" name="aboutform">
        <input type="text" name="content" required="required" placeholder="content" class="inputs" style="width:500px;height:150px;"/>
        <input type="text" name="address"required="required" placeholder="address" class="inputs" style="width:200px;height:100px;"/>
        <input type="text" name="number" required="required" placeholder="number" class="inputs"/>
        <input type="submit" name="submit" value="set" id="search"/>
    </form>
    </div>

    </div>
    <div class="table-holder" style="top:-400px;">
	<table width="700" cellpadding="5" cellspacing="5" align="center">
    
    <tr class="head-row">
    	<th>content</th>
        <th>address</th>
        <th>number</th>
    </tr>
    <tr class="middle-row">
    	<td><?php echo $about["content"]; ?></td>
        <td><?php echo $about["address"]; ?></td>
        <td><?php echo $about["number"]; ?></td>
    </tr>
    </table>
    </div>
    </div>
</div>
</body>

</html>