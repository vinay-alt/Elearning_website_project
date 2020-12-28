
<?php
	include('inc/db.php');
	$id=$_GET['course_id'];

	$get_info = $con->prepare("select * from courses where course_id ='$id'");
	$get_info->setFetchMode(PDO::FETCH_ASSOC);
	$get_info->execute();
	$row = $get_info->fetch();
	$before = $row['course_before'];
	$after = $row['course_after'];
?>

<div id="course_goal">
	<div id='crumb'>
		<span><a href='index.php'>HOME</a></span> <b>></b> <span><a href='teacher.php'>DASHBOARD</a></span> <b>></b>
		<span>Course Management</span> <b>></b> <span>Course Goal</span>
	</div>
	<div id='bar' onclick='addBar();'><i class='fas fa-bars'></i></div>
	<div id="content">
		<h2>Course Goal</h2>
		<p>The first step towards creating a great course is deciding who you are creating the course for and what those students are looking to accomplish. This is an important information for students to decide wheather your course is a right fit for their needs. This information will appear on the course details page so that it is visible to the students. </p>
		
		<form method="post">
			<h2>What will students need to know or do before starting this course ?</h2>
			<input type="text" autocomplete="off" name="before" value="<?=$before?>" />
			<h2>At the end of my course, students will be able to......</h2>
			<input type="text" autocomplete="off" name="after" value="<?=$after?>" />
			<button name="add_goal">Save</button>
		</form>
	</div>
</div>

<?php
if (isset($_POST['add_goal'])) {
	add_goal();
}
?>