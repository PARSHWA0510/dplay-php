<?php  error_reporting(0);
session_start();
ob_start();
include('config.php');

$q=$_GET["q"];

if($q != '')
{ 
if(preg_match("/^\d+\.?\d*$/",$q) && strlen($q)==10)
{
}
else
{
?>
<span style="color:#dc3545; font-size:11px;">Please enter a valid 10 digit phone number.</span>
<?php 
}
}
$ure=mysqli_query($con,"select * from user_master where contact1 = '$q'");
$memno=mysqli_num_rows($ure);
if($memno == '0')
{
?>
<!--<span style="color:#009933">Mobile No Available</span>-->
<?php } else { ?>
<span style="color:#dc3545; font-size:11px;">This phone number is already registered with Us.</span>
<?php } ?>