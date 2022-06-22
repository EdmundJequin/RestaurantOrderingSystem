<?php
require_once 'DatabaseConnection.php';
class orderEntity
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function __destruct()
    {

    }

    public function create($inputdata)
    {
        $data = "'" .implode ("','",$inputdata) . "'";

        $orderQuery = "INSERT INTO stafforder (cusName, cusNum, total_product, quantity, total_price, status) VALUES ($data)";
        $result = $this->conn->query($orderQuery);
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function getData()
    {
        $orderQuery = "SELECT * FROM stafforder";
        $result = $this->conn->query($orderQuery);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function searchData($inputdata)
    {
        $userQuery = "SELECT * FROM `stafforder` WHERE CONCAT(cusName, cusNum, total_product, quantity, total_price, status) LIKE '%".$inputdata."%'";
        $result = $this->conn->query($userQuery);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }
    
    public function checkAccount($inputdata)
    {  
        $username = $inputdata[0];
        $password = $inputdata[1];

        $selectAccount = "SELECT * FROM `useraccount` WHERE (`name` = '$username' AND `password` = '$password')";
        $result = $this->conn->query($selectAccount);

        while($row = mysqli_fetch_array($result))
        {
            return $row['type'];
        }

    }
    
    public function modify($inputdata)
    {   
        $cusName = $inputdata[0];
        $cusNum = $inputdata[1];
        $total_product = $inputdata[2];
        $quantity = $inputdata[3];
        $total_price = $inputdata[4];

        $orderQuery = "UPDATE `stafforder` SET `cusName` = '$cusName', `cusNum` = '$cusNum', `total_product` = '$total_product', `quantity` = '$quantity', `total_price` = '$total_price'
        WHERE `cusName` = '$cusName'
        ";
        
        $result = $this->conn->query($orderQuery);
        
        if($result)
        {
            return true;
            
        }else
        {
            return false;
        }
    }

    public function delete($cusNum)
    {   

        $orderQuery= "DELETE from stafforder where cusNum=$cusNum";
        
        $result = $this->conn->query($orderQuery);
        
        if($result)
        {
            return true;
            
        }else
        {
            return false;
        }
    }

    public function complete($cusName)
    {   

        $completeQuery = "UPDATE `stafforder` SET `status` = 'Complete' WHERE `cusName` = '$cusName'";
        
        $result = $this->conn->query($completeQuery);
        
        if($result)
        {
            return true;
            
        }else
        {
            return false;
        }
    }
}