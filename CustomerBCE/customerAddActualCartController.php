<?php
require_once 'cartEntity.php';

class AddActualCart 
    {
        public function addActualCart()
        {
            $cartEntity = new CartEntity;
            $result = $cartEntity -> addActualCart();

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