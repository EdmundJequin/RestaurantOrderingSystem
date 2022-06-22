<!DOCTYPE html>
<head>
    <title>Manager creating menu</title>
    <meta charset = "UTF-8">
</head>

<?php

   include 'managerCreateMenuController.php';  
   	if(isset($_POST["submit"]))
	{
		$inputdata = 
		[
            $name = $_POST["itemName"],
            $price= $_POST["itemPrice"],
            $type = $_POST["foodType"],
		];
		
		$menu = new CreateMenu;
		$result = $menu -> createMenu($inputdata);

        if($result)
		{
            header("Location: managerViewMenuBoundary.php");
			echo $result;
		}else{
			print_r("failed");
		}
		
	}   
?>

<body>
    <form method = "post" action = "managerCreateMenuBoundary.php" enctype = "multipart/form-data">
        <!--ITEM NAME-->
        <label for = "itemName">Item Name: </label><br>
        <input type = "text" id = "itemName" name = "itemName"><br><br>
        <!--ITEM PRICE-->
        <label for = "itemPrice">Item Price: </label><br>
        <input type = "text" id = "itemPrice" name = "itemPrice"><br><br>
        <!--FOOD TYPE-->
        <input type = "radio" id = "appetizer" name = "foodType" value="Appetizers">
        <label for = "appetizer">Appetizer</label>
        <input type = "radio" id = "main" name = "foodType" value="Main">
        <label for = "main">Mains</label>
        <input type = "radio" id = "beverages" name = "foodType" value="Beverages">
        <label for = "beverages">Beverages</label>
        <input type = "radio" id = "dessert" name = "foodType" value="Dessert">
        <label for = "dessert">Desserts</label><br><br>
        <!--IMAGE UPLOAD-->
        Select Image File to Upload:
        <input type="file" name="file"><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
<body>