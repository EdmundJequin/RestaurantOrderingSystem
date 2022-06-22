<?php
require_once 'cartEntity.php';

class UpdateCart
	{
		public function updateCart($inputdata)
		{	
			$cartEntity = new cartEntity;
			$result = $cartEntity -> updateCart($inputdata);	

		}	
	}

?>