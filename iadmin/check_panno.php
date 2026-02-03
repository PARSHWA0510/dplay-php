<?php  error_reporting(0);
session_start();
ob_start();
include('config.php');

$q=$_GET["q"];

if($q != '') 
{ 

if (!preg_match("/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/", $q)) 
{
?>
<span style="color:#dc3545; font-size:11px;">Please enter a valid Pan Number.</span>
<?php }
else
{
?>
<?php 
}
}
?>