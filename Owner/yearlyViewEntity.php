<?php
require_once 'DatabaseConnection.php';
class yearlyReportEntity {
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function __destruct()
    {

    }

    public function getYearlyData (){
        $yearlyQuery = "SELECT * FROM `order` ORDER BY date";
        $result = $this->conn->query($yearlyQuery);
        
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }
}
?>