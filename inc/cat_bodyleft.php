<div id="cat_bodyleft">
	<div id='bar' onclick='side();'><i class='fas fa-bars'></i></div>
	<h3><a href="category.php"><i class="fas fa-home"></i> All Categories</a></h3>
	<h2>Categories</h2>
	<ul>
		<?php cat_list(); ?>
	</ul>
</div>
<?php 

if (isset($_GET['sub'])) { 
	include('subcategories.php');
}

?>