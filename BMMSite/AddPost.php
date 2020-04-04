<?php
include('functions.php');
	require_once "config.php";
if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

if (isset($_SESSION['user'])){
		$ClintName = $_SESSION['user']['username'];
		
	}
$queryb = $link->query("SELECT * FROM customerregistor WHERE username ='$ClintName' ");
	if($queryb->num_rows > 0){
		while($row = $queryb->fetch_assoc()){
			$cusID = $row['id'];
			//$clName = $row['username'];
			$telnos = $row['TelNo'];
			
			
			$ccity  = $row['City'];
		}
		
	}






if(isset($_POST["submit"])){
	if (isset($_SESSION['user'])){
		$Uname = $_SESSION['user']['username'];
		
	}
	$dataTime = date("Y-m-d H:i:s");
	
	// File upload path
	$targetDir = "Addimages/";

	$allowTypes = array('jpg','png','jpeg','gif','pdf');
	
	$image1 = basename($_FILES["Image1"]["name"]);
	$image2 = basename($_FILES["Image2"]["name"]);
	$image3 = basename($_FILES["Image3"]["name"]);
	$image4 = basename($_FILES["Image4"]["name"]);
	$image5 = basename($_FILES["Image5"]["name"]);
	
	if($image1 ==''){
		
	}else{
		//this is for image 1 upload
	$targetFilePath1 = $targetDir . $image1;
	$fileType1 = pathinfo($targetFilePath1,PATHINFO_EXTENSION);
	if(in_array($fileType1, $allowTypes)){
		if(move_uploaded_file($_FILES["Image1"]["tmp_name"], $targetFilePath1)){
			
		}
	}
	}
	
	if($image2 ==''){
		
	}else
	{
		$targetFilePath2 = $targetDir . $image2;
	$fileType2 = pathinfo($targetFilePath2,PATHINFO_EXTENSION);
	if(in_array($fileType2, $allowTypes)){
		if(move_uploaded_file($_FILES["Image2"]["tmp_name"], $targetFilePath2)){
			
		}
	}
		
	}
	
	
	if($image3 ==''){
		
	}else{
		//this is for image 3 upload
	$targetFilePath3 = $targetDir . $image3;
	$fileType3 = pathinfo($targetFilePath3,PATHINFO_EXTENSION);
	if(in_array($fileType3, $allowTypes)){
		if(move_uploaded_file($_FILES["Image3"]["tmp_name"], $targetFilePath3)){
			
		}
	}
	}
	
		if($image4 ==''){
		
	}else{
		//this is for image 3 upload
	$targetFilePath4 = $targetDir . $image4;
	$fileType4 = pathinfo($targetFilePath4,PATHINFO_EXTENSION);
	if(in_array($fileType4, $allowTypes)){
		if(move_uploaded_file($_FILES["Image4"]["tmp_name"], $targetFilePath4)){
			
		}
	}
	}

		if($image5 ==''){
		
	}else{
		//this is for image 3 upload
	$targetFilePath5 = $targetDir . $image5;
	$fileType5 = pathinfo($targetFilePath5,PATHINFO_EXTENSION);
	if(in_array($fileType5, $allowTypes)){
		if(move_uploaded_file($_FILES["Image5"]["tmp_name"], $targetFilePath5)){
			
		}
	}
	}


	
	$adname = $_POST['AddNameTxt'];
	$des = $_POST['Destxt'];
	$category = $_POST['CategoryTxt'];
	$subcategory = $_POST['SubCategoryTxt'];
	$brand = $_POST['BrandTxt'];
	$model  = $_POST['ModelTxt'];
	$telNo = $_POST['TelNoTxt'];
	$city = $_POST['CityTxt'];
	$adType = 'Normal';
	$Amount = $_POST['AmountTxt'];
	$condition = $_POST['ConditionTXt'];
	
	if($adname ==''){
		$adname_error = 'Add Name is Empty';
	}
	if($des ==''){
		$des_error = 'Description is Empty';
	}
	if($category =='')
	{
		$category_error ='No Category Selected';
	}
	if($subcategory =='')
	{
		$subcategory_error ='Please select Sub Category';
	}
	if($brand =='')
	{
		$brand_error ='Select ther brand';
	}
	if($model =='')
	{
		$model_error ='Type your Brand model';
	}
	
	
	if($city ==''){
		$city_error ='Enter your city';
	}
	if($Amount =='')
	{
		$Amount_error ='Enter your Item Price';
	}
	if(is_numeric($Amount)){
		
	}else{
		$Amount_notMActh = 'Amount Is not valid';
	}
	if($adname =='' || $des =='' || $category =='' || $subcategory =='' || $brand =='' || $model =='' || $telNo =='' || $city =='' || $Amount ==''){
		//this is for the check all the condition true
		echo('Some text is missing');
		
	}else{
		$insert = $link->query("INSERT into adstable (ACusName,Description,category,SubCategory,Brand,Model,Aimage1,Aimage2,Aimage3,Aimage4,Aimage5,TelNo,City,AdType,ADName,Amount,PostDate,conditions) VALUES ('$Uname','$des','$category','$subcategory','$brand','$model','$image1','$image2','$image3','$image4','$image5','$telNo','$city','$adType','$adname','$Amount','$dataTime','$condition')");
		if($insert){
			echo('Sucessupl');
		}else{
			echo('try ageain');
		}
	}
	
}




?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Post Your Add</title>
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
	
			   <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Ads</h2>
                        <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                       
                       
						<!-- This is for product table-->
						
						<?php
						
	
	
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
	
	$result_count = mysqli_query($link,"SELECT COUNT(*) As total_records FROM adstable");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
	$total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total pages minus 1
	
	
	$result = mysqli_query($link,"SELECT * FROM adstable LIMIT $offset, $total_records_per_page");
	$no = '0';
	while($row = mysqli_fetch_array($result)){
    $imageURL = 'Addimages/'.$row["Aimage1"];
		$no = $no +1;
		echo "<tr>
 	
 	";
		//This is for the url passing
		$id = $row['Aid'];
		//echo '<td><a href="SingalItemShow.php?id=',$id,'">Edit</a></td>';
		//echo '<td><a href="SingalItemShow.php?id=$id">',"Edit",'</a></td>';
	?>	

 						<div class="thubmnail-recent">
							<img src="<?php echo $imageURL; ?>" class="recent-thumb" alt="">
                            
                            <h2><?php  echo '<a href="SingalAddShow.php?id=',$id,'" >'?><?php  echo "".$row['ADName']."" ?></h2>
                            <div class="product-sidebar-price">
                                <ins><?php echo "".$row['Amount']."" ?></ins>
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
                            

                            

                            <form enctype="multipart/form-data" action="" class="checkout" method="post" name="checkout">

                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Billing Details</h3>
                                            <p id="billing_country_field" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
                                                

                                            </p>

                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Add Name <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text"  placeholder="" id="billing_first_name" name="AddNameTxt" class="input-text "><span id="span1"><?php if (isset($adname_error)): ?><?php echo $adname_error; ?></span>
												<?php endif ?>
                                            </p>
											
											 <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Description <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <textarea  placeholder="" id="billing_first_name" name="Destxt" class="input-text "></textarea><span id="span1"><?php if (isset($des_error)): ?><?php echo $des_error; ?></span>
												<?php endif ?>
                                            </p>

                                           <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Category <abbr title="required" class="required">*</abbr>
                                                </label>
                                                
											   <select name="CategoryTxt" class="input-text" id="custom_price">
												<option value="">Select Brand</option>
												<option value="Electronic">Electronic</option>
												   <option value="Vehicles">Vehicles</option>
												   <option value="Job">Job</option>
												   <option value="Property">Property</option>
												</select>
											   
											   <?php
											   $final_value ="<script type=\"text/javascript\">
														var e = document.getElementById('custom_price').value;document.write(e); </script>";

											   	echo $final_value;

											   
											   ?>
											   <span id="span1"><?php if (isset($category_error)): ?><?php echo $category_error; ?></span>
												<?php endif ?>
                                            </p>

                                             <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Sub Category <abbr title="required" class="required">*</abbr>
                                                </label>
                                               
												 
												 
												
													 <?php
												
												echo '<select id="billing_first_name" name="SubCategoryTxt" class="input-text " >';
												echo '<option value="">'.'--- Sub category ---'.'</option>';
												$query =  $link->query("SELECT Subcategories_name FROM AddSubCategory ");
												$query_display = $link->query("SELECT * FROM addsubcategory");
												while($row=mysqli_fetch_array($query))
												{
													echo "<option value='".$row['Subcategories_name']."'>".$row['Subcategories_name']
														.'</option>';
												}
	
	
	
	
													echo '</select>';
												?>
												 
												 
												
												 
												 <span id="span1"><?php if (isset($subcategory_error)): ?><?php echo $subcategory_error; ?></span>
												<?php endif ?>
                                            </p>
                                            
											 <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Brand <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text"  placeholder="" id="billing_first_name" name="BrandTxt" class="input-text "><span id="span1"><?php if (isset($brand_error)): ?><?php echo $brand_error; ?></span>
												<?php endif ?>
                                            </p>
											 <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Model <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" placeholder="" id="billing_first_name" name="ModelTxt" class="input-text "><span id="span1"><?php if (isset($model_error)): ?><?php echo $model_error; ?></span>
												<?php endif ?>
                                            </p>
											
											<p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Condition <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <select name="ConditionTXt" class="input-text" id="billing_first_name">
												<option value="New">New</option>
												<option value="Use">Use</option>
												</select>
                                            </p>

											 <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Amount <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text"  placeholder="" id="billing_first_name" name="AmountTxt" class="input-text "><span id="span1"><?php if (isset($Amount_error)): ?><?php echo $Amount_error; ?></span>
												<?php endif ?>
												 <span id="span1"><?php if (isset($Amount_notMActh)): ?><?php echo $Amount_notMActh; ?></span>
												<?php endif ?>
												 
                                            </p>
                                           
                                        </div>
                                    </div>
									 <div class="col-2">
									<div class="woocommerce-shipping-fields">
										 <label class="checkbox" for="ship-to-different-address-checkbox">Shipping Details</label>
                        
                        </h3>
										 
									 <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Contact No <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="<?php echo "$telnos"; ?>" placeholder="" id="billing_first_name" name="TelNoTxt" class="input-text " readonly>
										 
                                            </p>	 
										  <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">City <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="<?php echo "$ccity"; ?>" placeholder="" id="billing_first_name" name="CityTxt" class="input-text "><span id="span1"><?php if (isset($city_error)): ?><?php echo $city_error; ?></span>
												<?php endif ?>
                                            </p>
										 
										  <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Image <abbr title="required" class="required">*</abbr>
                                                </label>
                                               
											
											<label class="label" for="input">Please upload a picture !</label>
											<div class="coner">
										 <div class="Aimage1">
											<input type="file" name="Image1" >
											 <input type="file" name="Image2" >
											 <input type="file" name="Image3" >
											<input type="file" name="Image4" >
											 <input type="file" name="Image5" >
											
											
											</div>
										 
										 </div>
											
											
                                            </p>
										 
										 
										 
										 
										 </div>
									


								<div class="form-row place-order">
									
									
									
									

                                            <input type="submit" data-value="Place order" value="Post Add" id="place_order" name="submit" class="button alt">


                                        </div>
									
									
									
									</div>


                                </div>

                                
                            </form>

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
	<script type="text/javascript" src="JavaScritpt/JavaScript.js"></script>
    <script type="text/javascript" src="js/bxslider.min.js"></script>
	<script type="text/javascript" src="js/script.slider.js"></script>
	<script src="dropzone-5.7.0/dist/dropzone.js"></script>
	
</body>
</html>