<!DOCTYPE html>
<html>
<head>
<title>View Monthly Report</title>
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
	width: 400px;
	padding: 3px 5px;
    margin: 8px 0;
    display: inline-block;
    box-sizing: border-box;
	text-align-last: center;
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
			<th style=''>Date (Month)</th>
			<th style=''>Start Time</th>
			<th style=''>End Time</th>
<?php
include 'monthlyViewController.php';

$monthlyView = new monthlyController;
$monthlyResult = $monthlyView -> getMonthlyData();
$previousName = null;
$sumresult = 0;

if($monthlyResult)
{
	foreach ($monthlyResult as $row)
	{
		?>
		<tr>
		<td><?=$row['cusName'] ?></td>
		<td><?=$row['cusNum'] ?></td>
		<td><?=$row['total_product'] ?></td>
		<td align="center"><?=$row['quantity'] ?></td>
		<td align="center">$<?=$row['total_price'] ?></td>
		<td><?=$row['status'] ?></td>
		<td align="center"><?=date('m', strtotime($row['date'])) ?></td>
		<td><?=$row['startTime'] ?></td>
		<td><?=$row['endTime'] ?></td>
		
<?php
		if ($row['cusName'] != $previousName){
			$sumresult += $row['total_price'];
		}
		$previousName = $row['cusName'];
	}
?>
		<tr><td colspan='8' align="right"><b>Grand Total Earnings</b></td>
		<td align='center'>$<?=$sumresult ?></td></tr>
<?php
} else {
	echo "No record found";
}
?>
</table>
</body>
</html>