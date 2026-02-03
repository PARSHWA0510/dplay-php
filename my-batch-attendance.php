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
$seo1 = mysqli_query($con,"SELECT * FROM seo_master WHERE page_name = 'My Batch Attendance'");
$seo2 = mysqli_fetch_array($seo1);
?>
<title><?php echo $seo2['seo_title']; ?></title>
<meta name="keywords" content="<?php echo $seo2['seo_keyword']; ?>">
<meta name="description" content="<?php echo $seo2['seo_description']; ?>">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
<!-- Datatables CSS -->
<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
<!-- Select CSS -->
<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
<!-- Feathericon CSS -->
<link rel="stylesheet" href="assets/css/feather.css">
<!-- Main CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<script language="javascript" type="text/javascript">  
function get0(nm,str)
{
	if (window.XMLHttpRequest)
  	{// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else
  	{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	
	xmlhttp.open("GET","my-batch-attendance-get0.php?checktbl="+nm+"&id="+str,true);
	xmlhttp.send();	
}
</script>
<script language="javascript" type="text/javascript">  
function get1(nm,str)
{
	if (window.XMLHttpRequest)
  	{// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else
  	{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	
	xmlhttp.open("GET","my-batch-attendance-get1.php?checktbl="+nm+"&id="+str,true);
	xmlhttp.send();	
}
</script>
<script type="text/javascript">
checked=false;
function checkedAll (frm1) {
	var aa= document.getElementById('frm1');
	 if (checked == false)
          {
           checked = true
          }
        else
          {
          checked = false
          }
	for (var i =0; i < aa.elements.length; i++) 
	{
	 aa.elements[i].checked = checked;
	}
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
      <h1 class="text-white">Batch Attendance</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li>Batch Attendance</li>
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
  <!-- Page Content -->
  <div class="content court-bg">
    <div class="container">
      <!-- Sort By -->
      <!-- Sort By -->
      <style>
.btn-mini { font-size:12px !important; padding:5px !important; } 
</style>
      <div class="row">
        <div class="col-sm-12">
          <div class="court-tab-content">
            <div class="card card-tableset">
              <div class="card-body">
                <div class="table-responsive">

            <?php 
if ($_POST['submit_all']) 
{

$coach_note_all = mysqli_real_escape_string($con,$_REQUEST['coach_note_all']);
$present = $_REQUEST['present'];
$absent = $_REQUEST['absent'];

	foreach($_POST['checkbox'] as $key=>$val2)
	{
	if($val2 != '')
	{				

$ure=mysqli_query($con,"select * from coach_batch_date where id = '$val2'");
$urow=mysqli_fetch_array($ure);
$batch_id = $urow['batch_id'];
$batch_date = $urow['batch_date'];

if($present == '1')
{
$uupQry="UPDATE coach_batch_attendance SET attendance_status='Present',coach_note='$coach_note_all' WHERE batch_id='$batch_id' and batch_date = '$batch_date'";
$uuresult=mysqli_query($con,$uupQry);
}

if($absent == '1')
{
$uupQry="UPDATE coach_batch_attendance SET attendance_status='Absent',coach_note='$coach_note_all' WHERE batch_id='$batch_id' and batch_date = '$batch_date'";
$uuresult=mysqli_query($con,$uupQry);
}


    }
    }
	  						
?>
<script language="javascript">window.location.href="my-batch-attendance.php?bid=<?php echo $_GET['bid']; ?>";</script>
<?php 
} 
?>
                  <form name="form_que" method="post" id ="frm1">
                  <input type="checkbox" name="present" value="1">&nbsp;Present All&nbsp;
                  <input type="checkbox" name="absent" value="1">&nbsp;Absent All
                  <input type="text" name="coach_note_all" class="form-control" style="display:inline; width:50%" placeholder="All Remarks">
                  <input type="submit" name="submit_all" value="Submit" class="btn btn-danger btn-mini">
                    <table class="table table-borderless" style="margin-top:10px;">
                      <thead class="thead-light">
                        <tr>
                          <th><input type='checkbox' name='checkall' onclick='checkedAll(frm1);'></th>
                          <th>Batch Date </th>
                          <th>Batch Day </th>
                          <th>Student Detail </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php		
					 	$daylen = 60*60*24;
   						$cur_date = date('Y-m-d'); 
						$batch_id = $_GET['bid'];
						$ureee=("select * from coach_batch_date where batch_id = '$batch_id' and batch_date <= '$cur_date' order by batch_date asc");
						$uree = mysqli_query($con,$ureee);
						while($uroww=mysqli_fetch_array($uree))
						{
						$batch_id = $uroww['batch_id'];
						$batch_date = $uroww['batch_date'];
						$count1 = $uroww[0];
						?>
                        <tr class="showtr">
                          <td><input name="checkbox[]" type="checkbox" id="checkbox[]"  value="<?php echo $uroww[0]; ?>"></td>
                          <td><?php echo $invoice_date = date("d-m-Y", strtotime($uroww['batch_date'])); ?> </td>
                          <td><?php echo $uroww['batch_day']; ?></td>
                          <td><table class="table table-borderless" border="0" cellpadding="0" cellspacing="0">
                              <tbody>
                                <?php		
						$ureeex=("select * from user_order where payment_status = '1' and coach_batch_id = '$batch_id'");
						$ureex = mysqli_query($con,$ureeex);
						while($urowwx=mysqli_fetch_array($ureex))
						{  ?>
                                <tr class="showtr">
                                  <?php $user_id = $urowwx['user_id'];
						  $urez=mysqli_query($con,"select * from user_master where id = '$user_id'");
						  $urowz=mysqli_fetch_array($urez); $count2 = $urowz[0]; ?>
                                  <td style="padding:0px;"><strong><?php echo $urowz['name']; ?></strong><br/><?php echo $urowz['contact1']; ?></td>
                                  <?php 
						  $ureza=mysqli_query($con,"select * from coach_batch_attendance where batch_id='$batch_id' and batch_date = '$batch_date' and user_id = '$user_id'");
						  $urowza=mysqli_fetch_array($ureza); ?>
                                  <td style="padding:0px;"><select name="attendance_status" class="form-control" onChange="get0('<?php echo $count1; ?>@<?php echo $count2; ?>',this.value);" style="width:100px; margin-left:10px;">
                                      <option value="">Attendance</option>
                                      <option value="Present" <?php if($urowza['attendance_status'] == 'Present') echo 'selected="selected"';?>>Present</option>
                                      <option value="Absent" <?php if($urowza['attendance_status'] == 'Absent') echo 'selected="selected"';?>>Absent</option>
                                    </select>
                                  </td>
                                  <td style="padding:0px;"><input type="text" onChange="get1('<?php echo $count1; ?>@<?php echo $count2; ?>',this.value);" name="coach_note" class="form-control" style="margin-bottom:5px; min-width:100px " placeholder="Enter Coach Remarks" value="<?php echo $urowza['coach_note']; ?>">
                                  <?php $user_note = $urowza['user_note']; if($user_note != '') { ?><strong>Student Remark :</strong> <?php echo $user_note; } ?>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Page Content -->
  <!-- Footer -->
  <?php include 'footer.php' ?>
  <!-- /Footer -->
</div>
<!-- /Main Wrapper -->
<!-- jQuery -->
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="assets/js/jquery-3.7.1.min.js" type="f0084786be1f092c3a4f8f0f-text/javascript"></script>
<!-- Bootstrap Core JS -->
<script src="assets/js/bootstrap.bundle.min.js" type="f0084786be1f092c3a4f8f0f-text/javascript"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js" type="f0084786be1f092c3a4f8f0f-text/javascript"></script>
<script src="assets/plugins/datatables/datatables.min.js" type="f0084786be1f092c3a4f8f0f-text/javascript"></script>
<!-- Select JS -->
<script src="assets/plugins/select2/js/select2.min.js" type="f0084786be1f092c3a4f8f0f-text/javascript"></script>
<!-- Custom JS -->
<script src="assets/js/script.js" type="f0084786be1f092c3a4f8f0f-text/javascript"></script>
<script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="f0084786be1f092c3a4f8f0f-|49" defer></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"949afbf45968a821","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.5.0","token":"3ca157e612a14eccbb30cf6db6691c29"}' crossorigin="anonymous"></script>
</body>
</html>
