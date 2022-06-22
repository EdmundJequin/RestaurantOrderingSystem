<!DOCTYPE html>
<html>
<head>
<title>View Menu Items</title>
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
    <button  onclick="window.location.href='managerHome.php'"><h1>Homepage<h1></button>
<table align="center">
 <tr>
    <td><button  onclick="window.location.href='managerCreateMenuBoundary.php'">Create menu item</button></td>
    <td><button onclick="window.location.href='managerViewMenuBoundary.php'">View all menu items</button></td>
    <td><button  onclick="window.location.href='managerViewOrderBoundary.php'">View all orders</button></td>
 </tr>
 <body>
     
    <?php
        require_once 'managerUpdateMenuController.php';

        //From view to update form
        if(isset($_POST["viewToUpdate"]))
        {
            $foodID = $_POST['foodID'];
            $name = $_POST['foodName'];
            $price = $_POST['foodPrice'];
        }

        //From update form to controller
        if(isset($_POST["submit"]))
        {
            $inputdata = [
                $foodID = $_POST['foodID'],
                $name = $_POST['foodName'],
                $price = $_POST['foodPrice'],
                $type = $_POST['type'],
            ];

            $menu = new UpdateMenu;
            $result = $menu -> updateMenu($inputdata);
                
            if($result)
            {
                header("Location: managerViewMenuBoundary.php");
            }else{
                print_r("failed");
            }
        }

    ?>


 <h2>Update Menu Item</h2>

<form action="managerUpdateMenuBoundary.php" method="POST" enctype = "multipart/form-data">
	<table align="center">
		<tr>
		<td>Food ID:
		<input type="text" name="foodID" value="<?php echo $foodID?>" readonly/>
		&nbsp;</td>
		</tr>
		<tr>
		<td>Food Name:
		<input type="text" name="foodName" value="<?php echo $name?>" />
		&nbsp;</td>
		</tr>
		<tr>
		<td>Food Price:
		<input type="text" name="foodPrice" value="<?php echo $price?>" />
		&nbsp;</td>
		</tr>
		<tr>
  		<td><span>Food Type:</span>
		<select name="type">
			<option value="Appetizers" selected>Appetizers</option>
			<option value="Mains" >Mains</option>
			<option value="Beverages" >Beverages</option>
			<option value="Desserts" >Desserts</option>
		</select></td>
 		</tr>
		<tr>
		<td>Image:
		<input type="file" name="file">
		&nbsp;</td>
		</tr>
		<tr>
		<td><input type="submit" name="submit" value="Update Menu Item" /></td>
		</tr>
	</table>
</form>

</body>