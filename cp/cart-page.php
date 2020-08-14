<?php
require_once('include/config.php');
session_start();
	if(!isset($_SESSION['uid'])){
		header('Location: login.php');
		exit;
	}
	$user_id = $_SESSION["uid"];
	if(isset($user_id)){
	$cart_id = mysql_fetch_array(mysql_query("SELECT `id`,`user_id` FROM `cart` WHERE `user_id` = '".$user_id."'",$connection));
	if(empty($cart_id['id'])){
	mysql_query("INSERT INTO `cart`(`user_id`) VALUES ('".$user_id."')",$connection);
	}
	if(isset($_POST['submit'])){
	$product_id = $_POST['productid'];
	$count = $_POST['count'];
	
	if(!empty($cart_id['id'])){
	mysql_query("INSERT INTO `product_cart`(`product_id`,`cart_id`,`count`) VALUES ('".$product_id."','".$cart_id['id']."','".$count."')",$connection);
	}
	}
	}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cart</title>
</head>	
<link href="../css/cart-page-styles.css" rel="stylesheet" type="text/css"/>
<link type="text/css" rel="stylesheet" href="../fonts/css/font-awesome.min.css"/>
<body>

<div class="mother">
<div class="navigation">
<div class="my-cart"><i class="fa fa-shopping-cart"></i></div>
<div class="goback"><a href="profile.php"><span style="color:#FFFFFF;"><i class="fa fa-backward"></i></span></a></div>
<div class="cart-items">
<table width="100%" border="1">
<tr>
	<th>food</th>
    <th>count</th>
    <th>price</th>
</tr>
<?php
$total_price =0;
$results = mysql_query("SELECT * FROM product_cart WHERE `cart_id`='".$cart_id["id"]."'");

while ($rows = mysql_fetch_array($results)) {
	$product_name = mysql_fetch_array(mysql_query("SELECT `name`,`price` FROM `products` WHERE `id` = '".$rows['product_id']."'",$connection));
    echo '<tr>';
	echo '<td>' . $product_name["name"] . '</td>';
	echo '<td>' . $rows["count"] . '</td>';
	echo '<td>' . $product_name["price"] . '</td>';
    echo '</tr>';
	$total_price = $product_name["price"]*$rows["count"] + $total_price;
}
	echo '<tr>';
	echo '<td colspan="3" align="center">'."TOTAL: ".$total_price.'</td>';
	echo '</tr>';
?>
</table>
</div>
</div>

<?php
$sql = "SELECT * FROM `products` ";
$query = mysql_query($sql,$connection);
?>
<div class="products-holder">
<?php
while($row = mysql_fetch_array($query)){
?>

<div class="products-blocks" style="background:url(<?php echo "../images/img/".$row['image']; ?>)">
<form action="cart-page.php" method="post">
    <input type="hidden" name="productid" value="<?php echo $row['id']; ?>"/>
    <input type="text" name="count" value="1" class="counter"/>
    <input value="add to cart" type="submit" name="submit" class="add-to-cart"/>
    <div class="product-price">
    <div><?php echo $row['name']; ?></div>
    <div><?php echo $row['price']; ?></div>
    </div>
</form>
</div>
<?php
}
?>

</div>
</body>
</html>