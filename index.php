<!DOCTYPE html>
<html>
<head>
	<title>LearnOnline | HOME</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script src="https://kit.fontawesome.com/e88b7d19e5.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/alert.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
</head>
<body onload="load()">
<?php
 include('inc/db.php');
 if (isset($_GET['search'])) {
 	include('inc/function.php');
	search(); 
 } else {	
 ?>
	<div id="loader">
		<div id="load-span">
			
		</div>
	</div>
	<?php
	include('inc/header.php');
	?>
	<div id="wrap">
	<?php
	include('inc/slider.php');
	include('inc/home_cat.php');
	?>
	<div id="sep"></div>
	<?php
	include('inc/top_courses.php');
	include('inc/footer.php');
	?>
	</div>
	
</body>
</html>
<?php
}

?>