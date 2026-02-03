<?php  error_reporting(0); session_start();
include('../config.php');

$q=$_GET["q"];
?>

<select class="form-control select2" name="equipment_id" onChange="showUser2(this.value)">
  <option value="">Please Select</option>
  <?php 
	$ures=mysqli_query($con,"select * from equipment_master where status = '1' and venue_id = '$q' order by name asc");
	while($urows=mysqli_fetch_array($ures))
	{ ?>
  <option value="<?php echo $urows[0]; ?>"><?php echo $urows['name']; ?></option>
  <?php } ?>
</select>
