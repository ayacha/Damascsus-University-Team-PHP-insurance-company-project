<?php
require_once('../../nusoap-php5-0.9/lib/nusoap.php');

	try
	{
		  $sClient = new nusoap_client('http://localhost:12577/WebService1.asmx?WSDL','wsdl','','','','');
		  $sh_param1 = array('type' => $_GET['v'], 'name'=> 'p1');
		  $response1= $sClient->call('addSemanticQuerySubject',$sh_param1,'','', false, true);
	} catch(SoapFault $e){
		var_dump($e);
	}									
?>