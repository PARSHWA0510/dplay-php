<?php  error_reporting(0); session_start(); include('config.php');

$session = rand(11111,99999);


$sport_type = $_REQUEST['sport_type'];
$city = $_REQUEST['city'];
$name = $_REQUEST['name'];


$sport_type_get = $_GET['sport_type'];
if($sport_type_get == '') { $sport_type = $_REQUEST['sport_type']; } else { $sport_type = $sport_type_get; }

$cityx = $_REQUEST['city'];
$city_get = $_GET['city'];

if($cityx == '') { $city = $city_get; } else { $city = $cityx; }

$name = $_REQUEST['name'];


$statement = "user_master,user_sporttype WHERE user_master.user_type = 'coach' and user_master.id = user_sporttype.coach_id ";

		if($city)
		{
			$statement.=" and user_master.city = '$city'";
		}
		
		if($name)
		{
			$statement.=" and user_master.name = '$name'";
		}
		
		if($sport_type)
		{
			$statement.=" and user_sporttype.sport_type = '$sport_type'";
		}
	
 $ures11 = ("SELECT * FROM {$statement} order by join_date desc");
$ure_file11 = mysqli_query($con,$ures11);
while($urow_file11=mysqli_fetch_array($ure_file11))
{   
$coach_id = $urow_file11['coach_id'];
$sql=mysqli_query($con,"INSERT INTO `search_result` (`coach_id`, `session`) VALUES ('$coach_id','$session')");	 
}

//exit();
?>
<script>window.location.href="dplay-coach.php?session=<?php echo $session; ?>"</script>