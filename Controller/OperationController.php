<?php
include("../Model/Hospital.php");
include("../View/Hospitals/OperationView.php");

class OperationController
{
    public function __construct() 
    {
    }
    
    public function invoke() 
    {
		if (isset($_POST['CheckCustomer']))
		{
			$user = new User;
			$hospitalID = $user->getID();
			$customer = new Customer;
			$customerID = $customer->getIDByNationalNb();
			$customerName = $customer->getNameByNationalNb();
			
			$hospital = new Hospital;
			$myResult = $hospital->getOldServicesByCustomerNationalNb();
			$myResult1 = $hospital->getOldServicesByCustomerNationalNb();

			$oprView = new OperationView;

			if($row = mysql_fetch_assoc($myResult))
			{
				$oprView->showServices($myResult1, $hospitalID, $customerID, $customerName);
			}
			else
			{
				$myResult = $customer->getInfoByNationalNb();
				
				if($row = mysql_fetch_assoc($myResult))
				{
					$oprView->showCustomerInfo($row, $hospitalID, $customerID, $customerName);
				}
				else
				{
					$oprView->showUnavailable();
				}
			}
		}
		
	}
}
?>