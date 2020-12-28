<?php
$id = $_GET['course_id'];
$get_course = $con->prepare("select * from courses where course_id='$id' && course_status='Notsubmitted' ");
$get_course->setFetchMode(PDO::FETCH_ASSOC);
$get_course->execute();
$count = $get_course->rowCount();

?>
<div id="c_add_l">
	<div id='bar' onclick='add();'><i class='fas fa-bars'></i></div>
	<h2>Course Management</h2>
	<?php
	if (isset($_GET['course_id'])) {
		$id=$_GET['course_id'];	
	}
		
	 ?>
	<ul>
		<li><a href="course_add.php?course_id=<?= $id?>"><i class="fas fa-user"></i> Title and Image</a></li>
		<li><a href="course_add.php?course_id=<?= $id?>&course_goal"><i class="fas fa-user"></i> Course Goal</a></li>
		<li><a href="course_add.php?course_id=<?= $id?>&details"><i class="fas fa-user"></i> Course Details</a></li>
		<li><a href="course_add.php?course_id=<?= $id?>&price"><i class="fas fa-user"></i> Course Price</a></li>
		<li><a href="course_add.php?course_id=<?= $id?>&curriculum"><i class="fas fa-user"></i> Curriculum</a></li>
	</ul>
	<?php if ($count>0) { ?>
		<form method="post">
			<button name="submit">Submit For Review</button>
		</form>
	<?php } ?>
</div>
<?php
if (isset($_GET['course_goal'])) { 
	include('course_goal.php');
}
if (isset($_GET['details'])) { 
	include('details.php');
}
if (isset($_GET['price'])) { 
	include('price.php');
}
if (isset($_GET['curriculum'])) { 
	include('curriculum.php');
}
if (isset($_POST['submit'])) {
	$id = $_GET['course_id'];
	$change_status = $con->prepare(" update courses set course_status='Inactive' where course_id='$id' ");
	$change_status->setFetchMode(PDO::FETCH_ASSOC);
	if ($change_status->execute()) {
		echo "<script>alert('Submitted for Review')</script>";
	}
}
?>