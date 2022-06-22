<!DOCTYPE html>
<html>
<head>
<title>Create order</title>
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
	<a href="logout.php"><img align="left" src="../Images/Logout.png" alt="home" style="width:50px;height:50px;" ></a><br/>Logout
	<button  onclick="window.location.href='staffSearchBoundary.php'"><h1>Homepage<h1></button>
<table align="center">
 <tr>
 
 <td><button  onclick="window.location.href='staffCreateOrderBoundary.php'">Create order</button></td>
  <td><button onclick="window.location.href='staffViewOrderBoundary.php'">View all orders</button></td>
 </tr>
<table> 


<?php
   include 'staffCreateOrderController.php';  
   	if(isset($_POST["submit"]))
	{
		$inputdata = 
		[
		$cusName = $_POST["cusName"],
		$cusNum = $_POST["cusNum"],
		$total_product= $_POST["total_product"],
		$quantity = $_POST["quantity"],
		$total_price = $_POST["total_price"],
		$status = $_POST["status"]
		];
		
		$order = new createOrder;
		$result = $order -> create($inputdata);
		
		if($result)
		{
			print_r("success");
		}else{
			print_r("failed");
		}
	}   
?>

<h2>Please fill in order information</h2>
<hr />

<form action="staffCreateOrderBoundary.php" method="POST">
<table align="center">
 <tr>
  <td>Customer Name:
<input type="text" name="cusName" />
&nbsp;</td>
 </tr>
 <tr>
  <td>Customer Number:
<input type="text" name="cusNum" />
&nbsp;</td>
 </tr>
 <tr>
  <td>Total Product:
<input type="text" name="total_product" />
&nbsp;</td>
 </tr>
 <tr>
  <td>Quantity:
<input type="text" name="quantity" />
&nbsp;</td>
 </tr>
 <tr>
  <td>Total Price:
<input type="text" name="total_price" />
&nbsp;</td>
 </tr>
 </tr>
 <td><span>Status:</span>
		<select name="status">
			<option value="Uncomplete" selected>Uncomplete</option>
			<option value="Complete" >Complete</option>
		</select></td>
 </tr>
 </tr>
 <tr>
  <td><input type="submit" name="submit" value="Create order" /></td>
 </tr>
 <tr>
  <td><input type="reset" value="Reset Form" /></td>
 </tr>
 </table>
</form>
</body>

</html>