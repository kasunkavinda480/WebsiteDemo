			<table border="0">
			<thead>
			<tr>
				<th width="0"></th>
				<th width="400">Details</th>
				<th width="250"></th>
				</tr>
			</thead>
			<tbody>
	<form action="ThanksforOrdering.php" method="post" enctype="multipart/form-data">
		<tr>
			<td>OrderId</td>
			<td><input type="text" name="OrderId" value="<?php echo "$Oid"; ?>" readonly></td>
			<td></td>
		
		</tr>
		
		<tr>
			<td>Name</td>
			<td><input type="text" name="clientNameTxt" value="<?php echo "$clName"; ?>" readonly></td>
			<td></td>
		
		</tr>
		
		<tr>
			<td>Product Name</td>
			<td><input type="text" name="ProNameTxt" value="<?php echo "$pname"; ?>" readonly></td>
			<td></td>
		
		</tr>
		
		<tr>
			<td>Price</td>
			<td><input type="text" name="PropriceTxt" value="<?php echo "$price"; ?>" id="priceTXt" readonly></td>
			<td></td>
		
		</tr>
		
		<tr>
			<td>Quantity</td>
			<td><input type="text" name="quantityTxt" onchange="calculateAmount(this.value)" required></td>
			<td></td>
		
		</tr>
		
		<tr>
			<td>Discount</td>
			<td><input type="text" name="Discount" value="<?php echo "$discount"; ?>" id="discountTXt" readonly></td>
			<td></td>
		
		</tr>
		
		<tr>
			<td>Discount Amount</td>
			<td><input type="text" name="DisAmtTXt" id="disamtTxt" readonly></td>
			<td></td>
		
		</tr>
		
		<tr>
			<td>Amount</td>
			<td><input type="text" name="AmountTxt" id="tot_amount" readonly></td>
			<td></td>
		
		</tr>
		
		<tr>
			<td></td>
			<td>Shipping Details</td>
			<td></td>
		
		</tr>
		<tr>
			<td>Shipping Charge</td>
			<td><input type="text" name="shippingTxt" value="<?php echo "$shipAmt"; ?>" id="shipSharge" readonly></td>
			<td></td>
		
		</tr>
		
		<tr>
			<td>Address</td>
			<td><input type="text" name="AddressTxt" value="<?php echo "$address"; ?>"></td>
			<td></td>
		
		</tr>
		<tr>
			<td>City</td>
			<td><input type="text" name="CityTxt" value="<?php echo "$city"; ?>"></td>
			<td></td>
		
		</tr>
		<tr>
			<td>ZipCode</td>
			<td><input type="text" name="ZipCodeTxt" value="<?php echo "$zipcode"; ?>"></td>
			<td></td>
		
		</tr>
		<tr>
			<td>Tel No</td>
			<td><input type="text" name="TelNoTxt" value="<?php echo "$telno"; ?>"></td>
			<td></td>
		
		</tr>
		
		<tr>
			<td>Grand Total</td>
			<td><input type="text" name="GrandTxt" id="grandTXt" readonly></td>
			<td></td>
		
		</tr>
		
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Submit Your Order"></td>
			<td></td>
		
		</tr>
		
		<br>
		<input type="hidden" name="AdminNameTxt" value="<?php echo "$adminName"; ?>">
		<input type="hidden" name="customeridTXt" value="<?php echo "$cusID"; ?>">
		<input type="hidden" name="ProidTxt" value="<?php echo "$pid"; ?>">
		<input type="hidden" name="ImgustTxt" value="<?php echo "$imageURL"; ?>">
		</tbody>
			</table>
				</form>
		<nav><img src="<?php echo $imageURL; ?>" alt="Smiley face" height="250" width="250" /></nav>