<?php

class ExaminationView
{
    public function __construct() 
    {
    }
    
    public function showTreatments($myResult, $doctorID, $customerID, $customerName) 
    {
		$odd = true;
		echo '<div align="center">
				<h3> معاينات المريض (س) لديك </h3>
		</div>';
		echo '<table> ';
				
		while ($row = mysql_fetch_assoc($myResult)) 
		{
			//extract($row);
			echo ($odd == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
			$odd = !$odd;
			echo '<td width="150">' . $row['FirstName']." ".$row['LastName'] .'</td>';
			echo '<td width="150">' . $row['NationalNumber'] .'</td>';
			echo '<td width="150">' . $row['PhoneNumber'] .'</td>';
			echo '<td width="150">' . $row['email'] .'</td>';
			echo '<td width="150">' . $row['birthdate'] .'</td>';
			echo '<td width="150">' . $row['Date'] .'</td>';
			echo '</tr>';
		}
		echo '<tr>';
		echo '<td width="150"><div align="center">
				<a href="newExamination.php?cid=' .$customerID. '&cName=' .$customerName. '&did=' .$doctorID.'">أضف سجلاً جديداً</a>
				 </div></td>';
		echo '</tr>';
		echo '</table>';
	}

    public function showCustomerInfo($row, $doctorID, $customerID, $customerName) 
    {
		$odd = true;
		echo '<div align="center">
				<h3> بيانات المريض (س) </h3>
		</div>';
		echo '<table> ';

		echo ($odd == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
		$odd = !$odd;

		echo ($odd == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
		$odd = !$odd;
		echo '<td width="150">' . $row['FirstName']." ".$row['LastName'] .'</td>';
		echo '<td width="150">' . $row['NationalNumber'] .'</td>';
		echo '<td width="150">' . $row['PhoneNumber'] .'</td>';
		echo '<td width="150">' . $row['email'] .'</td>';
		echo '<td width="150">' . $row['birthdate'] .'</td>';
		echo '</tr>';

		echo '<tr>';
		echo '<td width="150"><div align="center">
				<a href="newExamination.php?cid=' .$customerID. '&cName=' .$customerName. '&did=' .$doctorID.'">أضف سجلاً جديداً</a>
				 </div></td>';
		echo '</tr>';
		echo '</table>';
	}

    public function showUnavailable() 
    {
		echo '<div align="center">
				<h3> المريض (س) غير مشترك في مؤسسة ساعد للتأمين </h3>
		</div>';
	}
}

?>