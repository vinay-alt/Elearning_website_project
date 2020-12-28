<?php 
session_start();
if (isset($_SESSION['admin'])) { ?>	
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
		<?php
			include("inc/header.php");
			include("inc/bodyleft.php");
			include("inc/bodyright.php");
		?>
	</body>
	</html>
<?php } else { 
		echo "<script>alert('Please Login to access the Admin Panel')</script>";
		header('Location:login.php');
	}
?>