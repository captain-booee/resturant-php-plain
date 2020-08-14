<?php 
	require_once('include/config.php');
	session_start();
	if(!isset($_SESSION['admin'])){
		header('Location: login.php');
		exit;
	}
	$query = "SELECT * FROM `slideshow` WHERE id='".$_GET['id']."'";
	$pictures = mysql_query($query,$connection);
	$images = mysql_fetch_array($pictures);
	
	if(isset($_POST['submit'])){
		if(isset($_FILES['file']) && !empty($_FILES['file']['name'])){
			if($_FILES['file']['error'] == 0){
				$file_type = array('image/jpeg','image/jpg','image/png');
				if(in_array($_FILES['file']['type'],$file_type)){
					if(($_FILES['file']['size']/1024) < 3000 ){
						$source = "'".$_FILES['file']['name']."'";
						unlink("../images/slideshow/".$images['source']);
						$query = "UPDATE `slideshow` SET `source`=$source WHERE id='".$_GET['id']."'";
						if(mysql_query($query,$connection)){
							if(file_exists("../images/slideshow/".$_FILES['file']['name'])){
								$message = "this file is already existed";	
							}else{
								move_uploaded_file($_FILES['file']['tmp_name'],"../images/slideshow/".$_FILES['file']['name']);
								
								$message = "your file has seccessfuly uploaded";
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
		}		
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>editpicture</title>
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
	height:200px;
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
.message{
	position:relative;
	margin:0 auto;
	width:auto;
	height:20px;
	color:#FF0000;
}
</style>

</head>

<body>
	<div class="mother">
    <?php if (isset($message)){ ?>
	<div class="message">
	<?php echo $message; ?>
    </div>
    <?php }else{ ?>
    <form action="editpicture.php?id=<?php echo $_GET['id']; ?>" method="post" name="editpictureform" enctype="multipart/form-data">
    	
        
        <input type="file" name="file" />
        <br/>
        <input type="submit" name="submit" value="Submit" id="submit"/>
    </form>
    <?php } ?>
    </div>
</body>
<script type="text/javascript">
$(document).ready(function(e) {
    $("#submit").on("click",function(){
		location.reload();
		});
});
</script>
</html>