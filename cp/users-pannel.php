<?php 
require_once('include/config.php');
	session_start();
	if(!isset($_SESSION['admin'])){
		header('Location: login.php');
		exit;
	}
	$query = "SELECT * FROM `users`";
	$users = mysql_query($query,$connection);
	

	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>users</title>
<link href="../css/dashboard.css" rel="stylesheet" type="text/css"/>
<link type="text/css" rel="stylesheet" href="../fonts/css/font-awesome.min.css"/>
<script type="text/javascript" src="../libs/jquery.js"></script>
<script type="text/javascript" src="../js/scripts.js"></script>
<script type="text/javascript">
function deleteuser(id){
		var check = confirm("are you sure?");
		if(check){
			window.location = "usersdelete.php?id="+id;
		}
	}
</script>
<script type="text/javascript">
$(document).ready(function(e) {
    $(".hidden-row").hide();
	$(".show-row").on("click",function(){
		$(this).parent().parent().next().fadeToggle();
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
     <form action="users-pannel.php" method="post" name="searchform">
        <input type="text" required="required" name="search" placeholder="search" class="inputs"/>
        
        <input type="submit" name="submit" value="search" id="search"/>
    </form>
    </div>
    <div class="search-results">
    <?php 
	if(isset($_POST["submit"])){
	$search_obj = array(
			"search" => $_POST['search']
		);
	$query = "SELECT * FROM `users`";
	$users_search = mysql_query($query,$connection);
		while($users_info = mysql_fetch_array($users_search)){
		foreach($users_info as $key => $value){
			if($search_obj['search']==$value): ?>
                
                <table width="700" cellpadding="5" cellspacing="5" align="center">
    	<tr class="head-row">
        	<th>fname</th>
            <th>lname</th>
            <th>user name</th>
            <th>more</th>
            <th>delete</th>
        </tr>
                <tr class="middle-row">
                    <td align="center"><?php echo $users_info['fname']; ?></td>
                    <td align="center"><?php echo $users_info['lname']; ?></td>
                    <td align="center"><?php echo $users_info['uname']; ?></td>
                    <td align="center"><span class="show-row">more</span></td>
                    <td align="center">
                    <span style="cursor:pointer;" onClick="deleteuser(<?php echo $users_info['id']; ?>)"><i class="fa fa-trash"></i></span>
                    </td>
                </tr>
                
                <tr class="hidden-row inner-row">
                	<td align="center"><?php echo $users_info['email']; ?></td>
                    <td align="center"><?php echo $users_info['phone']; ?></td>
                    <td colspan="3"><?php echo $users_info['address']; ?></td>
                </tr>
    </table>
				<?php 
				break;
				endif; ?>
                <?php 
				if($search_obj['search']!=$value){
					$message = "this username has not exist.";
				}
			}
		}
		
	}

	 ?>
    </div>
    <div class="table-holder">
	<table width="700" cellpadding="5" cellspacing="5" align="center" id="maintable">
    	<tr class="head-row">
        	<th>fname</th>
            <th>lname</th>
            <th>user name</th>
            <th>more</th>
            <th>delete</th>
        </tr>
        <?php if(mysql_affected_rows() != 0): ?>
        	<?php while($user = mysql_fetch_array($users)): ?>
            <?php if($user['role_id']==1){ continue; } ?>
                <tr class="middle-row">
                    <td align="center"><?php echo $user['fname']; ?></td>
                    <td align="center"><?php echo $user['lname']; ?></td>
                    <td align="center"><?php echo $user['uname']; ?></td>
                    <td align="center"><span class="show-row" style="cursor:pointer;">more</span></td>
                    <td align="center">
                    <span style="cursor:pointer;" onClick="deleteuser(<?php echo $user['id']; ?>)"><i class="fa fa-trash"></i></span>
                    </td>
                </tr>
                
                <tr class="hidden-row inner-row">
        	
                	<td align="center"><?php echo $user['email']; ?></td>
                    <td align="center"><?php echo $user['phone']; ?></td>
                    <td colspan="3"><?php echo $user['address']; ?></td>
                </tr>
            <?php endwhile; ?>
        <?php endif; ?>
    </table>
    
    </div>
    </div>
</div>
</body>

</html>