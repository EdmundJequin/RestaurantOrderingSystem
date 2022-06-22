<?php
require_once 'couponEntity.php';

class couponSearch
	{
		public function searchCoupon($inputdata)
		{	
			$couponEntity = new couponEntity;
			$result = $couponEntity -> searchCoupon($inputdata);	
			
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