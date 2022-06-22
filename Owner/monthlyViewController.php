<?php
include 'monthlyViewEntity.php';

class monthlyController
	{
		public function getMonthlyData()
		{	
			$monthlyView = new monthlyReportEntity;
			$monthlyResult = $monthlyView -> getMonthlyData();	
			
			if($monthlyResult)
            {
				return $monthlyResult;
			}
			else
            {
				return false;
			}
		}	
	}

?>