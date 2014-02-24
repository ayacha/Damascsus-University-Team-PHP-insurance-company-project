<?php

class Treatment
{
    public function __construct() 
    {
    }

	public function addTreatment() 
	{
		if(isset($_POST['addTreatment'])) 
		{
			if ((!empty($_POST['Sickness'])) && (!empty($_POST['Medicines'])) && (!empty($_POST['Payment'])) )
			{
				if($this->NotReachMaxTreatments() && $this->NotReachMaxValue())
				{
					$result = mysql_query("INSERT INTO treatment (DoctorID, CustomerID, Date, Type, NeedOperation, Sickness, Payment, Medicines) VALUES ('".$_GET['did']."','".$_GET['cid']."','2012-1-1','".$_POST['Type']."','".$_POST['Trans']."','".$_POST['Sickness']."','".$_POST['Payment']."','".$_POST['Medicines']."')");
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
	
	private function NotReachMaxTreatments() 
	{
		$query = mysql_query("select count(*) as count from treatment where customerID =" .$_GET['cid']. " and type = 1 and year(Date) =  year( sysdate() )");
		$res = mysql_fetch_assoc($query);
		$count= $res['count'];
		if($count<15)
			return true;
		else
			return false;		
	}

	private function NotReachMaxValue() 
	{
		$query = mysql_query("select sum(payment) as sum from treatment where customerID =" .$_GET['cid']. " and type = 1 and year(Date) =  year( sysdate() )");
		$res = mysql_fetch_assoc($query);
		$sum= $res['sum'];
		if($sum<12000)
			return true;
		else
			return false;		
	}

}
?>