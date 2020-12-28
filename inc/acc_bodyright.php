<?php if (!isset($_GET['pass']) && !isset($_GET['mycourses'])) { ?>	
	<div id="acc_bodyright" >
		<div id='crumb'>
			<span><a href='index.php'>HOME</a></span> <b>></b> <span>MY ACCOUNT</span>
		</div>
		<div id="content">
			<div id='bar' onclick='accBar();'><i class='fas fa-bars'></i></div>
			<h2>My Account</h2>
			<form method="post" enctype="multipart/form-data">	
				
				<div id="form">
					<div id="form-item">
						<div id="form-title">Update Your Name</div>
						<div id="form-in"><input type="text" name="u_name" placeholder="Enter Your Name" autocomplete="off" /></div>
					</div>
					<div id="form-item">
						<div id="form-title">Update Your Phone No.</div>
						<div id="form-in"><input type="text" name="u_phn" placeholder="Enter your Phone Number" autocomplete="off" /></div>
					</div>
					<div id="form-item">
						<div id="form-title">Update Your Pictures</div>
						<div id="form-in"><input type="file" name="u_pic" /></div>
					</div>
				</div>
				<button name="up_info" >Save</button>
			</form>
		</div>
		
	</div>
<?php } 
if (isset($_POST['up_info'])) {
up_info();
}
?>