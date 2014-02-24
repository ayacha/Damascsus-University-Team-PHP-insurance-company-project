<?php
include("../Model/Pharmacy.php");
include("../View/Pharmacies/MedicationView.php");

class MedicationController
{
    public function __construct() 
    {
    }
    
    public function invoke() 
    {
		if (isset($_POST['CheckCustomer']))
		{
			$user = new User;
			$pharmacyID = $user->getID();
			$customer = new Customer;
			$customerID = $customer->getIDByNationalNb();
			$customerName = $customer->getNameByNationalNb();
			
			$pharmacy = new Pharmacy;
			$myResult = $pharmacy->getOldServicesByCustomerNationalNb();
			$myResult1 = $pharmacy->getOldServicesByCustomerNationalNb();

			$medView = new MedicationView;

			if($row = mysql_fetch_assoc($myResult))
			{
				$medView->showServices($myResult1, $pharmacyID, $customerID, $customerName);
			}
			else
			{
				$myResult = $customer->getInfoByNationalNb();
				
				if($row = mysql_fetch_assoc($myResult))
				{
					$medView->showCustomerInfo($row, $pharmacyID, $customerID, $customerName);
				}
				else
				{
					$medView->showUnavailable();
				}
			}
		}
		
	}
}
?>