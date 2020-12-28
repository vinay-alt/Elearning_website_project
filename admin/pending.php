<div id="pending">
	<h3>Pending Courses</h3>
	<div id="add">
		
		<table cellspacing="0">
			<tr>
				<th>Sr No.</th>
				<th>Course Name</th>
				<th>Course Price</th>
				<th>Action</th>
				<th></th>
			</tr>
			<?php view_pending(); ?>
		</table>
	</div>
	
</div>
<?php
if (isset($_POST['publish'])) {
	publish();
}
?>