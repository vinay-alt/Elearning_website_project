<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN | HOME</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script src="https://kit.fontawesome.com/e88b7d19e5.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
	<div id="login">
		<div id="admin-icon">
			<img src="../image/user/admin.png">
		</div>
		<h2>ADMIN LOGIN</h2>
		<form method="post">
			<h4>Email</h4>
			<input type="text" name="email" autocomplete="off" placeholder="Enter Your Email">
			<h4>Password</h4>
			<input type="password" name="pass" autocomplete="off" placeholder="Enter Password">
			<button name="login">Log In</button>
		</form>
		<p>Kindly contact the service provider if you forgot your password</p>
	</div>
	<div id="ho">	
		<div id="techcon">
			<i class="fas fa-caret-down"></i>
		</div>
		<div id="techcon_info">
			<h3>WEBTECH WEB DEVELOPERS</h3>
			<h4>service provider : Vinay Gomashe</h4>
			<h4>Phone Number : 7038202860</h4>
			<h4>Email : vinaygomashe@gmail.com</h4>
		</div>
	</div>	
</body>
</html>
<?php
if (isset($_POST['login'])) {
	$salt = 'XxZzy12*_';
	$pass = hash('md5', $salt.$_POST['pass']);
	$check = hash('md5', $salt.'Vinay@123');
	$email = $_POST['email'];
	if (($_POST['email'] != 'elearning@gmail.com') || ($pass != $check)) {
		echo "<script>alert('Sorry! Incorrect EmailId or Password')</script>";
		echo "<script>window.open('login.php','_self')</script>";
	} else {
		$_SESSION['admin'] = $email;
		echo "<script>alert('Welcome to the Admin Panel')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}
}
?>
