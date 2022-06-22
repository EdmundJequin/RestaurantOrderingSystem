<!DOCTYPE html>
<html>
<head>
<title>View Daily Report</title>
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
	width: 90px;
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

<form method=post name=f1 action=''><input type=hidden name=todo value=submit>
	<br>
	<br>
	<table border="0" cellspacing="0" align="center">
		<tr><td align=center>
		Date<br>
		<select name=dt>
			<option value='01'>01</option>
			<option value='02'>02</option>
			<option value='03'>03</option>
			<option value='04'>04</option>
			<option value='05'>05</option>
			<option value='06'>06</option>
			<option value='07'>07</option>
			<option value='08'>08</option>
			<option value='09'>09</option>
			<option value='10'>10</option>
			<option value='11'>11</option>
			<option value='12'>12</option>
			<option value='13'>13</option>
			<option value='14'>14</option>
			<option value='15'>15</option>
			<option value='16'>16</option>
			<option value='17'>17</option>
			<option value='18'>18</option>
			<option value='19'>19</option>
			<option value='20'>20</option>
			<option value='21'>21</option>
			<option value='22'>22</option>
			<option value='23'>23</option>
			<option value='24'>24</option>
			<option value='25'>25</option>
			<option value='26'>26</option>
			<option value='27'>27</option>
			<option value='28'>28</option>
			<option value='29'>29</option>
			<option value='30'>30</option>
			<option value='31'>31</option>
		</select>
		</td>

		<td align=center>
			Month<br>
			<select name=month value=''>Select Month</option>
			<option value='01'>January</option>
			<option value='02'>February</option>
			<option value='03'>March</option>
			<option value='04'>April</option>
			<option value='05'>May</option>
			<option value='06'>June</option>
			<option value='07'>July</option>
			<option value='08'>August</option>
			<option value='09'>September</option>
			<option value='10'>October</option>
			<option value='11'>November</option>
			<option value='12'>December</option>
			</select>
		</td>

		<td align=center>
			Year(yyyy)<input type=text name=year size=4 value=2022>
		</td>

		<td align=center>
			<input type=submit value=Submit>
		</td>
		</table>
	</form>

	<table id ='myTable' border='1' align='center'>
		<tr><th colspan='9'>Searched Results:</th></tr>
		<th style=''>Name</th>
		<th style=''>Number</th>
		<th style=''>Total Product</th>
		<th style=''>Quantity</th>
		<th style=''>Total Earnings Per Order</th>
		<th style=''>Status</th>
		<th style=''>Date</th>
		<th style=''>Start Time</th>
		<th style=''>End Time</th>

<?php
include 'dailySearchController.php';

$dailyView = new dailyController;
$dailyResult = $dailyView -> getDailyData();

if($dailyResult)
{
	foreach ($dailyResult as $row)
	{
		if(isset($_POST['todo']) and $_POST['todo']=="submit"){
			$month=$_POST['month'];
			$dt=$_POST['dt'];
			$year=$_POST['year'];
			$date_value="$year-$month-$dt";
			
			if($date_value == $row['date']){
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
		}
	}
}
?>
	</table>
</body>
</html>