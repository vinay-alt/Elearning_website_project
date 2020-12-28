<?php 
	session_start();
	function head_link() { 
		include("inc/db.php");
		$get_link = $con->prepare("select * from contact");
		$get_link->setFetchMode(PDO::FETCH_ASSOC);
		$get_link->execute();
		$row=$get_link->fetch();
		if (!$row) {
			echo "<ul>
				<li><a href='#' target='_blank'><i class='fab fa-facebook-f'></i></a></li>
				<li><a href='#' target='_blank'><i class='fab fa-twitter'></i></a></li>
				<li><a href='#' target='_blank'><i class='fab fa-google-plus'></i></a></li>
				<li><a href='#' target='_blank'><i class='fab fa-youtube'></i></a></li>
				<li><a href='#' target='_blank'><i class='fab fa-linkedin'></i></a></li>
			</ul>";

		} else {
		echo "<ul>
				<li><a href='".$row['fb']."' target='_blank'><i class='fab fa-facebook-f'></i></a></li>
				<li><a href='".$row['tw']."' target='_blank'><i class='fab fa-twitter'></i></a></li>
				<li><a href='".$row['gp']."' target='_blank'><i class='fab fa-google-plus'></i></a></li>
				<li><a href='".$row['yt']."' target='_blank'><i class='fab fa-youtube'></i></a></li>
				<li><a href='".$row['ln']."' target='_blank'><i class='fab fa-linkedin'></i></a></li>
			</ul>";
		}
	}
	function menu_cat() { 
		include('inc/db.php');
		$get_cat = $con->prepare("select * from cat");
		$get_cat->setFetchMode(PDO::FETCH_ASSOC);
		$get_cat->execute();
		while($row=$get_cat->fetch()):
			echo "<li><a href='category.php?sub&name=".$row['cat_name']."'>".$row['cat_icon']." ".$row['cat_name']."</a>";
			$cat_id = $row['cat_id'];
			$get_sub_cat = $con->prepare("select * from sub_cat where cat_id='$cat_id'");
			$get_sub_cat->setFetchMode(PDO::FETCH_ASSOC);
			$get_sub_cat->execute();
			echo "<ul id='sub_menu' >";

			while ($row1=$get_sub_cat->fetch()):
				echo "<li><a href='sub_category.php?cou&name=".$row1['sub_cat_name']."'>".$row1['sub_cat_icon'].$row1['sub_cat_name']."</a></li>";
			endwhile;

			echo "</ul>";

	
			echo "</li>";
		endwhile;	
	}
	function cat_list() { 
		include('inc/db.php');
		$get_cat = $con->prepare("select * from cat");
		$get_cat->setFetchMode(PDO::FETCH_ASSOC);
		$get_cat->execute();
		while($row=$get_cat->fetch()):
			echo "<li><a href='category.php?sub&name=".$row['cat_name']."'>".$row['cat_icon']." ".$row['cat_name']."</a></li>";
		endwhile;	
	}
	function sub_cat_list() { 
		include('inc/db.php');
		$get_cat = $con->prepare("select * from sub_cat");
		$get_cat->setFetchMode(PDO::FETCH_ASSOC);
		$get_cat->execute();
		while($row=$get_cat->fetch()):
			echo "<li><a href='sub_category.php?cou&name=".$row['sub_cat_name']."'>".$row['sub_cat_icon']." ".$row['sub_cat_name']."</a></li>";
		endwhile;	
	}
	function home_cat() {
		include('inc/db.php');
		$get_cat = $con->prepare("select * from cat limit 4");
		$get_cat->setFetchMode(PDO::FETCH_ASSOC);
		$get_cat->execute();

		while($row=$get_cat->fetch()):

			$cat = $row['cat_name'];
			$get_course = $con->prepare("select * from courses where course_cat='$cat' ");
			$get_course->setFetchMode(PDO::FETCH_ASSOC);
			$get_course->execute();
			$count = $get_course->rowCount();

			echo "<li>
					<a href='category.php?sub&name=".$row['cat_name']."'>
						".$row['cat_icon']."
						<h4>".$row['cat_name']."</h4>
						<p>".$count."</p>
					</a>				
				</li>";
		endwhile;
	}
	function cat_page() {
		include('inc/db.php');
		$get_cat = $con->prepare("select * from cat");
		$get_cat->setFetchMode(PDO::FETCH_ASSOC);
		$get_cat->execute();

		while($row=$get_cat->fetch()):

			$cat = $row['cat_name'];
			$get_course = $con->prepare("select * from courses where course_cat='$cat' ");
			$get_course->setFetchMode(PDO::FETCH_ASSOC);
			$get_course->execute();
			$count = $get_course->rowCount();

			echo "<li>
					<a href='category.php?sub&name=".$row['cat_name']."'>
						".$row['cat_icon']."
						<h4>".$row['cat_name']."</h4>
						<p>".$count."</p>
					</a>				
				</li>";
		endwhile;
	}
	function all_sub_cat_page() {
		include('inc/db.php');
		$get_cat = $con->prepare("select * from sub_cat");
		$get_cat->setFetchMode(PDO::FETCH_ASSOC);
		$get_cat->execute();

		while($row=$get_cat->fetch()):
			$sub_cat = $row['sub_cat_name'];
			$get_course = $con->prepare("select * from courses where course_sub_cat='$sub_cat' ");
			$get_course->setFetchMode(PDO::FETCH_ASSOC);
			$get_course->execute();
			$count = $get_course->rowCount();
			

			echo "<li>
					<a href='sub_category.php?cou&name=".$row['sub_cat_name']."'>
						".$row['sub_cat_icon']."
						<h4>".$row['sub_cat_name']."</h4>
						<p>".$count."</p>
					</a>				
				</li>";

		endwhile;



	}
	function sub_cat_page() {
		include('inc/db.php');
		$name=$_GET['name'];
		
		$get_cat = $con->prepare("select * from cat where cat_name='$name'");
		$get_cat->setFetchMode(PDO::FETCH_ASSOC);
		$get_cat->execute();
		$row1 = $get_cat->fetch();

		$get_sub_cat = $con->prepare("select * from sub_cat where cat_id='".$row1['cat_id']."'");
		$get_sub_cat->setFetchMode(PDO::FETCH_ASSOC);
		$get_sub_cat->execute();


		
		echo "<div id='crumb'>
				<span><a href='index.php'>HOME</a></span> <b>></b>
				<span>".$row1['cat_name']."</span>
			</div>
			<div id='bar' onclick='sideBar();'><i class='fas fa-bars'></i></div>
			<h2>".$row1['cat_name']."</h2>
			<ul>";

		$i = 0;
			
		while($row=$get_sub_cat->fetch()):
				
				$sub_cat = $row['sub_cat_name'];
				$get_course = $con->prepare("select * from courses where course_sub_cat='$sub_cat' ");
				$get_course->setFetchMode(PDO::FETCH_ASSOC);
				$get_course->execute();
				$count = $get_course->rowCount();

				$i++;
				echo"<li>
						<a href='sub_category.php?cou&name=".$row['sub_cat_name']."'>
							".$row['sub_cat_icon']."
							<h4>".$row['sub_cat_name']."</h4>
							<p>".$count."</p>
						</a>				
					</li>";
		endwhile;

		if($i==0) {
			echo "<p>No Sub Categories Found</p>";
		}

		echo "<br clear='all'>
				</ul><br clear='all' />";
	}
	function cart() {
		include('inc/db.php');

		$total = 0;

		$i=0;

		if (isset($_SESSION['account'])) {
				$id = $_SESSION['account'];
				$get_cart = $con->prepare("select * from cart where user_id='$id'");
				$get_cart->setFetchMode();
				$get_cart->execute();
		}

		echo "<div id='wrap'>
				<div id='crumb'>
					<span><a href='index.php'>HOME</a></span> <b>></b>
					<span>My Cart</span>
				</div>";
				
				echo"</div>
				<div id='cart'>
					<h2>Your Cart</h2>
				<ul>";
			
				if (isset($_SESSION['account'])) {

					while($row=$get_cart->fetch()):
							$i++;
							$c_id=$row['course_id'];
							$get_course=$con->prepare("select * from courses where course_id ='$c_id' ");
							$get_course->setFetchMode(PDO::FETCH_ASSOC);
							$get_course->execute();
							$row1 = $get_course->fetch();

							$price = $row1['course_price']-($row1['course_price']*$row1['course_discount'])*0.01;
							$total = $total + $price;

							$t_id = $row1['t_id'];
							$get_course =$con->prepare("select * from teacher where t_id = '$t_id'");
							$get_course->setFetchMode(PDO::FETCH_ASSOC);
							$get_course->execute();
							$row2= $get_course->fetch();

							echo "<li>
								<a href='course_details.php?course_id=".$row1['course_id']."'>
									<img src='".$row1['course_img']."'>
									<h3>".$row1['course_title']."</h3>
				    				<h4>price: $".$row1['course_price']."</h4>
									<h5>Teacher Name : ".$row2['t_name']."</h5>
								</a>
								<b><a href='inc/remove.php?course_id=".$row1['course_id']."'><i class='fas fa-trash-alt'></i>Remove</a></b>
							</li>";


					endwhile;

			echo"</ul><br clear='all'>";

					if ($i<=0) {
						echo "<div id='except'>
									<p>
									No Courses Added to Cart
									</p>
								</div>";
					}
				} else {
					echo "<div id='except'>

							<p>
								 Sorry! You are not logged in
							</p>
						</div>";
				}


		if (isset($_SESSION['account'])) {
				
			
			echo"<div id='action'>
					<form method='post'>
									<button name='keep'>Keep Shopping</button>
									<button name='check'>Checkout</button>
					</form><p>Amount Payable :$$total</p></div><br clear='all'>";
							if (isset($_POST['keep'])) {
								header('Location:index.php');
							}
		}
	


			echo"</div>";
	}
	function course_details() {
		include('inc/db.php');
		$id = $_GET['course_id'];

 		$get_course =$con->prepare("select * from courses where course_id = '$id'");
		$get_course->setFetchMode(PDO::FETCH_ASSOC);
		$get_course->execute();
		$row = $get_course->fetch();

		$t_id = $row['t_id'];
		if (isset($_SESSION['account'])) {	
			$u_id = $_SESSION['account'];

			$get_cart = $con->prepare("select * from cart where course_id='$id' && user_id='$u_id'  ");
			$get_cart->setFetchMode(PDO::FETCH_ASSOC);
			$get_cart->execute();
			$count = $get_cart->rowCount();
		} else {
			$count=0;
		}

		if (isset($_SESSION['account'])) {	
			$u_id = $_SESSION['account'];

			$get_enroll = $con->prepare("select * from enrolled where course_id='$id' && user_email='$u_id'  ");
			$get_enroll->setFetchMode(PDO::FETCH_ASSOC);
			$get_enroll->execute();
			$count1 = $get_enroll->rowCount();
		} else {
			$count1=0;
		}

		$get_course =$con->prepare("select * from teacher where t_id = '$t_id'");
		$get_course->setFetchMode(PDO::FETCH_ASSOC);
		$get_course->execute();
		$row1= $get_course->fetch();		

		$price = $row['course_price']-($row['course_price']*$row['course_discount'])*0.01;
		$saving = $row['course_price']-$price;

		echo "<div id='crumb'>
				<span><a href='index.php'>HOME</a></span> <b>></b>
				<span><a href='all_course.php'>All courses</a></span> <b>></b> <span>Course Details</span> <b>></b> <span>".$row['course_title']."</span>
			</div>
			<div id='course_left'>
				<img src='".$row['course_img']."' />
				
			</div>
			<div id='course_right'>
				<h2>".$row['course_title']."</h2>
				<table>
					<tr>
						<td>Instructor </td>
						<td>".$row1['t_name']."</td>
					</tr>
					<tr>
						<td>Enroll By </td>
						<td>9 students</td>
					</tr>
					<tr>
						<td>Level </td>
						<td>".$row['course_level']."</td>
					</tr>
					<tr>
						<td>Language</td>
						<td>".$row['course_lang']."</td>
					</tr>
					<tr>
						<td>Lectures</td>
						<td> 0 </td>
					</tr>
				</table>
				<div id='price'>
					<h2>Price : $$price <span>$".$row['course_price']."</span> <b>".$row['course_discount']."%</b> Saving $$saving</h2>
				</div>
				<form method='post' >
				<center>
					<input type='hidden' name='course_id' value='".$row['course_id']."'>";
				if ($count>0) {
					echo "<span>Added to Cart</span>";
					} else {	

					echo "<button name='add_cart' ><i class='fas fa-shopping-cart'></i> Add to Cart</button>";
				}

				if ($count1>0) {
					echo "<span>enrolled</span>";
					} else {	
					echo "<button name='enroll'><i class='fas fa-bolt'></i> Enroll Now</button>";
				}

					
				echo"</center>
				</form>
			</div><br clear='all' />
			<div id='c_desc'>
				<h2>Course Details</h2>
				<p> ".$row['course_desc']." </p>
				<h2>What will I Learn</h2>
				<p> ".$row['course_after']." </p>
				<h2>Before Starting</h2>
				<p>".$row['course_before']."</p>
				<h2>Instructor</h2>
				<img src='".$row1['t_img']."'>
				<p id='inst_info'>".$row1['t_name']."<br /><br />".$row1['t_info']."</p><br clear='all' />
				<h2>Curriculum</h2>
				<ul>";
				
					lec_dis();					
			echo "</ul>
			</div>";
			
			$search = $row['course_title'];
			$get_cart = $con->prepare(" SELECT * FROM courses WHERE course_title LIKE '%$search%' OR course_before LIKE '%$search%' OR course_after LIKE '%$search%' OR course_desc LIKE '%$search%' OR course_lang LIKE '%$search%' OR course_level LIKE '%$search%' OR course_cat LIKE '%$search%' OR course_sub_cat LIKE '%$search%' AND course_status = 'Active' ");	
			$get_cart->setFetchMode();
			$get_cart->execute();

			echo"<div id='c_rel'>
				<h2>Related Courses</h2>
				<ul>";
					$j = 0;
					while ($row5 = $get_cart->fetch()):
						if ($row5['course_title']!=$row['course_title']) {
							$j++;
						$x_id = $row5['course_id'];
						echo "<li>
						<a href='course_details.php?course_id=$x_id'>
							<img src='".$row5['course_img']."' /><br clear='all' />
							<p>".$row5['course_title']."</p>
						</a>
						</li>";
						}

					endwhile;
					if ($j==0) {
						echo "<li>
							<h3>No related courses</h3>
						</li>";
					}


				echo"</ul>
			</div><br clear='all' />
			";

		if (isset($_POST['add_cart'])) {
			 $name = $row['course_title'];

			if (isset($_SESSION['account'])) {	
				$u_id = $_SESSION['account'];	 
			 	$add_cart = $con->prepare("insert into cart (course, course_id, user_id) values ('$name','$id','$u_id') ");
			 	if($add_cart->execute()) {
			 		echo"<div id='alert'>
 					<h1>Added to cart</h1>
 					<center><i class='fas fa-check-circle'></i></center>
 					<button onclick='cart()'>CLOSE</button>
 				</div>";
			 		//echo "<script>window.open('cart.php','_self')</script>";
			 	}
			} else { 
				echo "<script>alert('You must login first')</script>";
				echo "<script>window.open('course_details.php?course_id=$id','_self')</script>";
			}
		}

		if (isset($_POST['enroll'])) {
			 $name = $row['course_title'];

			if (isset($_SESSION['account'])) {	
				$u_id = $_SESSION['account'];	 
			 	$enroll = $con->prepare("insert into enrolled (e_name, course_id, user_email) values ('$name','$id','$u_id') ");
			 	if($enroll->execute()) {
			 		echo "<script>alert('Enrolled successfully')</script>";
					echo "<script>window.open('course_details.php?course_id=$id','_self')</script>";
			 		
			 	} else {
			 		echo "<script>alert('Some Problem Occured!')</script>";
			 		echo "<script>window.open('course_details.php?course_id=$id','_self')</script>";
			 	}
			} else { 
				echo "<script>alert('You must login first')</script>";
				echo "<script>window.open('course_details.php?course_id=$id','_self')</script>";
			}
		}


	}


	function search() {
		include('inc/db.php');

		$search = $_GET['search'];
		$get_cart = $con->prepare(" SELECT * FROM courses WHERE course_title LIKE '%$search%' OR course_before LIKE '%$search%' OR course_after LIKE '%$search%' OR course_desc LIKE '%$search%' OR course_lang LIKE '%$search%' OR course_level LIKE '%$search%' OR course_cat LIKE '%$search%' OR course_sub_cat LIKE '%$search%' ");	

		$get_cart->setFetchMode();
		$get_cart->execute();
		echo "
		<div id='search_result'>
		<a id='back' href='index.php'>Go back</a>
		<form method='POST'>
			<input type='search' name='query' placeholder='Search courses from here' autocomplete='off'>
			<button name='search' ><i class='fas fa-search'></i></button>
		</form>
		<div id='contain'>
		<h1>Search Results</h1>";
		echo "<ul>";
		if (isset($_POST['search'])) {
			$search = $_POST['query'];
			
			echo "<script>window.open('index.php?search=$search','_self')</script>";
		}	
		$i = 0;
		while ($row = $get_cart->fetch()):
			if ($row['course_status']=='Active') {
				$id = $row['course_id'];
			echo "<li>
				<a href='course_details.php?course_id=$id'>
					<div id='img'>
						<img src='".$row['course_img']."' />
					</div>
					<div id='title'>
						<h3>".$row['course_title']."</h3>
					</div>
				</a>
			</li>";
			$i++;
			}
		endwhile;
		if ($i==0) {
			echo "<li>
				<h2>No Results Found</h2>
			</li>";
		}
		echo "</ul></div></div>";
	}


	function mycourses() {
		include('inc/db.php');

		$id = $_SESSION['account'];

		$get_enroll = $con->prepare("select * from enrolled where user_email='$id'");
		$get_enroll->setFetchMode(PDO::FETCH_ASSOC);
		$get_enroll->execute();
		while ($row = $get_enroll->fetch()):

			$name = $row['e_name'];
			$get_course = $con->prepare("select * from courses where course_title='$name'");
			$get_course->setFetchMode(PDO::FETCH_ASSOC);
			$get_course->execute();
			$row1 = $get_course->fetch();

			$c_id = $row1['course_id'];

			echo "<li>
				<a href='course_details.php?course_id=$c_id'>
				<div id='img'>
					<img src='".$row1['course_img']."' />
				</div>
				<div id='title'>
					<h3>".$row1['course_title']."</h3>
					<a href='lecture_nav.php?course_id=$c_id&lec=1'>Go to course</a>
				</div>
				</a>
			</li>";
		endwhile;
	}



	function lec_dis() {
 		include('inc/db.php');
 		$id=$_GET['course_id'];
 		$get_lec = $con->prepare("SELECT * FROM `$id` ");
 		$get_lec->setFetchMode(PDO::FETCH_ASSOC);
 		$get_lec->execute();

 		$i=1;
 		while($row=$get_lec->fetch()):
 			$l_id = $row['lec_id'];
 			echo "<li><i class='fas fa-video'></i> $i. ".$row['lec_name']."";
 			if (isset($_SESSION['account'])) {
 				
 				$u_id = $_SESSION['account'];

				$get_enroll = $con->prepare("select * from enrolled where course_id='$id' && user_email='$u_id'  ");
				$get_enroll->setFetchMode(PDO::FETCH_ASSOC);
				$get_enroll->execute();
				$count1 = $get_enroll->rowCount();

 				if ($count1>0) {
 					echo"<a href='lecture_nav.php?course_id=$id&lec=$l_id'>View</a>";
 				}
 			}
 			echo"</li>";
 			$i++;
 		endwhile;
 		if ($i<=1) {
 			echo "<p>No Lectures added to this course<p>";
 		}
 	}
	function add_signup() {

		include('inc/db.php');
		if (isset($_POST['s_signup'])) {
			$salt = 'XxZzy12*_';
			$s_name = $_POST['s_name'];
			$s_email = $_POST['s_email'];
			$s_phn = $_POST['s_phn'];
			$s_pass = hash('md5', $salt.$_POST['s_pass1']);

			$check = $con->prepare("select * from signup where s_name='$s_name' & s_email='$s_email'");
			$check->setFetchMode(PDO::FETCH_ASSOC);
 			$check->execute();
 			$count = $check->rowCount();

 			if ($count >= 1) {
	 			echo "<script>alert('Already Added')</script>";
	 			echo "<script>window.open('index.php','_self')</script>";
 			} else {
 				$add_signup = $con->prepare("insert into signup (s_name,s_email, s_phn, s_pass, s_img) values ('$s_name','$s_email','$s_phn','$s_pass','image/user/default.png')");
		 		if ($add_signup->execute()) {
		 			echo "<script>alert('Added')</script>";
		 			echo "<script>window.open('index.php','_self')</script>";
		 		} else {
		 			echo "<script>alert('Not Added')</script>";
		 			echo "<script>window.open('index.php','_self')</script>";
		 		}
 			}

		}
	}

	// else {
	// 	echo "<script>alert('Already Added')</script>";
	// 	$img='image/user/default.png';
	// }
	function get_teacher() {
		include('inc/db.php');
		$email = $_SESSION['account'];

		$get_teacher = $con->prepare("select * from teacher where t_email='$email'");
		$get_teacher->setFetchMode(PDO::FETCH_ASSOC);
		$get_teacher->execute();
		$count = $get_teacher->rowCount();
		if ($count>0) {
			$_SESSION['teacher']= 1;
		} else { 
			unset($_SESSION['teacher']);
		}
	}
	function login() {
		include('inc/db.php');
		if(isset($_POST['login'])) {
			$salt = 'XxZzy12*_';
			$s_email = $_POST['u_email'];
			$s_pass = hash('md5', $salt.$_POST['u_pass']);

			$check = $con->prepare("select * from signup where s_email='$s_email' && s_pass='$s_pass'");
			$check->setFetchMode(PDO::FETCH_ASSOC);
 			$check->execute();
 			$count = $check->rowCount();
 			if ($count == 1) {
 				$_SESSION['account'] = $s_email;
 				get_teacher();
 				//echo "<script>alert('Welcome')</script>"
 				echo "<div id='alert'>
 					<h1>Welcome</h1>
 					<center><i class='fas fa-check-circle'></i></center>
 					<button onclick='show()'>CLOSE</button>
 				</div>";

 				//echo "<script>window.open('index.php','_self')</script>";
 			} else { 
 				echo "<script>alert('Incorrect Password or Email')</script>";
 				echo "<script>window.open('index.php','_self')</script>";
 			}
		}
	}
	function inst_term() {

		include('inc/db.php');
		$get_inst_condn = $con->prepare("select * from terms where terms_for ='Teachers'");
		$get_inst_condn->setFetchMode(PDO::FETCH_ASSOC);
		$get_inst_condn->execute();
		while ($row=$get_inst_condn->fetch()) {
			echo "<li>".$row['terms']."<li>";
		}
	}
	function stud_term() {

		include('inc/db.php');
		$get_stud_condn = $con->prepare("select * from terms where terms_for ='Students'");
		$get_stud_condn->setFetchMode(PDO::FETCH_ASSOC);
		$get_stud_condn->execute();
		while ($row=$get_stud_condn->fetch()) {
			echo "<li>".$row['terms']."<li>";
		}
	}
	function add_teacher() {
		include('inc/db.php');
		$email = $_SESSION['account'];
		print_r($_SESSION);
		$get_user = $con->prepare("select * from signup where s_email='$email'");
		$get_user->setFetchMode(PDO::FETCH_ASSOC);
		$get_user->execute();
		$row = $get_user->fetch();
		print_r($row);
		if($row!==false){
			$name=$_POST['t_name_dis'];
			echo "<script>alert($name)</script>";
			$email = $row['s_email'];
			echo "<script>alert($email)</script>";
			$phn=$row['s_phn'];
			echo "<script>alert($phn)</script>";
			$info = $_POST['t_info'];
			echo "<script>alert($info)</script>";
			$img = "image/instructor/".$_FILES['t_img']['name'];
			echo "<script>alert($img)</script>";
			move_uploaded_file($_FILES['t_img']['tmp_name'], $img);
			$add_teacher=$con->prepare("insert into teacher (t_name, t_email, t_phn, t_img, t_info) values ('$name','$email','$phn','$img','$info')");
			$_SESSION['teacher']=1;
			if($add_teacher->execute()) {
				echo "<script>alert('You are now a teacher')</script>";
				echo "<script>window.open('teacher.php','_self')</script>";
			} else {
				echo "<script>alert('Something went wrong')</script>";
				echo "<script>window.open('teach_condn.php','_self')</script>";
			}
		} else {
			echo "<script>alert('You are not logged in')</script>";
		}
	}
	function create_course() {
		include('inc/db.php');
		$title = $_POST['c_name'];
		$email = $_SESSION['account'];
		$get_teacher = $con->prepare("select * from teacher where t_email='$email'");
		$get_teacher->setFetchMode(PDO::FETCH_ASSOC);
		$get_teacher->execute();
		$row = $get_teacher->fetch(); 
		$t_id=$row['t_id'];


		$create_course=$con->prepare("insert into courses (course_title, course_img, course_before, course_after, course_desc, course_lang, course_level , course_cat, course_sub_cat, course_price, course_discount,course_status, course_type, t_id) values ('$title','image/course/default.jpg','What are the prerequisites for this course','What will the student learn?','course description','English', 'All Level','Development','PHP','0','0','Notsubmitted','Free','$t_id')");
		if ($create_course->execute()) {
			//$select = $con->prepare("select * from courses where t_email='$email'");
			//$select->setFetchMode(PDO::FETCH_ASSOC);
			//$select->execute();
			//$row1 = $select->fetch();

			$id = $con->lastInsertId();

			$create = $con->prepare("CREATE TABLE `$id` ( `lec_id` INT(10) NOT NULL AUTO_INCREMENT , `lec_name` VARCHAR(100) NOT NULL, `lec_vid` VARCHAR(100) NOT NULL, PRIMARY KEY (`lec_id`)) ENGINE = InnoDB;");

			if($create->execute()) {
				echo "<script>alert('Course Created')</script>";
				echo "<script>window.open('teacher.php','_self')</script>";
			}

		} else {
			echo "<script>alert('Course not Created')</script>";
			echo "<script>window.open('teacher.php','_self')</script>";
		}
	}
	function dash_course() {
		include('inc/db.php');

		$email = $_SESSION['account'];

		$get_teacher = $con->prepare("select * from teacher where t_email='$email'");
		$get_teacher->setFetchMode();
		$get_teacher->execute();
		$row1 = $get_teacher->fetch(); 
		$t_id=$row1['t_id'];

		$get_course =$con->prepare("select * from courses where t_id='$t_id'");
		$get_course->setFetchMode(PDO::FETCH_ASSOC);
		$get_course->execute();
		$i=0;
		while ($row = $get_course->fetch()):
			$i++;
		

					echo "<div id='created'>
					<img src='".$row['course_img']."'>
					<div id='item_title'>	
						<span><a href='course_details.php?course_id=".$row['course_id']."'>".$row['course_title']."</a><br /><br />
						<a href='course_add.php?course_id=".$row['course_id']."' id='edit'>Edit</a></span>
					</div>
					<div id='other'>
						<div id='one'>
							<span>Course Type : ".$row['course_type']."</span><br/>
							<span>Course price : $".$row['course_price']."</span><br/>
						</div>
						<div id='two'>
						<span>Course Status : ".$row['course_status']."</span><br/>
						<span>Enroll By : 0 students</span><br/>
						</div>
						<div id='three'>
						<span>Total Earn : $0</span>
						</div>
					</div><br clear='all' />
				</div>";

			


		endwhile;

		if ($i<=0) {
		    echo "<p>No Courses Created yet</p>";
		}
	}
	function edit_title() {
		include('inc/db.php');
		$id = $_GET['course_id'];
		$title=$_POST['c_name'];
		$img = "image/course/".$_FILES['c_img']['name'];

		move_uploaded_file($_FILES['c_img']['tmp_name'], $img);
		$edit_title = $con->prepare("update courses set course_title='$title',course_img='$img' where course_id='$id' ");
		$edit_title->execute();
		echo "<script>window.open('course_add.php?course_id=$id','_self')</script>";
	}
	function course_page() {

		include('inc/db.php');
		$name = $_GET['name'];

		$get_sub_cat = $con->prepare("select * from sub_cat where sub_cat_name='$name'");
		$get_sub_cat->setFetchMode();
		$get_sub_cat->execute();
		$row1 = $get_sub_cat->fetch();


		$get_courses = $con->prepare("select * from courses where course_sub_cat='$name'");
		$get_courses->setFetchMode();
		$get_courses->execute();


		echo "<div id='crumb'>
				<span><a href='index.php'>HOME</a></span> <b>></b>
				<span>".$row1['sub_cat_name']."</span>
			</div>
			<div id='bar' onclick='sideBar1();'><i class='fas fa-bars'></i></div>
			<h2>".$row1['sub_cat_name']."</h2>
			<ul>";
			
		$i = 0;

		while($row=$get_courses->fetch()):
				$i++;

				$t_id=$row['t_id'];
				$get_course =$con->prepare("select * from teacher where t_id = '$t_id'");
				$get_course->setFetchMode(PDO::FETCH_ASSOC);
				$get_course->execute();
				$row2 = $get_course->fetch();

				echo"<li>
					<a href='course_details.php?course_id=".$row['course_id']."'>
						<img src='".$row['course_img']."'>
						<h3>".$row['course_title']."</h3>
				    	<h4>price: $".$row['course_price']."</h4>
						<h5>Teacher Name : ".$row2['t_name']."</h5>
					</a>
				</li>";
		endwhile;

		if($i==0) {
			echo "<p>No Courses Found</p>";
		}

		echo "<br clear='all'>
				</ul><br clear='all' />";
	}
 	function add_goal() {
 		include('inc/db.php');
 		$id=$_GET['course_id'];
 		$before=$_POST['before'];
 		$after=$_POST['after'];

 		$add_goal=$con->prepare("update courses set course_before='$before', course_after='$after' where course_id='$id' ");
 		if ($add_goal->execute()) {
 			echo "<script>alert('updated')</script>";
 			echo "<script>window.open('course_add.php?course_id=$id&course_goal','_self')</script>";
 		    return;
 		} else {
 			echo "<script>alert('Not Updated')</script>";
 			echo "<script>window.open('course_add.php?course_id=$id&course_goal','_self')</script>";
 		}
 	}
 	function lang_list() {
 		include('inc/db.php');
 		$id = $_GET['course_id'];
 		$lang_list=$con->prepare("select * from lang");
 		$lang_list->setFetchMode(PDO::FETCH_ASSOC);
 		$lang_list->execute();
 		while($row=$lang_list->fetch()):
 			echo "<option value='".$row['lang_name']."'>".$row['lang_name']."</option>";
 		endwhile;
 	}
 	function add_price() {
 		include('inc/db.php');
 		$id = $_GET['course_id'];

 		$price = $_POST['price'];
 		$discount = $_POST['discount'];
 		$type = ($price-(($price*$discount)*0.01));

 		if ($price==0 && $discount==0) {
 			$course_type = 'Free';
 		} elseif ($type==0) {
 			$course_type = 'Free';
 		} else {
 			$course_type = 'Paid';
 		}

 		$add_price = $con->prepare("update courses set course_price='$price', course_discount='$discount', course_type='$course_type' where course_id='$id' ");
 		if ($add_price->execute()) {
 			echo "<script>alert('Updated')</script>";
 			echo "<script>window.open('course_add.php?course_id=$id&price','_self')</script>";
 		} else {
 			echo "<script>alert('Not Updated')</script>";
 			echo "<script>window.open('course_add.php?course_id=$id&price','_self')</script>";
 		}
 	}
 	function cat_display() {
 		include('inc/db.php');
 		$id = $_GET['course_id'];
 		$lang_list=$con->prepare("select * from cat");
 		$lang_list->setFetchMode(PDO::FETCH_ASSOC);
 		$lang_list->execute();
 		while($row=$lang_list->fetch()):
 			echo "<option value='".$row['cat_name']."'>".$row['cat_name']."</option>";
 		endwhile;	
 	}
 	function sub_cat_display() {
 		include('inc/db.php');
 		$id = $_GET['course_id'];
 		$lang_list=$con->prepare("select * from sub_cat");
 		$lang_list->setFetchMode(PDO::FETCH_ASSOC);
 		$lang_list->execute();
 		while($row=$lang_list->fetch()):
 			echo "<option value='".$row['sub_cat_name']."'>".$row['sub_cat_name']."</option>";
 		endwhile;
 	}
 	function add_details() {
 		include('inc/db.php');
 		$id = $_GET['course_id'];
 		$c_level=$_POST['level'];
 		$c_lang=$_POST['lang'];
 		$c_cat=$_POST['cat'];
 		$c_sub_cat=$_POST['sub_cat'];
 		$c_desc=$_POST['c_desc'];

 		$add_details=$con->prepare("update courses set course_desc='$c_desc',course_level='$c_level',course_lang='$c_lang',course_cat='$c_cat',course_sub_cat='$c_sub_cat' where course_id='$id' ");
 		print_r($add_details);
 		if ($add_details->execute()) {
 			echo "<script>alert('Updated')</script>";
 			echo "<script>window.open('course_add.php?course_id=$id&details','_self')</script>";

 		} else {
 			echo "<script>alert('Not Updated')</script>";
 		}
 	}
 	function all_courses() {
 		include('inc/db.php');

 		$get_course =$con->prepare("select * from courses where course_status='Active' ");
		$get_course->setFetchMode(PDO::FETCH_ASSOC);
		$get_course->execute();
		while ($row=$get_course->fetch()):
			$t_id = $row['t_id'];
			$id = $row['course_id'];
			$get_teacher=$con->prepare("select * from teacher where t_id='$t_id' ");
			$get_teacher->setFetchMode(PDO::FETCH_ASSOC);
			$get_teacher->execute();
			$row1 = $get_teacher->fetch();
			echo "<li>
					<a href='course_details.php?course_id=$id'>
						<img src='".$row['course_img']."'>
						<h3>".$row['course_title']."</h3>
				    	<h4>price: $".$row['course_price']."</h4>
						<h5>Teacher Name : ".$row1['t_name']."</h5>
					</a>
				</li>";	
	
		endwhile;
 	}
 	function top_courses() {
 		include('inc/db.php');

 		$get_course =$con->prepare("select * from courses where course_status='Active' limit 8");
		$get_course->setFetchMode(PDO::FETCH_ASSOC);
		$get_course->execute();
		while ($row=$get_course->fetch()):
			$t_id = $row['t_id'];
			$get_teacher=$con->prepare("select * from teacher where t_id='$t_id'");
			$get_teacher->setFetchMode(PDO::FETCH_ASSOC);
			$get_teacher->execute();
			$row1 = $get_teacher->fetch();
			$price = ($row['course_price']-(($row['course_price']*$row['course_discount'])*0.01));
			echo "<li>
					<a href='course_details.php?course_id=".$row['course_id']."'>
						<img src='".$row['course_img']."'>
						<h3>".$row['course_title']."</h3>
				    	<h4>price: $".$price."</h4>
						<h5>Teacher Name : ".$row1['t_name']."</h5>
					</a>
				</li>";		
		endwhile;
 	}
 	function up_info() {
 		include('inc/db.php');
 		$email = $_SESSION['account'];

 		$get_user = $con->prepare("select * from signup where s_email='$email'");
 		$get_user->setFetchMode(PDO::FETCH_ASSOC);
 		$get_user->execute();
 		$row=$get_user->fetch();
 		if (isset($_POST['u_name'])  && $_POST['u_name']!='' ) {
 			$name = $_POST['u_name'];
 		} else {
 			$name = $row['s_name'];
 		}

 		if (isset($_POST['u_phn']) && $_POST['u_phn']!='') {
 			$phn = $_POST['u_phn'];
 		} else {
 			$phn = $row['s_phn'];
 		}

 		if (isset($_FILES['u_pic']['name'])  && $_FILES['u_pic']['name']!="") {
 			$pic = "image/user/".$_FILES['u_pic']['name'];
 		} else {
 			$pic = $row['s_img'];
 		}

 		move_uploaded_file($_FILES['u_pic']['tmp_name'],$pic);
 		$up_info = $con->prepare("update signup set s_name='$name', s_phn='$phn', s_img='$pic' where s_email='$email' ");
 		if ($up_info->execute()) {
 			$up_t = $con->prepare("update teacher set t_phn='$phn' where t_email='$email' ");
 			if ($up_t->execute()) {
 				echo "<script>window.open('myaccount.php','_self')</script>";
 			}
 		}
 	}
 	function up_pass() {
 		include('inc/db.php');
 		$email = $_SESSION['account'];
 		$salt = 'XxZzy12*_';
 		$get_user = $con->prepare("select * from signup where s_email='$email'");
 		$get_user->setFetchMode(PDO::FETCH_ASSOC);
 		$get_user->execute();
 		$row=$get_user->fetch();

 		if (isset($_POST['u_pass'])  && $_POST['u_pass']!='' ) {
 			$pass = hash('md5', $salt.$_POST['u_pass']);
 		} else {
 			$pass = $row['s_pass'];
 		}

 		if (isset($_POST['u_pass_new']) && $_POST['u_pass_new']!='') {
 			$pass_new = hash('md5', $salt.$_POST['u_pass_new']);
 		} else {
 			$phn = $row['s_phn'];
 		}

 		if (isset($_POST['ur_pass_new']) && $_POST['ur_pass_new']!="") {
 			$passr_new = hash('md5', $salt.$_POST['ur_pass_new']);
 		} else {
 			$pic = $row['s_pass'];
 		}

		if ($pass!=$row['s_pass']) {
 			echo "<script>alert('Current Password is incorrect')</script>";
 			echo "<script>window.open('myaccount.php?pass','_self')</script>";
 			return;
 		} 		

 		if ($pass==$pass_new) {
 			echo "<script>alert('New Password must be diffrent than Current password')</script>";
 			echo "<script>window.open('myaccount.php?pass','_self')</script>";
 			return;
 		}

 		if ($pass_new!=$passr_new) {
 			echo "<script>alert('Password and Confirm Password must be same')</script>";
 			echo "<script>window.open('myaccount.php?pass','_self')</script>";
 			return;
 		}

 		if (strlen($pass_new)<5) {
 			echo "<script>alert('Password must be atleast 5 characters')</script>";
 			echo "<script>window.open('myaccount.php?pass','_self')</script>";
 			return;
 		}

 		$up_pass = $con->prepare("update signup set s_pass='$pass_new' where s_email='$email' ");
 		if ($up_pass->execute()) {
 			    echo "<script>alert('Password Changed Successfully')</script>";
 				echo "<script>window.open('myaccount.php?pass','_self')</script>";
 		}
 	}
 	function add_lecture() {
 		include('inc/db.php');
 		$id = $_GET['course_id'];

		if (isset($_POST['add_vid'])) {
			$name = $_POST['lec_name'];
		 	$vid = 'video/'.$id."_".$_FILES['lec_vid']['name'];
		 	move_uploaded_file($_FILES['lec_vid']['tmp_name'], $vid);
		 	
		 	$add_lec=$con->prepare("INSERT INTO `$id` ( `lec_name`, `lec_vid`) VALUES ('$name','$vid')");
		 	if($add_lec->execute()) {
		 		echo "<script>alert('Lecture added successfully')</script>";
		 		echo "<script>window.open('course_add.php?curriculum&course_id=$id','_self')</script>";
		 	} else {
		 		echo "<script>alert('Something went wrong! Please try again')</script>";
		 		echo "<script>window.open('add_lec.php?course_id=$id','_self')</script>";
		 	}
		}
 	}
 	function display_lec() {
 		include('inc/db.php');
 		$id=$_GET['course_id'];
 		$get_lec = $con->prepare("SELECT * FROM `$id` ");
 		$get_lec->setFetchMode(PDO::FETCH_ASSOC);
 		$get_lec->execute();

 		$i=1;
 		while($row=$get_lec->fetch()):
 			$l_id=$row['lec_id'];
 			echo "<li> lecture $i: <i class='fas fa-video'></i> ".$row['lec_name']." <a href='course_add.php?course_id=$id&edit=$l_id&curriculum'>Edit Content</a><br clear='all' /></li>";
 			$i++;
 		endwhile;
 	}

 	function dis_lec() {
 		include('inc/db.php');
 		$id=$_GET['course_id'];
 		$get_lec = $con->prepare("SELECT * FROM `$id` ");
 		$get_lec->setFetchMode(PDO::FETCH_ASSOC);
 		$get_lec->execute();

 		$i=1;
 		while($row=$get_lec->fetch()):
 			$l_id=$row['lec_id'];
 			echo "<li><a href='lecture_nav.php?course_id=$id&lec=$l_id'> lecture $i: ".$row['lec_name']."</a></li>";
 			$i++;
 		endwhile;
 	}

 	function edit_lec() {
 		include('inc/db.php');
 		$id=$_GET['course_id'];
 		$l_id = $_GET['edit'];
 		$get_lec=$con->prepare("SELECT * FROM `$id` WHERE lec_id=$l_id");
 		$get_lec->setFetchMode(PDO::FETCH_ASSOC);
 		$get_lec->execute();
 		$row=$get_lec->fetch();
 		$name = $row['lec_name'];
 		echo "<div id='edit'>
 			<form method='post' enctype='multipart/form-data'>	
 				<h3>Edit Lecture</h3>
 				<input type='text' name='l_name' value='$name' placeholder='Enter New name' />
 				<input type='file' name='l_vid' placeholder='Enter New vid ' />
 				<button name='edit_lec'>Edit</button> 
 			</form>
 		</div>";

 		if (isset($_POST['edit_lec'])) {
 			if (isset($_POST['l_name']) && $_POST['l_name']!='') {
 				$name=$_POST['l_name'];
 			} else {
 				$name=$row['lec_name'];
 			}
 			if (isset($_FILES['l_vid']['name']) && $_FILES['l_vid']['name']!='') {
 				$vid=$_FILES['l_vid']['name'];
 			} else {
 				$vid=$row['lec_vid'];
 			}
 			$vid="video/".$id."_".$_FILES['l_vid']['name'];
 			$up_lec=$con->prepare("UPDATE `$id` SET `lec_name` = '$name', `lec_vid` = '$vid' WHERE `lec_id` = $l_id");
 			if ($up_lec->execute()) {
 				echo "<script>alert('Lecture updated successfully')</script>";
		 		echo "<script>window.open('course_add.php?curriculum&course_id=$id','_self')</script>";
 			} else {
 				echo "<script>alert('Sorry Try Again! Something went wrong)</script>";
 			}
 		}
 	}

function add_visitor(){
	include('inc/db.php');
	if (!isset($_COOKIE['visit'])) {
		setcookie('visit', 'yes', time()+(60*60*24*30*12*10));
		$up = $con->prepare("update visitor set visitor=visitor+1 ");
		$up->execute();
	}
}


 ?>


