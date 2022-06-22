<?php
	include 'adminLoginController.php';

	if(isset($_POST["submit"]))
	{
		$inputdata = [
		//Grab data from user
		$user = $_POST["user"],
		$pass = $_POST["pass"],
		];
		
		$testlogin = new Login($inputdata);
		$result = $testlogin->checkAccount($inputdata);

		if($result == "Admin")
		{
			header("Location: adminSearchBoundary.php");
		}
		else if ($result == "Owner")
		{
			header("Location: ../Owner/ownerHome.php");
		}
		else if ($result == "Manager")
		{
			header("Location: ../Manager/managerHome.php");
		}
		else if ($result == "Staff")
		{
			header("Location: ../RestaurantStaff/staffHome.php");
		}
		else
		{
			print_r("failed");
		}


	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Nixon Restaurant</title>
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
	width: 40%;
	padding: 3px 5px;
    margin: 8px 0;
    display: inline-block;
    box-sizing: border-box;
}
</style>
</head>
<body>
<form action="loginBoundary.php" method="post">
<h1>Welcome to<br>Nixon Restaurant</h1>
<img src="" alt="" class="center">
 <h2>Please log in first</h2>
 <table align="center">
 <tr>
  <td>Enter your name: <input type="text" class="form-control" placeholder="User Name" name="user" required="required"></td>
 </tr>
 <tr>
  <td>Enter your password: <input type="password" class="form-control" placeholder="Password" name="pass" required="required"></td>
 </tr>
 <tr>
  <td><input type="submit" class="btn btn-primary btn-block" name="submit" value="Login"></td>
 </tr>
  <tr>
<!-- <td><button><a href="register.php">Click here to register</a></button></td>  -->
 </tr>
 </table>
</form>
</body>
</html>