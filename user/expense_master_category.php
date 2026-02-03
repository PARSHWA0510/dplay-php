<?php  error_reporting(0); session_start();
include('../config.php');

$q=$_GET["q"];
?>

<select class="form-control select2" name="expensetype_id">
  <option value="">Please Select</option>
  <?php 
	$ures=mysqli_query($con,"select * from expense_category where status = '1' and venue_id = '$q' order by name asc");
	while($urows=mysqli_fetch_array($ures))
	{ ?>
  <option value="<?php echo $urows[0]; ?>" <?php if($urows[0] == $urow['expensetype_id']) echo 'selected="selected"';?>><?php echo $urows['name']; ?></option>
  <?php } ?>
</select>
