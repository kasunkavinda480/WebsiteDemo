<?php include('AdminFunction.php') ?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" href="Css/Style.css">
</head>

<body>
	<div id="margin">
	<form method="post" action="AdminLogin.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
		
	</form>
	
	
	
	</div>
</body>
</html>