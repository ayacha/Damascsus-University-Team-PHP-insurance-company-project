<?php

class Doctor
{
    public function __construct() 
    {
    }
	
	public function addDoctor() 
		{
            if(isset($_POST['addDoctor'])) 
			{
                if ((!empty($_POST['UserName'])) &&(!empty($_POST['FirstName'])) && (!empty($_POST['LastName'])) && (!empty($_POST['PhoneNumber'])) && (!empty($_POST['Speciality']))&& (!empty($_POST['Fees']))&& (!empty($_POST['ClinicAddress'])))
				{
					$newUser=mysql_query("INSERT INTO user (UserName, Password) VALUES ('".$_POST['UserName']."','".$_POST['UserName']."_4')");
					
					$myResult=mysql_query("select ID from user where UserName='".$_POST['UserName']."'");
					$row=mysql_fetch_assoc($myResult);
					
					$role=mysql_query("select RoleID from role where RoleName='Doctor'");
					$rolerow=mysql_fetch_assoc($role);
					
					$userrole=mysql_query("INSERT INTO user_role (UserID, RoleID) VALUES ('".$row['ID']."','".$rolerow['RoleID']."')");
					
					$result = mysql_query("INSERT INTO doctor (ID,FirstName, LastName, PhoneNumber, Speciality, Fees, ClinicAddress) VALUES ('".$row['ID']."','".$_POST['FirstName']."','".$_POST['LastName']."','".$_POST['PhoneNumber']."','".$_POST['Speciality']."','".$_POST['Fees']."','".$_POST['ClinicAddress']."')");
					
					if($result == false) 
					{
					   echo "بعض الحقول الضرورية غير ممتلئة";
					}
				}
				else
					echo "بعض الحقول الضرورية غير ممتلئة";
            }
		}
		
		public function editDoctor($ID) 
		{
            if(isset($_POST['editDoctor'])) 
			{
                if ((!empty($_POST['UserName'])) &&(!empty($_POST['FirstName'])) && (!empty($_POST['LastName'])) && (!empty($_POST['PhoneNumber'])) && (!empty($_POST['Speciality']))&& (!empty($_POST['Fees']))&& (!empty($_POST['ClinicAddress'])))
				{
					$result = mysql_query("update user set UserName='".$_POST['UserName']."' where ID='".$ID."'");
					
					$result1 = mysql_query("update doctor set FirstName='".$_POST['FirstName']."', LastName='".$_POST['LastName']."', PhoneNumber='".$_POST['PhoneNumber']."', Speciality='".$_POST['Speciality']."', Fees='".$_POST['Fees']."',ClinicAddress='".$_POST['ClinicAddress']."' where ID='".$ID."'");
				
				
                if(($result !== false) && ($result1 !== false)) 
				{
                   header("Location: http://localhost/HW/View/Doctors/ViewDoctor.php?ID=".$ID."");
                }
				}
				else
					echo "بعض الحقول الضرورية غير ممتلئة";
            }
		}
		
		public function deleteDoctor() 
		{
            if(isset($_POST['DDoctor']) && (!empty($_POST['DDoctor']))) {
                $delete_id = mysql_real_escape_string($_POST['DDoctor']);

                $result = mysql_query("DELETE FROM user WHERE ID='".$_POST['DDoctor']."'");
                if($result !== false) {
                    header("Location: http://localhost/HW/View/Doctors/AllDoctors.php");
                }
            }
		}
	
	
	public function getTreatmentsByCustomerNationalNb() 
    {
		$myQuery="select FirstName, LastName, NationalNumber, PhoneNumber, email, birthdate, Date from treatment t, customer c, user u where u.ID=t.DoctorID and c.CustomerID=t.CustomerID and c.NationalNumber='";
		$myQuery=$myQuery.$_POST['NationalNum']."' and u.UserName='".$_SESSION['user']."'";
		$myResult=mysql_query($myQuery);
		
		return $myResult;
	}

}
?>