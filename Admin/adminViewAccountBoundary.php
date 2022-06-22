<!DOCTYPE html>
<html>
<head>
<title>View user accounts</title>
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
 <th style=''>Action</th>

<!--SUSPEND ACCOUNT CONTROLLER-->
<?php
require_once 'classes.php';

if(isset($_POST["suspendAccount"]))
{
	$userID = $_POST['userID'];

	$account = new suspendAccount;
	$result = $account -> suspendAccount($userID);
		
	if($result)
	{
		header("Location: adminViewAccountBoundary.php");
	}else{
		print_r("failed");
	}
}
?>

<!--SUSPEND PROFILE CONTROLLER-->
<?php

if(isset($_POST["suspendProfile"]))
{
	$userID = $_POST['userID'];

	$account = new suspendProfile;
	$result = $account -> suspendProfile($userID);
		
	if($result)
	{
		header("Location: adminViewAccountBoundary.php");
	}else{
		print_r("failed");
	}
}
?>

<!--REVERT ACCOUNT CONTROLLER-->
<?php

if(isset($_POST["revertAccount"]))
{
	$userID = $_POST['userID'];

	$account = new revertAccount;
	$result = $account -> revertAccount($userID);
		
	if($result)
	{
		header("Location: adminViewAccountBoundary.php");
	}else{
		print_r("failed");
	}
}
?>

<!--REVERT PROFILE CONTROLLER-->
<?php

if(isset($_POST["revertProfile"]))
{
	$userID = $_POST['userID'];

	$account = new revertProfile;
	$result = $account -> revertProfile($userID);
		
	if($result)
	{
		header("Location: adminViewAccountBoundary.php");
	}else{
		print_r("failed");
	}
}
?>

<!--VIEW ACCOUNT CONTROLLER-->
<?php

$account = new accountView;
$result = $account -> getData();
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

<!--MODIFY ACCOUNT FORM-->
<td><form action='adminModifyAccountBoundary.php' method="POST">
		<input type='hidden' name='userID' value='<?php echo $row['userID']?>'>
		<input type='hidden' name='name' value='<?php echo $row['name']?>'>
		<input type='hidden' name='surname' value='<?php echo $row['surname']?>'>
		<input type='hidden' name='phone' value='<?php echo $row['phone']?>'>
		<input type='hidden' name='email' value='<?php echo $row['email']?>'>
		<input type='hidden' name='type' value='<?php echo $row['type']?>'>
		<input type='hidden' name='role' value='<?php echo $row['role']?>'>
		<input type='hidden' name='password' value='<?php echo $row['password']?>'>
		<input type='submit' name='viewToModify' value='Modify Information'>
</form>

<!--SUSPEND ACCOUNT FORM-->
<form action='adminViewAccountBoundary.php' method="POST">
		<input type='hidden' name='userID' value='<?php echo $row['userID']?>'>
		
	<input type='submit' name='suspendAccount' value='Suspend Account '>
</form>

<!--SUSPEND PROFILE FORM-->
<form action='adminViewAccountBoundary.php' method="POST">
		<input type='hidden' name='userID' value='<?php echo $row['userID']?>'>
		
		<input type='submit' name='suspendProfile' value='Suspend Profile'>
</form>

<!--REVERT ACCOUNT FORM-->
<form action='adminViewAccountBoundary.php' method="POST">
		<input type='hidden' name='userID' value='<?php echo $row['userID']?>'>
		
		<input type='submit' name='revertAccount' value='Revert Account'>
</form>


<!--REVERT PROFILE FORM-->
<form action='adminViewAccountBoundary.php' method="POST">
		<input type='hidden' name='userID' value='<?php echo $row['userID']?>'>
		
		<input type='submit' name='revertProfile' value='Revert Profile'>
</form>
</td>

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