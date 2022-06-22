<!DOCTYPE html>
<html>
<head>
<title>Search</title>
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

 <form action="staffSearchBoundary.php" method="POST">
<table align="center">
 <tr>
  <td><input type="text" name="search" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
			   Search by: <select name="searchType" id="searchType" onchange="changeType(this.value)">
				<option value="1">Customer name</option>
				<option value="2">Customer number</option>
				<option value="3">Total product</option>
				<option value="4">Quantity</option>
				<option value="5">Total price</option>
				<option value="6">Status</option>
			  </select>
			 <input type="submit" value="Submit" /></td>
 </tr>
 </table>
			</form>
			<br/>

<table> 
<table id ='myTable' border='1' align='center'>
<tr>
 <th style=''>Customer name</th>
 <th style=''>Customer number</th>
 <th style=''>Total product</th>
 <th style=''>Quantity</th>
 <th style=''>Total price</th>
 <th style=''>Status</th>

<!--SEARCH CONTROLLER-->
<?php
require_once 'classes.php';

if(isset($_POST["search"]))
{
	$inputdata = $_POST['search'];

	$order = new orderSearch;
	$result = $order -> searchData($inputdata);
		
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
			</td>
			<?php
			}
	}
	else
	{
		print_r("failed");
	}
}
?>
	</table>
</table>
</body>
</html>