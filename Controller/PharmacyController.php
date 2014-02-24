<?php
include("../../View/Pharmacies/PharmacyView.php");

class PharmacyController
{
    public function __construct() 
    {
    }
    
    public function invoke($filter) 
    {
		$AllPharmacies = new PharmacyView;
		if ($filter=="")
		{
			if (isset($_SESSION['role']) && ($_SESSION['role']=="Administrator"))
				$AllPharmacies->showPharmacies();
			else
				$AllPharmacies->showPharmaciesONLY();
		}
		else
		{
			if (isset($_SESSION['role']) && ($_SESSION['role']=="Administrator"))
				$AllPharmacies->showPharmaciesfiltered($filter);
			else
				$AllPharmacies->showPharmaciesfilteredONLY($filter);
		}
		
	}
}
?>