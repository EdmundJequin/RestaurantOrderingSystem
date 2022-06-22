<?php
include 'orderEntity.php';

class modifyOrder 
	{
		public function modify($inputdata)
		{	
			$orderEntity = new orderEntity;
			$result = $orderEntity -> modify($inputdata);	
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>