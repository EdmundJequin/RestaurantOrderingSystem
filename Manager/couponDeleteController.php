<?php
require_once 'couponEntity.php';

class deleteCoupon
	{
		public function deleteCoupon($couponCode)
		{	
			$couponEntity = new couponEntity;
			$result = $couponEntity -> deleteCoupon($couponCode);	
			
			if($result)
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