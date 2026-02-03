<?php  error_reporting(0);
session_start();
ob_start();
include('config.php');

$q=$_GET["q"];

if($q != '') 
{ 
if(preg_match("/^\d+\.?\d*$/",$q) && strlen($q)==12)
{
}
else
{
?>
<span style="color:#dc3545; font-size:11px;">Please enter a valid 12 digit Aadhar number.</span>
<?php 
}
}
?>