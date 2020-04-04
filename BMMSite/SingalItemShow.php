<?php
require_once "config.php";

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
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
		
	<?php
// Include the database configuration file

require_once "config.php";
// Get images from the database
	$id= $_GET['id'];
$query = $link->query("SELECT * FROM product WHERE Pid ='$id' ");
;
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $PimageURL = 'uploads/'.$row["Pimage"];
		$getpid = $row['Pid'];
		$pid = $row['Pid'];
        $pname = $row['PName'];
        $des = $row['Price'];
        $pcategary = $row['Active'];
		$brand = $row['Brand'];
		$price = $row['Price'];
		$rate = $row['PRate'];
		$discount = $row['PDiscount'];
		$active = $row['Active'];
		
		$id = $row['Pid'];
		
		
		
?>	
			
			
<?php }
}else{ ?>
<p>No image(s) found...</p>
<p>
  <?php } ?>
</p>
	
	
	
	
	
	
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
                        <div class="product-breadcroumb">
                            <a href="">Home</a>
                            <a href="">Category Name</a>
                            <a href="">Sony Smart TV - 2015</a>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="<?php echo $PimageURL; ?>" alt="" height="243" width="195" >
                                    </div>
                                    
                                    <div class="product-gallery">
                                        <img src="img/product-thumb-1.jpg" alt="">
                                        <img src="img/product-thumb-2.jpg" alt="">
                                        <img src="img/product-thumb-3.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo "$pname"; ?></h2>
                                    <div class="product-inner-price">
                                        <ins>$700.00</ins> <del>$100.00</del>
                                    </div>    
                                    
                                    <form action="" class="cart">
                                        <div class="quantity">
                                            
                                        </div>
										
										<?php  echo '<a href="Orders.php?getpid=',$getpid,'" class="add_to_cart_button">'?> Order Now   </a>
                                        
										
										
                                    </form>   
                                    
                                    <div class="product-inner-category">
                                        <p>Category: <a href="">Summer</a>. Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                                    </div> 
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>  
                                                <p><?php echo "$des"; ?></p>

                                                
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Related Products</h2>
                            <div class="related-products-carousel">
								
								
		
			
									<div class="single-product">
                                    <div class="product-f-image">
                                        <img src="<?php echo $imageURL; ?>" alt="Smiley face" height="243" width="195" />
                                        <div class="product-hover">
											
                                            <?php  echo '<a href="SingalItemShow.php?id=',$id,'"  class="add-to-cart-link">'?><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><?php  echo '<a href="SingalItemShow.php?id=',$id,'"  >'?><?php  echo "".$row['PName']."" ?></a></h2>

                                    <div class="product-carousel-price">
                                        <ins><?php echo "".$row['Price']."" ?></ins>
                                    </div>                            
                                </div>

								
				
                            </div>
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