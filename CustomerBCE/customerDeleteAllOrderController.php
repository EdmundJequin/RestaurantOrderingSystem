<?php
require_once 'cartEntity.php';

class DeleteAllOrder
	{
		public function deleteAllOrder()
		{	
			$delete_order  = new CartEntity;
			$result = $delete_order -> deleteAllOrder();	
			
		}
    }
?>