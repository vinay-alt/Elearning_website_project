<div id="bodyright">
	<?php 
	if (isset($_GET['edit_term'])) { 
		edit_term(); 
	} else { ?>
	<h3>View All Terms and Conditions</h3>
	<div id="add">
		<details>
			<summary>ADD T&C</summary>
			<form method="post" enctype="multipart/form-data">
				<select name='term_for' required>
					<option value=''>Select Term For</option>
					<option value='Students'>Students</option>
					<option value='Teachers'>Teachers</option>
				</select>
				<input type="text" name="term" placeholder="Enter new Term">
				<center><button name="add_term">Add T&C</button></center>
			</form>
		</details>
		<table cellspacing="0">
			<tr>
				<th>Sr No.</th>
				<th>Terms & Conditions</th>
				<th>Terms For</th>
				<th>Action</th>
			</tr>
			<?php view_terms(); ?>
		</table>
	</div>
<?php } ?>
</div>
<?php
add_terms();
?>