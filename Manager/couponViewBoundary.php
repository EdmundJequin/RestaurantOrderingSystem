<!DOCTYPE html>
<html>
<head>
<title>View Coupons</title>
<style>
body {background-color:white;font-family: sans-serif;}
h1,h2 {text-align:center;}
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
input{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
	border-radius: 8px;
	border: 2px solid #A0CFEC;
	background-color:Azure;
	font-family:sans-serif;
	cursor: pointer;
}
button {
	border-radius: 8px;
	border: 2px solid #A0CFEC;
	background-color:Azure;
	font-family:sans-serif;
	cursor: pointer;
	width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    box-sizing: border-box;
}
select {
	border-radius: 8px;
	border: 2px solid #A0CFEC;
	background-color:Azure;
	font-family:sans-serif;
	cursor: pointer;
	width: 50%;
	padding: 3px 5px;
    margin: 8px 0;
    display: inline-block;
    box-sizing: border-box;
}
hr {
	border: 0;
	border-top: 2px solid Black;
	width: 30%;
}
</style>
</head>

<body>
	<a href="../Admin/logout.php"><img align="left" src="../Images/Logout.png" alt="home" style="width:50px;height:50px;" ></a><br/>Logout
    <button  onclick="window.location.href='managerHome.php'"><h1>Homepage<h1></button>
<table align="center">
 <tr>
	<td><button  onclick="window.location.href='couponSearchBoundary.php'">Coupon Search </button></td>
	<td><button  onclick="window.location.href='couponCreateBoundary.php'">Create Coupon</button></td>
	<td><button  onclick="window.location.href='couponViewBoundary.php'">View Coupons</button></td>
 </tr>
</table>

	<table id ='myTable' border='1' align='center'>
		<th>Coupon Code</th>
		<th>Coupon Description</th>
		<th>Discount Amount</th>
		<th>Action</th>

	<!--DELETE COUPON CONTROLLER-->
	<?php
		require_once 'classes.php';

		if(isset($_POST["deleteCoupon"]))
		{
			$couponCode = $_POST['couponCode'];

			$coupon = new deleteCoupon;
			$result = $coupon -> deleteCoupon($couponCode);
				
			if(true)
			{
				header("Location: couponViewBoundary.php");
			}else{
				print_r("failed");
			}
		}
	?>

	<!--VIEW COUPONS CONTROLLER-->
	<?php

		$coupon = new viewCoupons;
		$result = $coupon -> viewCoupons();
		if($result)
		{
			foreach($result as $row)
			{
				?>
				<tr>

			<td><?php echo $row['couponCode'] ?></td>
			<td><?=$row['couponDescription'] ?></td>
			<td><?=$row['discountAmount'] ?></td>
			
			<!--DELETE COUPON FORM-->
			<td>
				<form action='couponViewBoundary.php' method="POST">
					<input type='hidden' name='couponCode' value='<?php echo $row['couponCode']?>'>
					
					<input type='submit' name='deleteCoupon' value='Delete Coupon'>
				</form>
			</td>
			<?php
			
			}
		}
		else
		{
			echo "No record found";
		}
	?>
	</table>
</body>
</html>