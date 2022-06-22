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
        <th>orderID</th>
        <th>Customer Name</th>
        <th>Customer Number</th>
        <th>Total Product</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Status</th>

    <!--VIEW ORDER CONTROLLER-->
    <?php
        include 'managerViewOrderController.php';
        $order = new ViewOrder;
        $result = $order -> viewOrder();
        if($result)
        {
            foreach($result as $row)
            {
    ?>
        <tr>
            <td><?=$row['orderID'] ?></td>
            <td><?=$row['cusName'] ?></td>
            <td><?=$row['cusNum'] ?></td>
            <td><?=$row['total_product'] ?></td>
            <td><?=$row['quantity'] ?></td>
            <td><?=$row['total_price'] ?></td>
            <td><?=$row['status'] ?></td>
        </tr>

        <?php
            }
        }
        ?>

    </table>

    </body>
    </html>
