<?php if (!isset($_GET['slider']) && !isset($_GET['active']) && !isset($_GET['pending']) && !isset($_GET['tea']) && !isset($_GET['stud']) && !isset($_GET['about']) && !isset($_GET['faqs']) && !isset($_GET['contact']) && !isset($_GET['terms']) && !isset($_GET['lang']) && !isset($_GET['cat']) && !isset($_GET['sub_cat']) && !isset($_GET['mes'])) { ?>
	<div id="bodyright">
		<h3>Overview</h3>
		<div id="overview_wrap">	
			<div id="visitors">
				<h4>
					Number of visitors on website
				</h4>
				<span>
					<?php
						get_visitors();
					?>
				</span>
			</div>
			<div id="students">
				<h4>
					Number of users
				</h4>
				<span>
					<?php
						get_users();
					?>
				</span>
			</div>
			<div id="teachers">
				<h4>
					Number of instructors
				</h4>
				<span>
					<?php
						get_teachers();
					?>
				</span>
			</div>
			<div id="pending_courses">
				<h4>
					Number of Courses
				</h4>
				<span>
					<?php
						get_pen_courses();
					?>
				</span>
			</div>
			<div id="active_courses">
				<h4>
					Number of Courses
				</h4>
				<span>
					<?php
						get_act_courses();
					?>
				</span>
			</div>

		</div>
	</div>

<?php } ?>