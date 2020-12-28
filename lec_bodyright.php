
<?php
// if ($_GET['lec']==1) {
// 	echo "<div id='start'><h1>Start navigating among the lectures</h1></div> ";
// } else {

$id = $_GET['course_id'];
$l_id = $_GET['lec'];
$get_lec = $con->prepare("SELECT * FROM `$id` WHERE `lec_id`='$l_id' ");
$get_lec->setFetchMode(PDO::FETCH_ASSOC);
$get_lec->execute();
while ($row=$get_lec->fetch()):
?>
	<div id="lec_bodyright">
		<div id='crumb'>
			<span><a href='index.php'>HOME</a></span> <b>></b>
			<span>All Sub Categories</span>
		</div>
		<div id="content">
			<a href="course_details.php?course_id=<?=$id?>"><img src="image/slider/back.jpg" /> Course Details</a>
			<div id='bar' onclick='navBar();'><i class='fas fa-bars'></i></div>
			<h2>Lecture: <?=$row['lec_name']?></h2>
			<div id="video_sec">
				<video  controls class="video" align="center">
					<source src="<?=$row['lec_vid']?>">
				</video>
			</div>
		</div>
	</div>
<?php
endwhile;
// }
?>