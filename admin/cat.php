<div id="bodyright">
	<?php 
	if (isset($_GET['edit_cat'])) { 
		edit_cat(); 
	} else { ?>
	<h3>View All Categories</h3>
	<div id="add">
		<details>
			<summary>ADD CATEGORY</summary>
			<form method="post" enctype="multipart/form-data">
				<input type="text" name="cat_name" placeholder="Enter new Category">
				<input type="text" name="cat_icon" placeholder="Enter category icon code (Copy and paste icon code from fontawesome wesite)">
				<center><button name="add_cat">Add Category</button></center>
			</form>
		</details>
		<table cellspacing="0">
			<tr>
				<th>Sr No.</th>
				<th>Category Name</th>
				<th>Action</th>
			</tr>
			<?php view_cat(); ?>
		</table>
	</div>
<?php } ?>
</div>
<?php
add_cat();
?>