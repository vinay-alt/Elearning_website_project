<!DOCTYPE html>
<html>
<head>
	<title>LearnOnline | DASHBOARD</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script src="https://kit.fontawesome.com/e88b7d19e5.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/main.js"></script>
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
	$abc = $_SESSION['account'];
	echo "<script>alert($abc)</script>";
	if (!isset($_SESSION['account'])) {		
			echo "<script>alert('Sorry! You are not logged in. Please login to access this section')</script>";
			echo "<script>window.open('index.php','_self')</script>";
	}
	
	if (!isset($_SESSION['teacher'])) {
		echo "<script>alert('You need to be a teacher to access this session')</script>";
			echo "<script>window.open('index.php','_self')</script>";
	}
	?>
	<div id="wrap">
		<div id='crumb'>
			<span><a href='index.php'>HOME</a></span> <b>></b>
			<span>Instructor's Dashboard</span>
		</div>
		<div id="dash">
			<h2>Instructor Dashboard</h2><br clear="all" />
			<form method="post" enctype="multipart/form-data">
				<div id="course">
					<input type="text" name="c_name" placeholder="Enter Course Name Here" autocomplete="off" />
					<button name="add_course">Create Course</button>
				</div>
			</form><br clear="all" /	>
			<!--<table cellspacing="0">
				<tr>
					<th>Name</th>
					<th></th>
					<th>Course Type</th>
					<th>Course price</th>
					<th>Course Status</th>
					<th>Enroll By</th>
					<th>Total</th>
				</tr>-->
				
			<?php dash_course(); ?>
				

		</div>
	<?php
	include('inc/footer.php');
	?>
	</div>
	
</body>
</html>

<?php
if (isset($_POST['add_course'])) {
	create_course();
}
?>