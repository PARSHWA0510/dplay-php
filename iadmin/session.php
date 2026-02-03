<?php  session_start();
error_reporting(0);
include('config.php');


$_SESSION['name'] = 'Super Admin';
$_SESSION['admin_id'] = '1';
$_SESSION['company_id'] = '1';
$_SESSION['user_type'] = 'admin';
$_SESSION['year_range'] = '2025-26';

?>	
<script language="javascript">window.location.href="dashboard.php";</script>
	