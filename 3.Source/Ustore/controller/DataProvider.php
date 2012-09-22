<?php 
/*
	Các phương thức của lớp DataProvider
		1. Query ($sql)
			- Chức năng: mở liên kết đến CSDL, truy vấn, đóng liên kết và trả kết quả câu truy vấn
			- Các tham số:
				+$sql: câu truy vấn sql
			- Trả về: kết quả của hàm mysql_query
------------------------------------------------------------------------------------------------------------
		2. Open ()
			- Chức năng: Mở kết nối đến CSDL
			- Trả về: kết nối đến CSDL
		3. MoreQuery ($sql,$connection)
			- Chức năng: thực thi câu truy vấn $sql với kết nối CSDL $connection
			- Các tham số:
				+$sql:  câu truy vấn sql
				+$connection: kết nối đến CSDL cần truy vấn
			- Trả về: kết quả của hàm mysql_query
		4. Close ($connection)
			- Chức năng: đóng 1 kết nối đang mở
			- Các tham số:
				+$connection: kết nối cần đóng
*/
?>
<?php
class DataProvider
{
	public static function Query($sql)
	{
		include('config.php');
		include_once('error.php');
		// Tạo kết nối đến CSDL
		if (!($connection = @mysql_connect($hostName,$username,$password)))
			die ("Couldn't connect to database");
			
		if (!(@mysql_select_db($databaseName,$connection)))
			showError();
		mysql_query("SET character_set_results=utf8", $connection);
		//Thực thi câu truy vấn SQL
		if (!($result = @mysql_query($sql, $connection)))
			showError();
		
		// Đóng kết lối
		if (!(@mysql_close($connection)))
			showError();
		
		return $result;
	}	
	
	public static function Open ()
	{
		include('config.php');
		include_once('error.php');
		if (!($connection = @mysql_connect($hostName,$username,$password)))
			die ("Couldn't connect to database");
		if (!(@mysql_select_db($databaseName,$connection)))
			showError();
		return $connection;
	}
	
	public static function MoreQuery ($sql, $connection)
	{
		include_once('error.php');
		//Thực thi câu truy vấn SQL
		mysql_query("SET character_set_results=utf8", $connection);
		if (!($result = @mysql_query($sql, $connection)))
			showError();
		return $result;
	}
	
	public static function Close($connection)
	{
		include_once('error.php');
		// Đóng kết lối
		if (!(@mysql_close($connection)))
			showError();
	}
	
	
}
?>