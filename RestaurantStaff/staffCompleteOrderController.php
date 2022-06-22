<?php
require_once 'classes.php';

class completeOrder 
	{
		public function completeOrder($cusName)
		{	
			$orderEntity = new orderEntity;
			$result = $orderEntity -> completeOrder($cusName);	
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>