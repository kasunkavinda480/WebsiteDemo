<?php
include('AdminFunction.php');
	require_once "config.php";
	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: AdminLogin.php');
	}



?>

<?php
if(isset($_POST["submit"])){
	require_once "config.php";
	$Name = $_POST['nameTxt'];
    $Email = $_POST['emailTxt'];
	$Password = $_POST['passTxt'];
	$conPass = $_POST['conPassTxt'];
	
	
	$query = $link->query("SELECT * FROM adminusers WHERE username ='$Name'");
	$queryb = $link->query("SELECT * FROM adminusers WHERE email ='$Email'");
	
	
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
	if($Name == '' || $Password == ''){
		echo 'can andter';
	}else{
		$Password = md5($Password);
		$insert = $link->query("INSERT into adminusers (username, email, password,user_type) VALUES ('$Name', '$Email', '$Password','admin')");
		
	}

}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Registor</title>
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
	<table border="0">
		<thead>
		<tr>
				
				<th width="400">Details</th>
				<th width="250"></th>
				</tr>
		
		</thead>
		<tbody>
	<form method="post" action="AdminRegistor.php" enctype="multipart/form-data">
		<tr>
			<td><input type="text" name="nameTxt" placeholder="Name..."></td>
			<td><?php if (isset($name_error)): ?>
	  	<span id="span1"><?php echo $name_error; ?></span>
	  	<?php endif ?></td>
		</tr>
		
		<tr>
			<td><input type="text" name="emailTxt" placeholder="Email..."></td>
			<td><?php if (isset($Email_error)): ?>
	  	<span id="span1"><?php echo $Email_error; ?></span>
	  	<?php endif ?></td>
		</tr>
		
		<tr>
			<td><input type="password" name="passTxt" placeholder="Password..."></td>
			<td><?php if (isset($pass_empty)): ?>
	  	<span id="span1"><?php echo $pass_empty; ?></span>
	  	<?php endif ?></td>
		</tr>
		
		<tr>
			<td><input type="password" name="conPassTxt" placeholder="Confirm password..."></td>
			<td><?php if (isset($conpass_empty)): ?>
	  	<span id="span1"><?php echo $conpass_empty; ?></span>
	  	<?php endif ?>
		<?php if (isset($pasNotMatch)): ?>
	  	<span id="span1"><?php echo $pasNotMatch; ?></span>
	  	<?php endif ?></td>
		</tr>
		
		<tr>
			<td><input type="submit" name="submit" value="Registor Adminr"></td>
			<td></td>
		</tr>
		
		
	
	</tbody>
	
	</form>
		</table>
	</div>
</body>
</html>