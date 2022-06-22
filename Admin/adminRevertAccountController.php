<?php
require_once 'classes.php';

class revertAccount 
	{
		public function revertAccount($userID)
		{	
			$accountEntity = new accountEntity;
			$result = $accountEntity -> revertAccount($userID);	
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>