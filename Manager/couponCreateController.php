<?php
include 'couponEntity.php';

class createCoupon 
	{
		public function createCoupon($inputdata)
		{	
			$couponEntity = new couponEntity;
			$result = $couponEntity -> createCoupon($inputdata);	
			
			if($result){
				return $result;
			}
			else{
				return false;
			}
		}	
	}

?>