<?php 
	include('functions.php');
	require_once "config.php";
	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}


if (isset($_SESSION['user'])){
			$ClintName =  $_SESSION['user']['username'];
	
		$queryb = $link->query("SELECT * FROM customerregistor WHERE username ='$ClintName' ");
	if($queryb->num_rows > 0){
		while($row = $queryb->fetch_assoc()){
			$cusID = $row['id'];
			$clName = $row['username'];
			$email = $row['email'];
			$telno = $row['TelNo'];
			$address = $row['Address'];
			$zipcode = $row['ZipCode'];
			$city  = $row['City'];
			$image = $row['Image'];
		}
		
	}
	
	
		}

if(isset($_POST["submit"])){
	
	
	$statusMsg = '';

	// File upload path
	$targetDir = "uploads/";
	$fileName = basename($_FILES["file"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
	
	$allowTypes = array('jpg','png','jpeg','gif','pdf');
	
	$EcusID = $_POST['cusidTXt'];
	
	$EPassword = $_POST['passTxt'];
	$EconPass = $_POST['ConPassTxt'];
	//$gender = $_POST['genderTxt'];
	$Etelno = $_POST['TelNoTxt'];
	$Eaddress = $_POST['AddressTxt'];
	$Ezipcode = $_POST['ZipCodeTxt'];
	$Ecity  = $_POST['CityTxt'];
	$imgcheck = $_POST['ImgConTxt'];
	
	
			if($fileName == '')
			{
				
				
				if($EPassword =='' || $EconPass =='')
				{
					$update = $link->query("update customerregistor set TelNo='".$Etelno."',Address='".$Eaddress."',ZipCode='".$Ezipcode."',City='".$Ecity."' where id='".$EcusID."'");
				}else{
					
					if($EPassword != $EconPass)
					{
						$pass_empty = 'Confirm password is not Match';
					}else{
						$EPassword = md5($EPassword);
						
						$update = $link->query("update customerregistor set TelNo='".$Etelno."',Address='".$Eaddress."',password='".$EPassword."',ZipCode='".$Ezipcode."',City='".$Ecity."' where id='".$EcusID."'");
					}
					
				
			}
				
				
				
			}else{
				
				
				if($EPassword =='' || $EconPass =='')
				{
					if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
						$update = $link->query("update customerregistor set TelNo='".$Etelno."',Address='".$Eaddress."',ZipCode='".$Ezipcode."',City='".$Ecity."',Image='".$fileName."' where id='".$EcusID."'");
						
					}
					
				}else{
					
					if($EPassword != $EconPass)
					{
						$pass_empty = 'Confirm password is not Match';
					}else{
						
						if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
							
							$EPassword = md5($EPassword);
						
						$update = $link->query("update customerregistor set TelNo='".$Etelno."',Address='".$Eaddress."',password='".$EPassword."',ZipCode='".$Ezipcode."',City='".$Ecity."',Image='".$fileName."' where id='".$EcusID."'");
							
						}
						
					}
					
				
			}
				
			}
			
			
	
	
}

?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Acount Manage</title>
	
	<link rel="stylesheet" href="Css/Style.css">
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
	
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
		
		
		
		<nav class="cusEitdCenter">
	<form action="Customer_RegistorManage.php" method="post" enctype="multipart/form-data">
		
		<table border="0">
			<thead>
			<tr>
				<th width="0"></th>
				<th width="400">Details</th>
				<th width="250"></th>
				</tr>
			</thead>
			<tr>
				<tbody>
				<td>Name :</td>
      			<td><input type="text" name="NameTxt" value="<?php echo "$clName"; ?>" readonly></td>
				<td><?php if (isset($name_error)): ?>
	  	<span id="span1"><?php echo $name_error; ?></span>
	  	<?php endif ?></td>
			
			</tr>
	    
		<tr>
			<td>Email :</td>
			<td><input type="email" name="EmailTxt" value="<?php echo "$email"; ?>"></td>
			<td><?php if (isset($Email_error)): ?>
	  	<span id="span1"><?php echo $Email_error; ?></span>
	  	<?php endif ?></td>
			
			</tr>
		
		<tr>
			<td>Password :</td>
			<td><input type="password" name="passTxt" placeholder="Password..." value=""></td>
			<td><?php if (isset($pass_empty)): ?>
	  	<span id="span1"><?php echo $pass_empty; ?></span>
	  	<?php endif ?></td>
			
			</tr>
		
		<tr>
			<td>Con Pass :</td>
			<td><input type="password" name="ConPassTxt" placeholder="Con-Pass..." value=""></td>
			<td><?php if (isset($conpass_empty)): ?>
	  	<span id="span1"><?php echo $conpass_empty; ?></span>
	  	<?php endif ?>
		<?php if (isset($pasNotMatch)): ?>
	  	<span id="span1"><?php echo $pasNotMatch; ?></span>
	  	<?php endif ?></td>
			
			</tr>
		
		
		
		<tr>
			<td>Tel No:</td>
			<td><input type="text" name="TelNoTxt" value="<?php echo "$telno"; ?>"></td>
			<td><?php if (isset($telno_empty)): ?>
	  	<span id="span1"><?php echo $telno_empty; ?></span>
	  	<?php endif ?></td>
			
			
			</tr>
		<tr>
			<td>Address :</td>
			<td><input type="text" name="AddressTxt" value="<?php echo "$address"; ?>"></td>
			<td><?php if (isset($address_empty)): ?>
	  	<span id="span1"><?php echo $address_empty; ?></span>
	  	<?php endif ?>
		</td>
			</tr>
		
		<tr>
			<td>Zipcode :</td>
			<td><input type="text" name="ZipCodeTxt" value="<?php echo "$zipcode"; ?>"></td>
			<td><?php if (isset($zipcode_empty)): ?>
	  	<span id="span1"><?php echo $zipcode_empty; ?></span>
	  	<?php endif ?></td>
			</tr>
		
		<tr>
			<td>City :</td>
			<td><input type="text" name="CityTxt" value="<?php echo "$city"; ?>"></td>
			<td><?php if (isset($city_empty)): ?>
	  	<span id="span1"><?php echo $city_empty; ?></span>
	  	<?php endif ?></td>
			
			</tr>
		<tr>
			
			
			<input type="hidden" name="cusidTXt" value="<?php echo "$cusID"; ?>">
			<input type="hidden" name="ImgConTxt" value="<?php echo "$image"; ?>">
			<td>Image upload</td>
			<td><label for="ImageUpload">Upload Image</label><input type="file" name="file" ></td>
			<td></td>
			
			</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Registor" class="button"></td>
			<td></td>
			</tr>
	  	
		</nav>
		
    	
	  
			</tbody>
		</table>
			
		
	
	</form>
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