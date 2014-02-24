<?php
include("../../View/Doctors/DoctorView.php");

class DoctorController
{
    public function __construct() 
    {
    }
    
    public function invoke($filter) 
    {
		$AllDoctors = new DoctorView;
		if ($filter=="")
		{
			if (isset($_SESSION['role']) && ($_SESSION['role']=="Administrator"))
				$AllDoctors->showDoctors();
			else
				$AllDoctors->showDoctorsONLY();
		}
		else
		{
			if (isset($_SESSION['role']) && ($_SESSION['role']=="Administrator"))
				$AllDoctors->showDoctorsfiltered($filter);
			else
				$AllDoctors->showDoctorsfilteredONLY($filter);
		}
		
	}
}
?>