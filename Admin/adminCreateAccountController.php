<?php
include 'accountEntity.php';

class createAccount 
	{
		public function create($inputdata)
		{	
			$accountEntity = new accountEntity;
			$result = $accountEntity -> create($inputdata);	
			
			if($result){
				return true;
			}
			else{
				return false;
			}
		}	
	}

?>