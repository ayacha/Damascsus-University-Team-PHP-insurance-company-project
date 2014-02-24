<?php
function GetTreatmentArray($TreatmentArray)
{
    $TreatmentNumber=count($TreatmentArray);
    $NewTreatmentArray=array();
    
    
    for($i=0 ; $i<$TreatmentNumber;$i++)
    {
        $tempArray=array();
        $tempStr="";
        $tempStr1=$TreatmentArray[$i];
        $strCounter=0;
           for($j=0 ; $j<strlen($tempStr1);$j++)
           {
                if($tempStr1[$j]!=',')
                {
                    $tempStr=$tempStr.$tempStr1[$j];
                }
                else
                {
                    $tempArray[]=$tempStr;
                    $tempStr="";
                  
                }
                
           }
           $NewTreatmentArray[]=array(
                'FirstName' =>$tempArray[0],
                'LastName' => $tempArray[1],
                'Date' =>$tempArray[2],
                'Type' => $tempArray[3],
                'NeedOperation' =>$tempArray[4],
                'Sickness' => $tempArray[5],
                'Medicines' => $tempArray[6]
                );
    }
    return $NewTreatmentArray;
}

function GetMedicationArray($MedicationArray)
{
    $MedicationNumber=count($MedicationArray);
    $NewMedicationArray=array();
    
    
    for($i=0 ; $i<$MedicationNumber;$i++)
    {
        $tempArray=array();
        $tempStr="";
        $tempStr1=$MedicationArray[$i];
        $strCounter=0;
           for($j=0 ; $j<strlen($tempStr1);$j++)
           {
                if($tempStr1[$j]!=',')
                {
                    $tempStr=$tempStr.$tempStr1[$j];
                }
                else
                {
                    $tempArray[]=$tempStr;
                    $tempStr="";
                  
                }
                
           }
           $NewMedicationArray[]=array(
                'Name' =>$tempArray[0],
                'Date' => $tempArray[1],
                'Medicine' =>$tempArray[2],
                'Payment' => $tempArray[3]
                );
    }
    return $NewMedicationArray;
}

function GetOperationArray($OperationArray)
{
    $OperationNumber=count($OperationArray);
    $NewOperationArray=array();
    
    
    for($i=0 ; $i<$OperationNumber;$i++)
    {
        $tempArray=array();
        $tempStr="";
        $tempStr1=$OperationArray[$i];
        $strCounter=0;
           for($j=0 ; $j<strlen($tempStr1);$j++)
           {
                if($tempStr1[$j]!=',')
                {
                    $tempStr=$tempStr.$tempStr1[$j];
                }
                else
                {
                    $tempArray[]=$tempStr;
                    $tempStr="";
                  
                }
                
           }
           $NewOperationArray[]=array(
                'Name' =>$tempArray[0],
                'Date' => $tempArray[1],
                'Name' =>$tempArray[2],
                'Payment' =>$tempArray[3]
                );
    }
    return $NewOperationArray;
}

function GetCustomerArray($CustomerArray)
{
    $CustomerNumber=count($CustomerArray);
    $NewCustomerArray=array();
    
    
    for($i=0 ; $i<$CustomerNumber;$i++)
    {
        $tempArray=array();
        $tempStr="";
        $tempStr1=$CustomerArray[$i];
        $strCounter=0;
           for($j=0 ; $j<strlen($tempStr1);$j++)
           {
                if($tempStr1[$j]!=',')
                {
                    $tempStr=$tempStr.$tempStr1[$j];
                }
                else
                {
                    $tempArray[]=$tempStr;
                    $tempStr="";
                  
                }
                
           }
           $NewCustomerArray[]=array(
                'CustomerID' =>$tempArray[0],
                'NationalNumber' => $tempArray[1],
                'FirstName' =>$tempArray[2],
                'LastName' => $tempArray[3],
                'PhoneNumber' =>$tempArray[4],
                'email' => $tempArray[5],
                'Gender' => $tempArray[6],
                'BirthDate' => $tempArray[7],
                'Salary' => $tempArray[8],
                'HealthStatus' => $tempArray[9],
                'CompanyID' => $tempArray[10]
                );
    }
    return $NewCustomerArray;
}
//////////////////////**************************************
require_once('nusoap-php5-0.9/lib/nusoap.php');
ini_set ('soap.wsdl_cache_enabled', 0);
try{
  $sClient = new nusoap_client('http://localhost/HW/View/Company_Server.php?wsdl','wsdl','','','','');
  //$CusID=00000000025;
  $ID=$_REQUEST['ID'];
  $EmployeeList= $sClient->call('GetCompanyCustomer',array('ID' => $ID),'','', false, true);
  //$TreatmentList = $sClient->call('GetTreatment',array('CusID' => $CusID),'','', false, true);
  //$MedicationList = $sClient->call('GetMedication',array('CusID' => $CusID),'','', false, true);
  //$OperationList = $sClient->call('GetOperation',array('CusID' => $CusID),'','', false, true);
  $response=GetCustomerArray($EmployeeList);
  echo '<div align="right">';
  echo '<h3>';
    for($i=0;$i<count($response);$i++ )
    {
        echo  $response[$i]['FirstName']."  ".$response[$i]['LastName']."<br>";
		
		echo "المعالجات---------";
		$TreatmentList = $sClient->call('GetTreatment',array('CusID' => $response[$i]['CustomerID']),'','', false, true);
		$t=GetTreatmentArray($TreatmentList);
		echo "<br>";
		for($i1=0;$i1<count($t);$i1++ )
		{
			echo  "الطبيب ".$t[$i1]['FirstName']."  ".$t[$i1]['LastName']." بتاريخ ".$t[$i1]['Date']." <<<<<<<br>";
		}
		
		echo "<br>";
		
		echo "المداواة---------";
		$MedicationList = $sClient->call('GetMedication',array('CusID' => $response[$i]['CustomerID']),'','', false, true);
		$p=GetMedicationArray($MedicationList);
		echo "<br>";
		for($i2=0;$i2<count($p);$i2++ )
		{
			echo  "الصيدلية ".$p[$i2]['Name']." بتاريخ ".$p[$i2]['Date']." <<<<<<<br>";
		}
		
		echo "<br>";
		
		echo "العمليات---------";
		$OperationList = $sClient->call('GetOperation',array('CusID' => $response[$i]['CustomerID']),'','', false, true);
		$o=GetOperationArray($OperationList);
		echo "<br>";
		for($i3=0;$i3<count($p);$i3++ )
		{
			echo  "المشفى ".$o[$i3]['Name']." بتاريخ ".$o[$i3]['Date']." <<<<<<<br>";
		}
		
		echo "<br>-----------------------------------------------------------------------------------------------------<br>";
    }
	echo '</h3>';
	echo '</div>';
//print_r($response);
} catch(SoapFault $e){
  var_dump($e);
}
?>
