<?php session_start();
$q=$_GET["q"];
include "../config.php";  date_default_timezone_set('Asia/Kolkata');


$s1 = str_replace(' ', '-', $q); 
$s2 = str_replace('&', '', $s1); 
$s3 = str_replace('.', '', $s2); 
$s4 = str_replace('?', '', $s3); 
$s5 = str_replace(':', '', $s4); 
$string = strtolower($s5);		
?>
<input type="text" name="seo_url" value="<?php echo $string; ?>" required class="form-control">