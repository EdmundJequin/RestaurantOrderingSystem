<?php
require_once 'classes.php';

class suspendAccount 
	{
		public function suspendAccount($userID)
		{	
			$accountEntity = new accountEntity;
			$result = $accountEntity -> suspendAccount($userID);	
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>