<?php
include("../Model/connection.php");
include("../Controller/LoginController.php");

session_unset();
$loginCtrl = new LoginController;
$loginCtrl->checkLogin();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>تسجيل الدخول</title>
</head>
<form name="login" method="post" action="">
		<table width="100%" dir="rtl">
        	<tr style="width:100%;">
				<td>
                	<div> 	
                		<img src="---Images/Head.jpg" id="image" width="100%" height="150" alt="????????" />
                	</div>
               </td>
		    </tr>
          
			<tr style="width:100%" dir="rtl">
            	<td>
                	<table width="100%" dir="rtl">
                    	<tr style="width:100%;">
                       	  <td style="width:25%;" valign="top">
                          	<div>
                            	<?php include 'VisitorMenu.php'; ?>
                          	</div>
                          </td>
                          
                          <td style="width:50%;" valign="top" align="right">
                              أهلا بك في شركة ساعد للتأمين</br>
                              يمكنك الاطلاع على آخر الأخبار والعروض<br />
                              كما يمكنك الاطلاع على الأطباء - الصيدليات - المشافي - الشركات المتعاقدة معنا<br />
                              للاتصال أو الاستفسار:<br />
                              دمشق - 0112223333 
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