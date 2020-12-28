<div id="mycou">
	<div id='crumb'>
		<span><a href='index.php'>HOME</a></span> <b>></b> <span>MY COURSES</span>
	</div>
	<div id="content">
		<div id='bar' onclick='accBar();'><i class='fas fa-bars'></i></div>
		<h2>My Courses</h2>
		<ul>
			<?php
			mycourses();
			?>
		</ul>
	</div>
</div>
<?php
if (isset($_POST['up_pass'])) {
	up_pass();
}
?>
