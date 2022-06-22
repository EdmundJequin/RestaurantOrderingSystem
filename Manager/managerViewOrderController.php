<?php
include 'orderEntity.php';

class ViewOrder
	{
		public function viewOrder()
		{	
			$orderEntity = new OrderEntity;
			$result = $orderEntity -> viewOrder();	

            if($result){
				return $result;
			}
			else{
				return false;
			}
		}	
	}

?>