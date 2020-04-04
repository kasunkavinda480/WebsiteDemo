<?php
include('AdminFunction.php');
	require_once "config.php";
	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: AdminLogin.php');
	}

$Orderid= $_GET['Orderid'];
	
	$OrderId = $link->query("SELECT * FROM orders WHERE orderId Like '%".$Orderid."%'");
if($OrderId->num_rows > 0){
	while($row = $OrderId->fetch_assoc()){
		$imageURL = $row["image"];
		$Oid = $row['orderId'];
		$clName = $row['ClientName'];
		$proid = $row['productId'];
		$pname = $row['ProductName'];
		$price = $row['Price'];
		$quantity = $row['quantity'];
		$discount = $row['Discount'];
		$shipAmt = $row['ShippingCharge'];
		$amount = $row['Amount'];		
		$Disamt = $row['DisAmt'];
		$grandTot = $row['GrandTot'];
		
		$adminName = $row['AdminId'];
		$cusID = $row['clientNo'];
		$pid = $row['productId'];
		
	}
}


$queryb = $link->query("SELECT * FROM shippingdetails WHERE CName ='$clName' ");
	if($queryb->num_rows > 0){
		while($row = $queryb->fetch_assoc()){
			//$cusID = $row['id'];
			//$clName = $row['CName'];
			$telno = $row['TelNo'];
			$address = $row['address'];
			$zipcode = $row['zipcode'];
			$city  = $row['City'];
		}
	}
$queryc = $link->query("SELECT * FROM product WHERE Pid ='$proid' ");
	if($queryc->num_rows > 0){
		while($row = $queryc->fetch_assoc()){
			$costt = $row['Cost'];
			
			
		}
	}

	if(isset($_POST["submit"])){
		$Oids = $_POST['OrderId'];
		$orderState = $_POST['orsateTXt'];
		
		
		$padmin = $_POST['AdminNameTxt'];
		$pcname = $_POST['clientNameTxt'];
		$pcost = $_POST['Costtxt'];
		$pselProce = $_POST['PropriceTxt'];
		$pqty = $_POST['quantityTxt'];
		$Pamount = $_POST['AmountTxt'];
		$pproift = $_POST['ProfitTxt'];
		$pvat = $_POST['VatTxt'];
		$padminProfit = $_POST['AdminProfit'];
		
		$pdataTime = date("Y-m-d");
		$update = $link->query("update orders set OrderState='".$orderState."' where orderId='".$Oids."'");
		
		$insert = $link->query("INSERT into profitmanage (oid,AdminName,CusName,cost,sellPrice,qty,Amount,Profit,vat,AdminProfit,ConfirmDate) VALUES ('$Oids','$padmin','$pcname','$pcost','$pselProce','$pqty','$Pamount','$pproift','$pvat','$padminProfit','$pdataTime')");
		
	}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Customer Order View</title>
	<link rel="stylesheet" href="Css/ItemStyle.css">
	<link rel="stylesheet" href="Css/bootstrap.min.css">
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
		
		
		<div>
			
		<ul class="topnav">
  <li><a class="active" href="AdminRegistor.php">Admin Register</a></li>
  <li><a href="Add_Items.php">Items_add</a></li>
  <li><a href="AdminAcountManage.php">Admin Profit</a></li>
			<li><a href="AeitItems.php">Edit Items</a></li>
	<li><a href="CustomerOrderManagemant.php">Customer OrderManage</a></li>
  <li class="right"><a href="login.php">Login</a></li>
</ul>	
			
		
		<table border="0">
			<thead>
			<tr>
				<th >  </th>
				<th >Details</th>
				<th ></th>
				</tr>
			</thead>
			<tbody>
		<form action="CustometOrderView.php" method="post" enctype="multipart/form-data">
			<tr>
				<td>  Order Id</td>
				<td><input type="text" name="OrderId" value="<?php echo "$Oid"; ?>" readonly></td>
				<td></td>
			
			</tr>
		
		<tr>
				<td>  Name</td>
				<td><input type="text" name="clientNameTxt" value="<?php echo "$clName"; ?>" readonly></td>
				<td></td>
			
			</tr>
		<tr>
				<td>  Product Name</td>
				<td><input type="text" name="ProNameTxt" value="<?php echo "$pname"; ?>" readonly></td>
				<td></td>
			
			</tr>
		
		<tr>
				<td>  Price</td>
				<td><input type="text" name="PropriceTxt" value="<?php echo "$price"; ?>" id="priceTXt" readonly></td>
				<td></td>
			
			</tr>
		
		<tr>
				<td>  Quantity</td>
				<td><input type="text" name="quantityTxt" id="quantityTxt" value="<?php echo "$quantity"; ?>" readonly></td>
				<td></td>
			
			</tr>
		
		<tr>
				<td>  Discount</td>
				<td><input type="text" name="Discount" value="<?php echo "$discount"; ?>" id="discountTXt" readonly></td>
				<td></td>
			
			</tr>
		
		<tr>
				<td>  Discount Amount</td>
				<td><input type="text" name="DisAmtTXt" value="<?php echo "$Disamt"; ?>" id="disamtTxt" readonly></td>
				<td></td>
			
			</tr>
		
		<tr>
				<td>  Amount</td>
				<td><input type="text" name="AmountTxt" value="<?php echo "$amount"; ?>" id="tot_amount" readonly></td>
				<td></td>
			
			</tr>
		
		<tr>
				<td></td>
				<td>  Shipping Details</td>
				<td></td>
			
			</tr>
		
		
		<tr>
				<td>  shipping Charge</td>
				<td><input type="text" name="shippingTxt" value="<?php echo "$shipAmt"; ?>" id="shipSharge" readonly></td>
				<td></td>
			
			</tr>
		
		<tr>
				<td>  Address</td>
				<td><input type="text" name="AddressTxt" value="<?php echo "$address"; ?>"></td>
				<td></td>
			
			</tr>
		
		<tr>
				<td>  City</td>
				<td><input type="text" name="CityTxt" value="<?php echo "$city"; ?>"></td>
				<td></td>
			
			</tr>
		
		<tr> 
				<td>  ZipCode</td>
				<td><input type="text" name="ZipCodeTxt" value="<?php echo "$zipcode"; ?>"></td>
				<td></td>
			
			</tr>
		
		<tr>
				<td>Tel No</td>
				<td><input type="text" name="TelNoTxt" value="<?php echo "$telno"; ?>"></td>
				<td></td>
			
			</tr>
		
		<tr>
				<td>  Grant Total</td>
				<td><input type="text" name="GrandTxt" value="<?php echo "$grandTot"; ?>" id="grandTXt" readonly></td>
				<td></td>
			
			</tr>
		
		<tr>
				<td></td>
				<td></td>
				<td></td>
			
			</tr>
			</tbody>
			</table>
			
		<input type="hidden" name="AdminNameTxt" value="<?php echo "$adminName"; ?>">
		<input type="hidden" name="customeridTXt" value="<?php echo "$cusID"; ?>">
		<input type="hidden" name="ProidTxt" value="<?php echo "$pid"; ?>">
		<input type="hidden" name="ImgustTxt" value="<?php echo "$imageURL"; ?>">
		
		<script>
            function calculateAmount(val) {
				if (val =='')
					{
						
					}else{
						if (val =='OrderDelivered'){
					var cost = document.getElementById("Costtxt").value;
				var qty = document.getElementById("quantityTxt").value;
				var Amount = document.getElementById("tot_amount").value;
				
				
				var profit = (Amount - (cost * qty)); 
				
				var vat = profit / 100 * 3;
				var adminp = ((profit - vat)/100 * 50);
				
                /*display the result*/
				
				
				var proft = document.getElementById('ProfitTxt');
				proft.value = profit;
				
                var divobj = document.getElementById('VatTxt');
                divobj.value = vat;
				var grand = document.getElementById('AdminProfit');
				grand.value = adminp;
				}
					}
            	
            }
        </script>
		<div class="tavle2">
			<nav class="imglocation"><img src="<?php echo $imageURL; ?>" alt="Smiley face" height="130" width="130" />
			
			<table border="0">
			<thead>
				<tr>
				<th>Cost  :</th>
				<th><input type="text" name="Costtxt"  id="Costtxt" value="<?php echo "$costt"; ?>" readonly></th>
				<th></th>
				</tr>
				<tr>
				<th>Profit  :</th>
				<th><input type="text" name="ProfitTxt" id="ProfitTxt" value="" readonly></th>
				<th></th>
				</tr>
				
				</thead>
			<tbody>
				<tr>
				<td>Vat :</td>
				<td><input type="text" name="VatTxt" id="VatTxt" value="" readonly></td>
				<td></td>
				</tr>
				<tr>
				<td>Admin Profit :</td>
				<td><input type="text" name="AdminProfit" id="AdminProfit" value="" readonly></td>
				<td></td>
				</tr>
				<tr>
				<td>State Select :</td>
				<td><select name="orsateTXt" onchange="calculateAmount(this.value)" required>
					<option value="">Please Select</option>
					<option value="OrderDelivered">Order Delivered</option>
					<option value="Ordercancel">Order Cancel</option>
					
					
					</select></td>
					
					
				<td></td>
				</tr>
				<tr>
				<td></td>
				<td></td>
				<td></td>
				</tr>
				<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Manage Your Order"></td>
				<td></td>
				</tr>
				
				</tbody>
			</table>
			</nav>
			
</div>
			</form>
		</div>
	</div>
	
</body>
</html>