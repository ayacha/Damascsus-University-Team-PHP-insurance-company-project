<?php
include("../../View/Customers/CustomerView.php");

class CustomerController
{
    public function __construct() 
    {
    }
    
    public function invoke($filter) 
    {
		$AllCustomers = new CustomerView;
		if ($filter=="")
		{
			if (isset($_SESSION['role']) && ($_SESSION['role']=="Administrator"))
				$AllCustomers->showCustomers();
			else
				$AllCustomers->showCustomersONLY();
		}
		else
		{
			if (isset($_SESSION['role']) && ($_SESSION['role']=="Administrator"))
				$AllCustomers->showCustomersfiltered($filter);
			else
				$AllCustomers->showCustomersfilteredONLY($filter);
		}
		
	}
}
?>