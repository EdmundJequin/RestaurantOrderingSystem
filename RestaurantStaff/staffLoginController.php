<?php
    include 'orderEntity.php';
    
    class Login 
	{
		public function checkAccount($inputdata)
		{	
			$orderEntity = new orderEntity;
			$result = $orderEntity -> checkAccount($inputdata);	
			
			if($result){
				return $result;
			}
			else{
				return false;
			}
		}	
	}
?>