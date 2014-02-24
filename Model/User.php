<?php

class User
{
    public function __construct() 
    {
    }
    
    public function getRole() 
    {
		$safaUserName=mysql_real_escape_string($_POST['userName']);
		$safaPassword=mysql_real_escape_string($_POST['password']);
		// post should be parameter   // DAMN EIAS TYPE !!!!!!!!!
		$myQuery="select RoleName from user u, user_role ur, role r where u.ID=ur.UserID and r.ROleID=ur.ROleID and u.UserName='";
		$myQuery=$myQuery.$safaUserName."' and u.Password='".$safaPassword."'";
		$myResult=mysql_query($myQuery);
		
		$row=mysql_fetch_array($myResult);
		return $row['RoleName'];
	}
	
	public function getID() 
    {
		$myQuery="select ID from user u where u.UserName='".$_SESSION['user']."'";
		$myResult=mysql_query($myQuery);
		$row = mysql_fetch_assoc($myResult);
		
		return $row['ID'];
	}
}
?>