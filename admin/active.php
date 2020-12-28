<div id="active">
	<h3>Active Courses</h3>
	<div id="add">
		
		<table cellspacing="0">
			<tr>
				<th>Sr No.</th>
				<th>Course Name</th>
				<th>Course Price</th>
				<th>Total Revenue</th>
				<th>Action</th>
				<th></th>
			</tr>
			<?php view_active(); ?>
		</table>
	</div>
	
</div>
<?php
if (isset($_POST['unpublish'])) {
	unpublish();
}
?>