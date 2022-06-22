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

<?php include 'header.php'; ?>

    <!--food search bar -->
    <section class="food-search">
        <div class="container">
            <form action="customerSearchMenuBoundary.php" method="POST">
                <input type="search" name="search" placeholder="search menu items" required>
                <input type="submit" name="submit" value="Search">
            </form>
        </div>

<!-- ADD ORDER CONTROLLER -->
<?php
    require_once 'classes.php';

    if(isset($_POST["addToCart"]))
    {
        $inputdata = [
            $name = $_POST['name'],
            $price = $_POST['price'],
            $quantity = 1,
        ];

        $cart = new AddToCart;
        $result = $cart -> addCartItem($inputdata);
        
        /*
        if($result)
        {
            
        }else{
            print_r("failed");
        }
        */
    }
?>

<?php
    //Add non dupe items into actual cart
    $actualCart = new AddActualCart;
    $result = $actualCart -> addActualCart();
                
?>

<!-- SEARCH CONTROLLER -->
<?php 

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

    </section>
        <div class="box-container">
        
        <!-- VIEW MENU CONTROLLER-->
        <?php
            $food = new MenuView;
            $result = $food -> getData();

            if($result)
            {
                foreach($result as $row)
                {
                    //For adding item to cart
                    ?>
                    <form action="customerDisplayMenuBoundary.php" method="post">
                        <img src="<?php echo "../../Images/".$row["imageName"]; ?>"/>
                        <h3><?php echo $row['name'];?></h3>
                        <div class="price"><?php echo $row['price'];?></div>
                        <input type="hidden" name="name" value="<?php echo $row['name'];?>">
                        <input type="hidden" name="price" value="<?php echo $row['price'];?>">
                        <input type="submit" class="btn" value="Add to cart" name="addToCart">
                    </form>
                    <?php
                }
            }
            else
            {
                echo "No record found";
            }       
        ?>


        </div>
    </section>
</html>