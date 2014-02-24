<?php
include("../Model/connection.php");
include("../Controller/LoginController.php");
include("../Controller/MedicationController.php");
include("../Model/CustomerClass.php");

$loginCtrl = new LoginController;
$loginCtrl->checkIfLogged();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>التداوي</title>



</head>

<body>
    	<form name="Medication" method="post" action="" dir="rtl">
		<table width="100%" dir="rtl">
			<tr style="width:100%;">
				<td>
                	<div>
                		<img src="---Images/Head.jpg" id="image" width="100%" height="150" alt="????????" />
                	</div>
               </td>
		    </tr>
			
			<tr style="width:100%;">
				<td>
                	<table width="100%" dir="rtl">
                    	<tr style="width:100%;">
                    	  <td style="width:25%;" valign="top">
                          <div>
                            	<?php
									$loginCtrl->getMenu();
								?>
                          	</div>
                          </td>
                          
                    	  <td style="width:50%;" valign="top">
                          	<table>
                            	<tr style="width:100%;">
                                	<td>
                                    	<div align="center">
                    	    				<h1>
                                            خدمة جديدة
                                            </h1>
                    	  				</div>
                                    </td>
                                </tr>
                                
                                
                                	  <tr style="width:100%;">
                                        <td>
                                            <table width="200" border="0">
                                            <tr>
                                              <td><label>
                                                <div align="center">أدخل الرقم الوطني
                                                للمريض
                                                  <input type="text" name="NationalNum" id="NationalNum" />
                                                </div>
                                              </label></td>
                                            </tr>
                                            <tr>
                                              <td><div align="center">
                                                <label>
                                                  <input type="submit" name="CheckCustomer" id="CheckCustomer" value="أدخل" />
                                                </label>
                                              </div></td>
                                            </tr>
                                            
                                            <tr>
                                            	<td>
                                                	<?php
														$medCtrl = new MedicationController;
														$medCtrl->invoke();
													?>
                                                </td>
                                            </tr>
                                          </table>         
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

</body>
</html>