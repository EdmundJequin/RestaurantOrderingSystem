<?php
require_once 'cartEntity.php';

class RemoveOrder
	{
        public function removeOrder($inputdata)
        {
            $removeOrder = new CartEntity;
            $result = $removeOrder -> removeOrder($inputdata);
        }
    }


		

?>