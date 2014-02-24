<?php
include("../../Model/connection.php");
include("../../Model/Pharmacy.php");
include("../../Controller/PharmacyController.php");
include("../../Controller/LoginController.php");

$loginCtrl = new LoginController;
$loginCtrl->checkLogin();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>الصيدليات</title>

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
                                        	<?php
												if (isset($_SESSION['role']) && ($_SESSION['role']=="Administrator"))
												{
													echo '<a href="AddPharmacy.php">إضافة صيدلية جديدة</a>';
													echo ' | ';
													
												}
												echo '<a href="SearchPharmacies.php">بحث</a>';
											?>
                                        </td>
                                        
                                        <td>                                        	
                                      </td>
                                  </tr>

                                    <tr>
                                   	  <td>
                                    		الصيدليات الحالية
                                      </td>
                                    </tr>
                                    
                                  <tr>
                                    	<td height="150" valign="top" align="center">
                                        	<?php 
											$AllPharmacies =new PharmacyController;
											$AllPharmacies->invoke("");
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