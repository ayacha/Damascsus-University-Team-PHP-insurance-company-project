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
<title>البحث في الزبائن دلاليا</title>

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
                            
                    <td style="width:50%;"  align="center">
                            	<table>
                                    
                                    <tr>
                                    	<td>
                                        اختر الامراض المطلوبة ثم اضغط اضف
                                        </td>
                                        
                                  </tr>
                                    
                                    <tr>
                                   	  <td dir="rtl">
                                      	<select name="DiseaseQadd" id="DiseaseQadd">
                                        <option value="init">--Choose to add to query--</option>
                                        <option value="D">Disease</option>
                                        <option value="D.1">Non-Genetic Disease</option>
                                        <option value="D.1.0">Non-Genetic Cutaneous</option>
                                        <option value="D.1.1">Non-Genetic Internal</option>
                                        <option value="D.1.1.0">Non-Genetic Cordial</option>
                                        <option value="D.1.1.0.0">Infarction</option>
                                        <option value="D.1.1.1">Non-Genetic Respiratory</option>
                                        <option value="D.1.1.1.0">Cold</option>
                                        <option value="D.1.1.2">Non-Genetic Digestive</option>
                                        <option value="D.1.2">Non-Genetic Nervous</option>
                                        <option value="D.1.3">Non-Genetic Psychopathic</option>
                                        <option value="D.1.4">Non-Genetic General</option>

                                        <option value="D.2">Genetic Disease</option>
                                        <option value="D.2.0">Genetic Cutaneous</option>
                                        <option value="D.2.1">Genetic Internal</option>
                                        <option value="D.2.1.0">Genetic Cordial</option>
                                        <option value="D.2.1.1">Genetic Respiratory</option>
                                        <option value="D.2.1.2">Genetic Digestive</option>
                                        <option value="D.2.2">Genetic Nervous</option>
                                        <option value="D.2.3">Genetic Psychopathic</option>
                                        <option value="D.2.4">Genetic General</option>
                                        </select>
                                      </td>
                                      
                                      <td dir="rtl">
                                      	<button value='delete' id='deletebtn' name='deletebtn'>delete</button>
                                      </td>
                                      
                                      <td dir="rtl">
                                      	<select name="DiseaseQrem" id="DiseaseQrem">
                                        <option value="init">--Choose to remove from query--</option></select>
                                      </td>
                                      
<script>


var addSelect = document.getElementById('DiseaseQadd');
var remSelect = document.getElementById('DiseaseQrem');

addSelect.onchange = addQSub;
remSelect.onchange = removeQSub;


function addQSub()
	{
	var xmlhttp;    
//	if (valueSelected=="")
	//  {
	  //document.getElementById("txtHint").innerHTML="";
	  //return;
	  //}
	if (window.XMLHttpRequest)
	  {
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
		xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		//document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
			var text = addSelect.value;
			var objOption = document.createElement("option");
			objOption.text = text;
			objOption.value = text;		
			remSelect.options.add(objOption);	
			
			addSelect.options[addSelect.selectedIndex] = null;
		}
	  }
	xmlhttp.open("GET","ajaxAddQuery.php?v="+addSelect.value,true);
	xmlhttp.send();
}

function removeQSub()
	{
	var xmlhttp;    
//	if (s=="")
	//  {
	  //document.getElementById("txtHint").innerHTML="";
	  //return;
	  //}
	if (window.XMLHttpRequest)
	  {
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
		xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		//document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
			var text = remSelect.value;
			var objOption = document.createElement("option");
			objOption.text = text;
			objOption.value = text;		
			addSelect.options.add(objOption);	
			
			remSelect.options[remSelect.selectedIndex] = null;
		
		}
	  }
	xmlhttp.open("GET","ajaxRemoveQuery.php",true);
	xmlhttp.send();
}


</script>                                      
                                      
                                      
                                      <td>
                                      	<?php
                                            $customer = new Customer;
                                            
                                            echo '<form method="post" action="'. $customer->initSem() .'">';
                                            ?>
                                      		<input type="submit" name="initsem" value="init"/>
                                            <?php
											echo '</form>';
											?>
                                      </td>
                                    </tr>
                                    
                                  <tr>
                                    	<td height="150" width="450" valign="top"  align="center">
                                        	<?php 
											$customer = new Customer;
                                   			 echo '<form method="post" action="'. $customer->showSemanticQueryResult() .'">';
											?>
                                        	<input type="submit" name="showSemanticQResult" value="ابحث"/>
                                            <?php
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