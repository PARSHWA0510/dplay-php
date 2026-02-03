<?php  error_reporting(0);
session_start();
ob_start();
include('config.php');

$q=$_GET["q"];


$ure=mysqli_query($con,"select * from user_master where email1 = '$q'");
$memno=mysqli_num_rows($ure);
if($memno == '0')
{
?>
<!--<span style="color:#009933">Email ID Available</span>-->
<?php } else { ?>
<span style="color:#dc3545; font-size:11px">This email is already registered with Us.</span>
<?php } ?>