<?php
require_once 'cartEntity.php';

class ViewCart 
    {
        public function viewCart()
        {
            $cartEntity = new CartEntity;
            $result = $cartEntity -> viewCart();

            if($result)
            {
                return $result;
            }
            else
            {
                return false;
            }
        }
    }
?>