		<form action="Manage.php" method="post" enctype="multipart/form-data">
		<table border="0">
			<thead>
			<tr>
				<th width="0"></th>
				<th width="400">Details</th>
				<th width="250"></th>
				</tr>
			</thead>
			<tbody>
		
			<tr>
				<td>Order Id</td>
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
				<td><input type="text" name="quantityTxt" value="<?php echo "$quantity"; ?>" onchange="calculateAmount(this.value)" required></td>
				<td><span id="span1">Change Quantity</span></td>
			
			</tr>
		
		<tr>
				<td>Discount</td>
				<td><input type="text" name="Discount" value="<?php echo "$discount"; ?>" id="discountTXt" readonly></td>
				<td></td>
			
			</tr>
		
		<tr>
				<td>Discount Amount</td>
				<td><input type="text" name="DisAmtTXt" value="<?php echo "$Disamt"; ?>" id="disamtTxt" readonly></td>
				<td></td>
			
			</tr>
		
		<tr>
				<td>Amount</td>
				<td><input type="text" name="AmountTxt"value="<?php echo "$amount"; ?>" id="tot_amount" readonly></td>
				<td></td>
			
			</tr>
		
		<tr>
				<td></td>
				<td>Shipping Details</td>
				<td></td>
			
			</tr>
		
		
		<tr>
				<td>shipping Charge</td>
				<td><input type="text" name="shippingTxt" value="<?php echo "$shipAmt"; ?>" id="shipSharge" readonly></td>
				<td></td>
			
			</tr>
		
		
		
		<tr>
				<td>Grant Total</td>
				<td><input type="text" name="GrandTxt" value="<?php echo "$grandTot"; ?>" id="grandTXt" readonly></td>
				<td></td>
			
			</tr>
		
		<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Manage Your Order"></td>
				<td></td>
			
			</tr>
			</tbody>
			
			
			
		<input type="hidden" name="AdminNameTxt" value="<?php echo "$adminName"; ?>">
		<input type="hidden" name="customeridTXt" value="<?php echo "$cusID"; ?>">
		<input type="hidden" name="ProidTxt" value="<?php echo "$pid"; ?>">
		<input type="hidden" name="ImgustTxt" value="<?php echo "$imageURL"; ?>">
		<img src="<?php echo $imageURL; ?>" alt="Smiley face" height="130" width="130" />
		</form>
		</table>