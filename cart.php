
<!DOCTYPE html>
<html>
<head>
	<title>LearnOnline | CART</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script src="https://kit.fontawesome.com/e88b7d19e5.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/alert.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
</head>
<body onload="load()"	>
	<div id="loader">
		<div id="load-span">
			
		</div>
	</div>
	<?php
	include('inc/header.php');
	cart();
	include('inc/footer.php');
	?>
	
</body>
</html>