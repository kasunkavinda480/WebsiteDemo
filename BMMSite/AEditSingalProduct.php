<?php
include('AdminFunction.php');
	require_once "config.php";
	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: AdminLogin.php');
	}

$Orderid= $_GET['Pid'];


$query = $link->query("SELECT * FROM product WHERE Pid ='$Orderid' ");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["Pimage"];
		
		$pid = $row['Pid'];
        $pname = $row['PName'];
        $des = $row['Description'];
       
		$brand = $row['Brand'];
		$cost = $row['Cost'];
		$Stock = $row['Stock'];
		$price = $row['Price'];
		$rate = $row['PRate'];
		$discount = $row['PDiscount'];
		$active = $row['Active'];
		$shipAmt = $row['Shipcharge'];
		$adminName = $row['AdminName'];
		
		
	}}

if(isset($_POST["submit"])){
	
	$EPname = $_POST['PnameTxt'];
	$EPdes = $_POST['PDesTxt'];
	$Ebrand = $_POST['BrandTxt'];
	
	$Estock = $_POST['StockTxt'];
	$Eprice = $_POST['PriceTxt'];
	$Ediscount = $_POST['DiscountTxt'];
	$EActive = $_POST['Activity'];
	$Eadmin = $_POST['adminNameTxt'];
	$Eshipcharge = $_POST['shipchargeTxt'];
	$Ecost = $_POST['CostTxt'];
	
	
	
	$Epid = $_POST['Pidttxt'];	
		
	$pdataTime = date("Y-m-d");
		$update = $link->query("update product set PName='".$EPname."',Description='".$EPdes."',Brand='".$Ebrand."',Cost='".$Ecost."',Stock='".$Estock."',Price='".$Eprice."',PDiscount='".$Ediscount."',Active='".$EActive."',Shipcharge='".$Eshipcharge."' where Pid='".$Epid."'");
}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit product</title>
	
	<link rel="stylesheet" href="Css/Style.css">
	<link rel="stylesheet" href="Css/bootstrap.min.css">
</head>

<body>
	
	
	
	
	
			
	<div id="margin">
		
		
		<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
			

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="CustomerOrderManagemant.php?logout='1'" style="color: red;">logout</a>
						
					</small>

				<?php endif ?>
			</div>
		</div>



	</div>
		
		
		
		<div id="navslide">
		<ul class="topnav">
  <li><a class="active" href="AdminRegistor.php">Admin Register</a></li>
  <li><a href="Add_Items.php">Items_add</a></li>
  <li><a href="AdminAcountManage.php">Admin Profit</a></li>
			<li><a href="AeitItems.php">Edit Items</a></li>
	<li><a href="CustomerOrderManagemant.php">Customer OrderManage</a></li>
  <li class="right"><a href="login.php">Login</a></li>
</ul>
		</div>
		<table border="0">
			<thead>
			<tr>
				<th></th>
				<th></th>
				
				
				</tr>
			
			</thead>
			<tbody>
<form action="AEditSingalProduct.php" method="post" enctype="multipart/form-data">
	<tr>
			<td>Product Name :</td>
	<input type="hidden" name="Pidttxt" value="<?php echo "$pid"; ?>">
			<td><input type="text" name="PnameTxt" value="<?php echo "$pname"; ?>"></td>
	</tr>
	
	<tr>
			<td>Desctiption :</td>
	
			<td><input type="text" name="PDesTxt" value="<?php echo "$des"; ?>"></td>
	</tr>
	
	<tr>
			<td>Brand :</td>
	
			<td><input type="text" name="BrandTxt" value="<?php echo "$brand"; ?>"></td>
	</tr>
	
	
	
	
	<tr>
			<td>Quantity :</td>
	
			<td><input type="text" name="StockTxt" value="<?php echo "$Stock"; ?>"></td>
	</tr>
	<tr>
			<td>Cost :</td>
	
			<td><input type="text" name="CostTxt" value="<?php echo "$cost"; ?>"></td>
	</tr>
	
	<tr>
			<td>Price :</td>
	
			<td><input type="text" name="PriceTxt" value="<?php echo "$price"; ?>"></td>
	</tr>
	
	<tr>
			<td>Discount :</td>
	
			<td><input type="text" name="DiscountTxt" value="<?php echo "$discount"; ?>"></td>
	</tr>
	
	<tr>
			<td>Avalability :</td>
	
			<td>
		<select name="Activity">
		<option value="In Stock">In Stock</option>
		<option value="Out of stock">Out of Stock</option>
	
	</select>
		
		</td>
	</tr>
	<tr>
			<td>Upload Image</td>
	
			<td><input type="file" name="file"></td>
	</tr>
	<tr>
			<td>Shipping Charge :</td>
	
			<td><input type="text" name="shipchargeTxt" value="<?php echo "$shipAmt"; ?>"></td>
	</tr>
	
	<tr>
			<td></td>
	
			<td></td>
	</tr>
	<tr>
			<td></td>
	
			<td><input type="submit" name="submit" value="Registor"></td>
	</tr>
	
	<input type="hidden" name="adminNameTxt" value="<?php echo $_SESSION['user']['username']; ?>">
		
    	
</form>	
				</tbody>
		</table>
	</div>	
	
	
	
</body>
</html>