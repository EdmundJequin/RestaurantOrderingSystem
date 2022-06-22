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

    <header>
        <nav>
            <ul>
                <!--HEADER CODE HERE UNABLE TO DISPLAY HOW MANY ITEMS IN CART NEED COUNT ROW. LINE 12 TO 37-->
                <li><a href = "customerDisplayMenuBoundary.php">Home</a></li>
                <li><a href = "customerDisplayMenuBoundary.php">Appetizers</a></li>
                <li><a href = "customerDisplayMenuBoundary.php">Mains</a></li>
                <li><a href = "customerDisplayMenuBoundary.php">Beverages</a></li>
                <li><a href = "customerDisplayMenuBoundary.php">Desserts</a></li>
                <li><a href = "customerSearchMenuBoundary.php">Search</a></li>
                <li><a href = "customerViewOrderBoundary.php">View Order</a></li>

                <!-- button to go cart summary page -->
                <li><a class="view-cart" href="submitOrder.php">Cart [<?php //echo $result?>]</a></li>
                
            </ul>
        </nav>
    </header>
<!--food search bar -->
<section class="food-search">
        <div class="container">
            <form action="customerSearchMenuBoundary.php" method="POST">
                <input type="search" name="search" placeholder="search menu items" required>
                <input type="submit" name="submit" value="Search">
            </form>
        </div>
<!-- SEARCH CONTROLLER -->
<?php 
require_once 'classes.php';

if(isset($_POST["search"]))
{
    $inputdata = $_POST['search'];

    $foodSearch = new MenuSearch;
    $result = $foodSearch -> getSearchData($inputdata);
    if($result){
    
        foreach($result as $row)
        {
        ?>
            <form action="" method="post">
                <img src="<?php echo "../../Images/".$row["imageName"]; ?>"/>
                <h3><?php echo $row['name'];?></h3>
                <div class="price"><?php echo $row['price'];?></div>
                <input type="hidden" name="name" value="<?php echo $row['name'];?>">
                <input type="hidden" name="price" value="<?php echo $row['price'];?>">
                <input type="submit" class="btn" value="add to cart" name="add_to_cart">
            </form>   
        <?php   
        }
    }
    else
    {
        print_r("no such menu item");
    }
}

?>
    
</body>
</html>