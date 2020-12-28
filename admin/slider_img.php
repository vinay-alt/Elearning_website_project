<div id="bodyright">
	<h3>Edit Slider Images</h3>
	<form method="post" enctype="multipart/form-data">
		<table id="table">
			<tr>
				<td><input type="file" name="img1" id="img1" onchange="show1(event);" ><img src="../image/course/default.jpg" id="file1" alt="Preview of image"/><h4>preview</h4></td>
				<td><input type="file" name="img2" onchange="show2(event);" ><img src="../image/course/default.jpg" alt="Preview of image" id="file2" /><h4>preview</h4></td>
			</tr>
			<tr>
				<td><input type="file" name="img3" onchange="show3(event);"><img src="../image/course/default.jpg" alt="Preview of image" id="file3"/><h4>preview</h4></td>
				<td><input type="file" name="img4" onchange="show4(event);"><img src="../image/course/default.jpg" alt="Preview of image" id="file4"/><h4>preview</h4></td>
			</tr>
		</table>
		<div id="butt">
			<button id="but" name="upload">Upload</button>
		</div>	
	</form>

</div>

<?php


if (isset($_POST['upload'])) {
 	if (isset($_FILES['img1']['name'])) {
 		$img = "../image/slider/1.jpg";
 		if (file_exists($img)) {
 			unlink($img);
 			if (move_uploaded_file($_FILES['img1']['tmp_name'], $img)) {
 			echo "<script>alert('File Replaced')</script>";
 			echo "<script>window.open('index.php?slider','_self')</script>";
 			}
 		} else {
 			echo "<script>alert('File Not Deleted')</script>";
 			echo "<script>window.open('index.php?slider','_self')</script>";
 		}
 	}

 	if (isset($_FILES['img2']['name'])) {
 		$img = "../image/slider/2.jpg";
 		if (file_exists($img)) {
 			unlink($img);
 			if (move_uploaded_file($_FILES['img2']['tmp_name'], $img)) {
 			echo "<script>alert('File Replaced')</script>";
 			echo "<script>window.open('index.php?slider','_self')</script>";
 			}
 		} else {
 			echo "<script>alert('File Not Replaced')</script>";
 			echo "<script>window.open('index.php?slider','_self')</script>";
 		}
 	}

 	if (isset($_FILES['img3']['name'])) {
 		$img = "../image/slider/3.jpeg";
 		if (file_exists($img)) {
 			unlink($img);
 			if (move_uploaded_file($_FILES['img3']['tmp_name'], $img)) {
 			echo "<script>alert('File Replaced')</script>";
 			echo "<script>window.open('index.php?slider','_self')</script>";
 			}
 		} else {
 			echo "<script>alert('File Not Replaced')</script>";
 			echo "<script>window.open('index.php?slider','_self')</script>";
 		}
 	}

 	if (isset($_FILES['img4']['name'])) {
 		$img = "../image/slider/4.jpg";
 		if (file_exists($img)) {
 			unlink($img);
 			if (move_uploaded_file($_FILES['img4']['tmp_name'], $img)) {
 			echo "<script>alert('File Replaced')</script>";
 			echo "<script>window.open('index.php?slider','_self')</script>";
 			}
 		} else {
 			echo "<script>alert('File Not Replaced')</script>";
 			echo "<script>window.open('index.php?slider','_self')</script>";
 		}
 	}


 }


?>

