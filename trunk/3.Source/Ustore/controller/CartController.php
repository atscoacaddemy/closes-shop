
<?php 
	include_once("DataProvider.php");
?>

<?php
	class CartController
	{
    	public static function AddCart ($user_id,$product_id, $quantity)
        {
            $strSQL = "Insert into cart (User_ID,Product_ID,Quantity,Create_Date) values ( '$user_id','$product_id','$quantity', NOW() )";
			$cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=mysql_insert_id ();
				
			DataProvider::Close ($cn);
            return $result;
        }

    	// public static function Update ($id,$user_id,$product_id, $quantity, $create_date)
        // {
			// $password = md5 ($password);
			// $email =addslashes($email);	
			
            // $strSQL = "update user set Password='$password', Email='$email' , Phone='$phone', Role='$role' where ID=$id";
		    // $cn = DataProvider::Open ();
			// DataProvider::MoreQuery ($strSQL,$cn);
			
			// if(mysql_affected_rows () == 0)
				// $result=false;
			// else
				// $result=true;
			// DataProvider::Close ($cn);
            // return $result;
        // }
		public static function Delete($id)
		{
			$strSQL = "update cart set Delete_Flag=1 where ID=$id";
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
                            where ID='$id' ";
                $result = DataProvider::Query($strSQL);
                if(mysql_num_rows($result)==0)
                    return null;
                while($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
				return $return[0];
         }
		 public static function Count()
		 {
			 $strSQL = "select count(*) from cart";
            $result = DataProvider::Query($strSQL);
			$temp = mysql_fetch_array($result);
            return $temp[0];
		 }
		
    

	

	}
?>