<?php  error_reporting(0);
session_start();
ob_start();
date_default_timezone_set("Asia/Kolkata");
include('../config.php');
$admin_id = $_SESSION['admin_id'];
$company_id = $_SESSION['company_id'];
$urezzcom=mysqli_query($con,"select * from company_master where cid = '$company_id'");
$urowcom=mysqli_fetch_array($urezzcom);
$company_name = $urowcom['name'];
$etype = $_GET['etype'];
$todaydate = date('d-m-Y');
$fd=$_SESSION['fd'];
$td=$_SESSION['td'];
$fds = date("d-m-Y", strtotime($fd)); 
$tds = date("d-m-Y", strtotime($td));
$venue_id = $_SESSION['venue_id'];
if($admin_id == '' || $company_id == '')
{
?>
<script>window.location.href="index.php";</script>
<?php } ?>
<?php 
if($etype == '2')
{
header('Content-Type: application/force-download');
header('Content-disposition: attachment; filename=Expense-Report_'.$fds.' To '.$tds.'.xls');
}
?>
<?php if($etype == '1' || $etype == '3')
{
?>
<style type="text/css">
@media print {
input#printButton {
	display: none;
}
}
body {
	font-family:Arial, Helvetica, sans-serif;
	text-transform:uppercase;
}
table {
	border-collapse: collapse;
}
td, th {
	font-size:12px;
	padding:1px 1px 1px 2px;
	border:solid 0.1px;
}
</style>
<?php if($etype == '1') { ?>
<script>window.print();</script>
<?php } ?>
<?php } ?>
<?php if($etype == '') { ?>
<!doctype html>
<html lang="en">
<head>
<title><?php echo $company_name; ?>!</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
<!-- favicons -->
<link rel="apple-touch-icon" href="img/favicon-apple.png">
<link rel="icon" href="img/favicon.png">
<!-- Material design icons CSS -->
<link rel="stylesheet" href="vendor/materializeicon/material-icons.css">
<!-- aniamte CSS -->
<link rel="stylesheet" href="vendor/animatecss/animate.css">
<!-- swiper carousel CSS -->
<link rel="stylesheet" href="vendor/swiper/css/swiper.min.css">
<!-- daterange CSS -->
<link rel="stylesheet" href="vendor/bootstrap-daterangepicker-master/daterangepicker.css">
<!-- dataTable CSS -->
<link rel="stylesheet" href="vendor/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
<!-- jvector map CSS -->
<link rel="stylesheet" href="vendor/jquery-jvectormap/jquery-jvectormap-2.0.3.css">
<!-- app CSS -->
<link rel="stylesheet" href="vendor/chosen1.8/chosen.css">
<link id="theme" rel="stylesheet" href="css/purplesidebar.css" type="text/css">
<link href="icon_fonts_assets/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
</head>
<body class="fixed-header sidebar-right-close">
<!-- page loader -->
<!-- page loader ends  -->
<div class="wrapper">
  <!-- main header -->
  <?php include 'header.php' ?>
  <?php include 'left.php' ?>
  <?php include 'right.php' ?>
  <!-- setting sidebar ends -->
  <!-- content page title -->
  <div class="container-fluid bg-light-opac">
    <div class="row">
      <div class="container my-3 main-container">
        <div class="row align-items-center">
          <div class="col">
            <h2 class="content-color-primary page-title">D2D Expense Report
              <div class="form-group floatright"> <a href="report_d2d_expense.php?etype=1" target="_blank" class="btn btn-success  btn-mini">Print</a> <a href="report_d2d_expense.php?etype=2" class="btn btn-success btn-mini">Excel</a>
                <?php /*?><a href="report_d2d_expense.php?etype=3" target="_blank" class="btn btn-success  btn-mini">PDF</a>
              <button class="btn btn-success btn-mini" id="download">PDF</button><?php */?>
              </div>
            </h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content page title ends -->
  <!-- content page -->
  <div class="container mt-4 main-container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="row">
            <div class="col-lg-12">
              <div class="element-wrapper">
                <div class="element-box">
                  <form autocomplete="off" onKeyDown="return event.key != 'Enter';" name="form" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="">Select Date Range</label>
                          <br>
                          <input class="form-control" name="datestring" type="text" id="datetimerange-input1" style="width:210px; display:inline" >
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="">Select Venue</label>
                          <br>
                          <select  class='form-control chosen_select' name="venue_id" style=" display:inline">
                            <option value="">Please Select Venue</option>
                            <?php 
							$coun=mysqli_query($con,"select * from venue_master where status = '1' order by name asc");
							while($Fcoun=mysqli_fetch_array($coun)) { 
							 ?>
                            <option value="<?php echo $Fcoun[0]; ?>" <?php if($Fcoun[0] == $venue_id) echo 'selected="selected"';?>><?php echo $Fcoun['name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-1">
                        <div class="form-group">
                          <label for="">&nbsp;</label>
                          <br/>
                          <input type="submit" name="search" value="Search" class="btn btn-primary">
                        </div>
                      </div>
                    </div>
                  </form>
                  <?php 
if(isset($_REQUEST['search'])) 
{
$venue_id=$_REQUEST['venue_id'];
$_SESSION['venue_id'] = $venue_id;

$datestring=$_REQUEST['datestring'];
	
$first_date = substr($datestring, 0, 10); 
$end_date = substr($datestring, 13, 10); 
$fds = date("Y-m-d", strtotime($first_date));
$tds = date("Y-m-d", strtotime($end_date));

$fd = date("Y-m-d", strtotime($fds));
$td = date("Y-m-d", strtotime($tds));
$_SESSION['fd'] = $fd;
$_SESSION['td'] = $td;

?>
                  <script language="javascript">window.location.href="report_d2d_expense.php";</script>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-4">
          <div class="row">
            <div class="col-lg-12">
              <div class="element-wrapper">
                <div class="element-box">
                  <div class="table-responsive">
                    <?php } ?>
                    <script>
window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("invoice");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 0.02,
                filename: 'Court-Report.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'A4', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}
</script>
                    <script src="h2p/html2pdf.bundle.js"></script>
                    <div id="invoice" class="page">
                      <center>
                        <h4>Expense Report</h4>
                      </center>
                      <table class="table " style="width:100%" cellpadding="0" cellspacing="0" border="1" id="dataTables-example">
                  <thead>
                    <tr>
                      <th style="display:none"> </th>
                      <th> Expense Date </th>
                      <th> Venue Name </th>
                      <th> Expense Type </th>
                      <th> Amount </th>
                      <th> Description </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php								 
						if($fd != '' && $td != '') { $date_qry = "and payment_date between '$fd' and '$td'"; }
						if($venue_id != '') { $venue_qry = "and venue_id = '$venue_id'"; }
											 
						$ureee=("select * from expense_master where id != '0' $date_qry $venue_qry");
						$uree = mysqli_query($con,$ureee);
						while($uroww=mysqli_fetch_array($uree))
						{
							?>
                    <tr class="showtr">
                      <td style="display:none"><?php echo $uroww['insdatetime']; ?> </td>
                      <td><?php echo $invoice_date = date("d-m-Y", strtotime($uroww['payment_date'])); ?> </td>
                      <td><?php $venue_id = $uroww['venue_id']; 
						   $urex=mysqli_query($con,"select * from venue_master where id = '$venue_id'");
						   $urowx=mysqli_fetch_array($urex); echo $urowx['name'];?>
                      </td>
                      <td><?php $expensetype_id = $uroww['expensetype_id'];
						  $urez=mysqli_query($con,"select * from expense_category where id = '$expensetype_id'");
						  $urowz=mysqli_fetch_array($urez); echo $urowz['name'];  ?>
                      </td>
                      <td><?php echo $uroww['amount']; ?></td>
                      <td><?php echo $uroww['small_des']; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                
                      
                      
                      
                      
                    </div>
                    <?php if($etype == '') { ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content page ends -->
</div>
<?php include 'footer.php' ?>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="vendor/bootstrap-4.1.3/js/bootstrap.min.js"></script>
<!-- Cookie jquery file -->
<script src="vendor/cookie/jquery.cookie.js"></script>
<!-- sparklines chart jquery file -->
<script src="vendor/sparklines/jquery.sparkline.min.js"></script>
<!-- Circular progress gauge jquery file -->
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<!-- Swiper carousel jquery file -->
<script src="vendor/swiper/js/swiper.min.js"></script>
<!-- Chart js jquery file -->
<script src="vendor/chartjs/Chart.bundle.min.js"></script>
<script src="vendor/chartjs/utils.js"></script>
<!-- DataTable jquery file -->
<script src="vendor/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
<script src="vendor/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>
<!-- datepicker jquery file -->
<script src="vendor/bootstrap-daterangepicker-master/moment.js"></script>
<script src="vendor/bootstrap-daterangepicker-master/daterangepicker.js"></script>
<!-- jVector map jquery file -->
<script src="vendor/jquery-jvectormap/jquery-jvectormap.js"></script>
<script src="vendor/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- circular progress file -->
<script src="vendor/chosen1.8/chosen.jquery.min.js"></script>
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<!-- Application main common jquery file -->
<script src="js/main.js"></script>
<!-- page specific script -->
<script>
        "use strict"
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                "order": [
                    [0, "asc"]
                ]
            });
        });

    </script>
<script>
    "use script";
        $('.chosen_select').chosen();
    </script>
<!-- page specific script -->
<?php include 'daterangepicker.php'; ?>
</body>
</html><?php } ?>
