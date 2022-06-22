<!DOCTYPE html>
<html>
<head>
<title>View Customer Behavior</title>
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
	<a href="logout.php"><img align="left" src="Images/Logout.png" alt="home" style="width:50px;height:50px;" ></a><br/>Logout
    <button  onclick="window.location.href='ownerHome.php'"><h1>Homepage<h1></button>
	
	<table align="center">
		<tr>
			<td><button  onclick="window.location.href='customerViewBoundary.php'">View Customer Behavior</button></td>
			<td><button  onclick="window.location.href='dailyViewBoundary.php'">View Daily Earnings</button></td>
			<td><button  onclick="window.location.href='monthlyViewBoundary.php'">View Monthly Earnings</button></td>
			<td><button  onclick="window.location.href='yearlyViewBoundary.php'">View Yearly Earnings</button></td>
			<td><button  onclick="window.location.href='dailySearchBoundary.php'">Search Daily Earnings</button></td>
			<td><button  onclick="window.location.href='monthlySearchBoundary.php'">Search Monthly Earnings</button></td>
			<td><button  onclick="window.location.href='yearlySearchBoundary.php'">Search Yearly Earnings</button></td>
		</tr>
	</table>

<?php
include 'customerViewController.php';

$customerView = new customerController;
$customerResult = $customerView -> getCustomerData();
$itemArray = [];
$qtyArray = [];

if($customerResult)
{
	foreach ($customerResult as $row)
	{
		$itemArray[] = $row['total_product'];
		?>
<?php
	}
	$itemResult = array_count_values($itemArray);

	foreach ($itemResult as $item => $qty){
		if ($qty > $qtyArray){
			echo "<h2><b>Best Selling Items: </b>" . $item ." at the highest of ". $qty . "</h2>";
		}
		$qtyArray = $qty;
	}
} else {
	echo "No record found";
}
?>
</table>


<br>
	<br>
	<table id ='myTable' border='1' align='center'>
		<tr>
			<th style=''>Name</th>
			<th style=''>Phone Number</th>
			<th style=''>Item Name</th>
			<th style=''>Quantity</th>
			<th style=''>Total Earnings Per Order</th>
			<th style=''>Status</th>
			<th style=''>Date</th>
			<th style=''>Start Time</th>
			<th style=''>End Time</th>
<?php
$customerView = new customerController;
$customerResult = $customerView -> getCustomerData();

if($customerResult)
{
	foreach ($customerResult as $row)
	{
		?>
		<tr>
		<td><?=$row['cusName'] ?></td>
		<td><?=$row['cusNum'] ?></td>
		<td><?=$row['total_product'] ?></td>
		<td align="center"><?=$row['quantity'] ?></td>
		<td align="center">$<?=$row['total_price'] ?></td>
		<td><?=$row['status'] ?></td>
		<td><?=$row['date'] ?></td>
		<td><?=$row['startTime'] ?></td>
		<td><?=$row['endTime'] ?></td>
<?php
	}
} else {
	echo "No record found";
}
?>
</table>

</body>
</html>