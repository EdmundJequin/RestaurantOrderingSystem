<?php
<<<<<<< HEAD

=======
>>>>>>> d88cf6629124c016f295b7cbb4c601647450d67c
require_once 'DatabaseConnection.php';
class couponEntity
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function __destruct()
    {

    }

    //Create Coupon
    public function createCoupon($inputdata)
    {
        $data = "'" .implode ("','",$inputdata) . "'";

        $accountQuery = "INSERT INTO coupons (couponCode, couponDescription, discountAmount) VALUES ($data)";
        $result = $this->conn->query($accountQuery);
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //View Coupons
    public function viewCoupons()
    {
        $query = "SELECT * FROM `coupons`";
        $result = $this->conn->query($query);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
        echo "Hello";
    }

    //Search Coupons
    public function searchCoupon($inputdata)
    {
        $userQuery = "SELECT * FROM `coupons` WHERE CONCAT(couponCode, couponDescription, discountAmount) LIKE '%".$inputdata."%'";
        $result = $this->conn->query($userQuery);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }

    //Delete Coupon
    public function deleteCoupon($couponCode)
    {
        $delete = "DELETE FROM coupons WHERE couponCode = '$couponCode'";
        $result = $this->conn->query($delete);

        if($result){
            return true;
        }else{
            return false;
        }
    }
}