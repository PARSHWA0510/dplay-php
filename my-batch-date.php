<?php session_start();
$q=$_GET["q"];
include "config.php";  date_default_timezone_set('Asia/Kolkata');

?>

<input type="date" class="form-control" name="end_date" min="<?php echo $q; ?>" required>