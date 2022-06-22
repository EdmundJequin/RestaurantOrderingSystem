<?php
require_once 'foodEntity.php';

class MenuView
	{
		public function getData()
		{	
			$foodEntity = new FoodEntity;
			$result = $foodEntity -> getData();	
			
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