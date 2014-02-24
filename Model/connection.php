<?php
session_start();
ob_start();
DB::connect();

class DB 
{
	static private  $DBconnection;
	static private $host='localhost';
	static private $userName='root';
	static private $password='';
	static private $dataBaseName='insurance';
	static public $hasDB = false;
	
	static public function connect()
	{
		self::$DBconnection = mysql_connect(self::$host,self::$userName,self::$password);
		mysql_query("set names utf8");
		mysql_query("set characer set cp1256");
		if (!is_resource(self::$DBconnection)) {   
			self::$hasDB = false;
			die("Could not connect to the MySQL server at localhost.");
		} else {   
			self::$hasDB = true;
			mysql_select_db(self::$dataBaseName,self::$DBconnection);
		}
	}
	static public  function close()
	{
		mysql_close(self::$DBconnection);
	}
	
	static public  function getThis($myQuery)
	{
		self::connect();
		
		$result= mysql_query($myQuery);
		return $result;				
	}
	
	static public  function executeThis($myQuery)
	{
		mysql_query($myQuery);		
	}
}
?>
