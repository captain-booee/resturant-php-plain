<?php 
require_once('include/config.php');
	session_start();
	if(!isset($_SESSION['admin'])){
		header('Location: login.php');
		exit;
	}
	if(isset($_POST['submit'])){
		if(isset($_FILES['file'])){
			if($_FILES['file']['error'] == 0){
				$file_type = array('image/jpeg','image/jpg','image/png');
				if(in_array($_FILES['file']['type'],$file_type)){
					if(($_FILES['file']['size']/1024) < 3000 ){
						$source = "'".$_FILES['file']['name']."'";
						$query = "INSERT INTO `slideshow` (`source`) VALUES ($source)";
						if(mysql_query($query,$connection)){
							if(file_exists("../images/slideshow/".$_FILES['file']['name'])){
								$message = "this file is already existed";	
							}else{
								move_uploaded_file($_FILES['file']['tmp_name'],"../images/slideshow"."/".$_FILES['file']['name']);
								$message = "your file is uploaded";
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
	$query = "SELECT * FROM `slideshow`";
	$images = mysql_query($query,$connection);
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
   $(".edit-frame").hide();
	
		$(".edit").on("click",function(){
			var edit_id = $(this).data("id").split('#')[1];
			var url = "../cp/editpicture.php?id="+edit_id;
			$(".edit-frame").slideDown(600);
		$('<iframe src="'+url+'" frameborder="0" scrolling="no" id="myFrame"></iframe>').appendTo('.edit-frame');
			}); 
			$(".closebtn").on("click",function(){
			$(this).parent().hide();
			$(this).siblings().remove();
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
                        <a href="#">home</a>
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
     <form action="home.php" method="post" name="slider" enctype="multipart/form-data">

        <input type="file" required="required" name="file" id="upload-botton"/>
        <br />
        <br />
        <input type="submit" name="submit" value="ADD" id="submit"/>
    </form>
    </div>
    <div class="table-holder">
	<table width="700" cellpadding="5" cellspacing="5" align="center">
    	<tr class="head-row">
            <th>image</th>
            <th>Action</th>
        </tr>
        <?php if(mysql_affected_rows() != 0): ?>
        	<?php while($image = mysql_fetch_array($images)): ?>
                <tr class="middle-row">
                    <td align="center";><img width="100" height="100" src="../images/slideshow/<?php echo $image['source']; ?>" /></td>
                    <td align="center">
                    <span style="cursor:pointer;" class="edit" data-id="#<?php echo $image['id']; ?>"><i class="fa fa-edit"></i></span>
                    &nbsp; | &nbsp;
                    <span style="cursor:pointer;" onClick="deletepicture(<?php echo $image['id']; ?>)"><i class="fa fa-trash"></i></span>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php endif; ?>
        </table>
        </div>
    </div>
	
    <div class="edit-frame" style="height:200px;">
    <div class="closebtn">X</div>
    </div>
    
</div>
</body>

</html>