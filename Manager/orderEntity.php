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

    //View Order
    public function viewOrder()
    {
        $query = "SELECT * FROM `order`";
        $result = $this->conn->query($query);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }
}
?>