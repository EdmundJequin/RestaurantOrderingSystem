<?php
require_once 'DatabaseConnection.php';
class monthlyReportEntity {
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function __destruct()
    {

    }

    public function getMonthlyData (){
        $monthlyQuery = "SELECT * FROM `order` ORDER BY date";
        $result = $this->conn->query($monthlyQuery);
        
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }
}
?>