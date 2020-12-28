<?php
 include('inc/function.php');
 add_visitor();
 ?>
<div id="header">
	<div id="up_head">
		<div id="contain">
			<div id="link">
				<?php head_link(); ?>
			</div>
			<div id="date">
				<p><?php echo date('l, d F Y'); ?></p>
			</div>
			<div id="slog">
				<p>India's No. 1 E Learning Website</p>
			</div>
		</div>
	</div>

		<div id="title">
			<h2><a href="index.php">ELearning</a></h2>
		</div>
		<div id="menu">
			<h2><i class="fas fa-bars"></i></h2>
			<?php include('inc/cat_menu.php');
			?>
		</div>
		<div id="head_search">
			<form method="POST" enctype="multipart/form-data">
				<input type="search" name="query" placeholder="Search courses from here" autocomplete='off'>
				<button name="search" ><i class="fas fa-search"></i></button>
			</form>
			<?php	
			if (isset($_POST['search'])) {
				$search = $_POST['query'];
				echo "<script>window.open('index.php?search=$search','_self')</script>";
			}	
			?>
		</div>
		<?php
		include('inc/db.php');
		if (isset($_SESSION['account'])) {
			$id = $_SESSION['account'];
			$get_cart = $con->prepare("select * from cart where user_id='$id'");
			$get_cart->setFetchMode();
			$get_cart->execute();
			$count = $get_cart->rowCount();
		}
		?>
		<div id="head_cart">
			<a href="cart.php"><i class="fas fa-shopping-cart"></i><span><?php if(isset($_SESSION['account'])) { echo "$count"; } else { echo "0"; } ?><span></a>
		</div>
		<?php if(!isset($_SESSION['account'])) { ?>	
			<div id="login">
				<h4><i class="fas fa-user"></i><span>Login</span></h4>
				<form method="post">
					<h3><i class="fas fa-user"></i></h3>
					<h2>Login</h2>
					<div id="input_f">
						<i class="fas fa-envelope"></i>
						<input type="text" name="u_email" placeholder="Enter your email" autocomplete="off" >
					</div>
					<div id="input_f">
						<i class="fas fa-lock"></i>
						<input type="password" name="u_pass" placeholder="Enter your password" autocomplete="off">
					</div>
					<h5>forgot password??</h5>
					<button name="login">Login</button>
				</form>
			</div>
			<div id="signup">
				<h4><i class="fas fa-user-plus"></i> <span>Signup</span></h4>
				<form method="post">
					<h3><i class="fas fa-user-plus"></i></h3>
					<h2>Sign Up</h2>
					<div id="input_f">
						<i class="fas fa-user"></i>
						<input type="text" name="s_name" placeholder="Enter your name" autocomplete="off">
					</div>
					<div id="input_f">
						<i class="fas fa-envelope"></i>
						<input type="text" name="s_email" placeholder="Enter your email" autocomplete="off">
					</div>
					<div id="input_f">
						<i class="fas fa-phone-square"></i>
						<input type="text" name="s_phn" placeholder="Enter your phone number" autocomplete="off">
					</div>
					<div id="input_f">
						<i class="fas fa-lock"></i>
						<input type="password" name="s_pass1" placeholder="Enter your password" autocomplete="off">
					</div>
					<div id="input_f">
						<i class="fas fa-lock"></i>
						<input type="password" name="s_pass2" placeholder="Re-Enter your password" autocomplete="off">
					</div>
					<button name="s_signup">Signup</button>
				</form>
			</div>
		<?php } elseif(!isset($_SESSION['teacher'])) { ?>
			<div id="beteacher">
				<h4><a href='teach_condn.php'><i class="fas fa-chalkboard-teacher"></i><span>Be a Teacher</span></a></h4>
			</div>
			<div id="myacc">
				<h4><i class="fas fa-user"></i></h4>
				<ul id="list">
					<li><a href='myaccount.php'>My Account</a></li>
					<li><a href='myaccount.php?mycourses'>My Courses</a></li>
					<li><a href='inc/logout.php'>Logout</a></li>
				</ul>
			</div>
		<?php } else {  ?>	
			<div id="dashboard">
				<h4><a href='teacher.php'><i class="fas fa-th"></i><span>Dashboard</span></a></h4>
			</div>
			<div id="myacc">
				<h4><i class="fas fa-user"></i></h4>
				<ul id="list">
					<li><a href='myaccount.php'>My Account</a></li>
					<li><a href='myaccount.php?mycourses'>My Courses</a></li>
					<li><a href='inc/logout.php'>Logout</a></li>
				</ul>
			</div>
		<?php } ?>
	
</div>
<?php
if(isset($_POST['s_signup'])) { 
	add_signup();
}
if(isset($_POST['login'])) { 
	login();
}

?>