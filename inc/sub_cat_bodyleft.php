<div id="sub_cat_bodyleft">
	<div id='bar' onclick='side1();'><i class='fas fa-bars'></i></div>
	<h3><a href="sub_category.php"><i class="fas fa-home"></i> All Sub Categories</a></h3>
	<h2>Sub Categories</h2>
	<ul>
		<?php sub_cat_list(); ?>
	</ul>
</div>
<?php 

if (isset($_GET['cou'])) { 
	include('cou_U_sub.php');
}
?>
	
</div>