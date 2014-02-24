<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/HW/Model/User.php";
include_once($path);

//include $_SERVER['BASE_PATH'].'/HW/Model/User.php';
//include("Model/User.php");

class LoginController
{
    public function __construct() 
    {
    }
    
    public function checkLogin() 
    {
		if (isset($_POST['submit']))
		{
			$user = new User;
			$role = $user->getRole();
			if ($role)
			{	
				$_SESSION['role'] = $role;
				$_SESSION['login']="OK";
				$_SESSION['user']=$_POST['userName'];
				header("Location: http://localhost/HW/View/Home.php");
			}
			else
			{
				//header("Location: http://localhost/HW/connection.php");
				?><div dir="rtl">
				<?php
					$_SESSION['Fail']="OK";
					//echo "خطأ في اسم المستخدم أو كلمة السر";
				?>
				</div>
				<?php
				//exit();
			}
		}
		if(isset($_SESSION['logout']))
		{
				//<div dir="rtl">
				//<h2>
				//<?php echo "تم تسجيل الخروج بنجاح";
				//</h2>
				//</div>
				//<?php
			session_destroy();
		}		
    } 
	
	public function getMenu() 
    {
		$path = $_SERVER['DOCUMENT_ROOT'];
		if (isset($_SESSION['role']) && ($_SESSION['role']=="Administrator"))
		{
			$path .= "/HW/View/AdminMenu.php";
			include_once($path);
		}
		else
		{
			if (isset($_SESSION['role']) && ($_SESSION['role']!="Administrator"))
			{
				$path .= "/HW/View/UserMenu.php";
				include_once($path);
			}
			else
			{
				$path .= "/HW/View/VisitorMenu.php";
				include_once($path);
			}
		}
	}
	
	
	public function checkIfLogged() 
    {
		if (!isset($_SESSION['login']))
		{
			?><div dir="rtl">
				<?php 
				//echo "Access Denied";
				header("Location: http://localhost/HW/View/Login.php");
				?>
				</div>
				<?php
			exit();
		}		
	}
	
	public function LoggedOrNot() 
    {
		if (isset($_SESSION['login']))
		{
			//$_SESSION['logout']="OK";
			echo '<link href="---CSS/Loggedin.css" rel="stylesheet" type="text/css" />';
			echo '<link href="../---CSS/Loggedin.css" rel="stylesheet" type="text/css" />';
			echo '<div id="css_horizontal_menuL" align="center">';
			echo		'<a href="http://localhost/HW/View/Login.php" >تسجيل الخروج ('.htmlspecialchars($_SESSION['user']).')</a>';
			echo '</div>';
		}
		else
			{
				?>
                	<table>
                                    <tr style="width:100%;">
                                    
                                        <td style="width:25%;">
                                            اسم المستخدم
                                        </td>
                                        
                                        <td style="width:25%;">
                                            <input type="text" name="userName" /><br/>
                                        </td>
                                        
                                        <td style="width:50%;">
                                        	<div align="left">
                                                <a href="---RSS/rss.xml">
                                                <img src="---Images/rss.jpg" width="14" height="14">
                                                </a>
                                            </div>
                                            <?php
											//$path = $_SERVER['DOCUMENT_ROOT'];
											//$path1 =$path. "/HW/View/---RSS/rss.xml";
											//$path2 =$path. "/HW/View/---Images/rss.jpg";
                                        	//echo '<div align="left">';
                                            //echo    '<a href='.$path1.'>';
                                            //echo    '<img s/rc='.$path2.' width="14" height="14">';
                                            //echo   '</a>';
                                            //echo '</div>';
											?>
                                        </td>
                                    </tr>
                                    
                                    <tr style="width:100%;">

                                        <td style="width:25%;">
                                            كلمة المرور
                                        </td>
                                        
                                        <td style="width:25%;">
                                            <input type="password" name="password" /><br/>
                                        </td>
                                        
                                        <td style="width:50%;">
                                        </td>
                                    </tr>
                                    
                                    <tr style="width:100%;">

                                        <td style="width:25%;">         
                                        </td>
                                        
                                        <td style="width:25%;">
                                            <input type="submit" name="submit" value="دخول" />
                                        </td>
                                        
                                        <td style="width:50%;">        
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                    	<td style="width:25%;">         
                                        </td>
                                        
                                        <td style="width:25%;">
                                            <?php
												if (isset($_SESSION['Fail']) && $_SESSION['Fail']=="OK")
												{
													echo "خطأ في اسم المستخدم أو كلمة المرور...";
													$_SESSION['Fail']="notOK";
												}
											?>
                                        </td>
                                        
                                        <td style="width:50%;">        
                                        </td>
                                    </tr>
                                </table>
                
                <?php
			}
	}
}
?>





