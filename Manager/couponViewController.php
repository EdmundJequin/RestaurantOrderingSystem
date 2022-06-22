<?php
require_once 'couponEntity.php';

class viewCoupons 
	{
		public function viewCoupons()
		{	
			$couponEntity = new couponEntity;
			$result = $couponEntity -> viewCoupons();	

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