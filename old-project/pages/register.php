<?php include('../server.php') ?>
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
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="first_name" value="<?php echo $first_name; ?>">
  	</div>
    <div class="input-group">
  	  <label>Surname</label>
  	  <input type="text" name="surname" value="<?php echo $surname; ?>">
  	</div>
    <div class="input-group">
  	  <label>Email</label>
  	  <input type="text" name="email" value="<?php echo $email; ?>">
  	</div>
    <div class="input-group">
  	  <label>Age</label>
  	  <input type="number" name="age" min="1" max="100" value="<?php echo $age; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
		<p>
  		Go back <a href="../index.php">home</a>
  	</p>
  </form>
  <?php include('../includes/errors.php'); ?>
</body>
</html>