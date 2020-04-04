<?php
include('AdminFunction.php');
	require_once "config.php";
	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: AdminLogin.php');
	}



?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Customer OrderManage</title>
	<link rel="stylesheet" href="Css/Style.css">
	<link rel="stylesheet" href="Css/bootstrap.min.css">
</head>

<body>
	
	</div>
	
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
			
			
		<table class="table table-striped table-bordered">
<thead>
<tr>
<th id="OrderID">No</th>
<th id="Details">Item Name</th>
<th>Address confirm</th>
<th id="imagecol">Image</th>
</tr>
</thead>
<tbody>
	
	
	
<?php
	if (isset($_SESSION['user'])){
			$AdminName =  $_SESSION['user']['username'];
	}
		require_once "config.php";
	
	
	if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
        }
	
	$total_records_per_page = 5;
	
	$offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2";
	
	$result_count = mysqli_query($link,"SELECT COUNT(*) As total_records FROM orders WHERE AdminId Like '%".$AdminName."%'");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
	$total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total pages minus 1
	
	
	$result = mysqli_query($link,"SELECT * FROM orders WHERE AdminId like '%".$AdminName."%'  LIMIT $offset, $total_records_per_page");
	$no = '0';
	while($row = mysqli_fetch_array($result)){
    $imageURL = $row["image"];
		$no = $no +1;
		echo "<tr>
 	
 	
 	";
	
	$Orderid = $row['orderId'];
	$ConAdd = $row['ClientName'];
	
?>
	<td id="Nocolom"><?php echo "$Orderid" ?></td>
	<td id="itmeNameCol" ><?php  echo '<a href="CustometOrderView.php?Orderid=',$Orderid,'">'?><?php  echo "".$row['ClientName']."" ?>   </a></td>
			<td>
			<?php echo "".$row['ProductName']."" ?>
		<br>
		<?php echo "".$row['Price']."" ?>
			<br>
			<?php echo "".$row['Discount']."" ?>
				<br>
			<?php echo "".$row['Amount']."" ?>
		</td>
		<td><?php  echo '<a href="CustometOrderView.php?Orderid=',$Orderid,'">'?>confirm Address</a></td>
		
<td id="imagecol"><img src="<?php echo $imageURL; ?>" alt="Smiley face" height="100" width="100" /></td>
 	</tr>
 <?php }?>
	
	
	
<!--
All your PHP Script will be here
-->


	<!--
----------------------------e
-->
	
		
	
	
	</tbody>
</table>
	<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>
	
<ul class="pagination">
	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
	<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
	</li>
       
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
		echo "<li><a>...</a></li>";
		echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
		echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li><a>...</a></li>";
	   echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
	   echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
    
	<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
	</li>
    <?php if($page_no < $total_no_of_pages){
		echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
		} ?>
</ul>


<br /><br />
	
	
	
	</div>

	
</body>
</html>