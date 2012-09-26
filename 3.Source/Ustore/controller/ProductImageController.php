<?php 
	include_once("DataProvider.php");
?>
<?php
	class ProductImageController
	{
		
		public static function Add ($Cover_Img,$Preview_Img_01,$Preview_Img_02,$Preview_Img_03,$Preview_Img_04,$Preview_Img_05,$Detail_Img_01,$Detail_Img_02,$Detail_Img_03,$Detail_Img_04,$Detail_Img_05,$Detail_Img_06,$Detail_Img_07,$Detail_Img_08,$Detail_Img_09,$Detail_Img_10)
        {
            $strSQL = "Insert into product_image (Cover_Img,Preview_Img_01,Preview_Img_02,Preview_Img_03,Preview_Img_04,Preview_Img_05,Detail_Img_01,Detail_Img_02,Detail_Img_03,Detail_Img_04,Detail_Img_05,Detail_Img_06,Detail_Img_07,Detail_Img_08,Detail_Img_09,Detail_Img_10,Delete_Flag) values ('$Cover_Img','$Preview_Img_01','$Preview_Img_02','$Preview_Img_03','$Preview_Img_04','$Preview_Img_05','$Preview_Img_06','$Preview_Img_07' ,'$Preview_Img_08' ,'$Preview_Img_09','$Preview_Img_10' ,'$Delete_Flag')";
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
		// public static function Update ($ID,$Name,$Type,$Sub_Type,$Price,$Description,$Promotion_ID,$Present_Type)
        // {
            // $strSQL = "update product_image set Name='$Name',Type='$Type',Sub_Type='$Sub_Type',Price='$Price',Description='$Description',Promotion_ID='$Promotion_ID' ,Present_Type='$Present_Type' 
                      // where ID=$ID";
			// $cn = DataProvider::Open ();
			// DataProvider::MoreQuery ($strSQL,$cn);
			
			// if(mysql_affected_rows () == 0)
				// $result=false;
			// else
				// $result=true;
				
			// DataProvider::Close ($cn);
            // return $result;
        // }
		public static function Delete ($ID)
		{
			$strSQL = "update product_image set Delete_Flag=1
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
		 public static function GetImageOfProductFromProductID ($product_id)
         {
                $strSQL = "select * 
                            from product_image
                            where product_id='$product_id' ";
                $result = DataProvider::Query($strSQL);
                if(mysql_num_rows($result)==0)
                    return null;
                while($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
				return $return[0];
         }
/*
         public static function getProducts($type, $subtype) {
         	$strSQL = "select *
         	from product_image
         	where Type=".$type;
         	if ($subtype == null) {
         		$strSQL."and Sub_Type = ". $subtype;
         	}
         	$result = DataProvider::Query($strSQL);
         	if(mysql_num_rows($result)==0)
         		return null;
         	while($row= mysql_fetch_array ($result,MYSQL_BOTH))
         		$return[]=$row;
         	return $return[0];
         }
         public static function getProductSubType($type) {
         	$strSQL = "select *
         	from product_subtype
         	where Type_ID=".$type;
         	echo $strSQL;
         	$result = DataProvider::Query($strSQL);
         	if(mysql_num_rows($result)==0)
         		return null;
         	while($row= mysql_fetch_array ($result,MYSQL_BOTH))
         		$return[]=$row;
         	return $return;
         }
				

		 public static function GetProductTypes()
		 {
		 	$strSQL = "select * 
                            from product_type
                            ";
                $result = DataProvider::Query($strSQL);
                if(mysql_num_rows($result)==0)
                    return null;
                while($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
				return $return;
		 }
		 public static function GetProductSubTypes()
		 {
			 $strSQL = "select * 
                            from product_subtype
                            ";
                $result = DataProvider::Query($strSQL);
                if(mysql_num_rows($result)==0)
                    return null;
                while($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
				return $return;
		 }
		 public static function GetProductPresentTypes()
		 {
			 $strSQL = "select * 
                            from present_type
                            ";
                $result = DataProvider::Query($strSQL);
                if(mysql_num_rows($result)==0)
                    return null;
                while($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
				return $return;
		 }
		  public static function GetProductPromotions()
		 {
			 $strSQL = "select * 
                            from promotion
                            ";
                $result = DataProvider::Query($strSQL);
                if(mysql_num_rows($result)==0)
                    return null;
                while($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
				return $return;
		 }*/
	}
?>