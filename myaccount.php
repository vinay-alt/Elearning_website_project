	<!DOCTYPE html>
	<html>
	<head>
		<title>LearnOnline | ACCOUNT INFORMATION</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="https://kit.fontawesome.com/e88b7d19e5.js" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/acc.js"></script>
		<script type="text/javascript" src="js/alert.js"></script>
		<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
	</head>
	<body onload="load()">
		<div id="loader">
			<div id="load-span">
			
			</div>
		</div>
		<?php
		include('inc/header.php');
		if (!isset($_SESSION['account'])) {
			echo "<script>alert('Sorry! You are not logged in.')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		}
		?>
		<div id="wrap">
		<?php
		include('inc/acc_bodyleft.php');
		include('inc/acc_bodyright.php');
		?>
		</div>
		
	</body>
	</html>
