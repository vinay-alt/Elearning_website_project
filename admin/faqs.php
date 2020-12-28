<div id="bodyright">
	<?php 
	if (isset($_GET['edit_faqs'])) { 
		edit_faqs(); 
	} else { ?>
	<h3>View All FAQs</h3>
	<div id="add">
		<details>
			<summary>ADD FAQs</summary>
			<form method="post" enctype="multipart/form-data">
				<input type="text" name="qsn" placeholder="Enter new Question">
				<textarea name="ans" placeholder="Enter Your Answer"></textarea>
				<center><button name="add_faqs">Add FAQs</button></center>
			</form>
		</details>
		<?php view_faqs(); ?>
	</div>
<?php } ?>
</div>
<?php
add_faqs();
?>