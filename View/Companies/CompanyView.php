<?php
class CompanyView
{
    public function __construct() 
    {
    }
    
    public function showCompanies() 
    {

										if (isset($_GET['pageno'])) 
											{
											   $pageno = $_GET['pageno'];
											} else {
											   $pageno = 1;
											}
											
											$result = mysql_query("SELECT count(*) FROM company");
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
											
											$rs = mysql_query("SELECT ID,Name FROM company $limit");
											
											$odd = true;
											$deletedCompany = new Company;
											echo '<table> ';
											while ($row = mysql_fetch_assoc($rs)) 
											{
												extract($row);
												echo ($odd == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
												$odd = !$odd;
												$_SESSION['PharmacyID']=$row['ID'];
												echo '<td width="150"> <a href="ViewCompany.php?ID='.$row['ID'].'">' . $row['Name'].'</a></td>';
												//echo '<td><select name="Grant" multiple></select></td>';
												
                                    
                                    			echo '<td width="150"> <a href="EditCompany.php?ID='.$row['ID'].'">تعديل</a></td>';
                                    			
                                              
												//$_POST['DUser']=$UserName;
												echo '<form method="post" action="'. $deletedCompany->deleteCompany() .'">';
													echo '<input type="hidden" name="DCompany" value="'.$row['ID'].'" />';
													echo '<td  width="150"><input name="deleteCompany" type="submit" value="حذف" /></td>';
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
												echo "لا يوجد أي شركة حالياً...";
											} 
		
	}
	
	public function showCompaniesONLY() 
    {

										if (isset($_GET['pageno'])) 
											{
											   $pageno = $_GET['pageno'];
											} else {
											   $pageno = 1;
											}
											
											$result = mysql_query("SELECT count(*) FROM company");
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
											
											$rs = mysql_query("SELECT ID,Name FROM company $limit");
											
											$odd = true;
											$deletedCompany = new Company;
											echo '<table> ';
											while ($row = mysql_fetch_assoc($rs)) 
											{
												extract($row);
												echo ($odd == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
												$odd = !$odd;
												$_SESSION['PharmacyID']=$row['ID'];
												echo '<td width="150"> <a href="ViewCompany.php?ID='.$row['ID'].'">' . $row['Name'].'</a></td>';
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
												echo "لا يوجد أي شركة حالياً...";
											} 
		
	}
	
	
	public function showCompaniesFiltered($filter) 
    {

										if (isset($_GET['pageno'])) 
											{
											   $pageno = $_GET['pageno'];
											} else {
											   $pageno = 1;
											}
											
											$result = mysql_query("SELECT count(*) FROM company where Name like '%".$_POST['value']."%'");
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
											
											$rs = mysql_query("SELECT ID,Name FROM company where Name like '%".$_POST['value']."%' $limit");
											
											$odd = true;
											$deletedCompany = new Company;
											echo '<table> ';
											while ($row = mysql_fetch_assoc($rs)) 
											{
												extract($row);
												echo ($odd == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
												$odd = !$odd;
												$_SESSION['PharmacyID']=$row['ID'];
												echo '<td width="150"> <a href="ViewCompany.php?ID='.$row['ID'].'">' . $row['Name'].'</a></td>';
												//echo '<td><select name="Grant" multiple></select></td>';
												
                                    
                                    			echo '<td width="150"> <a href="EditCompany.php?ID='.$row['ID'].'">تعديل</a></td>';
                                    			
                                              
												//$_POST['DUser']=$UserName;
												echo '<form method="post" action="'. $deletedCompany->deleteCompany() .'">';
													echo '<input type="hidden" name="DCompany" value="'.$row['ID'].'" />';
													echo '<td  width="150"><input name="deleteCompany" type="submit" value="حذف" /></td>';
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
	
	public function showCompaniesFilteredONLY($filter) 
    {

										if (isset($_GET['pageno'])) 
											{
											   $pageno = $_GET['pageno'];
											} else {
											   $pageno = 1;
											}
											
											$result = mysql_query("SELECT count(*) FROM company where Name like '%".$_POST['value']."%'");
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
											
											$rs = mysql_query("SELECT ID,Name FROM company where Name like '%".$_POST['value']."%' $limit");
											
											$odd = true;
											$deletedCompany = new Company;
											echo '<table> ';
											while ($row = mysql_fetch_assoc($rs)) 
											{
												extract($row);
												echo ($odd == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
												$odd = !$odd;
												$_SESSION['PharmacyID']=$row['ID'];
												echo '<td width="150"> <a href="ViewCompany.php?ID='.$row['ID'].'">' . $row['Name'].'</a></td>';
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

    public function showCompanyInfo($ID) 
    {
		$newcompany = new Company;
											$ID=$_REQUEST['ID'];
											$rs = mysql_query("SELECT Name,PhoneNumber,Address FROM company where ID='".$ID."'");
											$row = mysql_fetch_assoc($rs);
                                            //echo '<form method="post" action="'. $newcustomer->editCustomer() .'">';
											?>
											
                                            <table>
                                                
                                                <tr>
                                                	<td>
                                                    	 الاسم 
                                                    </td>
                                                	<td>
                                                    	<?php echo '<label>'.$row['Name'].'</label>';?>
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
                                                    	   العنوان 
                                                    </td>
                                                	<td>
                                                    	<?php echo '<label>'.$row['Address'].'</label>';?>
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
													echo '<td width="150"> <a href="EditCompany.php?ID='.$ID.'">تعديل</a></td>';?>
                                                </td>
                                                
                                                <td>
                                                    <?php
                                                        $deletedCompany = new Company;
                                                        echo '<form method="post" action=action="'. $deletedCompany->deleteCompany() .'">';
                                                        echo '<input type="hidden" name="DCompany" value="'.$ID.'" />';
                                                        echo '<td  width="150"><input name="deleteUser" type="submit" value="حذف" /></td>';
                                                        echo '</form>';
													}
	}
	
	public function editCompanyInfo($ID) 
	{
		$newcompany = new Company;
											$ID=$_REQUEST['ID'];
											$rs = mysql_query("SELECT Name,PhoneNumber,Address FROM company where ID='".$ID."'");
											$row = mysql_fetch_assoc($rs);
											
                                            echo '<form method="post" action="'. $newcompany->editCompany($ID) .'">';
											?>
											
                                            <table>
                                                
                                                <tr>
                                                	<td>
                                                    	 الاسم 
                                                    </td>
                                                	<td>
                                                    	<?php echo '<input name="Name" type="text" value="'.$row['Name'].'" />*'; ?>
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
                                                    	   العنوان 
                                                    </td>
                                                	<td>
                                                    	<?php echo '<input name="Address" type="text" value="'.$row['Address'].'" />*'; ?>
                                                    </td>
                                                </tr>
                                                
                                            </table>
                                            
											
                                            <?php
											echo    '<input name="editCompany" type="submit" value="تعديل" />';
                                            echo '</form>';
	}
}

?>