<?php
include 'menuEntity.php';

class ViewMenu 
	{
		public function viewMenu()
		{	
			$menuEntity = new MenuEntity;
			$result = $menuEntity -> viewMenu();	

            if($result){
				return $result;
			}
			else{
				return false;
			}
		}	
	}

?>