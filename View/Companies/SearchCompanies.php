<?php
include("../../Model/connection.php");
include("../../Model/Company.php");
include("../../Controller/CompanyController.php");
include("../../Controller/LoginController.php");

$loginCtrl = new LoginController;
$loginCtrl->checkLogin();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>البحث في الشركات</title>

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
                            
                    <td style="width:50%;" align="center">
                            	<table>
                                    
                                    <tr>
                                    	<td dir="ltr">
                                        بحث في الشركات
                                        </td>
                                  </tr>
                                    
                                    <tr>
                                   	  <td>
                                    		<form method="post" action="../View/Companies/SearchCompanies.php">
                                      	
                                      	<input type="text" name="value" />
                                        <input type="submit" name="search" value="بحث"/>
                                      </td>
                                    </tr>
                                    
                                  <tr>
                                    	<td height="150" valign="top" align="center">
                                        	<?php 
											$AllCompanies =new CompanyController;
											if(isset($_POST['value']) && !$_POST['value']=="")
												$AllCompanies->invoke($_POST['value']);
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