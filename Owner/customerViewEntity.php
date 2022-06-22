<?php
require_once 'DatabaseConnection.php';
class customerEntity {
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function __destruct()
    {

    }

    public function getCustomerData (){
        $customerQuery = "SELECT * FROM `order` ORDER BY total_product";
        $result = $this->conn->query($customerQuery);
        
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }
}
?>