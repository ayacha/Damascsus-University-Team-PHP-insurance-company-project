<?php

	class Company
	{
		
		public function __construct() 
		{
			//$this->$Name= $UserName;
			//$this->$ID= $UserName;
		}
		
		public function addCompany() 
		{
            if(isset($_POST['addCompany'])) 
			{
                if ((!empty($_POST['Name'])) && (!empty($_POST['PhoneNumber'])) && (!empty($_POST['Address'])))
				{
					$result = mysql_query("INSERT INTO company (Name, PhoneNumber, Address) VALUES ('".$_POST['Name']."','".$_POST['PhoneNumber']."','".$_POST['Address']."')");
					
					if($result == false) 
					{
					   echo "بعض الحقول الضرورية غير ممتلئة";
					}
				}
				else
					echo "بعض الحقول الضرورية غير ممتلئة";
            }
		}
		
		public function editCompany($ID) 
		{
            if(isset($_POST['editCompany'])) 
			{
                if ((!empty($_POST['Name'])) && (!empty($_POST['PhoneNumber'])) && (!empty($_POST['Address'])))
				{
					$result1 = mysql_query("update company set Name='".$_POST['Name']."', PhoneNumber='".$_POST['PhoneNumber']."', Address='".$_POST['Address']."' where ID='".$ID."'");
				
				
                if(($result !== false) && ($result1 !== false)) 
				{
                   header("Location: http://localhost/HW/View/Companies/ViewCompany.php?ID=".$ID."");
                }
				}
				else
					echo "ererererer";
            }
		}
		
		public function deleteCompany() 
		{
            if(isset($_POST['DCompany']) && (!empty($_POST['DCompany']))) {
                $delete_id = mysql_real_escape_string($_POST['DCompany']);

                $result = mysql_query("DELETE FROM company WHERE ID='".$_POST['DCompany']."'");
                if($result !== false) {
                    header("Location: http://localhost/HW/View/Companies/AllCompanies.php");
                }
            }
		}
	}
?>