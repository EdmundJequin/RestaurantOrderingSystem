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
    <button  onclick="window.location.href='adminSearchBoundary.php'"><h1>Homepage<h1></button>
<table align="center">
 <tr>
 <td><button  onclick="window.location.href='adminCreateAccountBoundary.php'">Create user account</button></td>
  <td><button onclick="window.location.href='adminViewAccountBoundary.php'">View all user accounts</button></td>
 </tr>

 <form action="adminSearchBoundary.php" method="POST">
<table align="center">
 <tr>
  <td><input type="text" name="search" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
			   Search by: <select name="searchType" id="searchType" onchange="changeType(this.value)">
				<option value="1">Name</option>
				<option value="2">Surname</option>
				<option value="3">Phone</option>
				<option value="4">Type</option>
				<option value="5">Status</option>
			  </select>
			 <input type="submit" value="Submit" /></td>
 </tr>
 </table>
			</form>
			<br/>

<table> 
<table id ='myTable' border='1' align='center'>
<tr>
 <th style=''>User ID</th>
 <th style=''>Name</th>
 <th style=''>Surname</th>
 <th style=''>Phone</th>
 <th style=''>Email</th>
 <th style=''>Type</th>
 <th style=''>Role</th>
 <th style=''>Status</th>

<!--SEARCH CONTROLLER-->
<?php
require_once 'classes.php';

if(isset($_POST["search"]))
{
	$inputdata = $_POST['search'];

	$account = new accountSearch;
	$result = $account -> searchData($inputdata);
		
	if($result)
	{
		
			foreach($result as $row)
			{
			?>
			<tr>
			<td><?php echo $row['userID'] ?></td>
			<td><?=$row['name'] ?></td>
			<td><?=$row['surname'] ?></td>
			<td><?=$row['phone'] ?></td>
			<td><?=$row['email'] ?></td>
			<td><?=$row['type'] ?></td>
			<td><?=$row['role'] ?></td>
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