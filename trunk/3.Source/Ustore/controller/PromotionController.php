<?php 
	include_once("DataProvider.php");
?>
<?php
class PromotionController
{
	public function GetAll()
	{
		$strSQL="select * from promotion";
		$result = DataProvider::Query($strSQL);
		if(mysql_num_rows($result)==0)
                    return null;
		while($row= mysql_fetch_array ($result,MYSQL_BOTH))
			$return[]=$row;
			
		return $return;
	}
	public function GetById($id)
	{
		$strSQL="select * from promotion where ID = $id";
		$result = DataProvider::Query($strSQL);
		if(mysql_num_rows($result)==0)
                    return null;
		while($row= mysql_fetch_array ($result,MYSQL_BOTH))
			$return[]=$row;
			
		return $return[0];
	}
	public function Add($name,$description,$startdate,$enddate)
	{
		$startdate=date("Y-m-d",strtotime($startdate));		
		$enddate=date("Y-m-d",strtotime($enddate));
		$strSQL="insert into promotion (Name,Detail,Apply_Date_Start,Apply_Date_End) values ('$name','$description','$startdate','$enddate')";
		$cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=mysql_insert_id ();
				
			DataProvider::Close ($cn);
            return $result;
	}
	public function Update($id,$name,$description,$startdate,$enddate)
	{
		$strSQL="update promotion set Name='$name',Detail='$description',Apply_Date_Start='$startdate',Apply_Date_End='$enddate' where ID=$id";
		echo $strSQL;
		$cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=true;
				
			DataProvider::Close ($cn);
            return $result;
	}
	public function Delete($id)
	{
		$strSQL="update promotion set Delete_Flag=1 where ID=$id";
		$cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=true;
				
			DataProvider::Close ($cn);
            return $result;
	}
	public function Count()
	{
		$strSQL = "	select count(*) from promotion";
		
            $result = DataProvider::Query($strSQL);
			$temp = mysql_fetch_array($result);
            return $temp[0];
	}
	public function Get($offset,$count)
	{
		$strSQL="select * from promotion limit $offset, $count" ;
		$result = DataProvider::Query($strSQL);
		if(mysql_num_rows($result)==0)
                    return null;
		while($row= mysql_fetch_array ($result,MYSQL_BOTH))
			$return[]=$row;
			
		return $return;
	}
}