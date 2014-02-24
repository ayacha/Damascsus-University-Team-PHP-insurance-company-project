<?php

class Pharmacy
{
    public function __construct() 
    {
    }
	
			public function addPharmacy() 
		{
            if(isset($_POST['addPharmacy'])) 
			{
                if ((!empty($_POST['UserName'])) &&(!empty($_POST['Name'])) && (!empty($_POST['PhoneNumber'])) && (!empty($_POST['Address'])))
				{
					$newUser=mysql_query("INSERT INTO user (UserName, Password) VALUES ('".$_POST['UserName']."','".$_POST['UserName']."_4')");
					
					$myResult=mysql_query("select ID from user where UserName='".$_POST['UserName']."'");
					$row=mysql_fetch_assoc($myResult);
					
					$role=mysql_query("select RoleID from role where RoleName='Pharmacy'");
					$rolerow=mysql_fetch_assoc($role);
					
					$userrole=mysql_query("INSERT INTO user_role (UserID, RoleID) VALUES ('".$row['ID']."','".$rolerow['RoleID']."')");
					
					$result = mysql_query("INSERT INTO pharmacy (ID,Name, PhoneNumber, Address) VALUES ('".$row['ID']."','".$_POST['Name']."','".$_POST['PhoneNumber']."','".$_POST['Address']."')");
					
					if($result == false) 
					{
					   echo "بعض الحقول الضرورية غير ممتلئة";
					}
				}
				else
					echo "بعض الحقول الضرورية غير ممتلئة";
            }
		}
		
		public function editPharmacy($ID) 
		{
            if(isset($_POST['editPharmacy'])) 
			{
                if ((!empty($_POST['UserName'])) &&(!empty($_POST['Name'])) && (!empty($_POST['PhoneNumber'])) && (!empty($_POST['Address'])))
				{
					$result = mysql_query("update user set UserName='".$_POST['UserName']."' where ID='".$ID."'");
					
					$result1 = mysql_query("update pharmacy set Name='".$_POST['Name']."', PhoneNumber='".$_POST['PhoneNumber']."', Address='".$_POST['Address']."' where ID='".$ID."'");
				
				
                if(($result !== false) && ($result1 !== false)) 
				{
                   header("Location: http://localhost/HW/View/Pharmacies/ViewPharmacy.php?ID=".$ID."");
                }
				}
				else
					echo "بعض الحقول الضرورية غير ممتلئة";
            }
		}
		
		public function deletePharmacy() 
		{
            if(isset($_POST['DPharmacy']) && (!empty($_POST['DPharmacy']))) {
                $delete_id = mysql_real_escape_string($_POST['DPharmacy']);

                $result = mysql_query("DELETE FROM user WHERE ID='".$_POST['DPharmacy']."'");
                if($result !== false) {
                    header("Location: http://localhost/HW/View/Pharmacies/AllPharmacies.php");
                }
            }
		}

	

	public function getOldServicesByCustomerNationalNb() 
    {
		$myQuery="select FirstName, LastName, NationalNumber, PhoneNumber, email, birthdate, Date from medication m, customer c, user u where u.ID=m.PharmacyID and c.CustomerID=m.CustomerID and c.NationalNumber='";
		$myQuery=$myQuery.$_POST['NationalNum']."' and u.UserName='".$_SESSION['user']."'";
		$myResult=mysql_query($myQuery);
		
		return $myResult;
	}

}
?>