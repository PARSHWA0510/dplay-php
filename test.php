<?php include('config.php');
date_default_timezone_set('Asia/Kolkata');
$datetime1 = new DateTime();  
$datetime2 = new DateTime("2025-09-30 17:55:00");

// Calculate difference
$interval = $datetime1->diff($datetime2);

// Total hours (including days converted to hours)
$totalHours = ($interval->days * 24) + $interval->h + ($interval->i / 60);

// Output
echo "Difference in hours: " . $totalHours;


/*$ure=mysqli_query($con,"select * from coach_batch_date where batch_id = '3'");
while($urow=mysqli_fetch_array($ure))
{	
$id = $urow[0];
echo $batch_date = $urow['batch_date'];
echo $batch_day = date("l", strtotime($batch_date));
echo '<br/>';
$uupQry="UPDATE coach_batch_date SET `batch_day` = '$batch_day' WHERE id='$id'";
$uuresult=mysqli_query($con,$uupQry);
}
*/
?>
