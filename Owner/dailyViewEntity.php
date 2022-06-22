<?php
require_once 'DatabaseConnection.php';
class dailyReportEntity {
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function __destruct()
    {

    }

    public function getDailyData (){
        $dailyQuery = "SELECT * FROM `order` ORDER BY date";
        $result = $this->conn->query($dailyQuery);
        
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }
}
?>