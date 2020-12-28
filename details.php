
<?php
include('inc/db.php');
$id=$_GET['course_id'];
$get_info = $con->prepare("select * from courses where course_id ='$id'");
$get_info->setFetchMode(PDO::FETCH_ASSOC);
$get_info->execute();
$row = $get_info->fetch();
$c_desc=$row['course_desc'];
$lang=$row['course_lang'];
$level=$row['course_level'];
$cat =$row['course_cat'];
$sub_cat = $row['course_sub_cat'];
?>

<div id="details">
	<div id='crumb'>
		<span><a href='index.php'>HOME</a></span> <b>></b> <span><a href='teacher.php'>DASHBOARD</a></span> <b>></b>
		<span>Course Management</span> <b>></b> <span>Course Details</span>
	</div>
	<div id="content">
		<div id='bar' onclick='addBar();'><i class='fas fa-bars'></i></div>
		<form method="post">
			<h2>Course Description</h2>
			<textarea name="c_desc"><?=$c_desc?></textarea>
			<h2>Course Basic Information</h2>
			<select name="lang" >
				<option value="<?php $lang ?>" ><?= $lang ?></option>
				<?php lang_list(); ?>
			</select>
			<select name="level">
				<option value="<?= $level ?>"><?= $level ?></option>
				<option value="All Level">All Level</option>
				<option value="Beginner">Beginner</option>
				<option value="Intermediate" >Intermediate</option>
				<option value="Advanced" >Advanced</option>
			</select>
			<select name="cat">
				<option value="<?= $cat ?>"><?= $cat ?></option>
				<?php cat_display(); ?>
			</select>
			<select name="sub_cat" >
				<option value="<?= $sub_cat ?>"><?= $sub_cat ?></option>
				<?php sub_cat_display(); ?>
			</select>
			<button name="add_details">Save</button>
		</form>
	</div>
	
</div>
<?php
if (isset($_POST['add_details'])) {
	add_details();
}

?>