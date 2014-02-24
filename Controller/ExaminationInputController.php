<?php
include("../Model/Doctor.php");
include("../View/Doctors/ExaminationView.php");

class ExaminationInputController
{
    public function __construct() 
    {
    }
    
    public function invoke() 
    {
		if (isset($_POST['CheckCustomer']))
		{
			$user = new User;
			$doctorID = $user->getID();
			$customer = new Customer;
			$customerID = $customer->getIDByNationalNb();
			$customerName = $customer->getNameByNationalNb();
			
			$doctor = new Doctor;
			$myResult = $doctor->getTreatmentsByCustomerNationalNb();
			$myResult1 = $doctor->getTreatmentsByCustomerNationalNb();

			$exaView = new ExaminationView;

			if($row = mysql_fetch_assoc($myResult))
			{
				$exaView->showTreatments($myResult1, $doctorID, $customerID, $customerName);
			}
			else
			{
				$myResult = $customer->getInfoByNationalNb();
				
				if($row = mysql_fetch_assoc($myResult))
				{
					$exaView->showCustomerInfo($row, $doctorID, $customerID, $customerName);
				}
				else
				{
					$exaView->showUnavailable();
				}
			}
		}
		
	}
}
?>