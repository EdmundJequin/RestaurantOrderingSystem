<?php
include 'orderEntity.php';

class orderView
	{
		public function getData()
		{	
			$orderEntity = new orderEntity;
			$result = $orderEntity -> getData();	
			
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