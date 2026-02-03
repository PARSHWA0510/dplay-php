<?php  error_reporting(0); session_start(); include('config.php');

$session = rand(11111,99999);

$blog_category_get = $_GET['blog_category'];
if($blog_category_get == '') { $blog_category = $_REQUEST['blog_category']; } else { $blog_category = $blog_category_get; }

$name = $_REQUEST['name'];

$ures11=("select * from blog_master where cat_id = '$blog_category'");
$ure_file11 = mysqli_query($con,$ures11);
while($urow_file11=mysqli_fetch_array($ure_file11))
{   
$blog_id = $urow_file11[0];
$sql=mysqli_query($con,"INSERT INTO `search_result` (`blog_id`, `session`) VALUES ('$blog_id','$session')");	 
}

$ures11=("select * from blog_master where name = '$name'");
$ure_file11 = mysqli_query($con,$ures11);
while($urow_file11=mysqli_fetch_array($ure_file11))
{   
$blog_id = $urow_file11[0];
$sql=mysqli_query($con,"INSERT INTO `search_result` (`blog_id`, `session`) VALUES ('$blog_id','$session')");	 
}

?>
<script>window.location.href="blog.php?session=<?php echo $session; ?>"</script>