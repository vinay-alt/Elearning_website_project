<?php
	include('inc/db.php');
	$id = $_GET['course_id'];

	$get_info = $con->prepare("select * from courses where course_id ='$id'");
	$get_info->setFetchMode(PDO::FETCH_ASSOC);
	$get_info->execute();
	$row = $get_info->fetch();
	$price = $row['course_price'];
	$discount = $row['course_discount'];	

?>

<div id="course_p">
	<div id='crumb'>
		<span><a href='index.php'>HOME</a></span> <b>></b> <span><a href='teacher.php'>DASHBOARD</a></span> <b>></b>
		<span>Course Management</span> <b>></b> <span>Course Price</span>
	</div>
	<div id='bar' onclick='addBar();'><i class='fas fa-bars'></i></div>
	<h2>Course Price</h2>
	<p>50% of total earning from the course will be transferred to the website.</p>
	<form method="post">
		<table>
			<tr>	
				<td>Actual Price</td>
		    	<td>
		    		<select name="price">
						<option>$<?=$price?></option>
						<option value="0" >$0</option>
						<option value="10">$10</option>
						<option value="20">$20</option>
						<option value="30">$30</option>
						<option value="40">$40</option>		    		
						<option value="50">$50</option>
						<option value="60">$60</option>
						<option value="70">$70</option>
						<option value="80">$80</option>
						<option value="90">$90</option>
						<option value="100">$100</option>
						<option value="110">$110</option>
						<option value="120">$120</option>
						<option value="130">$130</option>
						<option value="140">$140</option>
						<option value="150">$150</option>
						<option value="160">$160</option>
						<option value="170">$170</option>
						<option value="180">$180</option>
						<option value="190">$190</option>
						<option value="200">$200</option>
		    		</select>
		    	</td>
			</tr>	
			<tr>	
				<td>Discount</td>
				<td>
					<select name="discount" >
						<option><?=$discount?>%</option>
						<option value="0">0%</option>
						<option value="5">5%</option>
						<option value="10">10%</option>
						<option value="15">15%</option>
						<option value="20">20%</option>		    		
						<option value="25">25%</option>
						<option value="30">30%</option>
						<option value="35">35%</option>
						<option value="40">40%</option>
						<option value="45">45%</option>
						<option value="50">50%</option>
						<option value="55">55%</option>
						<option value="60">60%</option>
						<option value="65">65%</option>
						<option value="70">70%</option>
						<option value="75">75%</option>
						<option value="80">80%</option>
						<option value="85">85%</option>
						<option value="90">90%</option>
						<option value="95">95%</option>
						<option value="100">100%</option>
		    		</select>
				</td>
			</tr>
		</table>	
		<center><button name="add_price">Save</button></center>
	</form>
</div>
<?php
if(isset($_POST['add_price'])) {
	add_price();
}
?>
