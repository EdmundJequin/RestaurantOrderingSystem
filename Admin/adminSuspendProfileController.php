<?php
require_once 'classes.php';

class suspendProfile 
	{
		public function suspendProfile($userID)
		{	
			$accountEntity = new accountEntity;
			$result = $accountEntity -> suspendProfile($userID);	
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>