<div id="bodyright">
	<?php if (isset($_GET['edit_sub_cat'])) { edit_sub_cat(); } else { ?>
	<h3>View All Sub Categories</h3>
	<div id="add">
		<details>
			<summary>ADD SUB CATEGORY</summary>
			<form method="post" enctype="multipart/form-data">
				<select name="cat_id">
					<option>Select Category</option>
					<?php echo select_cat(); ?>
				</select>
				<input type="text" name="sub_cat_name" placeholder="Enter new Sub Category">
				<input type="text" name="sub_cat_icon" placeholder="Enter icon code (Copy and paste icon code from fontawesome wesite)">
				<center><button name="add_sub_cat">Add Sub Category</button></center>
			</form>
		</details>
		<table cellspacing="0">
			<tr>
				<th>Sr No.</th>
				<th>Sub Category Name</th>
				<th>Action</th>
			</tr>
			<?php echo view_sub_cat(); ?>
		</table>
	</div>
	<?php } ?>
</div>
<?php
add_sub_cat();
?>