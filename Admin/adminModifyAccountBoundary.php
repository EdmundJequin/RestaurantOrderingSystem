<!DOCTYPE html>
<html>
<head>
<title>Modify user account</title>
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
 
  <td><button  onclick="window.location.href='adminCreateAccountBoundary.php'">Create user account</button></td>
  <td><button onclick="window.location.href='adminViewAccountBoundary.php'">View all user accounts</button></td>
 </tr>
<table> 

<?php
	$userID = '';
	$name = '';
	$surname = '';
	$phone = '';
	$email = '';
	$type = '';
	$role = '';
	$password = '';

	include 'adminModifyAccountController.php';
	if(isset($_POST["viewToModify"]))
	{
		$userID = $_POST['userID'];
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$type = $_POST['type'];
		$role = $_POST['role'];
		$password = $_POST['password'];
	}

	if(isset($_POST["submit"]))
	{
		$inputdata = [
			$userID = $_POST['userID'],
			$name = $_POST['name'],
			$surname = $_POST['surname'],
			$phone = $_POST['phone'],
			$email = $_POST['email'],
			$type = $_POST['type'],
			$role = $_POST['role'],
			$password = $_POST['password'],
		];

		$account = new modifyAccount;
		$result = $account -> modifyAccount($inputdata);
			
		if($result)
		{
			header("Location: adminViewAccountBoundary.php");
		}else{
			print_r("failed");
		}
	}
?>

<h2>Modify user account information</h2>

<form action="adminModifyAccountBoundary.php" method="POST">
	<table align="center">
		<tr>
		<td>User ID:
		<input type="text" name="userID" value="<?php echo $userID?>" readonly/>
		&nbsp;</td>
		</tr>
		<tr>
		<td>Name:
		<input type="text" name="name" value="<?php echo $name?>" />
		&nbsp;</td>
		</tr>
		<tr>
		<td>Surname:
		<input type="text" name="surname" value="<?php echo $surname?>" />
		&nbsp;</td>
		</tr>
		<tr>
		<td>Phone:
		<input type="text" name="phone" value="<?php echo $phone?>" />
		&nbsp;</td>
		</tr>
		<tr>
		<td>Email:
		<input type="text" name="email" value="<?php echo $email?>" />
		&nbsp;</td>
		</tr>
		<tr>
  		<td><span>Type:</span>
		<select name="type">
			<option value="Admin" selected>Admin</option>
			<option value="Owner" >Owner</option>
			<option value="Manager" >Manager</option>
			<option value="Staff" >Staff</option>
		</select></td>
 		</tr>
		<tr>
		<td>Role:
		<input type="text" name="role" value="<?php echo $role?>" />
		&nbsp;</td>
		</tr>
		<tr>
		<td>Password:
		<input type="text" name="password" value="<?php echo $password?>" />
		&nbsp;</td>
		</tr>
		<tr>
		<td><input type="submit" name="submit" value="Modify account" /></td>
		</tr>
	</table>
</form>
</body>
</html>