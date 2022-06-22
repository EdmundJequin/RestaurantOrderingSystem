<!DOCTYPE html>
<html>
<head>
<title>Create Coupon</title>
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
	border-top: 2px solid black;
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
 <td><button onclick="window.location.href='couponViewBoundary.php'">View Coupons</button></td>
 </tr>
<table> 


<?php
	include 'couponCreateController.php';  
		if(isset($_POST["submit"]))
		{
			$inputdata = 
			[
			$couponCode = $_POST["couponCode"],
			$couponDescription= $_POST["couponDescription"],
			$discountAmount = $_POST["discountAmount"],
			];
			
			$coupon = new createCoupon;
			$result = $coupon -> createCoupon($inputdata);
			
			if($result)
			{
				print_r("Successfully Created!");
			}else{
				print_r("Failed to create :(");
			}
		}   
?>

<h2>Please fill in coupon details</h2>
<hr />

<form action="couponCreateBoundary.php" method="POST">
<table align="center">
 <tr>
  <td>Coupon Code:
	<input type="text" name="couponCode" />&nbsp;
  </td>
 </tr>
 <tr>
  <td>Coupon Description:
	<input type="text" name="couponDescription" />&nbsp;
  </td>
 </tr>
 <tr>
  <td>Discount Amount:
	<input type="text" name="discountAmount" />&nbsp;
  </td>
 </tr>
 <tr>
  <td><input type="submit" name="submit" value="Create Coupon" /></td>
 </tr>
 <tr>
  <td><input type="reset" value="Cancel" /></td>
 </tr>
</table>
</form>
</body>

</html>