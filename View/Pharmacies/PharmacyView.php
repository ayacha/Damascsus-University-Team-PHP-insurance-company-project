<?php
class PharmacyView
{
    public function __construct() 
    {
    }
    
    public function showPharmacies() 
    {

										if (isset($_GET['pageno'])) 
											{
											   $pageno = $_GET['pageno'];
											} else {
											   $pageno = 1;
											}
											
											$result = mysql_query("SELECT count(*) FROM pharmacy");
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

											$rs = mysql_query("SELECT ID,Name FROM pharmacy $limit");
											
											$odd = true;
											$deletedPharmacy = new Pharmacy;
											echo '<table> ';
											while ($row = mysql_fetch_assoc($rs)) 
											{
												extract($row);
												echo ($odd == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
												$odd = !$odd;
												$_SESSION['PharmacyID']=$row['ID'];
												echo '<td width="150"> <a href="ViewPharmacy.php?ID='.$row['ID'].'">' . $row['Name'].'</a></td>';
												//echo '<td><select name="Grant" multiple></select></td>';
												
                                    
                                    			echo '<td width="150"> <a href="EditPharmacy.php?ID='.$row['ID'].'">تعديل</a></td>';
                                    			
                                              
												//$_POST['DUser']=$UserName;
												echo '<form method="post" action="'. $deletedPharmacy->deletePharmacy() .'">';
													echo '<input type="hidden" name="DPharmacy" value="'.$row['ID'].'" />';
													echo '<td  width="150"><input name="deletePharmacy" type="submit" value="حذف" /></td>';
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
												echo "لا يوجد أي صيدلية حالياً...";
											} 
		
	}
	
	public function showPharmaciesONLY() 
    {

										if (isset($_GET['pageno'])) 
											{
											   $pageno = $_GET['pageno'];
											} else {
											   $pageno = 1;
											}
											
											$result = mysql_query("SELECT count(*) FROM pharmacy");
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

											$rs = mysql_query("SELECT ID,Name FROM pharmacy $limit");
											
											$odd = true;
											$deletedPharmacy = new Pharmacy;
											echo '<table> ';
											while ($row = mysql_fetch_assoc($rs)) 
											{
												extract($row);
												echo ($odd == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
												$odd = !$odd;
												$_SESSION['PharmacyID']=$row['ID'];
												echo '<td width="150"> <a href="ViewPharmacy.php?ID='.$row['ID'].'">' . $row['Name'].'</a></td>';
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
												echo "لا يوجد أي صيدلية حالياً...";
											} 
		
	}
	
	
	public function showPharmaciesFiltered($filter) 
    {

										if (isset($_GET['pageno'])) 
											{
											   $pageno = $_GET['pageno'];
											} else {
											   $pageno = 1;
											}
											
											$result = mysql_query("SELECT count(*) FROM pharmacy where Name like '%".$_POST['value']."%'");
											$query_data = mysql_fetch_row($result);
											$numrows = $query_data[0];
											
											$rows_per_page = 1;
											$lastpage      = ceil($numrows/$rows_per_page);
											
											$pageno = (int)$pageno;
											if ($pageno > $lastpage) {
											   $pageno = $lastpage;
											} // if
											if ($pageno < 1) {
											   $pageno = 1;
											}
											
											$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;

											$rs = mysql_query("SELECT ID,Name FROM pharmacy where Name like '%".$_POST['value']."%' $limit");
											
											$odd = true;
											$deletedPharmacy = new Pharmacy;
											echo '<table> ';
											while ($row = mysql_fetch_assoc($rs)) 
											{
												extract($row);
												echo ($odd == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
												$odd = !$odd;
												$_SESSION['PharmacyID']=$row['ID'];
												echo '<td width="150"> <a href="ViewPharmacy.php?ID='.$row['ID'].'">' . $row['Name'].'</a></td>';
												//echo '<td><select name="Grant" multiple></select></td>';
												
                                    
                                    			echo '<td width="150"> <a href="EditPharmacy.php?ID='.$row['ID'].'">تعديل</a></td>';
                                    			
                                              
												//$_POST['DUser']=$UserName;
												echo '<form method="post" action="'. $deletedPharmacy->deletePharmacy() .'">';
													echo '<input type="hidden" name="DPharmacy" value="'.$row['ID'].'" />';
													echo '<td  width="150"><input name="deletePharmacy" type="submit" value="حذف" /></td>';
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
	
	public function showPharmaciesFilteredONLY($filter) 
    {

										if (isset($_GET['pageno'])) 
											{
											   $pageno = $_GET['pageno'];
											} else {
											   $pageno = 1;
											}
											
											$result = mysql_query("SELECT count(*) FROM pharmacy where Name like '%".$_POST['value']."%'");
											$query_data = mysql_fetch_row($result);
											$numrows = $query_data[0];
											
											$rows_per_page = 1;
											$lastpage      = ceil($numrows/$rows_per_page);
											
											$pageno = (int)$pageno;
											if ($pageno > $lastpage) {
											   $pageno = $lastpage;
											} // if
											if ($pageno < 1) {
											   $pageno = 1;
											}
											
											$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;

											$rs = mysql_query("SELECT ID,Name FROM pharmacy where Name like '%".$_POST['value']."%' $limit");
											
											$odd = true;
											$deletedPharmacy = new Pharmacy;
											echo '<table> ';
											while ($row = mysql_fetch_assoc($rs)) 
											{
												extract($row);
												echo ($odd == true) ? '<tr bgcolor="0099CC">' : '<tr bgcolor="FFFFFF">';
												$odd = !$odd;
												$_SESSION['PharmacyID']=$row['ID'];
												echo '<td width="150"> <a href="ViewPharmacy.php?ID='.$row['ID'].'">' . $row['Name'].'</a></td>';
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

    public function showPharmacyInfo($ID) 
    {
		$newpharmacy = new Pharmacy;
											$rs = mysql_query("SELECT u.UserName,p.Name,p.PhoneNumber,p.Address FROM pharmacy p,user u where u.ID=p.ID and u.ID='".$ID."'");
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
													echo '<td width="150"> <a href="EditPharmacy.php?ID='.$ID.'">تعديل</a></td>';?>
                                                </td>
                                                
                                                <td>
                                                    <?php
                                                        $deletedPharmacy = new Pharmacy;
                                                        echo '<form method="post" action=action="'. $deletedPharmacy->deletePharmacy() .'">';
                                                        echo '<input type="hidden" name="DPharmacy" value="'.$ID.'" />';
                                                        echo '<td  width="150"><input name="deleteUser" type="submit" value="حذف" /></td>';
                                                        echo '</form>';
													}
	}
	
	public function editPharmacyInfo($ID) 
	{
		$newpharmacy = new Pharmacy;
											$rs = mysql_query("SELECT u.UserName,p.Name,p.PhoneNumber,p.Address FROM pharmacy p,user u where u.ID=p.ID and u.ID='".$ID."'");
											$row = mysql_fetch_assoc($rs);
											
                                            echo '<form method="post" action="'. $newpharmacy->editPharmacy($ID) .'">';
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
											echo    '<input name="editPharmacy" type="submit" value="تعديل" />';
                                            echo '</form>';
	}
}

?>