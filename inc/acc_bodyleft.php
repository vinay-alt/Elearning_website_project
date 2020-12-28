<?php
	if (isset($_SESSION['account'])) {
		
		$email = $_SESSION['account'];
		$get_user = $con->prepare("select * from signup where s_email='$email' ");
		$get_user->setFetchMode();
		$get_user->execute();
		$row=$get_user->fetch();
		$img=$row['s_img'];
	} else {
		echo "<script>alert('Already Added')</script>";
		$img='image/user/default.png';
	}

?>
<div id="acc_bodyleft">
	<div id='bar' onclick='acc();'><i class='fas fa-bars'></i></div>
	<img src="<?=$img?>">
	<h2>Account Management</h2>
	<ul>
		<li><a href='myaccount.php'>My Account</a></li>
		<li><a href='myaccount.php?pass'>Change Password</a></li>
		<li><a href='myaccount.php?mycourses'>My Courses</a></li>
	</ul>
	
</div>
<?php   
if (isset($_GET['pass'])) {
	include('pass.php');
}

if (isset($_GET['mycourses'])) {
	include('mycourses.php');
}

?>