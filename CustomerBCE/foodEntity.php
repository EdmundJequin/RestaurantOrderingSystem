<?php
require_once 'DatabaseConnection.php';
class FoodEntity
{
        public function __construct()
        {
            $db = new DatabaseConnection;
            $this->conn = $db->conn;
        }

        public function __destruct()
        {

        }
        
        public function getData()
        {
            
            $userQuery = "SELECT * FROM `fooditem`";
            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
            
        }

        public function getSearchData($inputdata)
        {
            $userSearchQuery = "SELECT * FROM `foodItem` WHERE name LIKE '%".$inputdata."%'";
            $result = $this->conn->query($userSearchQuery);
            if($result->num_rows>0){
                return $result;
            }else{
                return false; 
            }
        }
}

?>