<?php 
	include_once("DataProvider.php");
?>
<?php
	class ProductController
	{
		public static function GetAll($offset,$count)
		{
			$strSQL = "	select * 
						from product 				
						limit $offset, $count";
            $result = DataProvider::Query($strSQL);
			$return[]=null;
            while($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
			
			return $return;
		}
		public static function Count()
		 {
			 $strSQL = "select count(*) from product";
            $result = DataProvider::Query($strSQL);
			$temp = mysql_fetch_array($result);
            return $temp[0];
		 }
		public static function Add ($Name,$Type,$Sub_Type,$Price,$Description,$Promotion_ID)
        {
            $strSQL = "Insert into product (Name,Type,Sub_Type,Price,Description,Promotion_ID) values ( '$Name','$Type','$Sub_Type','$Price','$Description','$Promotion_ID' )";
			echo $strSQL;
			$cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=mysql_insert_id ();
				
			DataProvider::Close ($cn);
            return $result;
        }
		public static function Update ($ID,$Name,$Type,$Sub_Type,$Price,$Description,$Promotion_ID)
        {
            $strSQL = "update product set Name=$Name,Type=$Type,Sub_Type=$Sub_Type,Price=$Price,Description=$Description,Promotion_ID=$Promotion_ID
                      where ID=$ID";
			$cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=true;
				
			DataProvider::Close ($cn);
            return $result;
        }
		public static function Delete ($ID)
		{
			$strSQL = "update product set Delete_Flag=1
                      where ID=$ID";
			$cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=true;
				
			DataProvider::Close ($cn);
            return $result;
		}
		 public static function GetProductByID ($id)
         {
                $strSQL = "select * 
                            from product
                            where ID='$id' ";
                $result = DataProvider::Query($strSQL);
                if(mysql_num_rows($result)==0)
                    return null;
                while($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
				return $return[0];
         }
	}
?>