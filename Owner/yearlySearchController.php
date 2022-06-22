<?php
include 'yearlyViewEntity.php';

class yearlyController
	{
		public function getYearlyData()
		{	
			$yearlyView = new yearlyReportEntity;
			$yearlyResult = $yearlyView -> getYearlyData();	
			
			if($yearlyResult)
            {
				return $yearlyResult;
			}
			else
            {
				return false;
			}
		}	
	}

?>