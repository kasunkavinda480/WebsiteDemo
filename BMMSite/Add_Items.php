<?php


include('AdminFunction.php');
	require_once "config.php";
	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: AdminLogin.php');
	}

if(isset($_POST["submit"])){
    require_once "config.php";
	
	
	// File upload path
	$targetDir = "uploads/";
	$fileName = basename($_FILES["file"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
	
	$allowTypes = array('jpg','png','jpeg','gif','pdf');
	
	$Pname = $_POST['PnameTxt'];
	$Pdes = $_POST['PDesTxt'];
	$brand = $_POST['BrandTxt'];
	$category = $_POST['categories_name'];
	$stock = $_POST['StockTxt'];
	$price = $_POST['PriceTxt'];
	$discount = $_POST['DiscountTxt'];
	$Active = $_POST['Activity'];
	$admin = $_POST['adminNameTxt'];
	$shipcharge = $_POST['shipchargeTxt'];
	$cost = $_POST['CostTxt'];
	if($Pname =='' || $Pdes == '' || $brand =='' || $cost=='' || $category =='' || $shipcharge=='' || $stock =='' || $price =='' || $discount =='' || $Active =='' || $admin =='' || empty($_FILES["file"]["name"]))
	{
		echo "Cant Enter To the dataBase because some Text is missing";
	}else{
		if(in_array($fileType, $allowTypes)){
			if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            	// Insert image file name into database and other Details
            	$insert = $link->query("INSERT into product (PName,Description,Pcategrie,Brand,Stock,Price,PDiscount,Active,AdminName,Shipcharge,Cost,Pimage) VALUES ('$Pname','$Pdes','$category','$brand','$stock','$price','$discount','$Active','$admin','$shipcharge','$cost','".$fileName."')");
				if($insert){
            		echo "File uploaded successfully.";
        		}else{
            		echo "TRY AGAIN.";
        		}
        	}
		}
		
		
	}
	//echo($Active);
	
	
	
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Items</title>
	 <script src="JavaScritpt/AddItems.js"></script>
	<link rel="stylesheet" href="Css/Style.css">
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
<form action="Add_Items.php" method="post" enctype="multipart/form-data">
	<tr>
			<td>Product Name :</td>
	
			<td><input type="text" name="PnameTxt"></td>
	</tr>
	
	<tr>
			<td>Desctiption :</td>
	
			<td><input type="text" name="PDesTxt"></td>
	</tr>
	
	<tr>
			<td>Brand :</td>
	
			<td><input type="text" name="BrandTxt"></td>
	</tr>
	
	<tr>
			<td>Categrie :</td>
	
			<td><?php
		require_once "config.php";
	
		echo "<select name='categories_name'>";
		echo '<option value="">'.'--- Please Select categorie ---'.'</option>';
		$query =  $link->query("SELECT categories_name FROM categories");
		$query_display = $link->query("SELECT * FROM categories");
		while($row=mysqli_fetch_array($query))
		{
    		echo "<option value='".$row['categories_name']."'>".$row['categories_name']
 			.'</option>';
		}
	
	
	
	
		echo '</select>';
	?>
		
		</td>
	</tr>
	
	
	
	<tr>
			<td>Quantity :</td>
	
			<td><input type="text" name="StockTxt"></td>
	</tr>
	<tr>
			<td>Cost :</td>
	
			<td><input type="text" name="CostTxt"></td>
	</tr>
	
	<tr>
			<td>Price :</td>
	
			<td><input type="text" name="PriceTxt"></td>
	</tr>
	
	<tr>
			<td>Discount :</td>
	
			<td><input type="text" name="DiscountTxt"></td>
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
	
			<td><input type="text" name="shipchargeTxt"></td>
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