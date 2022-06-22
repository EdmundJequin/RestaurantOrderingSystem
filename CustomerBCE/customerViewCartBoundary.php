<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "utf-8">
        <title>Nixon Menu</title>
        <link rel = "stylesheet" href = "menu.css">
    </head>
    <div>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <?php include 'header.php';?>
    <body>
    

    <div class="container">
        <section class="shopping-cart">
            <h1 class="heading">cart summary</h1>

            <table>
                <thead>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total price</th>
                    <th>Action</th>
                </thead>
                
                <!--UPDATE ACTUAL CART ITEM-->
                <?php
                require_once 'classes.php';
                    if(isset($_POST['updateItem']))
                    {
                        $inputdata = [
                            $cartID = $_POST['cartID'],
                            $name = $_POST['name'],
                            $quantity = $_POST['quantity'],
                        ];
                            
                        $cart = new UpdateCart;
                        $result = $cart -> updateCart($inputdata);

                        if ($result)
                        {
                            
                        }
                    }
                ?>

                <!--REMOVE ACTUAL CART ITEM-->
                <?php
                    if(isset($_POST['removeItem']))
                    {
                        $inputdata = [
                            $cartID = $_POST['cartID'],
                            $cartID = $_POST['name'],
                        ];
                            
                        $cart = new RemoveOrder;
                        $result = $cart -> removeOrder($inputdata);
                    }
                ?>

                <!-- DELETE ALL ACTUAL CART ITEM-->
                <?php
                    if(isset($_POST['deleteItem']))
                    {
                        $cart = new DeleteAllOrder;
                        $result = $cart -> deleteAllOrder();
                    }
                ?>

                <?php
                //Viewing Cart Items
                 $cart = new ViewCart;
                 $result = $cart -> viewCart();
                 $grandTotal = 0;
                
                if (is_array($result) || is_object($result))
                {
                    foreach($result as $row)
                    {
                        //For adding item to cart
                        ?>
                        <tr>
                        <form action="" method="post">
                        <input type="hidden" name="cartID" value="<?php echo $row['cartID'];?>">
                        <td><input type="text" name="name" value="<?php echo $row['name'];?>"readonly></td>
                        <td><input type="text" name="price" value="<?php echo $row['price'];?>"readonly></td>
                        <td><input type="number" min = "1" name="quantity" value="<?php echo $row['quantity'];?>"></td>
                        <td>$<?php echo $sub_total= number_format($row['price']*$row['quantity']); ?></td>
                        <td>
                            <input type="submit" class="btn" value="Update Item" name="updateItem">
                            <input type="submit" class="btn" value="Remove Item" name="removeItem">
                        </td>
                        </form>
                    </tr>
                    <td></td><td></td><td></td><td></td>
                        
                    <?php
                    $grandTotal += $sub_total;
                    }    
                }   
                 ?>
           
            <tr>
                <td colspan="3">grand total</td>
                <td>$<?php echo $grandTotal;?></td>
                <form action ="" method ="post">
                    <td><input type="submit" class="btn" value="Delete all items" name="deleteItem"></td>
                </form>
                </table>                
                </tr>
                <tr>
                    <td><a href ="customerDisplayMenuBoundary.php">continue shopping</a>
                        <form action = 'customerPaymentBoundary.php' method = 'POST'>
                            <input type="hidden" name="grandTotal" value="<?php echo $grandTotal;?>">

                            <input type="submit" class="btn" value="Submit Order" name="submitOrder">
                        </form>     
                    </td>
                </tr>   
            
                
</body>
</html>