<?php
require_once 'orderEntity.php';

class orderSearch
	{
		public function searchData($inputdata)
		{	
			$orderEntity = new orderEntity;
			$result = $orderEntity -> searchData($inputdata);	
			
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