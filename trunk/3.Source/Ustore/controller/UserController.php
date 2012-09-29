
<?php 
	include_once("DataProvider.php");
?>

<?php
	class UserController
	{
    	public static function Add ($password, $email,$phone,$role)
        {
            $strSQL = "Insert into user (Password,Phone,Email,Role,Create_Date) values ( '$password','$phone', '$email','$role', NOW() )";
			$cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=mysql_insert_id ();
				
			DataProvider::Close ($cn);
            return $result;
        }
		public static function AddUser ($name,$password, $email,$phone,$role)
        {
			$password = trim($password);
			$password = md5 ($password);
			$email = addslashes($email);
		
            $strSQL = "Insert into user (Name,Password,Phone,Email,Role,Create_Date) values ( '$name','$password','$phone', '$email','$role', NOW() )";
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
			$password = md5 ($password);
			$email =addslashes($email);	
			
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
		public static function Delete($id)
		{
			$strSQL = "update user set Delete_Flag=1 where ID=$id";
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
                            where email='$email' and delete_flag='0'";
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
		 public static function Count()
		 {
			 $strSQL = "select count(*) from user";
            $result = DataProvider::Query($strSQL);
			$temp = mysql_fetch_array($result);
            return $temp[0];
		 }
		 public static function GetUsers($offset,$count)
		 {
		 	$strSQL = "	select * 
						from user 				
						limit $offset, $count";
            $result = DataProvider::Query($strSQL);
			 if(mysql_num_rows($result)==0)
                    return null;
            while($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
			return $return;
		 }
		 public static function CheckLogin($email,$pass)
		 {
			$pass=md5($pass);
			$email =addslashes($email);
			
		 	 $strSQL = "select * 
                            from user
                            where email='$email' and password='$pass' ";
                $result = DataProvider::Query($strSQL);
                if(mysql_num_rows($result)==0)
                    return null;
                return mysql_fetch_row ($result,MYSQL_BOTH);
		 }
		 //start lam.hoson
		 public static function SetPassword ($id,$password)
         {
				$password=md5($password);
                $strSQL = "update user set Password='$password' where ID='$id' ";
				$cn = DataProvider::Open ();
				DataProvider::MoreQuery ($strSQL,$cn);
				
				if(mysql_affected_rows () == 0)
					$result=false;
				else
					$result=true;
				DataProvider::Close ($cn);
				return $result;
         }
		  public static function CheckOldPassword ($id,$password)
         {
				$password=md5($password);
                $strSQL = "select * 
                            from user
                            where ID='$id' and password='$password' ";
                $result = DataProvider::Query($strSQL);
                if(mysql_num_rows($result)==0)
                    return null;
                while($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
				return $return[0];
         }
		 
		 //end lam.hoson
		 
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