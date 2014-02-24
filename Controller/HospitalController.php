<?php
include("../../View/Hospitals/HospitalView.php");

class HospitalController
{
    public function __construct() 
    {
    }
    
    public function invoke($filter) 
    {
		$AllHospitals = new HospitalView;
		if ($filter=="")
		{
			if (isset($_SESSION['role']) && ($_SESSION['role']=="Administrator"))
				$AllHospitals->showHospitals();
			else
				$AllHospitals->showHospitalsONLY();
		}
		else
		{
			if (isset($_SESSION['role']) && ($_SESSION['role']=="Administrator"))
				$AllHospitals->showHospitalsfiltered($filter);
			else
				$AllHospitals->showHospitalsfilteredONLY($filter);
		}
		
	}
}
?>