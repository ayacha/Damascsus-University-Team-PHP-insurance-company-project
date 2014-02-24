<?php
include("../Model/connection.php");
include("../Controller/LoginController.php");

$loginCtrl = new LoginController;
$loginCtrl->checkIfLogged();


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>الإدارة</title>

</head>
<body>
	
    	<form name="Manage" method="post" action="" dir="rtl">
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
                       	  <td style="width:25%;">
                          	<div>
                            	<?php
								if (isset($_SESSION['role']) && ($_SESSION['role']=="Administrator"))
									include 'AdminMenu.php';
								else
									include 'VisitorMenu.php';
								?>
                          	</div>
                          </td>
                          
                          <td style="width:50%;" valign="top" align="center">
                          	<h1>
                          	أهلا بك حضرة المدير
                            </h1>
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