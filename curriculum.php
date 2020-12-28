
<?php	
	$id=$_GET['course_id'];

?>
	<div id="curriculum">
		<div id='crumb'>
			<span><a href='index.php'>HOME</a></span> <b>></b> <span><a href='teacher.php'>DASHBOARD</a></span> <b>></b>
			<span>Course Management</span> <b>></b> <span>Curriculum</span>
		</div>
		<div id="content">
			<?php if (isset($_GET['edit'])) { edit_lec(); } else { ?>
				<div id='bar' onclick='addBar();'><i class='fas fa-bars'></i></div>	
				<h2>Curriculum</h2>
				<a href="add_lec.php?course_id=<?=$id?>" id="add_l" >Add Lecture</a><br clear='all' />
				<ul>
					<?php display_lec();?>
				</ul>
			<?php } ?>
		</div>

	</div>

	