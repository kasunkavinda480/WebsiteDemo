<?php
if(isset($_POST["submit"])){
	require_once "config.php";
        
        
    $dataTime = date("Y-m-d H:i:s");
	
	
	$statusMsg = '';

	// File upload path
	$targetDir = "uploads/";
	$fileName = basename($_FILES["file"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
	
	$allowTypes = array('jpg','png','jpeg','gif','pdf');
		
    $Name = $_POST['NameTxt'];
    $Email = $_POST['EmailTxt'];
	$Password = $_POST['passTxt'];
	$conPass = $_POST['ConPassTxt'];
	//$gender = $_POST['genderTxt'];
	$telno = $_POST['TelNoTxt'];
	$address = $_POST['AddressTxt'];
	$zipcode = $_POST['ZipCodeTxt'];
	$city  = $_POST['CityTxt'];
	$ema = $Email;
	//this command for the chek password is match
	
	//This is for check customer some detail emty or not is empty or not
	
	//$query = mysql_query("SSELECT * FROM customerregistor WHERE username =$Name", $link);
	
	//THis is for the error Display
	$query = $link->query("SELECT * FROM customerregistor WHERE username ='$Name'");
	$queryb = $link->query("SELECT * FROM customerregistor WHERE email ='$Email'");
	//$query = $link->query("SELECT * FROM product WHERE Pid ='$id' ");
	//$res_u = mysqli_query($link, $sql_u);
	
	if($query->num_rows > 0)
	{
		$name_error = 'All ready taken';
	}else{
		if ($queryb->num_rows > 0)
		{
			$Email_error = 'All ready Email Taken';
		}
	}
	if($Name =='')
	{
		$name_empty = 'The Name is Empty';
	}
	if ($Email = '')
	{
		$email_empty = 'The email is empty';
	}
	if ($Password =='')
	{
		$pass_empty = 'THe password is empty';
	}
	if ($conPass =='')
	{
		$conpass_empty = 'Con Password is empty';
	}
	if ($Password != $conPass)
	{
		$pasNotMatch = 'The password is not Match';
	}
	if($telno =='')
	{
		$telno_empty = 'The Tel no is empty';
	}
	if ($address =='')
	{
		$address_empty = 'The address is empty';
	}
	if ($zipcode =='')
	{
		$zipcode_empty = 'The zipcode is empty';
	}
	if($city =='')
	{
		$city_empty = 'The city is Empty';
	}
	
	if( $_POST['genderTxt'] == '')
	{
		$gender_empty = 'The Gender is Empty';
	}
	//-----------
	
	
		if( $Name =='' || $Password == '' || $_POST['genderTxt'] == '' || $telno == '' || $address == '' || $zipcode == '' || $city == '' || empty($_FILES["file"]["name"]))
	{
		//echo "Cant Enter To the dataBase because some Text is missing";
	}else{
			
							if ($Password == $conPass){
								
								$gender = $_POST['genderTxt'];
								
								
		if(in_array($fileType, $allowTypes)){
			if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
				//This is for the change password type to the md5 format
				$Password = md5($Password);
            	// Insert image file name into database and other Details
            	$insert = $link->query("INSERT into customerregistor (username, email, password,Gender,TelNo,Address,ZipCode,City,Image,user_type) VALUES ('$Name', '$ema', '$Password','$gender','$telno','$address','$zipcode','$city','".$fileName."','user')");
				header('location: ActivateAcount.php');
				
		
		
			}
		
        	}
		}else{
			echo "Password is Not Match";
		}

		
		
	}
		
	
		
}
   

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Customer Register</title>

	
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/Style.css">
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
		
		<div class="product-bit-title text-center">
                        <h2>Customer Register</h2>
                    </div>
		
		<div class="cusregisdtor">
			<div class="product-content-right">
				<div class="woocommerce">
				
				
					<form action="Customer_Registor.php"  method="post" enctype="multipart/form-data">
		
		<table border="0">
			<thead>
			<tr>
				<th width="20"></th>
				<th width="400"></th>
				<th width="250"></th>
				</tr>
			</thead>
			<tr>
				<tbody>
				<td></td>
      			<td><input type="text" name="NameTxt" placeholder="Name..."></td>
				<td><?php if (isset($name_error)): ?>
	  	<span id="span1"><?php echo $name_error; ?></span>
	  	<?php endif ?></td>
			
			</tr>
	    
		<tr>
			<td></td>
			<td><input type="email" name="EmailTxt" placeholder="Email..."></td>
			<td><?php if (isset($Email_error)): ?>
	  	<span id="span1"><?php echo $Email_error; ?></span>
	  	<?php endif ?></td>
			
			</tr>
		
		<tr>
			<td></td>
			<td><input type="password" name="passTxt" placeholder="Password..."></td>
			<td><?php if (isset($pass_empty)): ?>
	  	<span id="span1"><?php echo $pass_empty; ?></span>
	  	<?php endif ?></td>
			
			</tr>
		
		<tr>
			<td></td>
			<td><input type="password" name="ConPassTxt" placeholder="Con-Pass..."></td>
			<td><?php if (isset($conpass_empty)): ?>
	  	<span id="span1"><?php echo $conpass_empty; ?></span>
	  	<?php endif ?>
		<?php if (isset($pasNotMatch)): ?>
	  	<span id="span1"><?php echo $pasNotMatch; ?></span>
	  	<?php endif ?></td>
			
			</tr>
		
		
		<tr>
			<td></td>
			<td><input type="radio" name="genderTxt" value="male" ><label>Male</label>
		<input type="radio" name="genderTxt" value="female"><label>Female</label></td>
			<td><?php if (isset($gender_empty)): ?>
	  	<span id="span1"><?php echo $gender_empty; ?></span>
	  	<?php endif ?></td>
			</tr>
		<tr>
			<td></td>
			<td><input type="text" name="TelNoTxt" placeholder="Tel No..."></td>
			<td><?php if (isset($telno_empty)): ?>
	  	<span id="span1"><?php echo $telno_empty; ?></span>
	  	<?php endif ?></td>
			
			
			</tr>
		<tr>
			<td></td>
			<td><input type="text" name="AddressTxt" placeholder="Address..."></td>
			<td><?php if (isset($address_empty)): ?>
	  	<span id="span1"><?php echo $address_empty; ?></span>
	  	<?php endif ?>
		</td>
			</tr>
		
		<tr>
			<td></td>
			<td><input type="text" name="ZipCodeTxt" placeholder="Zip_Code..."></td>
			<td><?php if (isset($zipcode_empty)): ?>
	  	<span id="span1"><?php echo $zipcode_empty; ?></span>
	  	<?php endif ?></td>
			</tr>
		
		<tr>
			<td></td>
			<td><input type="text" name="CityTxt" placeholder="City..."></td>
			<td><?php if (isset($city_empty)): ?>
	  	<span id="span1"><?php echo $city_empty; ?></span>
	  	<?php endif ?></td>
			
			</tr>
		<tr>
			<td></td>
			<td><label for="ImageUpload">Upload Image</label><input type="file" name="file" ></td>
			<td></td>
			
			</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Registor" class="button"></td>
			<td></td>
			</tr>
	  	
		
		
    	
	  
			</tbody>
		</table>
			
		
	
	</form>
				
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