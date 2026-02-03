<?php  error_reporting(0); session_start(); include('config.php');

$session = rand(11111,99999);

$sport_type_get = $_GET['sport_type'];
if($sport_type_get == '') { $sport_type = $_REQUEST['sport_type']; } else { $sport_type = $sport_type_get; }

$cityx = $_REQUEST['city'];
$city_get = $_GET['city'];

if($cityx == '') { $city = $city_get; } else { $city = $cityx; }

$name = $_REQUEST['name'];


$statement = "venue_master,venue_sporttype WHERE venue_master.id = venue_sporttype.venue_id ";

		if($city)
		{
			$statement.=" and venue_master.city = '$city'";
		}
		
		if($name)
		{
			$statement.=" and venue_master.name = '$name'";
		}
		if($sport_type)
		{
			$statement.=" and venue_sporttype.sport_type = '$sport_type'";
		}
	
$ures11 = ("SELECT * FROM {$statement} order by ins_datetime desc");
$ure_file11 = mysqli_query($con,$ures11);
while($urow_file11=mysqli_fetch_array($ure_file11))
{   
$venue_id = $urow_file11['venue_id'];
$sql=mysqli_query($con,"INSERT INTO `search_result` (`venue_id`, `session`) VALUES ('$venue_id','$session')");	 
}

//exit();

?>
<script>window.location.href="dplay-venue.php?session=<?php echo $session; ?>"</script>