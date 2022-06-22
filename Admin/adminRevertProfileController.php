<?php
require_once 'classes.php';

class revertProfile
	{
		public function revertProfile($userID)
		{	
			$accountEntity = new accountEntity;
			$result = $accountEntity -> revertProfile($userID);	
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>