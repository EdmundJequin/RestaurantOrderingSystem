<?php
require_once 'DatabaseConnection.php';
class OrderEntity
{
        public function __construct()
        {
            $db = new DatabaseConnection;
            $this->conn = $db->conn;
        }

        public function __destruct()
        {

        }
        
        public function insertOrder($paymentInfo)
        {
            $select = "SELECT `name`, `quantity`, `time` FROM `actualcart`";
            $selectResult = $this->conn->query($select);
            foreach($selectResult as $row)
            {
                $cartName = $row['name'];
                $cartQuantity = $row['quantity'];
                $cartTime = $row['time'];
                
                $paymentQuery = "INSERT INTO `order`(`cusName`, `cusNum`, `total_price`, `total_product`, `quantity`, `startTime`)
                VALUES('$paymentInfo[0]', '$paymentInfo[1]', '$paymentInfo[2]', '$cartName', '$cartQuantity', '$cartTime')";
                $paymentResult = $this->conn->query($paymentQuery);
            }
            if ($selectResult)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getOrderData()
        {
            $userQuery = "SELECT `name`, `quantity` FROM `actualcart`";
            $orderResult = $this->conn->query($userQuery);
            if($orderResult){
                return $orderResult;
            }else{
                return false;
            }

            $updateQuery = "UPDATE `order` SET status = 'completed' WHERE `cusNum` = '$cusNum'";
            $submitResult = $this->conn->query($updateQuery);
            
        }
}

?>