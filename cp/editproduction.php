<?php 
	require_once('include/config.php');
	session_start();
	if(!isset($_SESSION['admin'])){
		header('Location: login.php');
		exit;
	}
	$query = "SELECT * FROM `products` WHERE id='".$_GET['id']."'";
	$production = mysql_query($query,$connection);
	$product = mysql_fetch_array($production);
	
	if(isset($_POST['submit'])){
		if(isset($_FILES['file']) && !empty($_FILES['file']['name'])){
			if($_FILES['file']['error'] == 0){
				$file_type = array('image/jpeg','image/jpg','image/png');
				if(in_array($_FILES['file']['type'],$file_type)){
					if(($_FILES['file']['size']/1024) < 2000 ){
						$filename = "'".$_FILES['file']['name']."'";
						$name = "'".$_POST['name']."'";
						$price = "'".$_POST['price']."'";
						unlink("../images/img/".$product['image']);
						$query = "UPDATE `products` SET `name`=$name,`image`=$filename,`price`=$price WHERE id='".$_GET['id']."'";
						if(mysql_query($query,$connection)){
							if(file_exists("../images/img/".$_FILES['file']['name'])){
								$message = "this file is already existed";	
							}else{
								move_uploaded_file($_FILES['file']['tmp_name'],"../images/img/".$_FILES['file']['name']);
								header('Location: admin-dashboard.php?page=products');
								exit;
								
							}
						}
					}else{
						$message = 'please check your size of uploaded file';
					}
				}else{
					$message = 'please check your upload file type';		
				}
			}else{
				$message = 'please check your upload file';	
			}
		}else{
			$name = "'".$_POST['name']."'";
			$price = "'".$_POST['price']."'";
			$query = "UPDATE `products` SET `name`=$name,`price`=$price WHERE id='".$_GET['id']."'";
			if(mysql_query($query,$connection)){
				header('Location: editproduction.php?id='.$_GET['id']);
				exit;
			}
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script type="text/javascript" src="../libs/jquery.js"></script>

<style type="text/css">
*{
	margin:0;
	padding:0;
	border:none;
}
.mother{
	position:relative;
	width:400px;
	height:300px;
	margin:0 auto;
	background:#C0C0C0;
	text-align:center;
}
.inputs{
	position:relative;
	width:200px;
	height:25px;
	border-radius:20px;
	padding:0 5px;
	margin:20px auto;
}
#submit{
	position:relative;
	width:100px;
	height:20px;
	margin:20px auto;
	border-radius:10px;
	background:#1A009E;
	color:#FFFFFF;
	cursor:pointer;
}
</style>
</head>

<body>
	<div class="mother">
    <?php echo isset($message) ? $message : ""; ?>
    <form action="editproduction.php?id=<?php echo $_GET['id']; ?>" method="post" name="editproductionform" enctype="multipart/form-data">
    	
        
        <input class="inputs" type="text" required="required" name="name" value="<?php echo $product['name']; ?>" />
       
        <input class="inputs" type="text" required="required" name="price" value="<?php echo $product['price']; ?>" />
        <input type="file" name="file" />
        <br/>
        <input type="submit" name="submit" value="Submit" id="submit"/>
    </form>
    </div>
</body>
</html>