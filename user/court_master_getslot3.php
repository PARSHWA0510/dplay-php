<?php  error_reporting(0); session_start();
include('../config.php');

$q=$_GET["q"];
$start_time = $_SESSION['start_time'];
$end_time = $_SESSION['end_time'];
?>
<style>
.padding {
	padding:3px;
}
</style>
<label for="">Slot Detail</label>
<?php

$start = new DateTime($start_time); // Start time
$end = new DateTime($end_time);   // End time
//$interval = new DateInterval('PT'.$q.'H'); // 1-hour interval (PT1H = Period Time 1 Hour)
$interval = new DateInterval('PT'.$q.'M'); // 1-hour interval (PT1H = Period Time 1 Hour)


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
      <td class="padding"><input type="number" name="weeekday_slot_price[]" class="form-control" style="width:100px" value="<?php echo $urowx['weeekday_slot_price']; ?>"></td>
      <td class="padding"><input type="number" name="weeekend_slot_price[]" class="form-control" style="width:100px" value="<?php echo $urowx['weeekend_slot_price']; ?>"></td>
      <td class="padding"><input type="number" name="noof_booking[]" class="form-control" style="width:100px" value="1"></td>
      <td class="padding"><select name="weeekday_slot_status[]" class="form-control">
          <option value="1">Yes</option>
          <option value="0">No</option>
        </select>
      </td>
      <td class="padding"><select name="weeekend_slot_status[]" class="form-control">
          <option value="1">Yes</option>
          <option value="0">No</option>
        </select>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
