<?php
ob_start();
session_start();
$_SESSION['admin_id'] == "";
		echo'<script language="javascript">window.location.href="../login.php";</script>';
session_destroy();
?>