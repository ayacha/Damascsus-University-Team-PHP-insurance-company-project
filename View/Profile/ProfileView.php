<?php

class ProfileView
{
	public function __construct() 
    {
    }
	
	static public function showWelcoming()
	{
		echo '<h3>';
		if($_SESSION['role'] =="Administrator")
		{
			echo'أهلاً بك حضرة المدير';
		}
		else
		if($_SESSION['role'] =="Doctor")
		{
			echo'أهلاً بك حضرة الطبيب';
		}
		else
		if($_SESSION['role'] =="Pharmacy")
		{
			echo'أهلاً بك حضرة الصيدلي';
		}
		else
		if($_SESSION['role'] =="Hospital")
		{
			echo'أهلاً بك';
		}
		echo '</h3>';
	}

	static public function showRolesAction()
	{
		if($_SESSION['role'] =="Doctor")
		{
			echo'<a href="Examination.php">معاينة جديدة</a>';
		}
		else
		if($_SESSION['role'] =="Pharmacy")
		{
			echo'<a href="Medication.php">خدمة جديدة</a>';
		}
		else
		if($_SESSION['role'] =="Hospital")
		{
			echo'<a href="Operation.php">خدمة جديدة</a>';
		}
	}
}
?>