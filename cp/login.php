<?php
	require_once('include/config.php');
	session_start();
	if(isset($_SESSION['admin'])){
		header('Location: admin-dashboard.php');
		exit;
	}
	if(isset($_SESSION['uid'])){
		header('Location: profile.php');
		exit;
	}
	
	
	if(isset($_POST['submit'])){
		$username = $_POST['uname'];
		$pass = $_POST['pass'];
		if(!empty($pass) && !empty($username)){
			$query = "SELECT * FROM `users` WHERE uname = '".$username."'";
			$users = mysql_query($query,$connection);
			if(!empty($users)){
				if($user = mysql_fetch_array($users)){
					$admins = array(1,2);
					$publicusers = 3;
					if($user['pass'] == $pass && $user['uname'] == $username && in_array($user['role_id'],$admins)){
						$_SESSION['name'] = $user['fname'];
						$_SESSION['admin'] = $user['uname'];
							if(isset($_SESSION['admin'])){
								header('Location: admin-dashboard.php');
								exit;
							}
					}
					if($user['pass'] == $pass && $user['uname'] == $username && $user['role_id']==$publicusers){
						$_SESSION['name'] = $user['fname'];
						$_SESSION['role'] = $user['role_id'];
						$_SESSION['uid'] = $user['id'];
						if(isset($_SESSION['uid'])){
							header('Location: profile.php');
							exit;
						}
					}
				}
			}else{
				$message = 'invalid username Or password';
			}
		}else{
			$message = 'please set valid fields';
		}
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log in</title>
<link href="../css/login-styles.css" rel="stylesheet" type="text/css"/>
</head>

<body>



<div class="navigation-menu-holder-fixed">
    	<ul class="btn-holder">
        	<li class="menu-btns"><a href="../index.php"><span class="menu-btn">Home</span></a></li>
          
            <li class="menu-btns"><a href="login.php"><span class="menu-btn">Order!</span></a></li>
            <li class="menu-btns"><a href="../pages/about.php"><span class="menu-btn">About</span></a></li>
            <li class="menu-btns"><a href="../pages/contact-pannel.php"><span class="menu-btn">Contact</span></a></li>
        </ul>
    </div>
<div class="mother">
	<div class="form-holder">
    <div class="log-in-text">Log in</div>
    	<form action="login.php" method="post" name="loginform">
        <label>username:</label>
        <input type="text" name="uname" id="uname"/></br></br>
        <label>password:</label>
        <input type="password" name="pass" id="pass"/>
        <input type="submit" value="submit" name="submit" id="submit"/>
        </form>
        <br/>
        <a href="../pages/register.php">go for register!</a>
    </div>
</div>

</body>
</html>