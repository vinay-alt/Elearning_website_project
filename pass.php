<div id="pass">
	<div id='crumb'>
		<span><a href='index.php'>HOME</a></span> <b>></b> <span>CHANGE PASSWORD</span>
	</div>
	<div id="content">
			<div id='bar' onclick='accBar();'><i class='fas fa-bars'></i></div>
			<h2>Change Password</h2>
			<form method="post">	
				

				<div id="form">
					<div id="form-item">
						<div id="form-title">Enter your Current Password</div>
						<div id="form-in"><input type="text" name="u_pass" placeholder="Enter Current Password" autocomplete="off" /></div>
					</div>
					<div id="form-item">
						<div id="form-title">Enter your new password</div>
						<div id="form-in"><input type="text" name="u_pass_new" placeholder="Enter Enter Your New Password" autocomplete="off" /></div>
					</div>
					<div id="form-item">
						<div id="form-title">Re-Enter your new password</div>
						<div id="form-in"><input type="text" name="ur_pass_new" placeholder='Re-Enter Your New Password' /></div>
					</div>
				</div>

				<button name="up_pass" >Save</button>
			</form>
	</div>
</div>
<?php
if (isset($_POST['up_pass'])) {
	up_pass();
}
?>
