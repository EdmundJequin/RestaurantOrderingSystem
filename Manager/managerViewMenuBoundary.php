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
    
    <table id ='myTable' border = '1' align = 'center'>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Type</th>
        <th>Image</th>
        <th>Action</th>


    <!--DELETE MENU CONTROLLER-->
    <?php
    require_once 'classes.php';

    if(isset($_POST["deleteMenu"]))
    {
        $foodID = $_POST['foodID'];

        $account = new DeleteMenu;
        $result = $account -> deleteMenu($foodID);
            
        if(true)
        {
            header("Location: managerViewMenuBoundary.php");
        }else{
            print_r("failed");
        }
    }
    ?>

    <!--VIEW MENU CONTROLLER-->
    <?php
        $menu = new ViewMenu;
        $result = $menu -> viewMenu();
        if($result)
        {
            foreach($result as $row)
            {
                ?>
                <tr>

        <td><?php echo $row['foodID'] ?></td>
        <td><?=$row['name'] ?></td>
        <td><?=$row['price'] ?></td>
        <td><?=$row['type'] ?></td>
        <td><img src = "../Images/<?php echo $row['imageName']?>"></td>


        <!--UPDATE MENU FORM-->
        <td>
            <form action='managerUpdateMenuBoundary.php' method="POST">
                <input type='hidden' name='foodID' value='<?php echo $row['foodID']?>'>
                <input type='hidden' name='foodName' value='<?php echo $row['name']?>'>
                <input type='hidden' name='foodPrice' value='<?php echo $row['price']?>'>
                
                <input type='submit' name='viewToUpdate' value='Update Menu'>
            </form>
        <!--DELETE MENU FORM-->
            <form action='managerViewMenuBoundary.php' method="POST">
                <input type='hidden' name='foodID' value='<?php echo $row['foodID']?>'>
                
                <input type='submit' name='deleteMenu' value='Delete Menu'>
            </form>

        </td>
        <?php
            }
        }
        ?>


    </table>

    </body>
    </html>
