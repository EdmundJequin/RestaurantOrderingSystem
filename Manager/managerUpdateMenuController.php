<?php
require_once 'menuEntity.php';

class UpdateMenu 
	{
		public function updateMenu($inputdata)
		{	
			$menuEntity = new MenuEntity;
			$result = $menuEntity -> updateMenu($inputdata);	
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>