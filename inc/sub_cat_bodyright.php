<?php if (!isset($_GET['cou'])) { ?>	
	<div id="sub_cat_bodyright">
		<div id='crumb'>
			<span><a href='index.php'>HOME</a></span> <b>></b>
			<span>All Sub Categories</span>
		</div>
		<div id='bar' onclick='sideBar1();'><i class='fas fa-bars'></i></div>
		<h2>Sub Categories</h2>
		<ul>
			<?php all_sub_cat_page(); ?>
			<br clear="all">
		</ul>
	</div><br clear="all" />

<?php } ?>