<?php
require_once 'classes.php';

class completeOrder 
	{
		public function complete($cusName)
		{	
			$orderEntity = new orderEntity;
			$result = $orderEntity -> complete($cusName);	
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>