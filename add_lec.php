
<!DOCTYPE html>
<html>
<head>
	<title>LearnOnline | CATEGORY</title>
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
	?>
	<div id="wrap">
	<div id='crumb'>
		<span><a href='index.php'>HOME</a></span> <b>></b>
		<span>Course Management</span> <b>></b> <span>Curriculum</span>
	</div>
	<div id='lecture'>
	 	<h3>Lecture Information</h3>
		<form id='edit' method='post' enctype='multipart/form-data'>
			<input type='text' name='lec_name' placeholder='Enter new Category' autocomplete='off'>
			<input type='file' name='lec_vid'>
			<center><button name='add_vid'>Add</button></center>
		</form>
	</div><br clear='all' />
	</div>
	
	
</body>
</html>

<?php
if (isset($_POST['add_vid'])) {
	add_lecture();
}
?>
