<?php
include 'dbtClass.php';
//include 'ownerController.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Owner Homepage</title>
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
$name = "";
$errors = 0;
session_start();

if(isset($_SESSION['name']) && $_SESSION['name']) {
	echo "<h3><font color='teal'>Welcome, you are logged in as ". $_SESSION['name']. "!". "</h3></font>";
}

if ($errors == 0) {
	$conn = @mysqli_connect ("localhost", "root", "");
	if ($conn === FALSE) {
		echo "<p>Unable to connect to the database server. " . "Error code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>\n";
		++$errors;
	}
	else {
		$DBName = "nixonseven";
		$result = @mysqli_select_db($conn,$DBName);
		if ($result === FALSE) {
			echo "<p>Unable to select the database. " . "Error code " . mysqli_errno($conn) . ": " . mysqli_error($conn) . "</p>\n";
			++$errors;
		}
	}
}
?>
</body>
</html>