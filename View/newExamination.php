<?php
include("../Model/connection.php");
include("../Controller/LoginController.php");
include("../Model/Treatment.php");

$loginCtrl = new LoginController;
$loginCtrl->checkIfLogged();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>فحص جديد</title>



</head>

<body>
    	<form name="newExamination" method="post" action="" dir="rtl">
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
                    	    				<h1>معاينة جديدة للزبون <?php echo $_GET['cName']; ?></h1>
                    	  				</div>
                                    </td>
                                </tr>
                                
                                
                                	  <tr style="width:100%;">
                                        <td>
                                            <table  width="100%" dir="rtl">
                                                <tr>
                                                  <td style="width:25%;"></td>
                                                  <td style="width:50%;">
                        
                                                        <?php
                                                        $treatment = new Treatment;
                                                        
                                                        echo '<form method="post" action="'. $treatment->addTreatment() .'">';
                                                        ?>
                                                                    
                                                       <table width="314">
                                                            <tr>
                                                                <td width="85">تاريخ المعاينة</td>
                                                                <td width="178">
                                                                    ajaaaaaaaaax*
                                                                </td>
                                                            </tr>
                        
                                                            <tr>
                                                                <td>
                                                                        نوع المعاينة
                                                                </td>
                                                                <td>
                                                                    معالجة
                                                                      <input type="radio" name="Type" value="0" checked="checked"/>
                                                                    مراجعة
                                                                    <input type="radio" name="Type" value="1" />*
                                                                </td>
                                                            </tr>
                        
                                                            <tr>
                                                              <td>تشخيص المرض</td>
                                                              <td><input name="Sickness" type="text" /></td>
                                                            </tr>
                        
                                                            <tr>
                                                              <td>الأدوية الموصوفة</td>
                                                              <td><input name="Medicines" type="text" /></td>
                                                            </tr>
                        
                                                            <tr>
                                                                <td>
                                                                       إحالة 
                                                                </td>
                                                                <td>
                                                                    نعم
                                                                      <input type="radio" name="Trans" value="0" checked="checked"/>
                                                                    لا
                                                                    <input type="radio" name="Trans" value="1" />*
                                                                </td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td>
                                                                          دفعة 
                                                                </td>
                                                                <td>
                                                                    <input name="Payment" type="text" /></td>
                                                            </tr>
                                                        </table> 
                        
                                                            <input name="addTreatment" type="submit" value="إضافة" />
                                                            <?php echo '</form'; ?>
                                                                            
                                                  </td>
                                                  <td style="width:25%;"></td>
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