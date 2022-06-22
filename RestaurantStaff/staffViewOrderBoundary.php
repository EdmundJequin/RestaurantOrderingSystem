<!DOCTYPE html>
<html>
<head>
<title>View order</title>
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
	<a href="logout.php"><img align="left" src="../Images/Logout.png" alt="home" style="width:50px;height:50px;" ></a><br/>Logout
    <button  onclick="window.location.href='staffSearchBoundary.php'"><h1>Homepage<h1></button>
<table align="center">
 <tr>
 <td><button  onclick="window.location.href='staffCreateOrderBoundary.php'">Create order</button></td>
  <td><button onclick="window.location.href='staffViewOrderBoundary.php'">View all orders</button></td>
  
 </tr>
<table> 


<table id ='myTable' border='1' align='center'>
<tr>
 <th style=''>Customer Name</th>
 <th style=''>Customer Number</th>
 <th style=''>Total Product</th>
 <th style=''>Quantity</th>
 <th style=''>Total Price</th>
 <th style=''>Status</th>
 <th style=''>Action</th>

 <!--COMPLETE ORDER CONTROLLER-->
<?php
require_once 'classes.php';

if(isset($_POST["orderDelete"]))
{
	$cusNum = $_POST['cusNum'];
	
	$order = new deleteOrder;
	$result = $order -> delete($cusNum);
		
	if($result)
	{
		header("Location: staffViewOrderBoundary.php");
	}else{
		print_r("failed");
	}
}
?>

<?php

if(isset($_POST["orderComplete"]))
{
	$cusName = $_POST['cusName'];
	
	$order = new completeOrder;
	$result = $order -> complete($cusName);
		
	if($result)
	{
		header("Location: staffViewOrderBoundary.php");
	}else{
		print_r("failed");
	}
}
?>

<!--VIEW ORDER CONTROLLER-->
<?php

$order = new orderView;
$result = $order -> getData();
if($result)
{
	foreach($result as $row)
	{
		?>
		<tr>

<td><?php echo $row['cusName'] ?></td>
<td><?=$row['cusNum'] ?></td>
<td><?=$row['total_product'] ?></td>
<td><?=$row['quantity'] ?></td>
<td><?=$row['total_price'] ?></td>
<td><?=$row['status'] ?></td>

<!--MODIFY ORDER FORM-->
<td><form action='staffModifyOrderBoundary.php' method="POST">
		<input type='hidden' name='cusName' value='<?php echo $row['cusName']?>'>
		<input type='hidden' name='cusNum' value='<?php echo $row['cusNum']?>'>
		<input type='hidden' name='total_product' value='<?php echo $row['total_product']?>'>
		<input type='hidden' name='quantity' value='<?php echo $row['quantity']?>'>
		<input type='hidden' name='total_price' value='<?php echo $row['total_price']?>'>

		<input type='submit' name='viewToModify' value='Modify Order'>
</form>

<!--DELETE ORDER FORM-->
<form action='staffViewOrderBoundary.php' method="POST">
		<input type='hidden' name='cusNum' value='<?php echo $row['cusNum']?>'>

		<input type='submit' name='orderDelete' value='Delete Order'>
</form>

<!--COMPLETE ORDER FORM-->
<form action='staffViewOrderBoundary.php' method="POST">
		<input type='hidden' name='cusName' value='<?php echo $row['cusName']?>'>
		
		<input type='submit' name='orderComplete' value='Complete Order '>
</form>

<?php
	}
}
else
{
	echo "No record found";
}
?>
	</table>
</table>
</body>
</html>