
<?php 
	include_once("DataProvider.php");
?>

<?php
	class UserController
	{
    	public static function Add ($password, $email,$phone,$role)
        {
            $strSQL = "Insert into user values (NULL, '$password','$phone', '$email','$role', NOW() )";
			$cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=mysql_insert_id ();
				
			DataProvider::Close ($cn);
            return $result;
        }

    	public static function Update ($id,$password, $email,$phone,$role)
        {

            $strSQL = "update user set Password='$password', Email='$email' , Phone='$phone', Role='$role' where ID=$id";
		    $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=true;
			DataProvider::Close ($cn);
            return $result;
        }
		 public static function GetUserByEmail ($email)
         {
                $strSQL = "select * 
                            from user
                            where email='$email' ";
                $result = DataProvider::Query($strSQL);
                if(mysql_num_rows($result)==0)
                    return null;
                return mysql_fetch_row ($result,MYSQL_BOTH);
         }
		  public static function GetUserByID ($id)
         {
                $strSQL = "select * 
                            from user
                            where ID='$id' ";
                $result = DataProvider::Query($strSQL);
                if(mysql_num_rows($result)==0)
                    return null;
                while($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
				return $return[0];
         }
		 /*
		public static function SetPassword ($id, $newPassword)
   
        {
                $strSQL = "update user set password= '$newPassword' where id='$id'";
                $cn = DataProvider::Open ();
                DataProvider::MoreQuery ($strSQL,$cn);
                                        if(mysql_affected_rows () == 0)
                {	
                    $result=false;
                    }
                else
                    $result=true;
                                            DataProvider::Close ($cn);
                return $result;
            }
                                                    public static function SetEmail ($id , $Email)
            {
                $strSQL = "update user set email= '$Email' where id='$id'";
                $cn = DataProvider::Open ();
                DataProvider::MoreQuery ($strSQL,$cn);
                                        if(mysql_affected_rows () == 0)
                    $result=false;
                else
                    $result=true;
                                            DataProvider::Close ($cn);
                return $result;
            }
                                // public static function SetAvatar ($user_id, $avatar)
            // {
                // $strSQL = "update user set avatar= '$avatar' where user_id=$user_id";
                // $cn = DataProvider::Open ();
                // DataProvider::MoreQuery ($strSQL,$cn);
                                        // if(mysql_affected_rows () == 0)
                    // $result=false;
                // else
                    // $result=true;
                                            // DataProvider::Close ($cn);
                // return $result;
            // }
                                public static function Login ($email, $password)
            {
                $strSQL = "select * from user where email='$email' and password='$password'";
                $result = DataProvider::Query($strSQL);
                if(mysql_num_rows($result)==0)
                    return null;
                return mysql_fetch_array($result);
            }
                                public static function GetUserByID ($id)
            {
                $strSQL = "select *
                        from user
                        where id='$id'";
                $result = DataProvider::Query($strSQL);
                if(mysql_num_rows($result)==0)
                    return null;
                return mysql_fetch_array ($result);	
            }
           
            // public static function GetUserByName ($username)
            // {
                // $strSQL = "select id , hoten, email, gioitinh, sdt1, sdt2, loaikh, status 
                            // from khgiaodich
                            // where hoten='$username' ";
                // $result = DataProvider::Query($strSQL);
                // if(mysql_num_rows($result)==0)
                    // return null;
                // return mysql_fetch_array ($result);
            // }
                                                                        public static function FindByName ($keyWord,$index=0,$limit=10)
            {
                $strSQL = "	select * 
                            from khgiaodich 
                            where hoten like '%$keyWord%'
                            limit $index, $limit";
                $result = DataProvider::Query($strSQL);
                return $result;
            }
                                // public static function countResultByName ($keyWord)
            // {
                // $strSQL = "select count(*) from users where username like '%$keyWord%'";
                // $result = DataProvider::Query($strSQL);
                // $temp = mysql_fetch_array($result);
                // return $temp[0];
            // }
                                public static function FindByEmail ($keyWord,$index=0,$limit=10)
            {
                $strSQL = "	select * 
                            from khgiaodich 
                            where email like '%$keyWord%'
                            limit $index, $limit";
                $result = DataProvider::Query($strSQL);
                return $result;
            }
                                public static function countResultByEmail ($keyWord)
            {
                $strSQL = "select count(*) from khgiaodich where email like '%$keyWord%'";
                $result = DataProvider::Query($strSQL);
                $temp = mysql_fetch_array($result);
                return $temp[0];
            }
                                public static function getUsers ()
            {
                $strSQL = "	select * 
                            from user 
                            where role != 1";
                $result = DataProvider::Query($strSQL);
                return $result;
            }
                        public static function checkPassword($password)
            {
                $strSQL = "select * from user where password='$password'";
                $result = DataProvider::Query($strSQL);
                if(mysql_num_rows($result)==0)
                    return null;
                return mysql_fetch_array ($result);	
            }*/
    

	

	}
?>