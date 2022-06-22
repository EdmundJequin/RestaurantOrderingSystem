<?php
require_once 'menuEntity.php';

class DeleteMenu 
	{
		public function deleteMenu($foodID)
		{	
			$menuEntity = new MenuEntity;
			$result = $menuEntity -> deleteMenu($foodID);	
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>