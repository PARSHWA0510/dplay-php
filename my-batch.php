<?php  error_reporting(0); session_start(); include('config.php'); ?>
<?php $user_id = $_SESSION['user_id']; if($user_id == '') { ?>
<script>window.location.href="index.php";</script>
<?php } ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
$logoaddp=mysqli_query($con,"select * from company_master");
$logoaddsp=mysqli_fetch_array($logoaddp);
echo $google_analytic_code = $logoaddsp['google_analytic_code'];
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<?php
$seo1 = mysqli_query($con,"SELECT * FROM seo_master WHERE page_name = 'My Batch'");
$seo2 = mysqli_fetch_array($seo1);
?>
<title><?php echo $seo2['seo_title']; ?></title>
<meta name="keywords" content="<?php echo $seo2['seo_keyword']; ?>">
<meta name="description" content="<?php echo $seo2['seo_description']; ?>">
<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
<!-- Fancybox CSS -->
<link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">
<!-- Select CSS -->
<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
<!-- Feathericon CSS -->
<link rel="stylesheet" href="assets/css/feather.css">
<!-- Main CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<script type="text/javascript">
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","my-batch-date.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>
<!-- Main Wrapper -->
<div class="main-wrapper">
  <!-- Header -->
  <?php include 'header.php' ?>
  <!-- /Header -->
  <!-- Breadcrumb -->
  <section class="breadcrumb breadcrumb-list mb-0"> <span class="primary-right-round"></span>
    <div class="container">
      <h1 class="text-white">My Batch</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li>My Batch</li>
      </ul>
    </div>
  </section>
  <!-- /Breadcrumb -->
  <!-- Dashboard Menu -->
  <div class="dashboard-section coach-dash-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="dashboard-menu coaurt-menu-dash">
            <?php include 'user_menu.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Dashboard Menu -->
  <div class="content court-bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="profile-detail-group">
            <div class="card ">
              <?php 
			$batch_id = $_GET['bid'];
			$urez=mysqli_query($con,"select * from coach_batch where id = '$batch_id'");
			$urowz=mysqli_fetch_array($urez);  ?>
              <form autocomplete="off"  name="form" method="post" enctype="multipart/form-data" onSubmit="return validateForm()">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="input-space">
                      <label for="name" class="form-label">Batch Name</label>
                      <input type="text" class="form-control"  name="name" value="<?php echo $urowz['name']; ?>" required>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="input-space">
                      <label for="name" class="form-label">No of Session</label>
                      <input type="text" class="form-control"  name="noof_session" value="<?php echo $urowz['noof_session']; ?>" required>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="input-space">
                      <label for="name" class="form-label">Batch Fees</label>
                      <input type="text" class="form-control"  name="amount" value="<?php echo $urowz['amount']; ?>" required>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="input-space">
                      <label for="name" class="form-label">Batch Start Date</label>
                      <input type="date" class="form-control" name="start_date" onChange="showUser(this.value)" value="<?php echo $urowz['start_date']; ?>"  required>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="input-space">
                      <label for="name" class="form-label">Batch End Date</label>
                      <span id="txtHint"><input type="date" class="form-control" name="end_date" value="<?php echo $urowz['end_date']; ?>"  required></span>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="input-space">
                      <label for="name" class="form-label">Batch Start Time</label>
                      <input type="time" class="form-control" name="start_time" value="<?php echo $urowz['start_time']; ?>"  required>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="input-space">
                      <label for="name" class="form-label">Batch End Time</label>
                      <input type="time" class="form-control" name="end_time" value="<?php echo $urowz['end_time']; ?>"  required>
                    </div>
                  </div>
                  <div class="col-lg-9 col-md-6">
                    <div class="input-space">
                      <label for="name" class="form-label">Schedule for Days</label>
                      <br/>
                      <?php 
					  $urezx=mysqli_query($con,"select * from coach_batch_date where batch_id = '$batch_id' and batch_day = 'Monday'");
					  $urowzx=mysqli_num_rows($urezx);  ?>
                      <input type="checkbox" value="Monday"  name="days[]" <?php if($urowzx > '1') echo 'checked="checked"';?>>
                      &nbsp;Monday&nbsp;
                      <?php 
					  $urezx=mysqli_query($con,"select * from coach_batch_date where batch_id = '$batch_id' and batch_day = 'Tuesday'");
					  $urowzx=mysqli_num_rows($urezx);  ?>
                      <input type="checkbox" value="Tuesday"  name="days[]" <?php if($urowzx > '1') echo 'checked="checked"';?>>
                      &nbsp;Tuesday&nbsp;
                      <?php 
					  $urezx=mysqli_query($con,"select * from coach_batch_date where batch_id = '$batch_id' and batch_day = 'Wednesday'");
					  $urowzx=mysqli_num_rows($urezx);  ?>
                      <input type="checkbox" value="Wednesday"  name="days[]" <?php if($urowzx > '1') echo 'checked="checked"';?>>
                      &nbsp;Wednesday&nbsp;
                      <?php 
					  $urezx=mysqli_query($con,"select * from coach_batch_date where batch_id = '$batch_id' and batch_day = 'Thursday'");
					  $urowzx=mysqli_num_rows($urezx);  ?>
                      <input type="checkbox" value="Thursday"  name="days[]" <?php if($urowzx > '1') echo 'checked="checked"';?>>
                      &nbsp;Thursday&nbsp;
                      <?php 
					  $urezx=mysqli_query($con,"select * from coach_batch_date where batch_id = '$batch_id' and batch_day = 'Friday'");
					  $urowzx=mysqli_num_rows($urezx);  ?>
                      <input type="checkbox" value="Friday"  name="days[]" <?php if($urowzx > '1') echo 'checked="checked"';?>>
                      &nbsp;Friday&nbsp;
                      <?php 
					  $urezx=mysqli_query($con,"select * from coach_batch_date where batch_id = '$batch_id' and batch_day = 'Saturday'");
					  $urowzx=mysqli_num_rows($urezx);  ?>
                      <input type="checkbox" value="Saturday"  name="days[]" <?php if($urowzx > '1') echo 'checked="checked"';?>>
                      &nbsp;Saturday&nbsp;
                      <?php 
					  $urezx=mysqli_query($con,"select * from coach_batch_date where batch_id = '$batch_id' and batch_day = 'Sunday'");
					  $urowzx=mysqli_num_rows($urezx);  ?>
                      <input type="checkbox" value="Sunday"  name="days[]" <?php if($urowzx > '1') echo 'checked="checked"';?>>
                      &nbsp;Sunday&nbsp; </div>
                  </div>
                </div>
                <div class="save-changes">
                  <?php if($batch_id) { ?>
                  <input type="submit"  class="btn btn-secondary save-profile" name="update" value="Update Batch">
                  <?php } else { ?>
                  <input type="submit"  class="btn btn-secondary save-profile" name="insert" value="Insert Batch">
                  <?php } ?>
                </div>
              </form>
              <?php 
if ($_POST['insert']) 
{
    $sql=("INSERT INTO `coach_batch` (`name`, `start_date`, `end_date`, `amount`, `mon`, `tue`, `wed`, `thr`, `fri`, `sat`, `sun`, `noof_session`, `start_time`, `end_time`, `coach_id`) VALUES ('".mysqli_real_escape_string($con,$_REQUEST['name'])."', '".mysqli_real_escape_string($con,$_REQUEST['start_date'])."', '".mysqli_real_escape_string($con,$_REQUEST['end_date'])."', '".mysqli_real_escape_string($con,$_REQUEST['amount'])."', '".mysqli_real_escape_string($con,$_REQUEST['mon'])."', '".mysqli_real_escape_string($con,$_REQUEST['tue'])."', '".mysqli_real_escape_string($con,$_REQUEST['wed'])."', '".mysqli_real_escape_string($con,$_REQUEST['thr'])."', '".mysqli_real_escape_string($con,$_REQUEST['fri'])."', '".mysqli_real_escape_string($con,$_REQUEST['sat'])."', '".mysqli_real_escape_string($con,$_REQUEST['sun'])."', '".mysqli_real_escape_string($con,$_REQUEST['noof_session'])."', '".mysqli_real_escape_string($con,$_REQUEST['start_time'])."', '".mysqli_real_escape_string($con,$_REQUEST['end_time'])."', '$user_id')");	 
 
$z = mysqli_query($con,$sql);
$batch_id = mysqli_insert_id($con);


    $noof_session = $_POST['noof_session'];
    $start_date = $_POST['start_date'];
    $end_date   = $_POST['end_date'];
    $days       = isset($_POST['days']) ? $_POST['days'] : [];

    if ($start_date && $end_date && !empty($days)) {
        $start = new DateTime($start_date);
        $end   = new DateTime($end_date);
        $end   = $end->modify('+1 day');

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($start, $interval, $end);

        echo "<h3>Selected Dates:</h3>";
        foreach ($daterange as $date) {
            if (in_array($date->format("l"), $days)) {
                $batch_date = $date->format("Y-m-d");

    $sql=("INSERT INTO `coach_batch_date` (`batch_id`, `batch_date`, `batch_day`) VALUES ('$batch_id','$batch_date','')");	 
 	$z = mysqli_query($con,$sql);
            }
        }
    } 

$ure=mysqli_query($con,"select * from coach_batch_date where batch_id = '$batch_id' limit ".$noof_session.",100");
while($urow=mysqli_fetch_array($ure))
{	
$id = $urow[0];

$delete = "DELETE FROM coach_batch_date WHERE id = '$id'";
mysqli_query($con, $delete);
}

$ure=mysqli_query($con,"select * from coach_batch_date where batch_id = '$batch_id'");
while($urow=mysqli_fetch_array($ure))
{	
$id = $urow[0];
$batch_date = $urow['batch_date'];
$batch_day = date("l", strtotime($batch_date));

$uupQry="UPDATE coach_batch_date SET `batch_day` = '$batch_day' WHERE id='$id'";
$uuresult=mysqli_query($con,$uupQry);
}
//exit();
?>
              <script>alert('Batch Created Successfully');</script>
              <script language="javascript">window.location.href="my-batch.php";</script>
              <?php 
} 

	$batch_id = $_GET['bid'];

	if(isset($_REQUEST['update'])) 
  	{
  
	  $uupQry="UPDATE coach_batch SET `name` = '".mysqli_real_escape_string($con,$_REQUEST['name'])."', `start_date` = '".mysqli_real_escape_string($con,$_REQUEST['start_date'])."', `end_date` = '".mysqli_real_escape_string($con,$_REQUEST['end_date'])."', `amount` = '".mysqli_real_escape_string($con,$_REQUEST['amount'])."', `noof_session` = '".mysqli_real_escape_string($con,$_REQUEST['noof_session'])."', `start_time` = '".mysqli_real_escape_string($con,$_REQUEST['start_time'])."', `end_time` = '".mysqli_real_escape_string($con,$_REQUEST['end_time'])."' WHERE id='$batch_id'";
	$uuresult=mysqli_query($con,$uupQry);

$delete = "DELETE FROM coach_batch_date WHERE batch_id = '$batch_id'";
mysqli_query($con, $delete);

	$noof_session = $_POST['noof_session'];
    $start_date = $_POST['start_date'];
    $end_date   = $_POST['end_date'];
    $days       = isset($_POST['days']) ? $_POST['days'] : [];

    if ($start_date && $end_date && !empty($days)) {
        $start = new DateTime($start_date);
        $end   = new DateTime($end_date);
        $end   = $end->modify('+1 day');

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($start, $interval, $end);

        echo "<h3>Selected Dates:</h3>";
        foreach ($daterange as $date) {
            if (in_array($date->format("l"), $days)) {
                $batch_date = $date->format("Y-m-d");

    $sql=("INSERT INTO `coach_batch_date` (`batch_id`, `batch_date`, `batch_day`) VALUES ('$batch_id','$batch_date','')");	 
 	$z = mysqli_query($con,$sql);
            }
        }
    } 

$ure=mysqli_query($con,"select * from coach_batch_date where batch_id = '$batch_id' limit ".$noof_session.",100");
while($urow=mysqli_fetch_array($ure))
{	
$id = $urow[0];

$delete = "DELETE FROM coach_batch_date WHERE id = '$id'";
mysqli_query($con, $delete);
}

$ure=mysqli_query($con,"select * from coach_batch_date where batch_id = '$batch_id'");
while($urow=mysqli_fetch_array($ure))
{	
$id = $urow[0];
$batch_date = $urow['batch_date'];
$batch_day = date("l", strtotime($batch_date));

$uupQry="UPDATE coach_batch_date SET `batch_day` = '$batch_day' WHERE id='$id'";
$uuresult=mysqli_query($con,$uupQry);
}

 // exit();
	?>
              <script>alert('Batch Updated Successfully');</script>
              <script language="javascript">window.location.href="my-batch.php";</script>
              <?php  } ?>
            </div>
          </div>
        </div>
      </div>
<style>.btn-mini { font-size:12px !important; padding:5px !important; } </style>
      <div class="row">
        <div class="col-sm-12">
          <div class="court-tab-content">
            <div class="card card-tableset">
              <div class="card-body">
                <div class="table-responsive">
                  <center>
                    <h4>Upcoming Batch</h4>
                  </center>
                  <table class="table table-borderless">
                    <thead class="thead-light">
                      <tr>
                        <th>Batch </th>
                        <th>Fees </th>
                        <th>Date </th>
                        <th>Time </th>
                        <th>Days</th>
                        <th>Attendance</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php		
					 	$daylen = 60*60*24;
   						$cur_date = date('Y-m-d'); 
						$ureee=("select * from coach_batch where coach_id = '$user_id' and start_date >= '$cur_date' order by start_date asc");
						$uree = mysqli_query($con,$ureee);
						while($uroww=mysqli_fetch_array($uree))
						{  ?>
                      <tr class="showtr">
                        <td><?php echo $uroww['name']; ?><br/>
                          No of Session : <?php echo $uroww['noof_session']; ?></td>
                        <td><?php echo $uroww['amount']; ?></td>
                        <td><?php echo date("d-m-Y", strtotime($uroww['start_date'])); ?> <br/>
                          <?php echo date("d-m-Y", strtotime($uroww['end_date'])); ?> </td>
                        <td><?php echo date("h:i A", strtotime($uroww['start_time'])); ?> <br/>
                          <?php echo date("h:i A", strtotime($uroww['end_time'])); ?> </td>
                        <td><?php $coach_batch_id = $uroww[0];
						$urebd=mysqli_query($con,"select * from coach_batch_date where batch_id = '$coach_batch_id' group by batch_day order by batch_date asc");
						while($urowbd=mysqli_fetch_array($urebd)) { ?>
                          <span class="btn btn-mini btn-primary" style="padding:2px; font-size:11px"><?php echo $urowbd['batch_day']; ?></span>&nbsp;
                          <?php } ?></td>
                        <td><a href="my-batch-attendance.php?bid=<?php echo $uroww[0]; ?>" class="btn btn-danger btn-mini"><i class="feather-edit me-2"></i>Attendance</a></td>
                        <td><a href="my-batch.php?bid=<?php echo $uroww[0]; ?>" class="btn btn-success btn-mini"><i class="feather-edit me-2"></i>Edit</a></td>
                        <td><?php echo "<a href='#'  class='btn btn-danger btn-mini' title='Delete' onclick='del(this,$uroww[0])'>" ?><i class="feather-delete me-2"></i>Delete</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <script language="javascript">
function del(obj,id)
{
        if(confirm("Are You Sure To Delete ?"))
        {
            obj.href="my-batch.php?id="+id;
        }
    
}
</script>
                  <?php
if(isset($_GET['id']))
	{
		 
		$dusr="delete from coach_batch where id=$_GET[id]";
		$dre=mysqli_query($con,$dusr);

		$dusr="delete from coach_batch_date where batch_id=$_GET[id]";
		$dre=mysqli_query($con,$dusr);

?>
                  <script language="javascript">window.location.href="my-batch.php";</script>
                  <?php		
	}
	?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-12">
          <div class="court-tab-content">
            <div class="card card-tableset">
              <div class="card-body">
                <div class="table-responsive">
                  <center>
                    <h4>Running Batch</h4>
                  </center>
                  <table class="table table-borderless">
                    <thead class="thead-light">
                      <tr>
                        <th>Batch </th>
                        <th>Fees </th>
                        <th>Date </th>
                        <th>Time </th>
                        <th>Days</th>
                        <th>Attendance</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php		
					 	$daylen = 60*60*24;
   						$cur_date = date('Y-m-d'); 
						$ureee=("select * from coach_batch where coach_id = '$user_id' and start_date <= '$cur_date' and end_date >= '$cur_date' order by start_date asc");
						$uree = mysqli_query($con,$ureee);
						while($uroww=mysqli_fetch_array($uree))
						{  ?>
                      <tr class="showtr">
                        <td><?php echo $uroww['name']; ?><br/>
                          No of Session : <?php echo $uroww['noof_session']; ?></td>
                        <td><?php echo $uroww['amount']; ?></td>
                        <td><?php echo date("d-m-Y", strtotime($uroww['start_date'])); ?> <br/>
                          <?php echo date("d-m-Y", strtotime($uroww['end_date'])); ?> </td>
                        <td><?php echo date("h:i A", strtotime($uroww['start_time'])); ?> <br/>
                          <?php echo date("h:i A", strtotime($uroww['end_time'])); ?> </td>
                        <td><?php $coach_batch_id = $uroww[0];
						$urebd=mysqli_query($con,"select * from coach_batch_date where batch_id = '$coach_batch_id' group by batch_day order by batch_date asc");
						while($urowbd=mysqli_fetch_array($urebd)) { ?>
                          <span class="btn btn-mini btn-primary" style="padding:2px; font-size:11px"><?php echo $urowbd['batch_day']; ?></span>&nbsp;
                          <?php } ?></td>
                        <td><a href="my-batch-attendance.php?bid=<?php echo $uroww[0]; ?>" class="btn btn-danger btn-mini"><i class="feather-edit me-2"></i>Attendance</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br/>
      <div class="row">
        <div class="col-sm-12">
          <div class="court-tab-content">
            <div class="card card-tableset">
              <div class="card-body">
                <div class="table-responsive">
                  <center>
                    <h4>Completed Court</h4>
                  </center>
                  <table class="table table-borderless">
                    <thead class="thead-light">
                      <tr>
                        <th>Batch </th>
                        <th>Fees </th>
                        <th>Date </th>
                        <th>Time </th>
                        <th>Days</th>
                        <th>Attendance</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php		
					 	$daylen = 60*60*24;
   						$cur_date = date('Y-m-d'); 
						$ureee=("select * from coach_batch where coach_id = '$user_id' and end_date < '$cur_date' order by start_date asc");
						$uree = mysqli_query($con,$ureee);
						while($uroww=mysqli_fetch_array($uree))
						{  ?>
                      <tr class="showtr">
                        <td><?php echo $uroww['name']; ?><br/>
                          No of Session : <?php echo $uroww['noof_session']; ?></td>
                        <td><?php echo $uroww['amount']; ?></td>
                        <td><?php echo date("d-m-Y", strtotime($uroww['start_date'])); ?> <br/>
                          <?php echo date("d-m-Y", strtotime($uroww['end_date'])); ?> </td>
                        <td><?php echo date("h:i A", strtotime($uroww['start_time'])); ?> <br/>
                          <?php echo date("h:i A", strtotime($uroww['end_time'])); ?> </td>
                        <td><?php $coach_batch_id = $uroww[0];
						$urebd=mysqli_query($con,"select * from coach_batch_date where batch_id = '$coach_batch_id' group by batch_day order by batch_date asc");
						while($urowbd=mysqli_fetch_array($urebd)) { ?>
                          <span class="btn btn-mini btn-primary" style="padding:2px; font-size:11px"><?php echo $urowbd['batch_day']; ?></span>&nbsp;
                          <?php } ?></td>
                        <td><a href="my-batch-attendance.php?bid=<?php echo $uroww[0]; ?>" class="btn btn-danger btn-mini"><i class="feather-edit me-2"></i>Attendance</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Content -->
  <!-- /Page Content -->
  <!-- Footer -->
  <?php include 'footer.php' ?>
  <!-- /Footer -->
</div>
<!-- /Main Wrapper -->
<!-- jQuery -->
<script src="assets/js/jquery-3.7.1.min.js" type="28a1b1647c061247a918a747-text/javascript"></script>
<!-- Bootstrap Core JS -->
<script src="assets/js/bootstrap.bundle.min.js" type="28a1b1647c061247a918a747-text/javascript"></script>
<!-- Fancybox JS -->
<script src="assets/plugins/fancybox/jquery.fancybox.min.js" type="28a1b1647c061247a918a747-text/javascript"></script>
<!-- Select JS -->
<script src="assets/plugins/select2/js/select2.min.js" type="28a1b1647c061247a918a747-text/javascript"></script>
<!-- Custom JS -->
<script src="assets/js/script.js" type="28a1b1647c061247a918a747-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="28a1b1647c061247a918a747-|49" defer></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b857b519eec188","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>
</html>
