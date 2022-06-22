<?php
require_once 'orderEntity.php';

class ViewOrder
	{
		public function getOrderData()
		{	
			$orderEntity = new OrderEntity;
			$orderResult = $orderEntity -> getOrderData();	
			
			if($orderResult)
            {
				return $orderResult;
			}
			else
            {
				return false;
			}
		}
	}

?>