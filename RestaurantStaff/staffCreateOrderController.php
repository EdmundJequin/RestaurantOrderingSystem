<?php
include 'orderEntity.php';

class createOrder 
	{
		public function create($inputdata)
		{	
			$orderEntity = new orderEntity;
			$result = $orderEntity -> create($inputdata);	
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>