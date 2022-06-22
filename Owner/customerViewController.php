<?php
include 'customerViewEntity.php';

class customerController
	{
		public function getCustomerData()
		{	
			$customerView = new customerEntity;
			$customerResult = $customerView -> getCustomerData();	
			
			if($customerResult)
            {
				return $customerResult;
			}
			else
            {
				return false;
			}
		}	
	}

?>