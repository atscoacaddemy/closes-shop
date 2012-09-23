<?php 
	include_once("DataProvider.php");
?>
<?php
	class RoleController
	{
		public static function GetAll()
		{
			$strSQL = "	select * 
						from user_role 				
						";
            $result = DataProvider::Query($strSQL);
            while($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
			return $return;
		}
	}
?>