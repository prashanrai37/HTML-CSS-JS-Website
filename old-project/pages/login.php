<?php include ('../server.php') ?>
<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="../styles/auth_forms.css">
	<link rel="stylesheet" type="text/css" href="../styles/error.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<div class="input-group">
  		<label>Email</label>
  		<input type="email" name="email" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
		<p>
  		Go back <a href="../index.php">home</a>
  	</p>
  </form>
  <?php include ('../includes/errors.php'); ?>
</body>
</html>