<?php
class CustomerView
{
    public function __construct() 
    {
    }
    
    public function showCustomers() 
    {

										if (isset($_GET['pageno'])) 
											{
											   $pageno = $_GET['pageno'];
											} else {
											   $pageno = 1;
											}
											
											$result = mysql_query("SELECT count(*) FROM customer");
											$query_data = mysql_fetch_row($result);
											$numrows = $query_data[0];
											
											$rows_per_page = 5;
											$lastpage      = ceil($numrows/$rows_per_page);
											
											$pageno = (int)$pageno;
											if ($pageno > $lastpage) {
											   $pageno = $lastpage;
											} // if
											if ($pageno < 1) {
											   $pageno = 1;
											}
											
											$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;
											
											$rs = mysql_query("SELECT FirstName,LastName ,CustomerID FROM customer $limit");
											
											
											
											$odd = true;
											$deletedCustomer = new Customer;
											
										
											echo '<table >';
											 
											while($row=mysql_fetch_assoc($rs))
											{
												//extract($row);
												echo ($odd == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
												$odd = !$odd;
												//$_SESSION['CustomerID']=$row['CustomerID'];
												echo '<td width="150"> <a href="ViewCustomer.php?ID='.$row['CustomerID'].'">' . $row['FirstName']." ".$row['LastName'] .'</a></td>';
                                    
                                    			echo '<td width="150"> <a href="EditCustomer.php?ID='.$row['CustomerID'].'">تعديل</a></td>';
                                    			
                                              
												//$_POST['DUser']=$UserName;
												echo '<form method="post" action=action="'. $deletedCustomer->deleteCustomer() .'">';
													echo '<input type="hidden" name="DCustomer" value="'.$row['CustomerID'].'" />';
													echo '<td  width="150"><input name="deleteUser" type="submit" value="حذف" /></td>';
												echo '</form>';
												echo '</tr>';
											}
											 echo '</table>';
										   ?>
                                  </td>
                                  </tr>
                                  
                                  <tr>
                                  	<td align="center">
                                    	<?php
											if ($numrows>0)
											{
												if ($pageno == 1) {
											   echo "الأول | السابق";
												} else {				
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=1'>الأول | </a> ";
												   $prevpage = $pageno-1;
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$prevpage'>السابق</a> ";
												}
												
												echo " ( صفحة $pageno من $lastpage ) ";
	
												if ($pageno == $lastpage) {
												   echo "التالي | الأخير";
												} else {
												   $nextpage = $pageno+1;
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$nextpage'>التالي | </a> ";
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$lastpage'>الأخير</a> ";  
												} 
											}
											else
											{
												echo "لا يوجد أي زبون حالياً...";
											} 
				
	}
	
	public function showCustomersONLY() 
    {

										if (isset($_GET['pageno'])) 
											{
											   $pageno = $_GET['pageno'];
											} else {
											   $pageno = 1;
											}
											
											$result = mysql_query("SELECT count(*) FROM customer");
											$query_data = mysql_fetch_row($result);
											$numrows = $query_data[0];
											
											$rows_per_page = 5;
											$lastpage      = ceil($numrows/$rows_per_page);
											
											$pageno = (int)$pageno;
											if ($pageno > $lastpage) {
											   $pageno = $lastpage;
											} // if
											if ($pageno < 1) {
											   $pageno = 1;
											}
											
											$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;
											
											$rs = mysql_query("SELECT FirstName,LastName ,CustomerID FROM customer $limit");
											
											
											
											$odd = true;
											$deletedCustomer = new Customer;
											
										
											echo '<table>';
											 
											while($row=mysql_fetch_assoc($rs))
											{
												//extract($row);
												echo ($odd == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
												$odd = !$odd;
												//$_SESSION['CustomerID']=$row['CustomerID'];
												echo '<td width="150"> <a href="ViewCustomer.php?ID='.$row['CustomerID'].'">' . $row['FirstName']." ".$row['LastName'] .'</a></td>';
                                    
												echo '</tr>';
											}
											 echo '</table>';
										   ?>
                                  </td>
                                  </tr>
                                  
                                  <tr>
                                  	<td align="center">
                                    	<?php
											if ($numrows>0)
											{
												if ($pageno == 1) {
											   echo "الأول | السابق";
												} else {
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=1'>الأول | </a> ";
												   $prevpage = $pageno-1;
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$prevpage'>السابق</a> ";
												}
												
												echo " ( صفحة $pageno من $lastpage ) ";
	
												if ($pageno == $lastpage) {
												   echo "التالي | الأخير";
												} else {
												   $nextpage = $pageno+1;
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$nextpage'>التالي | </a> ";
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$lastpage'>الأخير</a> ";
												} 
											}
											else
											{
												echo "لا يوجد أي زبون حالياً...";
											} 
		
	}
	
	
	public function showCustomersFiltered($filter) 
    {

										if (isset($_GET['pageno'])) 
											{
											   $pageno = $_GET['pageno'];
											} else {
											   $pageno = 1;
											}
											
											$result = mysql_query("SELECT count(*) FROM customer  where FirstName like '%".$_POST['value']."%' or LastName like '%".$_POST['value']."%'");
											$query_data = mysql_fetch_row($result);
											$numrows = $query_data[0];
											
											$rows_per_page = 5;
											$lastpage      = ceil($numrows/$rows_per_page);
											
											$pageno = (int)$pageno;
											if ($pageno > $lastpage) {
											   $pageno = $lastpage;
											} // if
											if ($pageno < 1) {
											   $pageno = 1;
											}
											
											$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;
											
											$rs = mysql_query("SELECT FirstName,LastName ,CustomerID FROM customer  where FirstName like '%".$_POST['value']."%'  or LastName like '%".$_POST['value']."%' $limit");
											
											
											
											$odd = true;
											$deletedCustomer = new Customer;
											
										
											echo '<table>';
											 
											while($row=mysql_fetch_assoc($rs))
											{
												//extract($row);
												echo ($odd == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
												$odd = !$odd;
												//$_SESSION['CustomerID']=$row['CustomerID'];
												echo '<td width="150"> <a href="ViewCustomer.php?ID='.$row['CustomerID'].'">' . $row['FirstName']." ".$row['LastName'] .'</a></td>';
                                    
                                    			echo '<td width="150"> <a href="EditCustomer.php?ID='.$row['CustomerID'].'">تعديل</a></td>';
                                    			
                                              
												//$_POST['DUser']=$UserName;
												echo '<form method="post" action=action="'. $deletedCustomer->deleteCustomer() .'">';
													echo '<input type="hidden" name="DCustomer" value="'.$row['CustomerID'].'" />';
													echo '<td  width="150"><input name="deleteUser" type="submit" value="حذف" /></td>';
												echo '</form>';
												echo '</tr>';
											}
											 echo '</table>';
										   ?>
                                  </td>
                                  </tr>
                                  
                                  <tr>
                                  	<td align="center">
                                    	<?php
											if ($numrows>0)
											{
												if ($pageno == 1) {
											   echo "الأول | السابق";
												} else {
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=1'>الأول | </a> ";
												   $prevpage = $pageno-1;
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$prevpage'>السابق</a> ";
												}
												
												echo " ( صفحة $pageno من $lastpage ) ";
	
												if ($pageno == $lastpage) {
												   echo "التالي | الأخير";
												} else {
												   $nextpage = $pageno+1;
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$nextpage'>التالي | </a> ";
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$lastpage'>الأخير</a> ";
												} 
											}
											else
											{
												echo "لا يوجد نتائج مطابقة...";
											}
		
	}
	
	public function showCustomersFilteredONLY($filter) 
    {

										if (isset($_GET['pageno'])) 
											{
											   $pageno = $_GET['pageno'];
											} else {
											   $pageno = 1;
											}
											
											$result = mysql_query("SELECT count(*) FROM customer  where FirstName like '%".$_POST['value']."%' or LastName like '%".$_POST['value']."%'");
											$query_data = mysql_fetch_row($result);
											$numrows = $query_data[0];
											
											$rows_per_page = 5;
											$lastpage      = ceil($numrows/$rows_per_page);
											
											$pageno = (int)$pageno;
											if ($pageno > $lastpage) {
											   $pageno = $lastpage;
											} // if
											if ($pageno < 1) {
											   $pageno = 1;
											}
											
											$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;
											
											$rs = mysql_query("SELECT FirstName,LastName ,CustomerID FROM customer  where FirstName like '%".$_POST['value']."%'  or LastName like '%".$_POST['value']."%' $limit");
											
											
											
											$odd = true;
											$deletedCustomer = new Customer;
											
										
											echo '<table>';
											 
											while($row=mysql_fetch_assoc($rs))
											{
												//extract($row);
												echo ($odd == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
												$odd = !$odd;
												//$_SESSION['CustomerID']=$row['CustomerID'];
												echo '<td width="150"> <a href="ViewCustomer.php?ID='.$row['CustomerID'].'">' . $row['FirstName']." ".$row['LastName'] .'</a></td>';

												echo '</tr>';
											}
											 echo '</table>';
										   ?>
                                  </td>
                                  </tr>
                                  
                                  <tr>
                                  	<td align="center">
                                    	<?php
											if ($numrows>0)
											{
												if ($pageno == 1) {
											   echo "الأول | السابق";
												} else {
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=1'>الأول | </a> ";
												   $prevpage = $pageno-1;
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$prevpage'>السابق</a> ";
												}
												
												echo " ( صفحة $pageno من $lastpage ) ";
	
												if ($pageno == $lastpage) {
												   echo "التالي | الأخير";
												} else {
												   $nextpage = $pageno+1;
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$nextpage'>التالي | </a> ";
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$lastpage'>الأخير</a> ";
												} 
											}
											else
											{
												echo "لا يوجد نتائج مطابقة...";
											}
		
	}

    public function showCustomerInfo($ID) 
    {
		$newcustomer = new Customer;
											
											$rs = mysql_query("SELECT NationalNumber,FirstName,LastName,EnglishName,PhoneNumber,email,Gender,BirthDate,Salary,CompanyID FROM customer where CustomerID='".$ID."'");
											$row = mysql_fetch_assoc($rs);
                                            //echo '<form method="post" action="'. $newcustomer->editCustomer() .'">';
											?>
											
                                            <table>
                                            	<tr>
                                                	<td>
                                                    	الرقم الوطني
                                                    </td>
                                                	<td>
                                                    	
                                                        <?php echo '<label>'.$row['NationalNumber'].'</label>';?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	 الاسم الأول
                                                    </td>
                                                	<td>
                                                    	<?php echo '<label>'.$row['FirstName'].'</label>';?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	 الاسم الثاني
                                                    </td>
                                                	<td>
                                                    	<?php echo '<label>'.$row['LastName'].'</label>';?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	 الاسم باللغة الانكليزية
                                                    </td>
                                                	<td>
                                                    	<?php echo '<label>'.$row['EnglishName'].'</label>';?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	  رقم الهاتف
                                                    </td>
                                                	<td>
                                                    	<?php echo '<label>'.$row['PhoneNumber'].'</label>';?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	  البريد الإلكتروني 
                                                    </td>
                                                	<td>
                                                    	<?php echo '<label>'.$row['email'].'</label>';?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	   الجنس 
                                                    </td>
                                                	<td>
														<?php 
														if ($row['Gender']==00001)
														{
															echo '<label>ذكر</label>';
														}
														else
														{
															echo '<label>أنثى</label>';
														}
                                                        ?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	   تاريخ الميلاد 
                                                    </td>
                                                	<td>
                                                    	<?php
															echo '<label>'.$row['BirthDate'].'</label>';
														?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	      الراتب 
                                                    </td>
                                                	<td>
                                                    	<?php echo '<label>'.$row['Salary'].'</label>';?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	    الشركة التابع لها 
                                                    </td>
                                                	<td>
														<?php
                                                    		$result1 = mysql_query("SELECT ID,Name FROM company where ID='".$row['CompanyID']."'");
															$row1=mysql_fetch_array($result1);
															if ($row1)
																echo '<label>'.$row1['Name'].'</label>';
															else
																echo '<label>لا يوجد</label>';
                                                         ?>
                                                    </td>
                                                </tr>
                                            </table>
                                            
											
                                        </td>

                                  </tr>
                                  
                                  <tr>
                                  	<td>
                                    	<table>
                                        	<tr>
                                            	<td>
													<?php 
													if (isset($_SESSION['role']) && ($_SESSION['role']=="Administrator"))
													{
													echo '<td width="150"> <a href="EditCustomer.php?ID='.$ID.'">تعديل</a></td>';?>
                                                </td>
                                                
                                                <td>
                                                    <?php
                                                        $deletedCustomer = new Customer;
                                                        echo '<form method="post" action=action="'. $deletedCustomer->deleteCustomer() .'">';
                                                        echo '<input type="hidden" name="DCustomer" value="'.$ID.'" />';
                                                        echo '<td  width="150"><input name="deleteUser" type="submit" value="حذف" /></td>';
                                                        echo '</form>';
													}
													
	}
	
	public function showCustomerTreatments($ID)
	{
											if (isset($_GET['pageno'])) 
											{
											   $pageno = $_GET['pageno'];
											} else {
											   $pageno = 1;
											}
											
											$result = mysql_query("SELECT count(*) FROM treatment where CustomerID='".$ID."'");
											$query_data = mysql_fetch_row($result);
											$numrows = $query_data[0];
											
											$rows_per_page = 5;
											$lastpage     = ceil($numrows/$rows_per_page);
											
											$pageno = (int)$pageno;
											if ($pageno > $lastpage) {
											   $pageno = $lastpage;
											} // if
											if ($pageno < 1) {
											   $pageno = 1;
											}
											
											$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;
											
											$rs = mysql_query("SELECT ID,DoctorID,Date ,Type,NeedOperation,Sickness,Medicines FROM treatment where CustomerID='".$ID."' order by Date DESC $limit");									
											
											$odd = true;
											
										
											echo '<table>';
											 
											 echo '<th width=75>الطبيب</th>';
											 echo '<th width=75>التاريخ</th>';
											 echo '<th width=35>النوع</th>';
											 echo '<th width=35>عملية</th>';
											 echo '<th width=115>المرض</th>';
											 echo '<th width=115>الدواء</th>';
											 
											while($row=mysql_fetch_assoc($rs))
											{
												//extract($row);
												echo ($odd == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
												$odd = !$odd;
												$doc = mysql_query("SELECT FirstName,LastName FROM doctor where ID='".$row['DoctorID']."'");
												$doc1=mysql_fetch_array($doc);
												//$_SESSION['CustomerID']=$row['CustomerID'];
												echo '<td width="75"> <a href="http://localhost/HW/View/Doctors/ViewDoctor.php?ID='.$row['DoctorID'].'">' .$doc1['FirstName']." ".$doc1['LastName'] .'</a></td>';
                                    
												echo '<td width="75"> '.$row['Date'] .'</td>';
												echo ($row['Type'] == 00003) ? '<td width="35">كشف</td>' :'<td width="35">زيارة</td>';
												echo ($row['NeedOperation'] == 00005) ? '<td width="35">نعم</td>' :'<td width="35">لا</td>';;
												echo '<td width="115"> '.$row['Sickness'] .'</td>';
												echo '<td width="115"> '.$row['Medicines'] .'</td>';
												
												echo '</tr>';
											}
											 echo '</table>';
										   ?>
                                  </td>
                                  </tr>
                                  
                                  <tr>
                                  	<td align="center">
                                    	<?php
											if ($numrows>0)
											{
												if ($pageno == 1) {
											   echo "الأول | السابق";
												} else {
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=1'>الأول | </a> ";
												   $prevpage = $pageno-1;
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$prevpage'>السابق</a> ";
												}
												
												echo " ( صفحة $pageno من $lastpage ) ";
	
												if ($pageno == $lastpage) {
												   echo "التالي | الأخير";
												} else {
												   $nextpage = $pageno+1;
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$nextpage'>التالي | </a> ";
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$lastpage'>الأخير</a> ";
												} 
											}
											else
											{
												echo "لا يوجد أي معالجة حتى الآن...";
											} 
	}
	public function CustomerTreatmentsPDF($ID)
	{
		if (isset($_POST['pdf1']))
		{
		require_once('../tcpdf/config/lang/eng.php');
		require_once('../tcpdf/tcpdf.php');
		
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		
		
		
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		
		//set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		
		//set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		
		//set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		
		// set some language dependent data:
		$lg = Array();
		$lg['a_meta_charset'] = 'UTF-8';
		$lg['a_meta_dir'] = 'rtl';
		$lg['a_meta_language'] = 'fa';
		$lg['w_page'] = 'page';
		
		//set some language-dependent strings
		$pdf->setLanguageArray($lg);
		
		// ---------------------------------------------------------
		
		// set font
		$pdf->SetFont('dejavusans', '', 12);
		
		// add a page
		$pdf->AddPage();
		
		
		// Restore RTL direction
		$pdf->setRTL(true);
		
		// set font
		$pdf->SetFont('aefurat', '', 18);
		
		// print newline
		$pdf->Ln();
		
		// Arabic and English content
		$pdf->Cell(0, 12, 'المعالجات',0,1,'C');

		
		
		
			$rs = mysql_query("SELECT ID,DoctorID,Date ,Sickness FROM treatment where CustomerID='".$ID."' order by Date DESC");									

			$html = '';  
			$html .= "<table width='100%'><tr>";  
			if (mysql_num_rows($rs)>0)    
			{  
		

				$html .= "<th width='150'>الطبيب</th>"; 
				$html .= "<th width='150'>التاريخ</th>"; 
				$html .= "<th width='150'>المرض</th>"; 

				$html .= "</tr>";  
				while ($row = mysql_fetch_assoc($rs))  
				{  
					$doc = mysql_query("SELECT FirstName,LastName FROM doctor where ID='".$row['DoctorID']."'");
					$doc1=mysql_fetch_array($doc);
					
					$html .= "<tr>";  
					$html .= "<td width='150' align='center'>".$doc1['FirstName']." ".$doc1['LastName'] . "</td>";  
					$html .= "<td width='150' align='center'>".$row['Date'] . "</td>";
					$html .= "<td width='150' align='center'>".$row['Sickness'] . "</td>";
					$html .= "</tr>";  
					
				}  
			}else{  
				$html .= "<tr><td colspan='" . ($i+1) . "'>لا يوجد معالجات حتى الآن...</td></tr>";  
			}
			$html .= "</table>";
				 
		$pdf->WriteHTML($html, true, 0, true, 0);
		ob_end_clean();
		$pdf->Output('example_018.pdf', 'I');
		}
	}
	
	public function showCustomerMedications($ID)
	{
		if (isset($_GET['pageno1'])) 
											{
											   $pageno1 = $_GET['pageno1'];
											} else {
											   $pageno1 = 1;
											}
											
											$result1 = mysql_query("SELECT count(*) FROM medication where CustomerID='".$ID."'");
											$query_data1 = mysql_fetch_row($result1);
											$numrows1 = $query_data1[0];
											
											$rows_per_page1 = 5;
											$lastpage1      = ceil($numrows1/$rows_per_page1);
											
											$pageno1 = (int)$pageno1;
											if ($pageno1 > $lastpage1) {
											   $pageno1 = $lastpage1;
											} // if
											if ($pageno1 < 1) {
											   $pageno1 = 1;
											}
											
											$limit1 = 'LIMIT ' .($pageno1 - 1) * $rows_per_page1 .',' .$rows_per_page1;
											
											$rs1 = mysql_query("SELECT ID,PharmacyID,Date ,Medicine,Payment FROM medication where CustomerID='".$ID."' order by Date DESC $limit1");
											
																						
											$odd1 = true;
											
										
											echo '<table>';
											 
											 echo '<th width=150>الصيدلية</th>';
											 echo '<th width=75>التاريخ</th>';
											 echo '<th width=150>الدواء</th>';
											 echo '<th width=75>المبلغ</th>';
											 
											while($row1=mysql_fetch_assoc($rs1))
											{
												//extract($row);
												echo ($odd1 == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
												$odd1 = !$odd1;
												$pha = mysql_query("SELECT Name FROM pharmacy where ID='".$row1['PharmacyID']."'");
												$pha1=mysql_fetch_array($pha);
												//$_SESSION['CustomerID']=$row['CustomerID'];
												echo '<td width="150"> <a href="http://localhost/HW/View/Pharmacies/ViewPharmacy.php?ID='.$row1['PharmacyID'].'">' . $pha1['Name'].'</a></td>';
                                    
												echo '<td width="75"> '.$row1['Date'] .'</a></td>';
												echo '<td width="150"> '.$row1['Medicine'] .'</a></td>';
												echo '<td width="75"> '.$row1['Payment'] .'</a></td>';
												
												echo '</tr>';
											}
											 echo '</table>';
										   ?>
                                  </td>
                                  </tr>
                                  
                                  <tr>
                                  	<td align="center">
                                    	<?php
											if ($numrows1>0)
											{
												if ($pageno1 == 1) {
											   echo "الأول | السابق";
												} else {
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno1=1'>الأول | </a> ";
												   $prevpage1 = $pageno1-1;
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno1=$prevpage1'>السابق</a> ";
												}
												
												echo " ( صفحة $pageno1 من $lastpage1 ) ";
	
												if ($pageno1 == $lastpage1) {
												   echo "التالي | الأخير";
												} else {
												   $nextpage1 = $pageno1+1;
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno1=$nextpage1'>التالي | </a> ";
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno1=$lastpage1'>الأخير</a> ";
												} 
											}
											else
											{
												echo "لا يوجد أي مداواة حتى الآن...";
											} 
	}
	public function CustomerMedicationsPDF($ID)
	{
		if (isset($_POST['pdf2']))
		{
		require_once('../tcpdf/config/lang/eng.php');
		require_once('../tcpdf/tcpdf.php');
		
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		
		
		
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		
		//set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		
		//set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		
		//set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		
		// set some language dependent data:
		$lg = Array();
		$lg['a_meta_charset'] = 'UTF-8';
		$lg['a_meta_dir'] = 'rtl';
		$lg['a_meta_language'] = 'fa';
		$lg['w_page'] = 'page';
		
		//set some language-dependent strings
		$pdf->setLanguageArray($lg);
		
		// ---------------------------------------------------------
		
		// set font
		$pdf->SetFont('dejavusans', '', 12);
		
		// add a page
		$pdf->AddPage();
		
		
		// Restore RTL direction
		$pdf->setRTL(true);
		
		// set font
		$pdf->SetFont('aefurat', '', 18);
		
		// print newline
		$pdf->Ln();
		
		// Arabic and English content
		$pdf->Cell(0, 12, 'المداواة',0,1,'C');

		
		
		
			$rs = mysql_query("SELECT ID,PharmacyID,Date ,Medicine FROM medication where CustomerID='".$ID."' order by Date DESC");									

			$html = '';  
			$html .= "<table width='100%'><tr>";  
			if (mysql_num_rows($rs)>0)    
			{  
		

				$html .= "<th width='150'>الصيدلية</th>"; 
				$html .= "<th width='150'>التاريخ</th>"; 
				$html .= "<th width='150'>الأدوية</th>"; 

				$html .= "</tr>";  
				while ($row = mysql_fetch_assoc($rs))  
				{  
					$pha = mysql_query("SELECT Name FROM pharmacy where ID='".$row['PharmacyID']."'");
					$pha1=mysql_fetch_array($pha);
					
					$html .= "<tr>";  
					$html .= "<td width='150' align='center'>".$pha1['Name']."</td>";  
					$html .= "<td width='150' align='center'>".$row['Date'] . "</td>";
					$html .= "<td width='150' align='center'>".$row['Medicine'] . "</td>";
					$html .= "</tr>";  
					
				}  
			}else{  
				$html .= "<tr><td colspan='" . ($i+1) . "'>لا يوجد مداواة حتى الآن...</td></tr>";  
			}
			$html .= "</table>";
				 
		$pdf->WriteHTML($html, true, 0, true, 0);
		ob_end_clean();
		$pdf->Output('example_018.pdf', 'I');
		}
	}
	
	public function showCustomerOperations($ID)
	{
		if (isset($_GET['pageno1'])) 
											{
											   $pageno1 = $_GET['pageno1'];
											} else {
											   $pageno1 = 1;
											}
											
											$result1 = mysql_query("SELECT count(*) FROM operation where CustomerID='".$ID."'");
											$query_data1 = mysql_fetch_row($result1);
											$numrows1 = $query_data1[0];
											
											$rows_per_page1 = 5;
											$lastpage1      = ceil($numrows1/$rows_per_page1);
											
											$pageno1 = (int)$pageno1;
											if ($pageno1 > $lastpage1) {
											   $pageno1 = $lastpage1;
											} // if
											if ($pageno1 < 1) {
											   $pageno1 = 1;
											}
											
											$limit1 = 'LIMIT ' .($pageno1 - 1) * $rows_per_page1 .',' .$rows_per_page1;
											
											$rs1 = mysql_query("SELECT ID,HospitalID,Date ,Name,Payment FROM operation where CustomerID='".$ID."' order by Date DESC $limit1");
											
											
											
											
											
											$odd1 = true;
											
										
											echo '<table>';
											
											echo '<th width=150>المشفى</th>';
											echo '<th width=75>التاريخ</th>';
											echo '<th width=150>العملية</th>';
											echo '<th width=75>المبلغ</th>';
											 
											while($row1=mysql_fetch_assoc($rs1))
											{
												//extract($row);
												echo ($odd1 == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
												$odd1 = !$odd1;
												$hos = mysql_query("SELECT Name FROM hospital where ID='".$row1['HospitalID']."'");
												$hos1=mysql_fetch_array($hos);
												//$_SESSION['CustomerID']=$row['CustomerID'];
												echo '<td width="150"> <a href="http://localhost/HW/View/Hospitals/ViewHospital.php?ID='.$row1['HospitalID'].'">' . $hos1['Name'].'</a></td>';
                                    
												echo '<td width="75"> '.$row1['Date'] .'</a></td>';
												echo '<td width="150"> '.$row1['Name'] .'</a></td>';
												echo '<td width="75"> '.$row1['Payment'] .'</a></td>';
												
												echo '</tr>';
											}
											 echo '</table>';
										   ?>
                                  </td>
                                  </tr>
                                  
                                  <tr>
                                  	<td align="center">
                                    	<?php
											if ($numrows1>0)
											{
												if ($pageno1 == 1) {
											   echo "الأول | السابق";
												} else {
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno1=1'>الأول | </a> ";
												   $prevpage1 = $pageno1-1;
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno1=$prevpage1'>السابق</a> ";
												}
												
												echo " ( صفحة $pageno1 من $lastpage1 ) ";
	
												if ($pageno1 == $lastpage1) {
												   echo "التالي | الأخير";
												} else {
												   $nextpage1 = $pageno1+1;
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno1=$nextpage1'>التالي | </a> ";
												   echo " <a href='{$_SERVER['PHP_SELF']}?pageno1=$lastpage1'>الأخير</a> ";
												} 
											}
											else
											{
												echo "لا يوجد أي عملية حتى الآن...";
											} 
	}
	public function CustomerOperationsPDF($ID)
	{
		$newday = date('j');
		if (isset($_POST['pdf3']) || ($newday==1))
		{
		require_once('../tcpdf/config/lang/eng.php');
		require_once('../tcpdf/tcpdf.php');
		
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		
		
		
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		
		//set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		
		//set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		
		//set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		
		// set some language dependent data:
		$lg = Array();
		$lg['a_meta_charset'] = 'UTF-8';
		$lg['a_meta_dir'] = 'rtl';
		$lg['a_meta_language'] = 'fa';
		$lg['w_page'] = 'page';
		
		//set some language-dependent strings
		$pdf->setLanguageArray($lg);
		
		// ---------------------------------------------------------
		
		// set font
		$pdf->SetFont('dejavusans', '', 12);
		
		// add a page
		$pdf->AddPage();
		
		
		// Restore RTL direction
		$pdf->setRTL(true);
		
		// set font
		$pdf->SetFont('aefurat', '', 18);
		
		// print newline
		$pdf->Ln();
		
		// Arabic and English content
		$pdf->Cell(0, 12, 'العمليات',0,1,'C');

		
		
		
			$rs = mysql_query("SELECT ID,HospitalID,Date ,Name FROM operation where CustomerID='".$ID."' order by Date DESC");									

			$html = '';  
			$html .= "<table width='100%'><tr>";  
			if (mysql_num_rows($rs)>0)    
			{  
		

				$html .= "<th width='150'>المشفى</th>"; 
				$html .= "<th width='150'>التاريخ</th>"; 
				$html .= "<th width='150'>العملية</th>"; 

				$html .= "</tr>";  
				while ($row = mysql_fetch_assoc($rs))  
				{  
					$hos = mysql_query("SELECT Name FROM hospital where ID='".$row['HospitalID']."'");
					$hos1=mysql_fetch_array($hos);
					
					$html .= "<tr>";  
					$html .= "<td width='150' align='center'>".$hos1['Name']."</td>";  
					$html .= "<td width='150' align='center'>".$row['Date'] . "</td>";
					$html .= "<td width='150' align='center'>".$row['Name'] . "</td>";
					$html .= "</tr>";  
					
				}  
			}else{  
				$html .= "<tr><td colspan='" . ($i+1) . "'>لا يوجد عملية حتى الآن...</td></tr>";  
			}
			$html .= "</table>";
				 
		$pdf->WriteHTML($html, true, 0, true, 0);
		ob_end_clean();
		//$pdf->Output('example_018.pdf', 'I');
		$pdfString = $pdf->Output('dummy.pdf', 'S');
		
		
		
		
		
		// $email and $message are the data that is being
		// posted to this page from our html contact form
		$email = "Saed Insurance Corporation" ;
		$message = "تجد مرفقا العمليات الخاصة بك" ;
		 
		// When we unzipped PHPMailer, it unzipped to
		// public_html/PHPMailer_5.2.0

		require('../---PHPMailer_5.2.0/class.phpmailer.php');
		 
		$mail = new PHPMailer();
		 
		// set mailer to use SMTP
		$mail->IsSMTP();
		 
		// As this email.php script lives on the same server as our email server
		// we are setting the HOST to localhost
		
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		
		 $mail->SMTPSecure = "ssl";
		 $mail->Host = "smtp.gmail.com";  // specify main and backup server
		 $mail->Port       = 465;
		// When sending email using PHPMailer, you need to send from a valid email address
		// In this case, we setup a test email account with the following credentials:
		// email: send_from_phpmailer@bradm.inmotiontesting.com
		// pass: password
		$mail->Username = "fateh.fateh.12345@gmail.com";  // SMTP username
		$mail->Password = "operation123"; // SMTP password
		 
		// $email is the user's email address the specified
		// on our contact us page. We set this variable at
		// the top of this page with:
		// $email = $_REQUEST['email'] ;
		$mail->From = $email;
		 
		// below we want to set the email address we will be sending our email to.
		$mail->AddAddress("fateh.fateh.12345@gmail.com", "Brad Markle");
		 
		// set word wrap to 50 characters
		$mail->WordWrap = 50;
		// set email format to HTML
		$mail->IsHTML(true);
		 
		$mail->Subject = "You have received feedback from your website!";
		 
		 //....................................................
		 $mail->AddStringAttachment($pdfString, 'dummy.pdf');
		 //..................................................
		 
		// $message is the user's message they typed in
		// on our contact us page. We set this variable at
		// the top of this page with:
		// $message = $_REQUEST['message'] ;
		$mail->Body    = $message;
		$mail->AltBody = $message;
		 
		if(!$mail->Send())
		{
		   echo "Message could not be sent. <p>";
		   echo "Mailer Error: " . $mail->ErrorInfo;
		   exit;
		}
		
		header('Location: http://localhost/HW/View/Customers/CustomerOperations.php?ID='.$ID.'');
		
		
		
		
		
		
		
		
		
		
		}
	}
	
						
	
	public function editCustomerInfo($ID) 
	{
		$newcustomer = new Customer;
											$rs = mysql_query("SELECT NationalNumber,FirstName,LastName,EnglishName,PhoneNumber,email,Gender,BirthDate,Salary,CompanyID FROM customer where CustomerID='".$ID."'");
											$row = mysql_fetch_assoc($rs);
											
                                            echo '<form method="post" action="'. $newcustomer->editCustomer($ID) .'">';
											?>
											
                                            <table>
                                            	<tr>
                                                	<td>
                                                    	الرقم الوطني
                                                    </td>
                                                	<td>
                                                    	<?php echo '<input name="NationalNumber" type="text" value="'.$row['NationalNumber'].'" />*'; ?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	 الاسم الأول
                                                    </td>
                                                	<td>
                                                    	<?php echo '<input name="FirstName" type="text" value="'.$row['FirstName'].'" />*'; ?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	 الاسم الثاني
                                                    </td>
                                                	<td>
                                                    	<?php echo '<input name="LastName" type="text" value="'.$row['LastName'].'" />*'; ?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	 الاسم باللغة الانكليزية
                                                    </td>
                                                	<td>
                                                    	<?php echo '<input name="EnglishName" type="text" value="'.$row['EnglishName'].'" />*'; ?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	  رقم الهاتف
                                                    </td>
                                                	<td>
                                                    	<?php echo '<input name="PhoneNumber" type="text" value="'.$row['PhoneNumber'].'" />*'; ?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	  البريد الإلكتروني 
                                                    </td>
                                                	<td>
                                                    	<?php echo '<input name="email" type="text" value="'.$row['email'].'" />'; ?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	   الجنس 
                                                    </td>
                                                	<td>
														<?php 
														if ($row['Gender']==00001)
														{
															echo 'ذكر<input type="radio" name="gender" value="00001" checked="checked"/>';
															echo 'أنثى<input type="radio" name="gender" value="00002"/>*';
														}
														else
														{
															echo 'ذكر<input type="radio" name="gender" value="00001" />';
															echo 'أنثى<input type="radio" name="gender" value="00002" checked="checked"/>*';
														}
                                                        ?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	   تاريخ الميلاد 
                                                    </td>
                                                	<td>
                                                    	<?php
															$year = substr( $row['BirthDate'], 0, 4);
															$month = substr(  $row['BirthDate'], 5, 2);
															$day = substr(  $row['BirthDate'], 8, 2);
															echo '<input name="day" type="text" value="'.$day.'" style="width:20px"/>';
															echo '<input name="month" type="text" value="'.$month.'" style="width:20px"/>';
															echo '<input name="year" type="text" value="'.$year.'" style="width:40px"/>*';
														?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	      الراتب 
                                                    </td>
                                                	<td>
                                                    	<?php echo '<input name="Salary" type="text" value="'.$row['Salary'].'" />*'; ?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	    الشركة التابع لها 
                                                    </td>
                                                	<td>
                                                    	<select name="CompanyID">
														<?php
                                                    	$result1 = mysql_query("SELECT ID,Name FROM company");
															echo '<option size ="40" value="0" name="CompanyID"></option>';
                                                                    while ($row2 = mysql_fetch_assoc($result1)) 
                                                                    {
																		?>
                                                                        <option <?php if ($row2['ID']==$row['CompanyID']) { ?>selected="selected"<?php } ?>>
           																 <?php echo htmlspecialchars($row2['Name']); ?>
																		<?php
																		
                                                                        //echo '<option size ="40" value=" '. $row2['ID'] . '" name="CompanyID">' . $row2['Name']. '</option>';
                                                                    }
                                                                    ?>
                                                      </select >
                                                    </td>
                                                </tr>
                                            </table>
                                            
											
                                            <?php
											echo    '<input name="editCustomer" type="submit" value="تعديل" />';
                                            echo '</form>';
	}
}

?>