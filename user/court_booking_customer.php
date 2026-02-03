<?php  error_reporting(0); session_start();
include('../config.php');

$q=$_GET["q"];
?>

  <?php 
	$ures=("select * from user_master where contact1 = '$q'");
	$uresx = mysqli_query($con,$ures);
	$urows=mysqli_fetch_array($uresx);
	?>
<input class="form-control"   required value="<?php echo $urows['email1']; ?>" name="email1" type="text">