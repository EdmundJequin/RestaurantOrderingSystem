<?php
    include 'loginEntity.php';
    
    class Login 
	{
		public function checkAccount($inputdata)
		{	
			$loginEntity = new loginEntity;
			$result = $loginEntity -> checkAccount($inputdata);	
			
			if($result){
				return $result;
			}
			else{
				return false;
			}
		}	
	}
?>