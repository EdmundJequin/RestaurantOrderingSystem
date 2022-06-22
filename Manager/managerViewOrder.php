<?php
    include 'dbConfig.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Nixon Manager</title>
    </head>
<body>
    <div class = "Title"><u>Customer Orders</u></div>
        <table id ='myTable' border = '1' align = 'center'>
            <th>Customer Name</th>
            <th>Customer Number</th>
            <th>Items</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Status</th>
            <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `order`");
            if(mysqli_num_rows($select_orders)>0){
                while($fetch_orders = mysqli_fetch_assoc($select_orders)){
                //Displaying each row columns
                echo "<tr><td>" . $fetch_orders['cusName'] . "</td>\n";
                echo "<td>" . $fetch_orders['cusNum'] . "</td>\n"; 
                echo "<td>". $fetch_orders['total_product']. "</td>\n";
                echo "<td>". $fetch_orders['quantity']. "</td>\n";
                echo "<td>". $fetch_orders['total_price']. "</td>\n";
                echo "<td>". $fetch_orders['status']. "</td>\n";
                
                //For fulfilling orders form Submission (not done)
                /*
                echo "<td><form method = 'POST' action = 'menuUpdate.php'>
                    <input type='hidden' name='foodID' value='".$fetch_orders['foodID']."' />
                    <input type='hidden' name='foodName' value='".$fetch_orders['name']."' />
                    <input type='hidden' name='foodPrice' value='".$fetch_orders['price']."' />
                    <input type='hidden' name='foodType' value='".$fetch_orders['type']."' />
                    <input type='hidden' name='imageName' value='".$fetch_orders['imageName']."' />

                    <input type = 'submit' name = 'update' value = 'Close order'/>
                </form>

                <form method='POST' action='menuDelete.php'>
                    <input type = 'hidden' name = 'foodID' value = '".$fetch_orders['foodID']."' />
                    

                    <input type = 'submit' name = 'delete' value = 'Delete Item'/>
                </form>

                
                </td></tr>\n";
                */
                };
            };
            ?>
        </table>

    <div class = "Title"><u>Staff Orders</u></div>

</body>