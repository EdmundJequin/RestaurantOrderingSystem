<?php
require_once 'DatabaseConnection.php';
class CartEntity
{
        public function __construct()
        {
            $db = new DatabaseConnection;
            $this->conn = $db->conn;
        }

        public function __destruct()
        {

        }

        //Add to cart table
        public function addCartItem($inputdata)
        {
            $name = $inputdata[0];
            $price = $inputdata[1];
            $quantity = $inputdata[2];
            
            $insertQuery = "INSERT INTO `cart` (`name`, `price`, `quantity`) VALUES ('$name', '$price', '$quantity')";
            $result = $this->conn->query($insertQuery);
           
        }

        //Copy from initial cart table
        
        public function addActualCart()
        {
            $insertQuery = "INSERT INTO `actualcart` (`name`, `price`, `quantity`)
                            SELECT DISTINCT st.name, st.price, st.quantity FROM cart st
                            WHERE NOT EXISTS (SELECT 1
                                                FROM actualcart t2
                                                WHERE t2.name = st.name)";
            $this->conn->query($insertQuery);
        }
        

        //View actual cart
        public function viewCart()
        {
            $viewQuery = "SELECT * FROM `actualcart`";
            $result = $this->conn->query($viewQuery);
            
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        //Update actual cart
        public function updateCart($inputdata)
        {   
            $cartID = $inputdata[0]; 
            $name = $inputdata[1];
            $quantity = $inputdata[2];

            $updateQuery = "UPDATE `actualcart` SET quantity = '$quantity' WHERE `name` = '$name' AND `cartID` = '$cartID'";
            $result = $this->conn->query($updateQuery);
            
        }

        public function deleteAllOrder(){
            $deleteOrder = "DELETE FROM `actualcart`";
            $result = $this->conn->query($deleteOrder);

            $deleteFromCart = "DELETE FROM `cart`";
            $result = $this->conn->query($deleteFromCart);
        }

        public function removeOrder($inputdata)
        {
            $removeOrder = "DELETE FROM `actualcart` WHERE `cartID` = '$inputdata[0]'";
            $result = $this->conn->query($removeOrder);

            $removeFromCart = "DELETE FROM `cart` WHERE `name` = '$inputdata[1]'";
            $result = $this->conn->query($removeFromCart);
        }

}

?>