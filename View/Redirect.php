<?php
include("../Model/connection.php");

if (isset($_SESSION['user']))
{
	$myResult=mysql_query("select * from user where UserName='".$_SESSION['user']."'");
	$row=mysql_fetch_array($myResult);
	if ($row['Type']==0)
	{
		header("Location: http://localhost/HW/View/Manage.php");
	}
	else
	{
		header("Location: http://localhost/HW/View/Home.php");
	}
}
?>