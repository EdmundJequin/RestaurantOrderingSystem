<?php
require_once 'foodEntity.php';

class MenuSearch
	{
		public function getSearchData($inputdata)
		{	
			$foodEntity = new FoodEntity;
			$searchResult = $foodEntity -> getSearchData($inputdata);	
			
			if($searchResult)
            {
				return $searchResult;
			}
			else
            {
				return false;
			}
		}	
	}

?>