<?php

class Operation
{
    public function __construct() 
    {
    }

	public function addOperation() 
	{
		if(isset($_POST['addOperation'])) 
		{
			if ((!empty($_POST['Status'])) && (!empty($_POST['Payment'])) )
			{
				if($this->NotReachMaxOperations() && $this->NotReachMaxValue())
				{
					$result = mysql_query("INSERT INTO operation (HospitalID, CustomerID, Date, Payment, Status) VALUES ('".$_GET['did']."','".$_GET['cid']."','2012-1-1','".$_POST['Payment']."','".$_POST['Status']."')");
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
	
	private function NotReachMaxOperations() 
	{
		$query = mysql_query("select count(*) as count from operation where customerID =" .$_GET['cid']. " and year(Date) =  year( sysdate() )");
		$res = mysql_fetch_assoc($query);
		$count= $res['count'];
		if($count<15)
			return true;
		else
			return false;		
	}

	private function NotReachMaxValue() 
	{
		$query = mysql_query("select sum(payment) as sum from operation where customerID =" .$_GET['cid']. " and year(Date) =  year( sysdate() )");
		$res = mysql_fetch_assoc($query);
		$sum= $res['sum'];
		if($sum<12000)
			return true;
		else
			return false;		
	}

}
?>