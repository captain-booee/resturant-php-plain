<?php 
require_once('include/config.php');
	session_start();
	if(!isset($_SESSION['admin'])){
		header('Location: login.php');
		exit;
	}
	$query = "SELECT * FROM `contact`";
	$contacts = mysql_query($query,$connection);
	
	
	
	
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
function deleteuser(id){
		var check = confirm("are you sure?");
		if(check){
			window.location = "commentdelete.php?id="+id;
		}
	}
</script>
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
  
    </div>

    </div>
    <div class="table-holder" style="top:-400px;">
	<table width="700" cellpadding="5" cellspacing="5" align="center">
    
    <tr class="head-row">
    	<th>name</th>
        <th>email</th>
        <th>comment</th>
        <th>delete</th>
    </tr>
    <?php while($contact = mysql_fetch_array($contacts)): ?>
    <tr class="middle-row">
    	<td align="center"><?php echo $contact["name"]; ?></td>
        <td align="center"><?php echo $contact["email"]; ?></td>
        <td><?php echo $contact["comment"]; ?></td>
        <td align="center"><span style="cursor:pointer;" onClick="deleteuser(<?php echo $contact['id']; ?>)"><i class="fa fa-trash"></i></span></td>
    </tr>
    <?php endwhile; ?>
    </table>
    </div>
    </div>
</div>
</body>

</html>