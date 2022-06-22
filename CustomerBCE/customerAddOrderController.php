<?php
require_once 'cartEntity.php';

//Add to cart table
class AddToCart 
    {
        public function addCartItem($inputdata)
        {
            $cartEntity = new CartEntity;
            $result = $cartEntity -> addCartItem($inputdata);

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