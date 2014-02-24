<?php

	class Role
	{
		private $Name;
		private $ID;
		
		public function __construct() 
		{
		}
		
		public function addPostRole() 
		{
            if(isset($_POST['addRole']) && (!empty($_POST['newRole']))) {
                $result = mysql_query("INSERT INTO role (RoleName) VALUES ('".$_POST['newRole']."')");
                if($result !== false) {
                   //echo "sadasda";
                }
            }			
		}
		
		public function deletePostRole() 
		{
            if(isset($_POST['DRole']) && (!empty($_POST['DRole']))) {
                $delete_id = mysql_real_escape_string($_POST['DRole']);

                $result = mysql_query("DELETE FROM role WHERE RoleName='".$_POST['DRole']."'");
                if($result !== false) {
                    header("Location: http://localhost/HW/View/MRole.php");
                }
            }
			
		}
	}
?>