
<?php 
	include_once("DataProvider.php");
?>

<?php
	class CartController
	{
		
    	public static function AddCart ($user_id,$product_id, $quantity)
        {
        	echo ($user_id.$product_id.$quantity);
            $strSQL = "Insert into cart (User_ID,Product_ID,Quantity) values ( '$user_id','$product_id','$quantity')";
			$cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=mysql_insert_id ();
				
			DataProvider::Close ($cn);
            return $result;
        }

    	public static function UpdateCart ($user_id,$product_id, $quantity)
        {
            $strSQL = "update cart set Quantity='$quantity' where Product_ID='$product_id' and User_ID='$user_id' and Delete_Flag='0' ";
		    $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=true;
			DataProvider::Close ($cn);
            return $result;
        }
		public static function Delete($id)
		{
			$strSQL = "update cart set Delete_Flag=1 where ID='$id' ";
		    $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=true;
			DataProvider::Close ($cn);
            return $result;
		}
		 
		 public static function GetCartByID ($id)
         {
                $strSQL = "select * 
                            from cart
                            where ID='$id' and Delete_Flag='0' ";
                $result = DataProvider::Query($strSQL);
                if(mysql_num_rows($result)==0)
                    return null;
                while($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
				return $return[0];
         }
		 public static function GetCartByUserIDAndProductId ($user_id,$product_id)
         {
                $strSQL = "select * 
                            from cart
                            where User_ID='$user_id' and Product_ID='$product_id' and Delete_Flag='0' ";
                $result = DataProvider::Query($strSQL);
                if(mysql_num_rows($result)==0)
                    return null;
                while($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
				return $return[0];
         }
		 public static function GetCartByUserID ($user_id)
         {
                $strSQL = "select * 
                            from cart
                            where User_ID='$user_id' and Delete_Flag='0' ";
                $result = DataProvider::Query($strSQL);
                if(mysql_num_rows($result)==0)
                    return null;
                while($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
				return $return;
         }
		 
		 public static function CountProductID_Of_CartByUserID ($user_id)
         {
                $strSQL = "select count(*)
                            from cart
                            where User_ID='$user_id' and Delete_Flag='0' ";
                $result = DataProvider::Query($strSQL);
				$temp = mysql_fetch_array($result);
				return $temp[0];
         }
		 public static function Count()
		 {
			 $strSQL = "select count(*) from cart where Delete_Flag='0' ";
            $result = DataProvider::Query($strSQL);
			$temp = mysql_fetch_array($result);
            return $temp[0];
		 }

	}
?>