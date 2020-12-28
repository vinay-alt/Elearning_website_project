<div id="bodyleft">
	<h3>Categories Management</h3>
	<ul>
		<li><a href="index.php"><i class="fas fa-home"></i>Dashboard</a></li>
		<li><a href="index.php?cat"><i class="fas fa-th"></i>View Categories</a></li>
		<li><a href="index.php?sub_cat"><i class="fas fa-list"></i>View Sub Categories</a></li>
		<li><a href="index.php?lang"><i class="fas fa-language"></i>View All languages</a></li>
	</ul>
	<h3>Course Management</h3>
	<ul>
		<li><a href="index.php?active"><i class="fas fa-toggle-on"></i>Active Courses</a></li>
		<li><a href="index.php?pending"><i class="fas fa-spinner"></i>Pending Courses</a></li>
	</ul>
	<h3>User Management</h3>
	<ul>
		<li><a href="index.php?stud"><i class="fas fa-users"></i>View all students</a></li>
		<li><a href="index.php?tea"><i class="fas fa-chalkboard-teacher"></i>View All Teachers</a></li>
		<li><a href="index.php?mes"><i class="fas fa-search"></i>Messages from Users</a></li>
	</ul>
	<h3>Pages Management</h3>
	<ul>
		<li><a href="index.php?terms"><i class="fas fa-clipboard-list"></i>Terms & Conditions Page</a></li>
		<li><a href="index.php?contact"><i class="fas fa-phone"></i>Contact Us Page</a></li>
		<li><a href="index.php?about"><i class="far fa-address-card"></i>About us Page</a></li>
		<li><a href="index.php?faqs"><i class="fas fa-question"></i>FAQ's Page</a></li>
		<li><a href="index.php?slider"><i class="fas fa-sliders-h"></i>Edit Slider</a></li>
	</ul>
</div>

<?php
if (isset($_GET['cat'])) { 
	include('cat.php');
}
if (isset($_GET['terms'])) { 
	include('terms.php');
}
if (isset($_GET['lang'])) { 
	include('lang.php');
}
if (isset($_GET['sub_cat'])) { 
	include('sub_cat.php');
}
if (isset($_GET['contact'])) { 
	include('contact.php');
}
if (isset($_GET['faqs'])) { 
	include('faqs.php');
}
if (isset($_GET['about'])) { 
	include('about.php');
}
if (isset($_GET['stud'])) { 
	include('stud.php');
}
if (isset($_GET['tea'])) { 
	include('tea.php');
}
if (isset($_GET['pending'])) { 
	include('pending.php');
}
if (isset($_GET['active'])) { 
	include('active.php');
}
if (isset($_GET['slider'])) { 
	include('slider_img.php');
}
if (isset($_GET['mes'])) { 
	include('message.php');
}
?>