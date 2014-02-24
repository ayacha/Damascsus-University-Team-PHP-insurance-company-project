<?php

	class Customer
	{
		
		public function __construct() 
		{
		}
		
		public function addCustomer() 
		{
            if(isset($_POST['addCustomer'])) 
			{
                if ((!empty($_POST['NationalNumber'])) && (!empty($_POST['FirstName'])) && (!empty($_POST['LastName'])) && (!empty($_POST['EnglishName'])) && (!empty($_POST['PhoneNumber'])) && (!empty($_POST['Salary'])) && (!empty($_POST['gender'])) && (!empty($_POST['day'])) && (!empty($_POST['month'])) && (!empty($_POST['year'])))
				{
					$date=$_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
					$idate=date('y-m-d',strtotime($date));
					
					$result = mysql_query("INSERT INTO customer (NationalNumber, FirstName, LastName,EnglishName, PhoneNumber, email, Gender, BirthDate, Salary) VALUES ('".$_POST['NationalNumber']."','".$_POST['FirstName']."','".$_POST['LastName']."','".$_POST['EnglishName']."','".$_POST['PhoneNumber']."','".$_POST['email']."','".$_POST['gender']."','".$idate."','".$_POST['Salary']."')");
					if ($_POST['CompanyID']!=0)
					{
						$result1 = mysql_query("update customer set CompanyID='".$_POST['CompanyID']."' where NationalNumber='".$_POST['NationalNumber']."'");
						//echo "hahahahahahah";
					}
					if($result == false) 
					{
					   echo "بعض الحقول الضرورية غير ممتلئة";
					}
				}
				else
					echo "بعض الحقول الضرورية غير ممتلئة";
            }
		}
		
		public function editCustomer($ID) 
		{
            if(isset($_POST['editCustomer'])) 
			{
                if ((!empty($_POST['NationalNumber'])) && (!empty($_POST['FirstName'])) && (!empty($_POST['LastName'])) && (!empty($_POST['EnglishName'])) && (!empty($_POST['PhoneNumber'])) && (!empty($_POST['Salary']))  && (!empty($_POST['gender'])) && (!empty($_POST['day'])) && (!empty($_POST['month'])) && (!empty($_POST['year'])))
				{
					$date=$_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
					$idate=date('y-m-d',strtotime($date));
					
					$result = mysql_query("update customer set NationalNumber='".$_POST['NationalNumber']."', FirstName='".$_POST['FirstName']."', LastName='".$_POST['LastName']."',EnglishName='".$_POST['EnglishName']."' , PhoneNumber='".$_POST['PhoneNumber']."', email='".$_POST['email']."', Gender='".$_POST['gender']."', BirthDate='".$idate."', Salary='".$_POST['Salary']."' where CustomerID='".$ID."'");
				
				if ($_POST['CompanyID']!=0)
					{
						$result1 = mysql_query("update customer set CompanyID='".$_POST['CompanyID']."' where NationalNumber='".$_POST['NationalNumber']."'");
						//echo "hahahahahahah";
					}
				
                if($result !== false) 
				{
                   header("Location: http://localhost/HW/View/Customers/ViewCustomer.php?ID=".$ID."");
                }
				}
				else
					echo "بعض الحقول الضرورية غير ممتلئة";
            }
		}
		
		public function deleteCustomer() 
		{
            if(isset($_POST['DCustomer']) && (!empty($_POST['DCustomer']))) 
			{
                $delete_id = mysql_real_escape_string($_POST['DCustomer']);

                $result = mysql_query("DELETE FROM customer WHERE CustomerID='".$_POST['DCustomer']."'");
                if($result !== false) {
                    header("Location: http://localhost/HW/View/Customers/AllCustomers.php");
                }
            }
		}
		
		public function getIDByNationalNb() 
		{
			$myQuery="select CustomerID from Customer c where c.NationalNumber='".$_POST['NationalNum']."'";
			$myResult=mysql_query($myQuery);
			$row = mysql_fetch_assoc($myResult);
			
			return $row['CustomerID'];		
		}

		public function getNameByNationalNb() 
		{
			$myQuery="select FirstName, LastName from Customer c where c.NationalNumber='".$_POST['NationalNum']."'";
			$myResult=mysql_query($myQuery);
			$row = mysql_fetch_assoc($myResult);
			
			return $row['FirstName']." ".$row['LastName'];		
		}
		
		public function getInfoByNationalNb() 
		{
			$myQuery="select FirstName, LastName, NationalNumber, PhoneNumber, email, birthdate from customer c where c.NationalNumber='".$_POST['NationalNum']."'";
			$myResult=mysql_query($myQuery);
			
			return $myResult;		
		}
		
		/*		public function addSemanticQuery() 
		{
			if(isset($_POST['addSemanticQ']))
			{
				try
				{
					  $sClient = new nusoap_client('http://localhost:12577/WebService1.asmx?WSDL','wsdl','','','','');
					  $sh_param1 = array('type' => $_POST['DiseaseQ'], 'name'=> 'p1');
					  $response1= $sClient->call('addSemanticQuerySubject',$sh_param1,'','', false, true);
				} catch(SoapFault $e){
					var_dump($e);
				}									
			}
		}
	*/	
		public function showSemanticQueryResult() 
		{
			if(isset($_POST['showSemanticQResult']))
			{
				try
				{
					  $sClient = new nusoap_client('http://localhost:12577/WebService1.asmx?WSDL','wsdl','','','','');
					  $sh_param = array(); 
					  $response1= $sClient->call('get',$sh_param,'','', false, true);
					  echo $response1['getResult'];
				} catch(SoapFault $e){
					var_dump($e);
				}									
			}
		}

		public function initSem() 
		{
			if(isset($_POST['initsem']))
			{
				try
				{
					  $sClient = new nusoap_client('http://localhost:12577/WebService1.asmx?WSDL','wsdl','','','','');
					  $sh_param = array(); 
					  $response1= $sClient->call('Initt',$sh_param,'','', false, true);
				} catch(SoapFault $e){
					var_dump($e);
				}									
			}
		}
	}
?>