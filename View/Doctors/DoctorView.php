<?php
class DoctorView
{
    public function __construct() 
    {
    }
    
    public function showDoctors() 
    {

										if (isset($_GET['pageno'])) 
											{
											   $pageno = $_GET['pageno'];
											} else {
											   $pageno = 1;
											}
											
											$result = mysql_query("SELECT count(*) FROM doctor");
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
											
											$rs = mysql_query("SELECT ID,FirstName, LastName FROM Doctor $limit");
											
											$odd = true;
											$deletedDoctor = new Doctor;
											echo '<table> ';
											while ($row = mysql_fetch_assoc($rs)) 
											{
												extract($row);
												echo ($odd == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
												$odd = !$odd;
												//$_SESSION['DoctorID']=$row['ID'];
												echo '<td width="150"> <a href="ViewDoctor.php?ID='.$row['ID'].'">' . $row['FirstName']." ".$row['LastName'] .'</a></td>';
												//echo '<td><select name="Grant" multiple></select></td>';
												
                                    
                                    			echo '<td width="150"> <a href="EditDoctor.php?ID='.$row['ID'].'">تعديل</a></td>';
                                    			
                                              
												//$_POST['DUser']=$UserName;
												echo '<form method="post" action="'. $deletedDoctor->deleteDoctor() .'">';
													echo '<input type="hidden" name="DDoctor" value="'.$row['ID'].'" />';
													echo '<td  width="150"><input name="deleteDoctor" type="submit" value="حذف" /></td>';
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
												echo "لا يوجد أي طبيب حالياً...";
											} 
		
	}
	
	public function showDoctorsONLY() 
    {

										if (isset($_GET['pageno'])) 
											{
											   $pageno = $_GET['pageno'];
											} else {
											   $pageno = 1;
											}
											
											$result = mysql_query("SELECT count(*) FROM doctor");
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
											
											$rs = mysql_query("SELECT ID,FirstName, LastName FROM Doctor $limit");
											
											$odd = true;
											$deletedDoctor = new Doctor;
											echo '<table> ';
											while ($row = mysql_fetch_assoc($rs)) 
											{
												extract($row);
												echo ($odd == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
												$odd = !$odd;
												//$_SESSION['DoctorID']=$row['ID'];
												echo '<td width="150"> <a href="ViewDoctor.php?ID='.$row['ID'].'">' . $row['FirstName']." ".$row['LastName'] .'</a></td>';
												//echo '<td><select name="Grant" multiple></select></td>';

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
												echo "لا يوجد أي طبيب حالياً...";
											} 
		
	}
	
	
	public function showDoctorsFiltered($filter) 
    {

										if (isset($_GET['pageno'])) 
											{
											   $pageno = $_GET['pageno'];
											} else {
											   $pageno = 1;
											}
											
											$result = mysql_query("SELECT count(*) FROM doctor where FirstName like '%".$_POST['value']."%' or LastName like '%".$_POST['value']."%'");
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
											
											$rs = mysql_query("SELECT ID,FirstName, LastName FROM Doctor where FirstName like '%".$_POST['value']."%' or LastName like '%".$_POST['value']."%' $limit");
											
											$odd = true;
											$deletedDoctor = new Doctor;
											echo '<table> ';
											while ($row = mysql_fetch_assoc($rs)) 
											{
												extract($row);
												echo ($odd == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
												$odd = !$odd;
												//$_SESSION['DoctorID']=$row['ID'];
												echo '<td width="150"> <a href="ViewDoctor.php?ID='.$row['ID'].'">' . $row['FirstName']." ".$row['LastName'] .'</a></td>';
												//echo '<td><select name="Grant" multiple></select></td>';
												
                                    
                                    			echo '<td width="150"> <a href="EditDoctor.php?ID='.$row['ID'].'">تعديل</a></td>';
                                    			
                                              
												//$_POST['DUser']=$UserName;
												echo '<form method="post" action="'. $deletedDoctor->deleteDoctor() .'">';
													echo '<input type="hidden" name="DDoctor" value="'.$row['ID'].'" />';
													echo '<td  width="150"><input name="deleteDoctor" type="submit" value="حذف" /></td>';
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
	
	public function showDoctorsFilteredONLY($filter) 
    {

										if (isset($_GET['pageno'])) 
											{
											   $pageno = $_GET['pageno'];
											} else {
											   $pageno = 1;
											}
											
											$result = mysql_query("SELECT count(*) FROM doctor where FirstName like '%".$_POST['value']."%' or LastName like '%".$_POST['value']."%'");
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
											
											$rs = mysql_query("SELECT ID,FirstName, LastName FROM Doctor where FirstName like '%".$_POST['value']."%' or LastName like '%".$_POST['value']."%' $limit");
											
											$odd = true;
											$deletedDoctor = new Doctor;
											echo '<table> ';
											while ($row = mysql_fetch_assoc($rs)) 
											{
												extract($row);
												echo ($odd == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
												$odd = !$odd;
												//$_SESSION['DoctorID']=$row['ID'];
												echo '<td width="150"> <a href="ViewDoctor.php?ID='.$row['ID'].'">' . $row['FirstName']." ".$row['LastName'] .'</a></td>';
												//echo '<td><select name="Grant" multiple></select></td>';

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

    public function showDoctorInfo($ID) 
    {
		$newdoctor = new Doctor;
											$rs = mysql_query("SELECT u.UserName,d.FirstName,d.LastName,d.PhoneNumber,d.Speciality,d.Fees,d.ClinicAddress FROM doctor d,user u where u.ID=d.ID and u.ID='".$ID."'");
											$row = mysql_fetch_assoc($rs);
                                            //echo '<form method="post" action="'. $newcustomer->editCustomer() .'">';
											?>
											
                                            <table>
                                            	<tr>
                                                	<td>
                                                    	 اسم المستخدم
                                                    </td>
                                                	<td>
                                                    	
                                                        <?php echo '<label>'.$row['UserName'].'</label>';?>
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
                                                    	  رقم الهاتف
                                                    </td>
                                                	<td>
                                                    	<?php echo '<label>'.$row['PhoneNumber'].'</label>';?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	   الاختصاص 
                                                    </td>
                                                	<td>
                                                    	<?php echo '<label>'.$row['Speciality'].'</label>';?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	   الرسم 
                                                    </td>
                                                	<td>
														<?php echo '<label>'.$row['Fees'].'</label>';?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	    عنوان العيادة 
                                                    </td>
                                                	<td>
                                                    	<?php echo '<label>'.$row['ClinicAddress'].'</label>';?>
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
													echo '<td width="150"> <a href="EditDoctor.php?ID='.$ID.'">تعديل</a></td>';?>
                                                </td>
                                                
                                                <td>
                                                    <?php
                                                        $deletedDoctor = new Doctor;
                                                        echo '<form method="post" action=action="'. $deletedDoctor->deleteDoctor() .'">';
                                                        echo '<input type="hidden" name="DDoctor" value="'.$ID.'" />';
                                                        echo '<td  width="150"><input name="deleteUser" type="submit" value="حذف" /></td>';
                                                        echo '</form>';
													}
	}
	
	public function editDoctorInfo($ID) 
	{
		$newdoctor = new Doctor;
											$rs = mysql_query("SELECT u.UserName,d.FirstName,d.LastName,d.PhoneNumber,d.Speciality,d.Fees,d.ClinicAddress FROM doctor d,user u where u.ID=d.ID and u.ID='".$ID."'");
											$row = mysql_fetch_assoc($rs);
											
                                            echo '<form method="post" action="'. $newdoctor->editDoctor($ID) .'">';
											?>
											
                                            <table>
                                            	<tr>
                                                	<td>
                                                    	 اسم المستخدم
                                                    </td>
                                                	<td>
                                                    	<?php echo '<input name="UserName" type="text" value="'.$row['UserName'].'" />*'; ?>
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
                                                    	  رقم الهاتف
                                                    </td>
                                                	<td>
                                                    	<?php echo '<input name="PhoneNumber" type="text" value="'.$row['PhoneNumber'].'" />*'; ?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	   الاختصاص 
                                                    </td>
                                                	<td>
                                                    	<?php echo '<input name="Speciality" type="text" value="'.$row['Speciality'].'" />*'; ?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	   الرسم 
                                                    </td>
                                                	<td>
														<?php echo '<input name="Fees" type="text" value="'.$row['Fees'].'" />*'; ?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	    عنوان العيادة 
                                                    </td>
                                                	<td>
                                                    	<?php echo '<input name="ClinicAddress" type="text" value="'.$row['ClinicAddress'].'" />*'; ?>
                                                    </td>
                                                </tr>
                                                
                                            </table>
                                            
											
                                            <?php
											echo    '<input name="editDoctor" type="submit" value="تعديل" />';
                                            echo '</form>';
	}
}

?>