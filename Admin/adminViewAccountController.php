<?php
require_once 'accountEntity.php';

class accountView
	{
		public function getData()
		{	
			$accountEntity = new accountEntity;
			$result = $accountEntity -> getData();	
			
			if($result)
            {
				return $result;
			}
			else
            {
				return false;
			}
		}	
	}

?>