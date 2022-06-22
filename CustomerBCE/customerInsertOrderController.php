<?php
require_once 'orderEntity.php';
class Payment 
	{
		public function insertOrder($paymentInfo)
		{	
			$order_payment  = new OrderEntity;
			$paymentResult = $order_payment -> insertOrder($paymentInfo);	
			
			if($paymentResult)
            {
				return true;
			}
			else
            {
				return false;
			}
		}
    }

		

?>