<?php
require_once 'accountEntity.php';

class accountSearch
	{
		public function searchData($inputdata)
		{	
			$accountEntity = new accountEntity;
			$result = $accountEntity -> searchData($inputdata);	
			
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