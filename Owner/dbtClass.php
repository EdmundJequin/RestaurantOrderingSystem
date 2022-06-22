<?php
	class DBT{
	
		protected function connect()
		{
			$dbusername = "root";
			$dbpass = "";
			$dbt = new PDO('mysql:host=localhost;dbname=nixonseven', $dbusername, $dbpass);
			
			if(!$dbt)
			{
				die("<h1 Database Connection Failed</h1>");
			}
			return $this->dbt = $dbt;
		}
	}
?>