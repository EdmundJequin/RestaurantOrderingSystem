<?php
require_once 'accountEntity.php';

class modifyAccount 
	{
		public function modifyAccount($inputdata)
		{	
			$accountEntity = new accountEntity;
			$result = $accountEntity -> modify($inputdata);	
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>