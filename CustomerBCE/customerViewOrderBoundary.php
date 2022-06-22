<!DOCTYPE html>
<html>

    <head>
        <meta charset = "utf-8">
        <title>Nixon Menu</title>
        <link rel = "stylesheet" href = "menu.css">
    </head>
    <div>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <?php include 'header.php';?>
    
</section>


<br>
<h1>Payment successful!</h1>
<h1>You have ordered: </h1>

<?php
require_once "classes.php";
$orderEntity = new ViewOrder;
$orderResult = $orderEntity -> getOrderData();	

if($orderResult)
{
    foreach ($orderResult as $row)
    {   
        echo "You have ordered : <br>";
        echo $row['name'];
        echo "(" .$row['quantity']. ")" ."<br>";
    }
}
?>

    <form method="POST" action="customerViewMenuBoundary.php">

        <input type="submit" name="orderCompleted" value="Complete order" />
    </form>

<?php

if(isset($_POST['orderCompleted']))
{    

    header("Location: customerViewMenuBoundary.php");
}
?>
<h3>Thank you for dining in with us, see you soon!</h3>
</html>