<?php if( !isset($_GET['add']) && !isset($_GET['course_goal']) && !isset($_GET['details']) && !isset($_GET['price']) && !isset($_GET['curriculum']) ) { 

	include('inc/db.php');
	$id = $_GET['course_id'];

	$get_info = $con->prepare("select * from courses where course_id ='$id'");
	$get_info->setFetchMode(PDO::FETCH_ASSOC);
	$get_info->execute();
	$row = $get_info->fetch();
	$img = $row['course_img'];
	$title = $row['course_title'];	
?>
	<div id="c_add_r">
		<div id='crumb'>
			<span><a href='index.php'>HOME</a></span> <b>></b> <span><a href='teacher.php'>DASHBOARD</a></span> <b>></b>
			<span>Course Management</span> <b>></b> <span>Title and Image</span>
		</div>
		<div id='bar' onclick='addBar();'><i class='fas fa-bars'></i></div>
		<h2>Course Title</h2>
		<form method="post" enctype="multipart/form-data">
			<div id="c_edit_input">
				<input type="text" name="c_name" value="<?= $title ?>" autocomplete="off" placeholder="Enter Course Name">
				<p>100</p>
			</div><br clear="all" />
			<h2>Course Image</h2>
			<img src="<?=$img?>" />
			<span>Social networking website development with pdo in php Social networking website development with pdo in php Social networking website development with pdo in php</span>
			<input id="c_img" type="file" autocomplete="off" value="<?= $img ?>" name="c_img" />
			<button name="save_title">Save</button>
		</form>
	</div>
<?php } 
if (isset($_POST['save_title'])) {	
		edit_title();
}

?>