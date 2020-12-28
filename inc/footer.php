<?php
	include('inc/db.php');

	$get_about=$con->prepare("select * from about");
	$get_about->setFetchMode(PDO::FETCH_ASSOC);
	$get_about->execute();
	$row = $get_about->fetch();
	

		
		if (!$row) {	
				echo "<script>Kindly Please Update Contact Details to be appeared in the contact section</script>";
		} else {
			$about=$row['about'];
			$get_contact=$con->prepare("select * from contact");
			$get_contact->setFetchMode(PDO::FETCH_ASSOC);
			$get_contact->execute();
			$row1 = $get_contact->fetch();
			$address = $row1['add1'].$row1['add2'];
			$phn = $row1['phn'];
			$email = $row1['email'];
			$fb = $row1['fb'];
			$tw = $row1['tw'];
		}

?>

<div id="footer">
	<ul>
		<li>
			<h2><span>Abo</span>ut Us</h2>
			<p><?php
			if (isset($about)) {
				echo $about; 
			} else {
				echo "This is notice that you need to update the contact and about info in admin login to be displayed to users";
			}
			?></p>
		</li>
		<li>
			<div id="min-wid">
				<h2><span>Con</span>tact Us</h2>
				<table>
					<tr>
						<td><i class="fas fa-map-marker-alt"></i></td>
						<td><p><?php
						if (isset($address)) {
							echo $address;
						} else {
							echo "No yet Updated";
						}

						?></p></td>
					</tr>
					<tr>
						<td><i class="fas fa-phone-square"></i></td>
						<td><p><?php
						if (isset($phn)) {
						 	echo $phn;
						 } else {
						 	echo "Not yet updated";
						 }
						 ?></p></td>
					</tr>
					<tr>
						<td><i class="fas fa-envelope"></i></td>
						<td><p><?php
						if (isset($email)){
						 echo $email; 
						} else {
							echo "Not yet updated";
						}
						 ?></p></td>
					</tr>
				</table>
				<div id="f_share">
					<div id="fb">
						<a href="<?php 
						if(isset($fb)){
							echo $fb; 
						} else {
							echo "#";
						}
						?>" target='_blank'><i class="fab fa-facebook-f"></i></a>
					</div>
					<div id="gp">
						<a href="#" target='_blank'><i class="fab fa-google-plus"></i></a>
					</div>
					<div id="tw">
						<a href="<?php 
						if(isset($tw)){
							echo $tw; 
						} else {
							echo "#";
						}
						?>" target='_blank'><i class="fab fa-twitter"></i></a>
					</div>
				</div>
			</div>		
		</li>
		<li>
			<h2><span>Lea</span>ve your message</h2>
			<form method="post">
				<div id="f_input">
					<i class="fas fa-user"></i>
					<input type="text" name="query_name" placeholder="Enter your name" autocomplete="off">
				</div>
				<div id="f_input">
					<i class="fas fa-envelope"></i>
					<input type="text" name="query_email" placeholder="Enter your email" autocomplete="off" >
				</div>
				<div id="f_input">
					<textarea name="msg" placeholder="Please Leave your message here" autocomplete="off" ></textarea>
				</div>
				<button name="send_msg">Send</button>
			</form>
		</li><br clear="All" />
	</ul>
	<h3>All Rights Reserved to elearning copyright &copy 2020 elearning.</h3>
</div>

<?php
if (isset($_POST['send_msg'])) {
	include('inc/db.php');
	$name = $_POST['query_name'];
	$email = $_POST['query_email'];
	$msg = $_POST['msg'];

	$add_msg = $con->prepare("INSERT INTO `messages`(`name`, `email`, `msg`) VALUES ('$name','$email','$msg')");
	if ($add_msg->execute()) {
		echo "<script>alert('Your message was successfully saved')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	} else {
		echo "<script>alert('Sorry Some Problem occured')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}

}
?>