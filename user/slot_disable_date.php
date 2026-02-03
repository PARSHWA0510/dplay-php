<?php  error_reporting(0); session_start();
include('../config.php');

$q=$_GET["q"];
$_SESSION['diable_date_session'] = $q;
?>

<label for="">Slot Detail</label>
<?php
$ure=("select * from court_master where id = '$q'");
$ures = mysqli_query($con,$ure);
$urow=mysqli_fetch_array($ures);
$start_time = $urow['start_time'];
$end_time = $urow['end_time'];
$time_slot = $urow['time_slot'];

$start = new DateTime($start_time); // Start time
$end = new DateTime($end_time);   // End time
$interval = new DateInterval('PT'.$time_slot.'M'); // 1-hour interval (PT1H = Period Time 1 Hour)

$period = new DatePeriod($start, $interval, $end); // End is *exclusive*

?>
<table border="1" width="100%">
  <thead>
    <tr>
      <th>Slot Timing</th>
      <th>Weekday Slot Pricing</th>
      <th>Weekend Slot Pricing</th>
      <th>No of Booking Allowed</th>
      <th>Weekday Slot Status</th>
      <th>Weekend Slot Status</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($period as $time) 
	{ 
	/*$st = $time->format("H:i");
	$et = $time->add($interval)->format("H:i");
	*/?>
    <tr>
      <td class="padding"><?php echo $slot_timing = $time->format("H:i") . " - " . $time->add($interval)->format("H:i"); ?>
        <input type="hidden" name="slot_timing[]" class="form-control" style="width:100px" value="<?php echo $slot_timing; ?>">
        <input type="hidden" name="slot_start_time[]" class="form-control" style="width:100px" value="<?php echo substr($slot_timing, 0, 5); ?>:00">
        <input type="hidden" name="slot_end_time[]" class="form-control" style="width:100px" value="<?php echo substr($slot_timing, 8, 5); ?>:00">
      </td>
      <?php 
			$urex=mysqli_query($con,"select * from court_slot where court_id = '$q' and slot_timing = '$slot_timing'");
			$urowx=mysqli_fetch_array($urex); ?>
      <input type="hidden" name="slot_id[]" class="form-control" style="width:100px" value="<?php echo $urowx[0]; ?>">
      <td class="padding"><input type="number" name="weeekday_slot_price[]" class="form-control" style="width:100px" value="<?php echo $urowx['weeekday_slot_price']; ?>"></td>
      <td class="padding"><input type="number" name="weeekend_slot_price[]" class="form-control" style="width:100px" value="<?php echo $urowx['weeekend_slot_price']; ?>"></td>
      <td class="padding"><input type="number" name="noof_booking[]" class="form-control" style="width:100px" value="<?php echo $urowx['noof_booking']; ?>"></td>
      <td class="padding"><select name="weeekday_slot_status[]" class="form-control">
          <option value="1" <?php if($urowx['weeekday_slot_status'] == '1') echo 'selected="selected"';?>>Yes</option>
          <option value="0" <?php if($urowx['weeekday_slot_status'] == '0') echo 'selected="selected"';?>s>No</option>
        </select>
      </td>
      <td class="padding"><select name="weeekend_slot_status[]" class="form-control">
          <option value="1" <?php if($urowx['weeekend_slot_status'] == '1') echo 'selected="selected"';?>>Yes</option>
          <option value="0" <?php if($urowx['weeekend_slot_status'] == '0') echo 'selected="selected"';?>>No</option>
        </select>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
