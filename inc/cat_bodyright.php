<?php if (!isset($_GET['sub'])) { ?>	
	<div id="cat_bodyright">
		<div id='crumb'>
			<span><a href='index.php'>HOME</a></span> <b>></b>
			<span>All Categories</span>
		</div>
		<div id='bar' onclick='sideBar();'><i class='fas fa-bars'></i></div>
		
		<h2>Categories</h2>
		<ul>
			<?php cat_page(); ?>
			<br clear="all">
		</ul>
	</div><br clear="all" />

<?php } ?>