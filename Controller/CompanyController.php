<?php
include("../../View/Companies/CompanyView.php");

class CompanyController
{
    public function __construct() 
    {
    }
    
    public function invoke($filter) 
    {
		$AllCompanies = new CompanyView;
		if ($filter=="")
		{
			if (isset($_SESSION['role']) && ($_SESSION['role']=="Administrator"))
				$AllCompanies->showCompanies();
			else
				$AllCompanies->showCompaniesONLY();
		}
		else
		{
			if (isset($_SESSION['role']) && ($_SESSION['role']=="Administrator"))
				$AllCompanies->showCompaniesfiltered($filter);
			else
				$AllCompanies->showCompaniesfilteredONLY($filter);
		}
		
	}
}
?>