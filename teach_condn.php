<!DOCTYPE html>
<html>
<head>
	<title>LearnOnline | AGREEMENT</title>
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
		<div id="teach_condn">
			<h2>Rules And Regulation For Instructors</h2>
			<ul>
				<?php inst_term(); ?>
			</ul>
			<h2>Want To Become Instructor</h2>
			<form method="post" enctype="multipart/form-data">
				<h3>Some Information about you as an instructor to be displayed at course page</h3>
				<textarea name="t_info"></textarea>
				<h3>Your Name to be displayed at course page</h3>
				<input type="text" name="t_name_dis" >
				<h3>Your image to be displayed at course page</h3>
				<input type="file" name="t_img" >
				<input type="checkbox" name="agree" > I Accept All The Terms And Conditions<br />
				<button name="accept" >I Accept</button>				
			</form>
			<h2>Rules And Regulations For Students</h2>
			<ul>
				<?php stud_term(); ?>
			</ul>
		</div>
		<?php
		include('inc/footer.php');
		?>
	</div>
		
</body>
</html>
<?php
	if (isset($_POST['accept'])) {
		if (isset($_POST['agree'])) {
			if (isset($_POST['t_info'])) {
				if (isset($_POST['t_name_dis'])) {
					if ($_FILES['t_img']['name']) {
						add_teacher();
					} else {
						echo "<script>alert('You must select an image')</script>";
						echo "<script>window.open('teach_condn.php','_self')</script>";	
					}
				} else {
					echo "<script>alert('You must give some to be displayed')</script>";
					echo "<script>window.open('teach_condn.php','_self')</script>";
				}
			} else {
				echo "<script>alert('You must tell something about yourself')</script>";
				echo "<script>window.open('teach_condn.php','_self')</script>";	
			}		
		} else {
			echo "<script>alert('You must agree on T&C')</script>";
			echo "<script>window.open('teach_condn.php','_self')</script>";
		}
	}
?>
