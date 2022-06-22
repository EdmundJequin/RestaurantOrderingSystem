<?php //Grand total from cart summary
     $newGrandTotal = $_POST['grandTotal']; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel = "stylesheet" href = "menu.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <?php  @include 'header.php';  ?>

    <h1>Complete your order</h1>
    
    <div class="container">
        <form action="customerPaymentBoundary.php" method="post">
        <div class="display-order">
    </div>
            <input type="hidden" name="grandTotal" value = <?php echo $newGrandTotal ?>>
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="cusName" required>
            <span>your number</span>
            <input type="number" placeholder="enter your number" name="cusNum" required>
            <span>your card number</span>
            <input type="number" placeholder="enter your card number">
            <span>cvv</span>
            <input type="number" placeholder="enter cvv">
            <span>expiry date</span>
            <input type="date" placeholder="enter expiry date" name="expiryDate">
            <input type="submit" value="make payment" name="customerInfo" class="btn">
        </form>
    </div>


    <?php
    require_once "classes.php";

    if(isset($_POST['customerInfo']))
    {
        $paymentInfo = [
            $cusName = $_POST['cusName'],
            $cusNum = $_POST['cusNum'],
            $grandTotal = $_POST['grandTotal'],
        ];

        if (empty($_POST["cardNum"]) && empty($_POST["cvv"]) && empty($_POST["expiryDate"])) {
            header("location:customerPaymentFailedBoundary.php");
            echo "Payment failed!";
            ++$errors;
        }
        else
        {
            $payment = new Payment;
            $paymentResult = $payment -> insertOrder($paymentInfo);
            
            if($paymentResult)
		    {
    			header("Location: customerViewOrderBoundary.php");
		    }
        }
    }
    ?> 


</body>
</html>