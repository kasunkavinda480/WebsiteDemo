<?php 
	include('functions.php');
	require_once "config.php";
	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}


if (isset($_SESSION['user'])){
			$ClintName =  $_SESSION['user']['username'];
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manage Orders</title>
	
	<!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
	 <!-- Google Fonts -->
  
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="Css/Style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
	   <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="ManageOrders.php"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="Categoryshowitems.php"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a href="ManageOrders.php"><i class="fa fa-user"></i> Order Manage</a></li>
                            <li><a href="UserAdds.php"><i class="fa fa-user"></i>User Ads</a></li>
							<li><a href="AddPost.php"><i class="fa fa-user"></i>Post Ads</a></li>
                            <li><a href="login.php"><i class="fa fa-user"></i> Login</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
	
	
	<header id="header">
		<img src="Images/Esanin.jpg" alt="Smiley face" height="150" width="150" />
		
		
										<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
							

	
						<div class="shopping-item">
                        <a href="cart.php">Cart - <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo $cart_count; ?></span></a>
							
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
						<a href="index.php?logout='1'" style="color: red;">logout</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
							
							
							
							
							
                    </div>
		<?php
		}
		?>
		
		</header>
	
	<div id="navslide">
		
			
			
			  <div id="navslide">
		
			
			
			    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="ShowItems.php">Products page</a></li>
                        <li><a href="ShowAds.php">Ads Page</a></li>
                        <li><a href="cart.php">Cart</a></li>
                        <li><a href="BuyNowCart.php">Checkout</a></li>
                        <li><a href="Categoryshowitems.php">Category</a></li>
                       
                        <li><a href="ContactUs.php">Contact</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- This is the menu bar End mainmenu area -->
		</div>
	
	<div id="MainDiv">
		
		
		
		
		
		
		
		<form action="" method="post" enctype="multipart/form-data">
		
			<input type="submit" name="submit" value="Special Orders">
			<input type="submit" name="" value="Normal Order">
		</form>
		</div>
	
	
	
	<div id="MainTable">
		
		
		
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
			<a href="Customer_RegistorManage.php">Manage Your Acount</a>

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red;">logout</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
		
		
		
		
		
		
		<table class="table table-striped table-bordered">
<thead>
<tr>
<th id="Nocolom">Order ID</th>
<th id="itmeNameCol">Item Name</th>

<th id="imagecol">Image</th>
</tr>
</thead>
<tbody>
	
	<?php
	if(isset($_POST["submit"])){
		require_once "config.php";
	
	
	if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
        }
	
	$total_records_per_page = 25;
	
	$offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2";
	
	$result_count = mysqli_query($link,"SELECT COUNT(*) As total_records FROM specialorder WHERE ClientName Like '%".$ClintName."%'");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
	$total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total pages minus 1
	
	
	$result = mysqli_query($link,"SELECT * FROM specialorder WHERE ClientName like '%".$ClintName."%' LIMIT $offset, $total_records_per_page");
	$no = '0';
	while($row = mysqli_fetch_array($result)){
		$cusoid = $row['cusOid'];
		$imgcode = $row['code'];
		
		
		echo "<tr>";
	
	
	
	
?>
	<td id="Nocolom"><?php echo "$cusoid" ?></td>
	<td id="itmeNameCol" ><?php  echo "".$row['ItName']."" ?>
		<br>
		Qty :<?php echo "".$row['Qty']."" ?>
		<br>
		Price :<?php echo "Rs".$row['Amount']."" ?>
		</td>
		<?php
		$query = $link->query("SELECT * FROM product WHERE code ='$imgcode' ");

		if($query->num_rows > 0){
    	while($row = $query->fetch_assoc()){
        	$imageURLs = 'uploads/'.$row["Pimage"];
		}
		}
		
		?>
<td id="imagecol"><img src="<?php echo $imageURLs; ?>" alt="Smiley face" height="130" width="130" /></td>
 	</tr>
 <?php }}else{
		
		
	
	
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
	
	$result_count = mysqli_query($link,"SELECT COUNT(*) As total_records FROM orders WHERE ClientName Like '%".$ClintName."%'");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
	$total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total pages minus 1
	
	
	$result = mysqli_query($link,"SELECT * FROM orders WHERE ClientName like '%".$ClintName."%'  LIMIT $offset, $total_records_per_page");
	$no = '0';
	while($row = mysqli_fetch_array($result)){
    $imageURL = $row["image"];
		$no +=1;
		
		
		
		echo "<tr>
 	
 	
 	";
	
	$Orderid = $row['orderId'];
	
	
?>
	<td id="Nocolom"><?php echo "$no" ?></td>
	<td id="itmeNameCol" ><?php  echo '<a href="Manage.php?Orderid=',$Orderid,'">'?><?php  echo "".$row['ProductName']."" ?>   </a>
		<br>
		Qty :<?php echo "".$row['quantity']."" ?>
		<br>
		Price :<?php echo "Rs".$row['Price']."" ?>
		</td>

<td id="imagecol"><img src="<?php echo $imageURL; ?>" alt="Smiley face" height="130" width="130" /></td>
 	</tr>
 <?php }} mysqli_close($link);?>
	
<!--
All your PHP Script will be here
-->

 </div>
            
            
        </div>
    </div>
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

<footer id="foot">
		
			
			
			    
    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        
                        
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="ManageOrders.php">My account</a></li>
                            <li><a href="ManageOrders.php">Order history</a></li>
                            <li><a href="ShowItems.php">Product</a></li>
                            <li><a href="ContactUs.php">Vendor contact</a></li>
                            
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="Categoryshowitems.php">Mobile Phone Parts</a></li>
                            <li><a href="Categoryshowitems.php">Home accesseries</a></li>
                            <li><a href="Categoryshowitems.php">LED TV Items</a></li>
                            <li><a href="Categoryshowitems.php">Computer</a></li>
                            <li><a href="Categoryshowitems.php">Gadets</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
		</footer>



<!-- This part get from online website -->
	<!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
	<script type="text/javascript" src="js/script.slider.js"></script>
	
</body>
</html>