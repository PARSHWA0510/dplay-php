<?php session_start();
include('config.php');
$ureurl=mysqli_query($con,"select * from website_url");
$rowurl=mysqli_fetch_array($ureurl);
$siteurl_link = $rowurl['url_link']; 

$_SESSION['user_id'] == "";
echo'<script language="javascript">window.location.href="'.$siteurl_link.'";</script>';
session_destroy();
?>