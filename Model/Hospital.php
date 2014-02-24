<?php

class Hospital
{
    public function __construct() 
    {
    }
	
	public function addHospital() 
		{
            if(isset($_POST['addHospital'])) 
			{
                if ((!empty($_POST['UserName'])) &&(!empty($_POST['Name'])) && (!empty($_POST['PhoneNumber'])) && (!empty($_POST['Address'])))
				{
					$newUser=mysql_query("INSERT INTO user (UserName, Password) VALUES ('".$_POST['UserName']."','".$_POST['UserName']."_4')");
					
					$myResult=mysql_query("select ID from user where UserName='".$_POST['UserName']."'");
					$row=mysql_fetch_assoc($myResult);
					
					$role=mysql_query("select RoleID from role where RoleName='Hospital'");
					$rolerow=mysql_fetch_assoc($role);
					
					$userrole=mysql_query("INSERT INTO user_role (UserID, RoleID) VALUES ('".$row['ID']."','".$rolerow['RoleID']."')");
					
					$result = mysql_query("INSERT INTO hospital (ID,Name, PhoneNumber, Address,Type) VALUES ('".$row['ID']."','".$_POST['Name']."','".$_POST['PhoneNumber']."','".$_POST['Address']."','".$_POST['Type']."')");
					
					if($result == false) 
					{
					   echo "بعض الحقول الضرورية غير ممتلئة";
					}
				}
				else
					echo "بعض الحقول الضرورية غير ممتلئة";
            }
		}
		
		public function editHospital($ID) 
		{
            if(isset($_POST['editHospital'])) 
			{
                if ((!empty($_POST['UserName'])) &&(!empty($_POST['Name'])) && (!empty($_POST['PhoneNumber'])) && (!empty($_POST['Address'])))
				{
					$result = mysql_query("update user set UserName='".$_POST['UserName']."' where ID='".$ID."'");
					
					$result1 = mysql_query("update hospital set Name='".$_POST['Name']."', PhoneNumber='".$_POST['PhoneNumber']."', Address='".$_POST['Address']."', Type='".$_POST['Type']."' where ID='".$ID."'");
				
				
                if(($result !== false) && ($result1 !== false)) 
				{
                   header("Location: http://localhost/HW/View/Hospitals/ViewHospital.php?ID=".$ID."");
                }
				}
				else
					echo "بعض الحقول الضرورية غير ممتلئة";
            }
		}
		
		public function deleteHospital() 
		{
            if(isset($_POST['DHospital']) && (!empty($_POST['DHospital']))) {
                $delete_id = mysql_real_escape_string($_POST['DHospital']);

                $result = mysql_query("DELETE FROM hospital WHERE ID='".$_POST['DHospital']."'");
                if($result !== false) {
                    header("Location: http://localhost/HW/View/Hospitals/AllHospitals.php");
                }
            }
		}

	public function getOldServicesByCustomerNationalNb() 
    {
		$myQuery="select FirstName, LastName, NationalNumber, PhoneNumber, email, birthdate, Date from operation o, customer c, user u where u.ID=o.HospitalID and c.CustomerID=o.CustomerID and c.NationalNumber='";
		$myQuery=$myQuery.$_POST['NationalNum']."' and u.UserName='".$_SESSION['user']."'";
		$myResult=mysql_query($myQuery);
		
		return $myResult;
	}

}
?>