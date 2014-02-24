<?php

	class Privilege
	{
		private $Name;
		private $ID;
		
		public function __construct() 
		{
		}
		
		public function addPostPrivilege()
		{
            if(isset($_POST['addPrivilege']) && (!empty($_POST['newPrivilege']))) {
                $result = mysql_query("INSERT INTO privilege (PrivilegeName) VALUES ('".$_POST['newPrivilege']."')");
                if($result !== false) {
                   //echo "sadasda";
                }
            }			
		}
		
		public function deletePostPrivilege() 
		{
            if(isset($_POST['DPrivilege']) && (!empty($_POST['DPrivilege']))) {
                $delete_id = mysql_real_escape_string($_POST['DPrivilege']);

                $result = mysql_query("DELETE FROM privilege WHERE PrivilegeName='".$_POST['DPrivilege']."'");
                if($result !== false) {
                    header("Location: http://localhost/HW/View/MPrivilege.php");
                }
            }
		}
	}
?>