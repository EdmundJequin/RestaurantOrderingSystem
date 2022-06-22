<?php
include 'dailyViewEntity.php';

class dailyController
	{
		public function getDailyData()
		{	
			$dailyView = new dailyReportEntity;
			$dailyResult = $dailyView -> getDailyData();	
			
			if($dailyResult)
            {
				return $dailyResult;
			}
			else
            {
				return false;
			}
		}	
	}

?>