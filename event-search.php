<?php  error_reporting(0); session_start(); include('config.php'); date_default_timezone_set("Asia/Kolkata");  $todaydatetime = date('Y-m-d H:i:s');

$session = rand(11111,99999);


$city = $_REQUEST['city'];
$name = $_REQUEST['name'];
$category = $_REQUEST['category'];


		$statement = "event_master WHERE id != '0' and ins_datetime >= '$todaydatetime' ";

		if($city)
		{
			$statement.=" and city = '$city'";
		}
		
		if($name)
		{
			$statement.=" and name = '$name'";
		}

		if($category)
		{
			$statement.=" and cat_id = '$category'";
		}
	
echo $ures11 = ("SELECT * FROM {$statement} order by ins_datetime asc");
$ure_file11 = mysqli_query($con,$ures11);
while($urow_file11=mysqli_fetch_array($ure_file11))
{   
$event_id = $urow_file11[0];
$sql=mysqli_query($con,"INSERT INTO `search_result` (`event_id`, `session`) VALUES ('$event_id','$session')");	 
}

//exit();

?>
<script>window.location.href="dplay-events.php?session=<?php echo $session; ?>"</script>