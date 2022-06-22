<?php
require_once 'orderEntity.php';

class deleteOrder 
	{
		public function delete($cusNum)
		{	
			$orderEntity = new orderEntity;
			$result = $orderEntity -> delete($cusNum);	
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>