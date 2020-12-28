<?php

  function add_lang() {
 	include('inc/db.php');
 	if(isset($_POST['add_lang'])) {
 		$lang_name = $_POST['lang_name'];

 		$check = $con->prepare("select * from lang where lang_name='$lang_name'");
 		$check->setFetchMode(PDO::FETCH_ASSOC);
 		$check->execute();
 		$count = $check->rowCount();

 		if ($count == 1) {
 			echo "<script>alert('Already Added')</script>";
 			echo "<script>window.open('index.php?lang','_self')</script>";
 		} else {
 			$add_lang = $con->prepare("insert into lang (lang_name) values ('$lang_name')");
	 		if ($add_lang->execute()) {
	 			echo "<script>alert('Added')</script>";
	 			echo "<script>window.open('index.php?lang','_self')</script>";
	 		} else {
	 			echo "<script>alert('Not Added')</script>";
	 			echo "<script>window.open('index.php?lang','_self')</script>";
	 		}
 		}

 	}
 }

 function add_cat() {
 	include('inc/db.php');
 	if(isset($_POST['add_cat'])) {
 		$cat_name = $_POST['cat_name'];
 		$cat_icon = $_POST['cat_icon'];

 		$check = $con->prepare("select * from cat where cat_name='$cat_name' & cat_icon='$cat_icon'");
 		$check->setFetchMode(PDO::FETCH_ASSOC);
 		$check->execute();
 		$count = $check->rowCount();

 		if ($count == 1) {
 			echo "<script>alert('Already Added')</script>";
 			echo "<script>window.open('index.php?cat','_self')</script>";
 		} else {

 			$add_cat = $con->prepare("insert into cat (cat_name, cat_icon) values ('$cat_name','$cat_icon')");
	 		if ($add_cat->execute()) {
	 			echo "<script>alert('Added')</script>";
	 			echo "<script>window.open('index.php?cat','_self')</script>";
	 		} else {
	 			echo "<script>alert('Not Added')</script>";
	 			echo "<script>window.open('index.php?cat','_self')</script>";
	 		}
 		}

 	}
 }

 function edit_cat() {
 	include('inc/db.php');

 	if(isset($_GET['edit_cat'])) {
		$id = $_GET['edit_cat'];
		$get_cat = $con->prepare("select * from cat where cat_id='$id'");
		$get_cat->setFetchMode(PDO::FETCH_ASSOC);
		$get_cat->execute();
		$row = $get_cat->fetch(); 		

 		echo "<h3>Edit Category</h3>
		<form id='edit' method='post' enctype='multipart/form-data'>
			<input type='text' value='".$row['cat_name']."' name='edit_name' placeholder='Enter new Category'>
			<input type='text' name='cat_icon' value='".$row['cat_icon']."'>
			<center><button name='edit_cat'>Edit Category</button></center>
		</form>";


		if (isset($_POST['edit_cat'])) {
			$edit_name = $_POST['edit_name'];
			$cat_icon = $_POST['cat_icon'];

			$check = $con->prepare("select * from cat where cat_name='$edit_name' && cat_icon='$cat_icon'");
	 		$check->setFetchMode(PDO::FETCH_ASSOC);
	 		$check->execute();
	 		$count = $check->rowCount();

	 		if ($count == 1) {
	 			echo "<script>alert('Already Added')</script>";
	 			echo "<script>window.open('index.php?cat','_self')</script>";
	 		} else {

				$edit_cat = $con->prepare("update cat set cat_name = '$edit_name',cat_icon='$cat_icon' where cat_id='$id'");
		 		if ($edit_cat->execute()) {
		 			echo "<script>alert('Updated')</script>";
		 			echo "<script>window.open('index.php?cat','_self')</script>";
		 		} else {
		 			echo "<script>alert('Not Updated')</script>";
		 			echo "<script>window.open('index.php?cat','_self')</script>";
		 		}
	 		}
		}



 	}
 }



 function edit_lang() {
 	include('inc/db.php');

 	if(isset($_GET['edit_lang'])) {
		$id = $_GET['edit_lang'];
		$get_cat = $con->prepare("select * from lang where lang_id='$id'");
		$get_cat->setFetchMode(PDO::FETCH_ASSOC);
		$get_cat->execute();
		$row = $get_cat->fetch(); 		

 		echo "<h3>Edit Language</h3>
		<form id='edit' method='post' enctype='multipart/form-data'>
			<input type='text' value='".$row['lang_name']."' name='edit_name' placeholder='Enter new Language'>
			<center><button name='edit_lang'>Edit Language</button></center>
		</form>";


		if (isset($_POST['edit_lang'])) {
			$edit_name = $_POST['edit_name'];

			$check = $con->prepare("select * from lang where lang_name='$edit_name'");
	 		$check->setFetchMode(PDO::FETCH_ASSOC);
	 		$check->execute();
	 		$count = $check->rowCount();

	 		if ($count == 1) {
	 			echo "<script>alert('Already Added')</script>";
	 			echo "<script>window.open('index.php?lang','_self')</script>";
	 		} else {

				$edit_cat = $con->prepare("update lang set lang_name = '$edit_name' where lang_id='$id'");
		 		if ($edit_cat->execute()) {
		 			echo "<script>alert('Updated')</script>";
		 			echo "<script>window.open('index.php?lang','_self')</script>";
		 		} else {
		 			echo "<script>alert('Not Updated')</script>";
		 			echo "<script>window.open('index.php?lang','_self')</script>";
		 		}
	 		}
		}



 	}
 }



 function edit_sub_cat() {
 	include('inc/db.php');

 	if(isset($_GET['edit_sub_cat'])) {
		$id = $_GET['edit_sub_cat'];
		$get_sub_cat = $con->prepare("select * from sub_cat where sub_cat_id='$id'");
		$get_sub_cat->setFetchMode(PDO::FETCH_ASSOC);
		$get_sub_cat->execute();
		$row = $get_sub_cat->fetch(); 

		$cat_id = $row['cat_id'];
		$get_c = $con->prepare("select * from cat where cat_id='$cat_id'");
		$get_c->setFetchMode(PDO::FETCH_ASSOC);
		$get_c->execute();
		$row_cat = $get_c->fetch();		

 		echo "<h3>Edit Sub Category</h3>
		<form id='edit' method='post' enctype='multipart/form-data'>
			<select name='cat_id'>
				<option value='".$row_cat['cat_id']."'>".$row_cat['cat_name']."</option>";
					echo select_cat();
			echo "</select>
			<input type='text' value='".$row['sub_cat_name']."' name='edit_name' placeholder='Enter new Category'>
			<input type='text' value='".$row['sub_cat_icon']."' name='edit_icon' placeholder='Enter new Icon'>
			<center><button name='edit_sub_cat'>Edit Sub Category</button></center>
		</form>";


		if (isset($_POST['edit_sub_cat'])) {
			$edit_name = $_POST['edit_name'];
			$cat_id = $_POST['cat_id'];
			$sub_cat_icon = $_POST['edit_icon'];

			$check = $con->prepare("select * from sub_cat where sub_cat_name='$edit_name' && sub_cat_icon='$sub_cat_icon' && cat_id = $cat_id ");
	 		$check->setFetchMode(PDO::FETCH_ASSOC);
	 		$check->execute();
	 		$count = $check->rowCount();
	 		
	 		if ($count == 1) {
	 			echo "<script>alert('Already Added')</script>";
	 			echo "<script>window.open('index.php?sub_cat','_self')</script>";
	 		} else {

				$edit_sub_cat = $con->prepare("update sub_cat set sub_cat_name = '$edit_name',cat_id='$cat_id', sub_cat_icon='$sub_cat_icon' where sub_cat_id='$id'");
		 		if ($edit_sub_cat->execute()) {
		 			echo "<script>alert('Updated')</script>";
		 			echo "<script>window.open('index.php?sub_cat','_self')</script>";
		 		} else {
		 			echo "<script>alert('Not Updated')</script>";
		 			echo "<script>window.open('index.php?sub_cat','_self')</script>";
		 		}
	 		}
		}



 	}
 }


 function add_sub_cat() {
 	include('inc/db.php');
 	if(isset($_POST['add_sub_cat'])) {
 		$sub_cat_name = $_POST['sub_cat_name'];
 		$sub_cat_icon = $_POST['sub_cat_icon'];
 		$cat_id = $_POST['cat_id'];

 		$check = $con->prepare("select * from sub_cat where sub_cat_name='$sub_cat_name' && sub_cat_icon='$sub_cat_icon' ");
 		$check->setFetchMode(PDO::FETCH_ASSOC);
 		$check->execute();
 		$count = $check->rowCount();

 		if ($count == 1) {
 			echo "<script>alert('Already Added')</script>";
 			echo "<script>window.open('index.php?sub_cat','_self')</script>";
 		} else {
 			$add_cat = $con->prepare("insert into sub_cat (sub_cat_name,sub_cat_icon, cat_id) values ('$sub_cat_name', '$sub_cat_icon', '$cat_id')");
 			print_r($add_cat);
	 		if ($add_cat->execute()) {
	 			echo "<script>alert('Added')</script>";
	 			echo "<script>window.open('index.php?sub_cat','_self')</script>";
	 		} else {
	 			// echo "<script>alert('Not Added')</script>";
	 			// echo "<script>window.open('index.php?sub_cat','_self')</script>";
	 		}
 		}

 	}
 }

 function view_cat() {
 	include("inc/db.php");
 	$i = 1;
 	$get_cat = $con->prepare("select * from cat");
 	$get_cat->setFetchMode(PDO::FETCH_ASSOC);
 	$get_cat->execute();
 	while($row=$get_cat->fetch()):
 		echo "<tr><td>".$i++."</td>";
 		echo "<td>".$row['cat_icon']." ".$row['cat_name']."</td>";
 		echo "<td><a href='index.php?cat&edit_cat=".$row['cat_id']."' title='Edit'><i class='far fa-edit'></i></a>";
 		echo "<a style='color:red;margin-left: 5%' href='index.php?cat&del_cat=".$row['cat_id']."' title='Delete'><i class='fas fa-trash-alt'></i></a></td></tr>";
 	
 	endwhile;

 	if(isset($_GET['del_cat'])) {
 		$id = $_GET['del_cat'];

 		$del = $con->prepare("delete from cat where cat_id='$id'");
 		if($del->execute()) {
 			echo "<script>alert('Category Deleted Successfully')</script>";
 			echo "<script>window.open('index.php?cat','_self')</script>";
 		} else {
 			echo "<script>alert('Category Not Deleted Successfully')</script>";
 			echo "<script>window.open('index.php?cat','_self')</script>";
 		}
 	}
 }

  function view_lang() {
 	include("inc/db.php");
 	$i = 1;
 	$get_lang = $con->prepare("select * from lang");
 	$get_lang->setFetchMode(PDO::FETCH_ASSOC);
 	$get_lang->execute();
 	while($row=$get_lang->fetch()):
 		echo "<tr><td>".$i++."</td>";
 		echo "<td>".$row['lang_name']."</td>";
 		echo "<td><a href='index.php?lang&edit_lang=".$row['lang_id']."'><i class='far fa-edit'></i></a>";
 		echo "<a style='color:red;margin-left: 5%' href='index.php?lang&del_lang=".$row['lang_id']."'><i class='fas fa-trash-alt'></i></a></td></tr>";
 	
 	endwhile;

 	if(isset($_GET['del_lang'])) {
 		$id = $_GET['del_lang'];

 		$del = $con->prepare("delete from lang where lang_id='$id'");
 		if($del->execute()) {
 			echo "<script>alert('Deleted Successfully')</script>";
 			echo "<script>window.open('index.php?lang','_self')</script>";
 		} else {
 			echo "<script>alert('Not Deleted Successfully')</script>";
 			echo "<script>window.open('index.php?lang','_self')</script>";
 		}
 	}
 }


 function view_sub_cat() {
 	include("inc/db.php");
 	$i = 1;
 	$get_sub_cat = $con->prepare("select * from sub_cat");
 	$get_sub_cat->setFetchMode(PDO::FETCH_ASSOC);
 	$get_sub_cat->execute();
 	while($row=$get_sub_cat->fetch()):
 		echo "<tr><td>".$i++."</td>";
 		echo "<td>".$row['sub_cat_icon']." ".$row['sub_cat_name']."</td>";
 		echo "<td><a href='index.php?sub_cat&edit_sub_cat=".$row['sub_cat_id']."'><i class='far fa-edit'></i></a>";
 		echo "<a style='color:red;margin-left: 5%' href='index.php?sub_cat&del_sub_cat=".$row['sub_cat_id']."'><i class='fas fa-trash-alt'></i></a></td>";
 	endwhile;

 	if(isset($_GET['del_sub_cat'])) {
 		$id = $_GET['del_sub_cat'];

 		$del = $con->prepare("delete from sub_cat where sub_cat_id='$id'");
 		if($del->execute()) {
 			echo "<script>alert('Sub Category Deleted Successfully')</script>";
 			echo "<script>window.open('index.php?sub_cat','_self')</script>";
 		} else {
 			echo "<script>alert('Sub Category Not Deleted Successfully')</script>";
 			echo "<script>window.open('index.php?sub_cat','_self')</script>";
 		}
 	}
 }


 function select_cat() {
 	include("inc/db.php");
 	$get_cat = $con->prepare("select * from cat");
 	$get_cat->setFetchMode(PDO::FETCH_ASSOC);
 	$get_cat->execute();
 	while($row=$get_cat->fetch()):
 		echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
 	endwhile;

 }

 function add_terms() {
 	include('inc/db.php');
 	if(isset($_POST['add_term'])) {
 		$term = $_POST['term'];
 		$term_for = $_POST['term_for'];

 		$check = $con->prepare("select * from terms where terms='$term'");
 		$check->setFetchMode(PDO::FETCH_ASSOC);
 		$check->execute();
 		$count = $check->rowCount();

 		if ($count == 1) {
 			echo "<script>alert('Term is already added')</script>";
 			echo "<script>window.open('index.php?terms','_self')</script>";
 		} else {
 			$add_cat = $con->prepare("insert into terms (terms, terms_for) values ('$term', '$term_for')");
	 		if ($add_cat->execute()) {
	 			echo "<script>alert('Added')</script>";
	 			echo "<script>window.open('index.php?terms','_self')</script>";
	 		} else {
	 			echo "<script>alert('Not Added')</script>";
	 			echo "<script>window.open('index.php?terms','_self')</script>";
	 		}
 		}

 	}
 }

 function view_terms() {
 	include("inc/db.php");
 	$get_terms = $con->prepare("select * from terms");
 	$get_terms->setFetchMode(PDO::FETCH_ASSOC);
 	$get_terms->execute();
 	$i = 1;
 	while($row=$get_terms->fetch()):
 		echo "<tr><td>".$i++."</td>";
 		echo "<td>".$row['terms']."</td>";
 		echo "<td>".$row['terms_for']."</td>";
 		echo "<td><a href='index.php?terms&edit_term=".$row['term_id']."'><i class='far fa-edit'></i></a>";
 		echo "<a style='color:red;margin-left: 5%' href='index.php?terms&del_term=".$row['term_id']."'><i class='fas fa-trash-alt'></i></a></td>";
 	endwhile;

 	if(isset($_GET['del_term'])) {
 		$id = $_GET['del_term'];

 		$del = $con->prepare("delete from terms where term_id='$id'");
 		if($del->execute()) {
 			echo "<script>alert('T&C Deleted Successfully')</script>";
 			echo "<script>window.open('index.php?terms','_self')</script>";
 		} else {
 			echo "<script>alert('T&C Not Deleted Successfully')</script>";
 			echo "<script>window.open('index.php?terms','_self')</script>";
 		}
 	}
 }


  function edit_term() {
 	include('inc/db.php');
 	
 	if(isset($_GET['edit_term'])) {
		$id = $_GET['edit_term'];
		$get_sub_cat = $con->prepare("select * from terms where term_id='$id'");
		$get_sub_cat->setFetchMode(PDO::FETCH_ASSOC);
		$get_sub_cat->execute();
		$row = $get_sub_cat->fetch();
		
 		echo "<h3>Edit T&C</h3>
			<form id='edit' method='post' enctype='multipart/form-data'>
				<select name='terms_for'>
				<option value='".$row['terms_for']."'>".$row['terms_for']."</option>
				<option value='Students'>Students</option>
				<option value='Teachers'>Teachers</option>";
			echo "</select>
			<input type='text' value='".$row['terms']."' name='term' placeholder='Enter new T&C'>
			<center><button name='edit_term'>Edit T&C</button></center>
			</form>";
		if (isset($_POST['edit_term'])) {
			$id = $_GET['edit_term'];
			$terms_for = $_POST['terms_for'];
			$terms = $_POST['term'];
			$check = $con->prepare("select * from terms where terms_for='$terms_for' and terms='$terms'");
	 		$check->setFetchMode(PDO::FETCH_ASSOC);
	 		$check->execute();
	 		$count = $check->rowCount();
	 		if ($count == 1) {
	 			echo "<script>alert('Already Added')</script>";
	 			echo "<script>window.open('index.php?terms','_self')</script>";
	 		} else {

				$edit_sub_cat = $con->prepare("update terms set terms='$terms',terms_for='$terms_for' where term_id='$id'");
		 		if ($edit_sub_cat->execute()) {
		 			echo "<script>alert('Updated')</script>";
		 			echo "<script>window.open('index.php?terms','_self')</script>";
		 		} else {
		 			echo "<script>alert('Not Updated')</script>";
		 			echo "<script>window.open('index.php?terms','_self')</script>";
		 		}
	 		}
		}



 	}
 }

 function contact(){
 	include("inc/db.php");

 	$get_con = $con->prepare("select * from contact");
 	$get_con->setFetchMode(PDO::FETCH_ASSOC);
 	$get_con->execute();
 	$row=$get_con->fetch();
 	$count = $get_con->rowCount();
 	if ($count>0) {
 		echo "<form method='post' enctype='multipart/form-data'>
				<table>
					<tr>
						<td>Update Phone Number</td>
						<td><input type='text' value='".$row['phn']."' name='phn' ></td>
					</tr>
					<tr>
						<td>Update Email</td>
						<td><input type='text' value='".$row['email']."' name='email'></td>
					</tr>
					<tr>
						<td>Update Office Address Line 1</td>
						<td><input type='text' value='".$row['add1']."' name='add1'></td>
					</tr>
					<tr>
						<td>Update Office Address Line 1</td>
						<td><input type='text' value='".$row['add2']."' name='add2'></td>
					</tr>
					<tr>
						<td>http://youtube.com/</td>
						<td><input type='text' value='".$row['yt']."' name='yt'></td>
					</tr>
					<tr>
						<td>http://facebook.com/</td>
						<td><input type='text' value='".$row['fb']."' name='fb'></td>
					</tr>
					<tr>
						<td>http://plus.google.com/</td>
						<td><input type='text' value='".$row['gp']."' name='gp'></td>
					</tr>
					<tr>
						<td>http://twitter.com/</td>
						<td><input type='text' value='".$row['tw']."' name='tw'></td>
					</tr>
					<tr>
						<td>http://LinkedIn.com/</td>
						<td><input type='text' value='".$row['ln']."' name='ln'></td>
					</tr>

				</table>
				<center><button name='up_con'>Edit</button></center>
			</form>";
	} else { 
		echo "<center><p style='background:red;color:white;'><b>Note : </b> You have not added contact details to be displayed to users till now.</p></center>";
		echo "<form method='post' enctype='multipart/form-data'>
				<table>
					<tr>
						<td>Update Phone Number</td>
						<td><input type='text' value='' name='phn' ></td>
					</tr>
					<tr>
						<td>Update Email</td>
						<td><input type='text' value='' name='email'></td>
					</tr>
					<tr>
						<td>Update Office Address Line 1</td>
						<td><input type='text' value='' name='add1'></td>
					</tr>
					<tr>
						<td>Update Office Address Line 1</td>
						<td><input type='text' value='' name='add2'></td>
					</tr>
					<tr>
						<td>http://youtube.com/</td>
						<td><input type='text' value='' name='yt'></td>
					</tr>
					<tr>
						<td>http://facebook.com/</td>
						<td><input type='text' value='' name='fb'></td>
					</tr>
					<tr>
						<td>http://plus.google.com/</td>
						<td><input type='text' value='' name='gp'></td>
					</tr>
					<tr>
						<td>http://twitter.com/</td>
						<td><input type='text' value='' name='tw'></td>
					</tr>
					<tr>
						<td>http://LinkedIn.com/</td>
						<td><input type='text' value='' name='ln'></td>
					</tr>

				</table>
				<center><button name='add_con'>Save</button></center>
			</form>";
	}
	if (isset($_POST['up_con'])) {
		$phn = $_POST['phn'];
		$email = $_POST['email'];
		$add1 = $_POST['add1'];
		$add2 = $_POST['add2'];
		$yt = $_POST['yt'];
		$fb = $_POST['fb'];
		$tw = $_POST['tw'];
		$gp = $_POST['gp'];
		$ln = $_POST['ln'];

		$up = $con->prepare("update contact set email='$email', add1='$add1', add2='$add2', yt='$yt', fb='$fb', tw='$tw', gp='$gp', ln='$ln', phn='$phn'");
		if ($up->execute()) {
			echo "<script>alert('Updated')</script>";
			echo "<script>window.open('index.php?contact','_self')</script>";
		} else {
			echo "<script>alert('Not Updated')</script>";
			echo "<script>window.open('index.php?contact','_self')</script>";
		}
	}

	if (isset($_POST['add_con'])) {
		$phn = $_POST['phn'];
		$email = $_POST['email'];
		$add1 = $_POST['add1'];
		$add2 = $_POST['add2'];
		$yt = $_POST['yt'];
		$fb = $_POST['fb'];
		$tw = $_POST['tw'];
		$gp = $_POST['gp'];
		$ln = $_POST['ln'];
//INSERT INTO `contact`(`id`, `email`, `add1`, `add2`, `yt`, `fb`, `tw`, `gp`, `ln`, `phn`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10])
		$add = $con->prepare("INSERT INTO `contact`(`email`, `add1`, `add2`, `yt`, `fb`, `tw`, `gp`, `ln`, `phn`) VALUES ('$email','$add1','$add2','$yt','$fb','$tw','$gp','$ln','$phn')");
		if ($add->execute()) {
			echo "<script>window.open('index.php?contact','_self')</script>";
		} else {
			echo "<script>alert('Something went wrong')</script>";
			echo "<script>window.open('index.php?contact','_self')</script>";
		}
	}

 }


 function add_faqs() {
 	include('inc/db.php');
 	if(isset($_POST['add_faqs'])) {
 		$qsn = $_POST['qsn'];
 		$ans = $_POST['ans'];

 		$check = $con->prepare("select * from faqs where qsn='$qsn'");
 		$check->setFetchMode(PDO::FETCH_ASSOC);
 		$check->execute();
 		$count = $check->rowCount();

 		if ($count == 1) {
 			echo "<script>alert('Already Added')</script>";
 			echo "<script>window.open('index.php?faqs','_self')</script>";
 		} else {
 			$add_qsn = $con->prepare("insert into faqs (qsn, ans) values ('$qsn','$ans')");
	 		if ($add_qsn->execute()) {
	 			echo "<script>alert('Added')</script>";
	 			echo "<script>window.open('index.php?faqs','_self')</script>";
	 		} else {
	 			echo "<script>alert('Not Added')</script>";
	 			echo "<script>window.open('index.php?faqs','_self')</script>";
	 		}
 		}

 	}
 }


  function view_faqs() {
 	include("inc/db.php");
 	$i = 1;
 	$get_faqs = $con->prepare("SELECT * FROM `faqs` ORDER BY `q_id` DESC");
 	$get_faqs->setFetchMode(PDO::FETCH_ASSOC);
 	$get_faqs->execute();
 	echo "<div id='add'>";
 	while($row=$get_faqs->fetch()):
 		echo "
	 		<details>
				<summary>".$row['qsn']."</summary>
				<form method='post' enctype='multipart/form-data'>
					<input type='text' name='up_qsn' value='".$row['qsn']."' placeholder='Enter new Question'>
					<input type='hidden' name='q_id' value='".$row['q_id']."' />
					<textarea name='up_ans' placeholder='Enter Your Answer'>".$row['qsn']."</textarea>
					<center><button name='up_faqs'>Edit FAQs</button></center>
				</form>
			</details>";
 	
 	endwhile;
 	echo "</div>";

 	if (isset($_POST['up_faqs'])) {
			$id = $_POST['q_id'];
			$qsn = $_POST['up_qsn'];
			$ans = $_POST['up_ans'];

				$up_faqs = $con->prepare("update faqs set qsn='$qsn', ans='$ans' where q_id='$id'");
		 		if ($up_faqs->execute()) {
		 			echo "<script>alert('Updated')</script>";
		 			echo "<script>window.open('index.php?faqs','_self')</script>";
		 		} else {
		 			echo "<script>alert('Not Updated')</script>";
		 			echo "<script>window.open('index.php?faqs','_self')</script>";
		 		}
		}

 }

 function about() {
 	include('inc/db.php');
 	$get_about = $con->prepare("select * from about");
 	$get_about->setFetchMode(PDO::FETCH_ASSOC);
 	$get_about->execute();
 	$row = $get_about->fetch();
 	$count = $get_about->rowCount();
 	if ($count>0) {
	 	echo"<form method='post'>
	 			<textarea name='about'>".$row['about']."</textarea>
	 			<input type='hidden' value='".$row['a_id']."' name='a_id' />
	 			<button name='up_about'>Save</button>
	 		</form>";
	 } else {
	 	echo "<center><p style='background:red;color:white;margin-bottom:2%;'><b>Note : </b> You have not added about details to be displayed to users till now.</p></center>";
	 	echo"<form method='post'>
	 			<textarea name='about'></textarea>
	 			<input type='hidden' value='' name='a_id' />
	 			<button name='add_about'>Save</button>
	 		</form>";
	 }

 	if (isset($_POST['up_about'])) {
 		$id = $_POST['a_id'];
 		$about = $_POST['about'];

 		$up_about = $con->prepare("update about set about='$about' where a_id='$id'");
 		if($up_about->execute()) {
 			echo "<script>alert('Updated')</script>";
		 	echo "<script>window.open('index.php?about','_self')</script>";
 		} else {
 			echo "<script>alert('Not Updated')</script>";
		 	echo "<script>window.open('index.php?about','_self')</script>";
 		}
 	}

 	if (isset($_POST['add_about'])) {
 		$id = $_POST['a_id'];
 		$about = $_POST['about'];

 		$up_about = $con->prepare("INSERT INTO `about`( `about`) VALUES ('$about')");
 		if($up_about->execute()) {
		 	echo "<script>window.open('index.php?about','_self')</script>";
 		} else {
 			echo "<script>alert('Something went wrong')</script>";
		 	echo "<script>window.open('index.php?about','_self')</script>";
 		}
 	}

 }

 function publish() {
 	include('inc/db.php');
 	$id = $_POST['id'];
 	$publish = $con->prepare("update courses set course_status='Active' where course_id='$id'");
 	if ($publish->execute()) {
 		echo "<script>alert('Course Published Successfully')</script>";
 		echo "<script>window.open('index.php?pending','_self')</script>";
 	} else {
 		echo "<script>alert('Something went wrong')</script>";
 		echo "<script>window.open('index.php?pending','_self')</script>";
 	}

 }


 function unpublish() {
 	include('inc/db.php');
 	$id = $_POST['id'];
 	$publish = $con->prepare("update courses set course_status='Inactive' where course_id='$id'");
 	if ($publish->execute()) {
 		echo "<script>alert('Course Unpublished Successfully')</script>";
 		echo "<script>window.open('index.php?active','_self')</script>";
 	} else {
 		echo "<script>alert('Something went wrong')</script>";
 		echo "<script>window.open('index.php?active','_self')</script>";
 	}

 }


 function view_pending() {
 	include('inc/db.php');
 	$get_pending = $con->prepare("select * from courses where course_status='Inactive'");
 	$get_pending->setFetchMode(PDO::FETCH_ASSOC);
 	$get_pending->execute();
 	$i=1;
 	while ($row=$get_pending->fetch()):
 		$id = $row['course_id'];
 		echo "<tr><td>$i</td><td>".$row['course_title']."</td><td>".$row['course_price']."</td><td><a href='../course_details.php?course_id=$id'>View</a></td><td><form method='post'><input type='hidden' name='id' value='$id' /><button name='publish'>Publish</button></form></td></tr>";
 	endwhile;
 }

  function view_active() {
 	include('inc/db.php');
 	$get_pending = $con->prepare("select * from courses where course_status='Active'");
 	$get_pending->setFetchMode(PDO::FETCH_ASSOC);
 	$get_pending->execute();
 	$i=1;
 	while ($row=$get_pending->fetch()):
 		$id = $row['course_id'];
 		echo "<tr><td>$i</td><td>".$row['course_title']."</td><td>".$row['course_price']."</td><td>$0</td><td><form method='post'><input type='hidden' name='id' value='$id' /><button name='unpublish'>Unpublish</button></form></td><td ><a href='../course_details.php?course_id=$id' >View</a></td></tr>";
 	endwhile;
 }


 function view_stud() {
 	include('inc/db.php');
 	$get_stud = $con->prepare('select * from signup');
 	$get_stud->setFetchMode(PDO::FETCH_ASSOC);
 	$get_stud->execute();
 	$i=1;
 	while ($row=$get_stud->fetch()):
 		echo "<tr>
 			<td>$i</td>
 			<td>".$row['s_name']."</td>
 			<td>kxbjs</td>
 			<td>".$row['s_email']."</td>
 			<td>".$row['s_phn']."</td>
 			</tr>";
 		$i++;
 	endwhile;

 }

 function view_tea() {
 	include('inc/db.php');
 	$get_stud = $con->prepare('select * from teacher');
 	$get_stud->setFetchMode(PDO::FETCH_ASSOC);
 	$get_stud->execute();
 	$i=1;
 	while ($row=$get_stud->fetch()):
 		echo "<tr>
 			<td>$i</td>
 			<td>".$row['t_name']."</td>
 			<td>kxbjs</td>
 			<td>".$row['t_email']."</td>
 			<td>".$row['t_phn']."</td>
 			</tr>";
 		$i++;
 	endwhile;

 }
  
function view_mes() {
	include('inc/db.php');
 	$get_stud = $con->prepare('select * from messages');
 	$get_stud->setFetchMode(PDO::FETCH_ASSOC);
 	$get_stud->execute();
 	$i=1;
 	while ($row=$get_stud->fetch()):
 		echo "<tr>
 			<td>$i</td>
 			<td>".$row['name']."</td>
 			<td>".$row['email']."</td>
 			<td>".$row['msg']."</td>
 			</tr>";
 		$i++;
 	endwhile;
}

function get_visitors() {
	include('inc/db.php');
	$get_visitors = $con->prepare('select * from visitor');
	$get_visitors->setFetchMode(PDO::FETCH_ASSOC);
	$get_visitors->execute();
	$row = $get_visitors->fetch();
	echo $row['visitor'];
}

function get_users() {
	include('inc/db.php');
	$get_visitors = $con->prepare('select * from signup');
	$get_visitors->setFetchMode(PDO::FETCH_ASSOC);
	$get_visitors->execute();
	$count = $get_visitors->rowCount();
	echo $count;
}

function get_teachers() {
	include('inc/db.php');
	$get_visitors = $con->prepare('select * from teacher');
	$get_visitors->setFetchMode(PDO::FETCH_ASSOC);
	$get_visitors->execute();
	$count = $get_visitors->rowCount();
	echo $count;	
}

function get_pen_courses() {
	include('inc/db.php');
	$get_visitors = $con->prepare("select * from courses where course_status='Inactive'");
	$get_visitors->setFetchMode(PDO::FETCH_ASSOC);
	$get_visitors->execute();
	$count = $get_visitors->rowCount();
	echo $count;
}

function get_act_courses() {
	include('inc/db.php');
	$get_visitors = $con->prepare("select * from courses where course_status='Active'");
	$get_visitors->setFetchMode(PDO::FETCH_ASSOC);
	$get_visitors->execute();
	$count = $get_visitors->rowCount();
	echo $count;	
}


?>