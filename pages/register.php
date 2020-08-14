<?php require_once("../cp/include/config.php");
	 if(isset($_POST['submit'])){
		if($_POST['pass'] == $_POST['verifypass']){
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$uname = $_POST['uname'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$pass = $_POST['pass'];
			$query = "INSERT INTO `users` (`fname`, `lname`, `email`, `uname`, `pass`, `phone`, `address`) VALUES ('".$fname."','".$lname."','".$email."','".$uname."','".$pass."','".$phone."','".$address."')";
			if(mysql_query($query,$connection)){
				header('Location: ../cp/profile.php');
				exit;
			}else{
				$message = "Your email is already existed";
			}
		}else{
			$message = "please check your password";	
		}
	 }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>register</title>
<link href="../css/register.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div class="mother">
<div class="navigation-menu-holder-fixed">
    	<ul class="btn-holder">
        	<li class="menu-btns"><a href="../index.php"><span class="menu-btn">Home</span></a></li>
          
            <li class="menu-btns"><a href="../cp/login.php"><span class="menu-btn">Order!</span></a></li>
            <li class="menu-btns"><a href="about.php"><span class="menu-btn">About</span></a></li>
            <li class="menu-btns"><a href="contact.php"><span class="menu-btn">Contact</span></a></li>
        </ul>
    </div>
    
    <div class="formholder">
    
<form action="register.php" method="post" name="registerform">
    <div class="inputs-holder"><input class="inputs" class="inputs" type="text" required="required" name="fname" placeholder="first name" /></div>
    <div class="inputs-holder"><input class="inputs" type="text" required="required" name="lname" placeholder="last name" /></div>
    <div class="inputs-holder"><input class="inputs" type="email" required="required" name="email" placeholder="email" /></div>
    <div class="inputs-holder"><input class="inputs" type="text" required="required" name="uname" placeholder="username" /></div>
    <div class="inputs-holder"><input class="inputs" type="password" required="required" name="pass" placeholder="password" /></div>
    <div class="inputs-holder"><input class="inputs" type="password" required="required" name="verifypass" placeholder="verify password" /></div>
    <div class="inputs-holder"><input class="inputs" type="text" required="required" name="address" placeholder="address" /></div>
    <div class="inputs-holder"><input class="inputs" type="text" required="required" name="phone" placeholder="phone" /></div>
    <div class="submit"><input id="submit" class="inputs" type="submit" name="submit" value="Submit" /></div>
    
</form>
<div class="register-text">
    	<?php echo isset($message) ? $message : "join us" ?>
</div>
</div>

</div>
</body>
</html>