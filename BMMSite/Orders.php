<?php 
	include('functions.php');
	require_once "config.php";
	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
	
	//This is for the Product id passing
	$getpid= $_GET['getpid'];
	// Include the database configuration file
if (isset($_SESSION['user'])){
			$ClintName =  $_SESSION['user']['username'];
	
		$queryb = $link->query("SELECT * FROM customerregistor WHERE username ='$ClintName' ");
	if($queryb->num_rows > 0){
		while($row = $queryb->fetch_assoc()){
			$cusID = $row['id'];
			$clName = $row['username'];
			$telno = $row['TelNo'];
			$address = $row['Address'];
			$zipcode = $row['ZipCode'];
			$city  = $row['City'];
		}
		
	}
	
	
		}

// Get images from the database
	$OrderId = $link->query("SELECT * FROM orders ");
if($OrderId->num_rows > 0){
	while($row = $OrderId->fetch_assoc()){
		$Oid = $row['orderId'];
	}
	$Oid = $Oid + 1;
}
$query = $link->query("SELECT * FROM product WHERE Pid ='$getpid' ");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["Pimage"];
		
		$pid = $row['Pid'];
        $pname = $row['PName'];
        $des = $row['Price'];
        $pcategary = $row['Active'];
		$brand = $row['Brand'];
		$price = $row['Price'];
		$rate = $row['PRate'];
		$discount = $row['PDiscount'];
		$active = $row['Active'];
		$shipAmt = $row['Shipcharge'];
		$adminName = $row['AdminName'];
		$id = $row['Pid'];
		
		
	}}

    	
?>
	

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Orders</title>
	
	
	
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
	

		<div id="margin">

			
			
						   <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                       
                       
						<!-- This is for product table-->
						
						<?php
						require_once "config.php";
	
	
	if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
        }
	
	$total_records_per_page = 4;
	
	$offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2";
	
	$result_count = mysqli_query($link,"SELECT COUNT(*) As total_records FROM product");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
	$total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total pages minus 1
	
	
	$result = mysqli_query($link,"SELECT * FROM product LIMIT $offset, $total_records_per_page");
	$no = '0';
	while($row = mysqli_fetch_array($result)){
    $imageURL = 'uploads/'.$row["Pimage"];
		$no = $no +1;
		echo "<tr>
 	
 	";
		//This is for the url passing
		$id = $row['Pid'];
		//echo '<td><a href="SingalItemShow.php?id=',$id,'">Edit</a></td>';
		//echo '<td><a href="SingalItemShow.php?id=$id">',"Edit",'</a></td>';
	?>	

			
<!--		
<td id="Nocolom"><?php echo "$no" ?></td>
	<td id="itmeNameCol" ><?php  echo '<a href="SingalItemShow.php?id=',$id,'" style="display:block;" >'?><?php  echo "".$row['PName']."" ?>
		<br>
		<?php echo "".$row['Price']."" ?>
		</a> 
		</td>
		<td ><?php echo "".$row['Brand']."" ?></td>
		<td><?php echo "".$row['Pcategrie']."" ?></td>
		<td><?php echo "".$row['Active']."" ?></td>
	<td id="imagecol"><img src="<?php echo $imageURL; ?>" alt="Smiley face" height="130" width="130" /></td>
 	</tr>
-->
 						<div class="thubmnail-recent">
							<img src="<?php echo $imageURL; ?>" class="recent-thumb" alt="">
                            
                            <h2><?php  echo '<a href="SingalItemShow.php?id=',$id,'" style="display:block;" >'?><?php  echo "".$row['PName']."" ?></h2>
                            <div class="product-sidebar-price">
                                <ins><?php echo "".$row['Price']."" ?></ins>
                            </div>                             
                        </div>
		
		
	
 <?php } mysqli_close($link);?>

					
						
                        
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                        </ul>
                    </div>
                </div>
                                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            

                            
							<form action="ThanksforOrdering.php" method="post" enctype="multipart/form-data" action="ThanksforOrdering.php" class="checkout" name="checkout">
                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Billing Details</h3>
                                            <p id="billing_country_field" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
                                                

                                            </p>

                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Order Id <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" name="OrderId" value="<?php echo "$Oid"; ?>" readonly placeholder="" id="billing_first_name"  class="input-text ">
                                            </p>
											
											<p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Name <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" name="clientNameTxt" value="<?php echo "$clName"; ?>" readonly placeholder="" id="billing_first_name"  class="input-text ">
                                            </p>
											
											<p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Product Name <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" name="ProNameTxt" value="<?php echo "$pname"; ?>" readonly placeholder="" id="billing_first_name"  class="input-text ">
                                            </p>
											
											
											<p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Price <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" name="PropriceTxt" value="<?php echo "$price"; ?>" id="priceTXt" readonly placeholder="" id="billing_first_name"  class="input-text ">
                                            </p>
											
											<p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Quantity <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" name="quantityTxt" onchange="calculateAmount(this.value)" required placeholder="" id="billing_first_name"  class="input-text ">
                                            </p>
											
											<p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Discount <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" name="Discount" value="<?php echo "$discount"; ?>" id="discountTXt" readonly placeholder="" id="billing_first_name" class="input-text ">
                                            </p>
											
											<p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Discount Amount <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" name="DisAmtTXt" id="disamtTxt" readonly placeholder="" id="billing_first_name" class="input-text ">
                                            </p>
											
											<p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Amount <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" name="AmountTxt" id="tot_amount" readonly placeholder="" id="billing_first_name" class="input-text ">
                                            </p>
											
											
											<input type="hidden" name="AdminNameTxt" value="<?php echo "$adminName"; ?>">
											<input type="hidden" name="customeridTXt" value="<?php echo "$cusID"; ?>">
											<input type="hidden" name="ProidTxt" value="<?php echo "$pid"; ?>">
											<input type="hidden" name="ImgustTxt" value="<?php echo "$imageURL"; ?>">
                                           
                                        </div>
                                    </div>
									
									<div class="col-2">
									
									<p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">shipping Charge <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" name="shippingTxt" value="<?php echo "$shipAmt"; ?>" id="shipSharge" readonly placeholder="" id="billing_first_name" class="input-text ">
                                            </p>
										
										<p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Address <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" name="AddressTxt" value="<?php echo "$address"; ?>" placeholder="" id="billing_first_name" class="input-text ">
                                            </p>
											
										<p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">City <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" name="CityTxt" value="<?php echo "$city"; ?>" placeholder="" id="billing_first_name" class="input-text ">
                                            </p>
										<p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">ZipCode <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" name="ZipCodeTxt" value="<?php echo "$zipcode"; ?>" placeholder="" id="billing_first_name" class="input-text ">
                                            </p>
										<p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Tel No <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" name="TelNoTxt" value="<?php echo "$telno"; ?>" placeholder="" id="billing_first_name" class="input-text ">
                                            </p>
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
											<p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Grand Total <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" name="GrandTxt" id="grandTXt" readonly placeholder="" id="billing_first_name" class="input-text ">
                                            </p>
										
										
										<p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name"><abbr title="required" class="required"></abbr>
                                                </label>
                                                <img src="<?php echo $imageURL; ?>" alt="Smiley face" height="250" width="250" />
                                            </p>
										
										
										<p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Edit Order <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="submit" name="submit" value="Manage Your Order" id="grandTXt" readonly placeholder="" id="billing_first_name" class="input-text ">
                                            </p>
									
									</div>



                                </div>
                            </form>

                        </div>                       
                    </div>                    
                </div>

            </div>
        </div>
    </div>
	
		
			
			
			
			
			
			
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
	<script>
            function calculateAmount(val) {
            	let price = document.getElementById("priceTXt").value;
				let Discount = document.getElementById("discountTXt").value;
				
				let shipchage = document.getElementById('shipSharge').value;
				let tot_price = val * price;
				let Disamt = tot_price /100 * Discount;
				
				tot_price = tot_price - Disamt;
				var GrandTotal = tot_price + shipchage;
				
				
                /*display the result*/
				
				
				let disa = document.getElementById('disamtTxt');
				disa.value = Disamt;
				
                let divobj = document.getElementById('tot_amount');
                divobj.value = tot_price;
				let grand = document.getElementById('grandTXt');
				grand.value = GrandTotal;
            }
        </script>
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