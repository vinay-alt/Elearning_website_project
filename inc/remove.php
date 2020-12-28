<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/alert.js"></script>
</head>
<?php
session_start();
include('db.php');
if (!isset($_SESSION['account'])) {
	echo "<script>alert('Sorry You are not logged in $x')</script>";
	echo "<script>window.open('../cart.php','_self')</script>";
}


$id = $_GET['course_id'];
$del_cart = $con->prepare("delete from cart where course_id='$id'");
if($del_cart->execute()) {

	echo "<div id='alert'>
 					<h1>Course Removed Successfully</h1>
 					<center><i class='fas fa-check-circle'></i></center>
 					<button onclick='showinc()'>CLOSE</button>
 				</div>";
	//echo "<script>alert('Course Removed from the cart successfully')</script>";
	//echo "<script>window.open('../cart.php','_self')</script>";	
}


?>