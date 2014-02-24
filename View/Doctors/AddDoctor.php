<?php
include("../../Model/connection.php");
include("../../Model/Doctor.php");
include("../../Controller/LoginController.php");

$loginCtrl = new LoginController;
$loginCtrl->checkIfLogged();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>إضافة طبيب</title>

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
                                        	إضافة طبيب جديد
                                        </td>

                                  </tr>
                                  
                                  <tr>
                                    	<td>
                                        	<?php
											$newdoctor = new Doctor;
											
                                            echo '<form method="post" action="'. $newdoctor->addDoctor() .'">';
											?>
											
                                            <table>
                                                <tr>
                                                	<td>
                                                    	  اسم المستخدم
                                                    </td>
                                                	<td>
                                                    	<input name="UserName" type="text" />*
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
                                                    	  رقم الهاتف
                                                    </td>
                                                	<td>
                                                    	<input name="PhoneNumber" type="text" />*
                                                    </td>
                                                </tr>
                      

                                                <tr>
                                                	<td>
                                                    	      الاختصاص 
                                                    </td>
                                                	<td>
                                                    	<input name="Speciality" type="text" />*
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	      الرسم 
                                                    </td>
                                                	<td>
                                                    	<input name="Fees" type="text" />*
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>
                                                    	      عنوان العيادة 
                                                    </td>
                                                	<td>
                                                    	<input name="ClinicAddress" type="text" />*
                                                    </td>
                                                </tr>
                                            </table>
                                            
											
                                            <?php
											echo    '<input name="addDoctor" type="submit" value="إضافة" />';
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