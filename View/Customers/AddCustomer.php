<?php
include("../../Model/connection.php");
include("../../Model/CustomerClass.php");
include("../../Controller/LoginController.php");

$loginCtrl = new LoginController;
$loginCtrl->checkIfLogged();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>إضافة زيون</title>

<link href="../---CSS/menu.css" rel="stylesheet" type="text/css" />

</head>
	<form name="Manage" method="post" action="" dir="rtl">
		<table width="100%" dir="rtl">
			<tr style="width:100%;">
				<td >
                	<div>
                		<img src="../---Images/Head.jpg" id="image" width="100%" height="150" alt="????????" />
                	</div>
               </td>
		    </tr>
			
			<tr style="width:100%;">
				<td>
                	<table width="100%" dir="rtl">
               	  <tr style="width:100%;">
                        	<td style="width:25%; position:fixed">
                            	<div>
                            	<?php
									$loginCtrl->getMenu();
								?>
                          	</div>
                            </td>
                            
                    <td style="width:50%;">
                            	<table>
                                    
                                    <tr>
                                    	<td>
                                        	إضافة زبون جديد
                                        </td>

                                  </tr>
                                  
                                  <tr>
                                    	<td>
                                        	<?php
											$newcustomer = new Customer;
											
                                            echo '<form method="post" action="'. $newcustomer->addCustomer() .'">';
											?>
											
                                            <table>
                                            	<tr>
                                                	<td>
                                                    	الرقم الوطني
                                                    </td>
                                                	<td>
                                                    	<input name="NationalNumber" type="text" />*
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	 الاسم الأول
                                                    </td>
                                                	<td>
                                                    	<input name="FirstName" type="text" />*
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	 الاسم الثاني
                                                    </td>
                                                	<td>
                                                    	<input name="LastName" type="text" />*
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	 الاسم باللغة الانكليزية
                                                    </td>
                                                	<td>
                                                    	<input name="EnglishName" type="text" />*
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	  رقم الهاتف
                                                    </td>
                                                	<td>
                                                    	<input name="PhoneNumber" type="text" />*
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	  البريد الإلكتروني 
                                                    </td>
                                                	<td>
                                                    	<input name="email" type="text" />
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	   الجنس 
                                                    </td>
                                                	<td>
                                                    	ذكر<input type="radio" name="gender" value="00001"/>
                                                        أنثى<input type="radio" name="gender" value="00002" />*
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	   تاريخ الميلاد 
                                                    </td>
                                                	<td>
                                                        <input name="day" type="text" style="width:20px"/>
                                                        <input name="month" type="text"style="width:20px"/>
                                                        <input name="year" type="text" style="width:40px"/>*
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	      الراتب 
                                                    </td>
                                                	<td>
                                                    	<input name="Salary" type="text" />*
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
                                                                        echo '<option size ="40" value=" '. $row2['ID'] . '" name="CompanyID">' . $row2['Name']. '</option>';
                                                                    }
                                                                    ?>
                                                      </select >
                                                    </td>
                                                </tr>
                                            </table>
                                            
											
                                            <?php
											echo    '<input name="addCustomer" type="submit" value="إضافة" />';
                                            echo '</form>';
											?>
                                        </td>

                                  </tr>
                                                                    
                                </table>
                            </td>
                            
                            <td style="width:25%;" valign="top">
                            <?php $loginCtrl->LoggedOrNot()?>
                            </td>
                        </tr>
                    </table>
                </td>
			</tr>
			
		</table>
	
	</form>
<body>
</body>
</html>