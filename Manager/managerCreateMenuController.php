<?php
include 'menuEntity.php';

class CreateMenu 
	{
		public function createMenu($inputdata)
		{	
			$menuEntity = new MenuEntity;
			$result = $menuEntity -> createMenu($inputdata);	

            if($result){
				return $result;
			}
			else{
				return false;
			}
		}	
	}

?>