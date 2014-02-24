<?php
include("../Model/connection.php");
//echo "fffffffffffffffffffffffffffffffffffff";

$myQuery1="select RoleID from role where RoleID='".$_GET['q']."'";
$myResult1=mysql_query($myQuery1);
$row1=mysql_fetch_array($myResult1);

$result = mysql_query("DELETE FROM user_role WHERE RoleID='".$row1['RoleID']."' and UserID='".$_GET['u']."'");

echo $_GET['u'];

?>

<script>
document.getElementById("s").options.length=0;
</script>