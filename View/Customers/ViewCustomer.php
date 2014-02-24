<?php
include("../../Model/connection.php");
include("../../Model/CustomerClass.php");
include("../../Controller/CustomerController.php");
include("../../Controller/LoginController.php");

$loginCtrl = new LoginController;
$loginCtrl->checkLogin();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>استعراض زبون</title>
<link href="../---CSS/Customer.css" rel="stylesheet" type="text/css" />
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
                                        	استعراض زبون 
                                        </td>

                                  </tr>
                                  
                                  <tr>
                                    	<td>
                                        	<?php
												$ID=$_REQUEST['ID'];
												$viewCustomer =new CustomerView;
												$viewCustomer->showCustomerInfo($ID);
                                             ?>
                                                </td>
                                            </tr>
                                            
                                        </table>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                        <td align="center">
                                        <?php
                                        	if (isset($_SESSION['role']) && ($_SESSION['role']=="Administrator"))
											{
												echo '<div id="css_horizontal_menuC">';
												echo    '<a href="CustomerTreatments.php?ID='.$ID.'">المعالجات</a>';
												echo    '<a href="CustomerMedications.php?ID='.$ID.'">المداواة</a>';
												echo    '<a href="CustomerOperations.php?ID='.$ID.'">العمليات</a>';
												echo '</div>'; 
											}
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