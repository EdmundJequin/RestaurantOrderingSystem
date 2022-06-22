<!DOCTYPE html>
<html>
<head>
<title>Modify order</title>
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
<button  onclick="window.location.href='adminHome.php'"><h1>Homepage<h1></button>
<table align="center">
 <tr>
 
  <td><button  onclick="window.location.href='staffCreateOrderBoundary.php'">Create order</button></td>
  <td><button onclick="window.location.href='staffViewOrderBoundary.php'">View all orders</button></td>
 </tr>
<table> 

<?php
	$cusName = '';
	$cusNum = '';
	$total_product = '';
	$quantity = '';
	$total_price = '';

	include 'staffModifyOrderController.php';
	if(isset($_POST["viewToModify"]))
	{
		$inputdata = [
		$cusName = $_POST["cusName"],
		$cusNum = $_POST["cusNum"],
		$total_product= $_POST["total_product"],
		$quantity = $_POST["quantity"],
		$total_price = $_POST["total_price"],
	];
	}

	if(isset($_POST["submit"]))
	{
		$inputdata = [
			$cusName = $_POST["cusName"],
			$cusNum = $_POST["cusNum"],
			$total_product= $_POST["total_product"],
			$quantity = $_POST["quantity"],
			$total_price = $_POST["total_price"],
		];

		$order = new modifyOrder;
		$result = $order -> modify($inputdata);
			
		if($result)
		{
			header("Location: staffViewOrderBoundary.php");
		}else{
			print_r("failed");
		}
	}
?>

<h2>Modify order information</h2>

<form action="staffModifyOrderBoundary.php" method="POST">
	<table align="center">
		<tr>
		<td>Customer Name:
		<input type="text" name="cusName" value="<?php echo $cusName?>" readonly/>
		&nbsp;</td>
		</tr>
		<tr>
		<td>Customer Number:
		<input type="text" name="cusNum" value="<?php echo $cusNum?>" />
		&nbsp;</td>
		</tr>
		<tr>
		<td>Total Product:
		<input type="text" name="total_product" value="<?php echo $total_product?>" />
		&nbsp;</td>
		</tr>
		<tr>
		<td>Quantity:
		<input type="text" name="quantity" value="<?php echo $quantity?>" />
		&nbsp;</td>
		</tr>
		<tr>
		<td>Total Price:
		<input type="text" name="total_price" value="<?php echo $total_price?>" />
		&nbsp;</td>
		</tr>
		<tr>
		<td><input type="submit" name="submit" value="Modify order" /></td>
		</tr>
		<tr>
 		 <td><input type="reset" value="Cancel" /></td>
 		</tr>
		<tr>
	</table>
</form>
</body>
</html>