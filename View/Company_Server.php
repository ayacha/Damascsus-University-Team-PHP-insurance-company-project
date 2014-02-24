<?php
        // Pull in the NuSOAP code
        require_once('nusoap-php5-0.9/lib/nusoap.php');
        
        ini_set ('soap.wsdl_cache_enabled', 0);
        // Create the server instance
        $server = new soap_server();
        // Initialize WSDL support
        $server->configureWSDL('GetCus', 'urn:GetCus');
//////////////////////////****************************************************************////////////////////////
//Get customer list for company        
            $server->wsdl->addComplexType(
                 'CustomerList',
                 'complexType',
                 'array',
                 '',
                 'SOAP-ENC:Array',
                  array(),
                  array(
                    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'xsd:string[]')
                  ),
                  'xsd:string'
                );

        // Register the method to expose
        $server->register('GetCompanyCustomer',                    // method name
            array('ID' => 'xsd:int'),          // input parameters
            array('return' => 'tns:CustomerList'),    // output parameters tns:Customer
            'urn:GetCus',                         // namespace
            'urn:GetCus#GetCompanyCustomer'                  // soapaction
        );



    // Define the method as a PHP function
    function GetCompanyCustomer($companyID)
    {
        $con = mysql_connect("localhost","root","");
        mysql_query("set names utf8");
        mysql_query("set characer set cp1256");
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }
        mysql_select_db("insurance", $con);
        $result = mysql_query("SELECT * FROM customer WHERE CompanyID=".$companyID);//.$name['FirstName']
        $numrows = mysql_num_rows($result);
        
        $CustomerList = array();
        for ($x = 0; $x < $numrows; $x++) {
           $row=mysql_fetch_array($result, MYSQL_BOTH);
            $CustomerList[] = $row['CustomerID'].","
            .$row['NationalNumber'].","
            .$row['FirstName'].","
            .$row['LastName'].","
            .$row['PhoneNumber'].","
            .$row['email'].","
            .$row['Gender'].","
            .$row['BirthDate'].","
            .$row['Salary'].","
            .$row['HealthStatus'].","
            .$row['CompanyID'].",";

        }
        return $CustomerList;
    }
    
    
    //////////////////////////****************************************************************////////////////////////
//Get treatment for employee
        $server->wsdl->addComplexType(
                 'TreatmentList',
                 'complexType',
                 'array',
                 '',
                 'SOAP-ENC:Array',
                  array(),
                  array(
                    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'xsd:string[]')
                  ),
                  'xsd:string'
                );

        // Register the method to expose
        $server->register('GetTreatment',                    // method name
            array('CusID' => 'xsd:int'),          // input parameters
            array('return' => 'tns:TreatmentList'),    // output parameters tns:Customer
            'urn:GetCus',                         // namespace
            'urn:GetCus#GetTreatment'                  // soapaction
        );



    // Define the method as a PHP function
    function GetTreatment($CusID)
    {
        $con = mysql_connect("localhost","root","");
        mysql_query("set names utf8");
        mysql_query("set characer set cp1256");
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }
        mysql_select_db("insurance", $con);
        $result = mysql_query("SELECT
        doctor.FirstName,
        doctor.LastName, 
        treatment.Date,
        treatment.Type, 
        treatment.NeedOperation, 
        treatment.Sickness, 
        treatment.Medicines
        FROM 
        treatment
        INNER JOIN doctor
        INNER JOIN customer
        INNER JOIN company 
        ON 
        treatment.DoctorID = doctor.ID
        AND 
        treatment.CustomerID = customer.CustomerID
        AND 
        company.ID = customer.CompanyID
        WHERE
        customer.CustomerID=".$CusID);
        $numrows = mysql_num_rows($result);
        
        $TreatmentList = array();
        for ($x = 0; $x < $numrows; $x++) {
           $row=mysql_fetch_array($result, MYSQL_BOTH);
            $TreatmentList[] = $row['FirstName'].","//doctor first name
            .$row['LastName'].","//doctor last name
            .$row['Date'].","
            .$row['Type'].","
            .$row['NeedOperation'].","
            .$row['Sickness'].","
            .$row['Medicines'].",";
        }
        return $TreatmentList;
    }
    //////////////////////////////******************************////////////////////////////////
    //Get Medication for employee
    
        $server->wsdl->addComplexType(
                 'MedicationList',
                 'complexType',
                 'array',
                 '',
                 'SOAP-ENC:Array',
                 array(),
                 array(
                 array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'xsd:string[]')
                  ),
                  'xsd:string'
                );

        // Register the method to expose
        $server->register('GetMedication',                    // method name
            array('CusID' => 'xsd:int'),          // input parameters
            array('return' => 'tns:MedicationList'),    // output parameters tns:Customer
            'urn:GetCus',                         // namespace
            'urn:GetCus#GetMedication'                  // soapaction
        );



    // Define the method as a PHP function
    function GetMedication($CusID)
    {
        $con = mysql_connect("localhost","root","");
        mysql_query("set names utf8");
        mysql_query("set characer set cp1256");
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }
        mysql_select_db("insurance", $con);
        $result = mysql_query("SELECT 
        pharmacy.Name,
        medication.Date,
        medication.Medicine,
        medication.Payment
        FROM
        pharmacy INNER JOIN
        medication INNER JOIN
        customer INNER JOIN
        company
        ON 
        medication.PharmacyID = pharmacy.ID 
        AND
        medication.CustomerID=customer.CustomerID
        AND
        company.ID=customer.CompanyID
        WHERE
        customer.CustomerID=".$CusID);
        
        $numrows = mysql_num_rows($result);
        
        $MedicationList = array();
        for ($x = 0; $x < $numrows; $x++) 
        {
           $row=mysql_fetch_array($result, MYSQL_BOTH);
            $MedicationList[] = $row['Name'].","//Pharmacy name
            .$row['Date'].","//Medication Date
            .$row['Medicine'].","
            .$row['Payment'].",";
        }
        return $MedicationList;
    }
    
    //////////////////////////////******************************////////////////////////////////
    //Get operation for employee
    
    $server->wsdl->addComplexType(
                 'OperationList',
                 'complexType',
                 'array',
                 '',
                 'SOAP-ENC:Array',
                 array(),
                 array(
                 array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'xsd:string[]')
                  ),
                  'xsd:string'
                );

        // Register the method to expose
        $server->register('GetOperation',                    // method name
            array('CusID' => 'xsd:int'),          // input parameters
            array('return' => 'tns:OperationList'),    // output parameters tns:Customer
            'urn:GetCus',                         // namespace
            'urn:GetCus#GetOperation'                  // soapaction
        );



    // Define the method as a PHP function
    function GetOperation($CusID)
    {
        $con = mysql_connect("localhost","root","");
        mysql_query("set names utf8");
        mysql_query("set characer set cp1256");
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }
        mysql_select_db("insurance", $con);
        $result = mysql_query("SELECT 
        hospital.Name,
        operation.Date,
        operation.Name,
        operation.Payment
        FROM
        hospital INNER JOIN
        operation INNER JOIN
        customer INNER JOIN
        company
        ON 
        operation.HospitalID = hospital.ID 
        AND
        operation.CustomerID = customer.CustomerID 
        AND
        company.ID=customer.CompanyID
        WHERE
        customer.CustomerID=".$CusID);
        
        $numrows = mysql_num_rows($result);
        
        $OperationList = array();
        for ($x = 0; $x < $numrows; $x++) 
        {
           $row=mysql_fetch_array($result, MYSQL_BOTH);
            $OperationList[] = $row['Name'].","//hospital name
            .$row['Date'].","//Operation Date
            .$row['Name'].","
            .$row['Payment'].",";
        }
        return $OperationList;
    }
// Use the request to (try to) invoke the service
    $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
    $server->service($HTTP_RAW_POST_DATA);
    exit();

?>