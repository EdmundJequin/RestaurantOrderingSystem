<?php
require_once 'DatabaseConnection.php';
class loginEntity
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function __destruct()
    {

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
}