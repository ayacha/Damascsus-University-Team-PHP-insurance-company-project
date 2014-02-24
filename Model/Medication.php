<?php

class Medication
{
    public function __construct() 
    {
    }

	public function addMedication() 
	{
		if(isset($_POST['addMedication'])) 
		{
			if ((!empty($_POST['Medicine'])) && (!empty($_POST['Payment'])) )
			{
				if($this->NotReachMaxMedications() && $this->NotReachMaxValue())
				{
					$result = mysql_query("INSERT INTO medication (PharmacyID, CustomerID, Date, Payment, Medicine) VALUES ('".$_GET['did']."','".$_GET['cid']."','2012-1-1','".$_POST['Payment']."','".$_POST['Medicine']."')");
					if($result == false) 
					{
					   echo "بعض الحقول الضرورية غير ممتلئة";
					}
				}
			}
			else
				echo "بعض الحقول الضرورية غير ممتلئة";
		}
	}
	
	private function NotReachMaxMedications() 
	{
		$query = mysql_query("select count(*) as count from medication where customerID =" .$_GET['cid']. " and year(Date) =  year( sysdate() )");
		$res = mysql_fetch_assoc($query);
		$count= $res['count'];
		if($count<15)
			return true;
		else
			return false;		
	}

	private function NotReachMaxValue() 
	{
		$query = mysql_query("select sum(payment) as sum from medication where customerID =" .$_GET['cid']. " and year(Date) =  year( sysdate() )");
		$res = mysql_fetch_assoc($query);
		$sum= $res['sum'];
		if($sum<12000)
			return true;
		else
			return false;		
	}

}
?>