<?php  error_reporting(0);
session_start();
ob_start();
include('../config.php');
  $admin_id = $_SESSION['admin_id'];
  $company_id = $_SESSION['company_id'];
if($admin_id == '' || $company_id == '')
{
?>
<script>window.location.href="index.php";</script>
<?php } ?>
<!doctype html>
<html lang="en">
<head>
<title>Sport CRM Panel</title>
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
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

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
            <h2 class="content-color-primary page-title">Homepage All Title</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content page title ends -->
  <!-- content page -->
  <div class="container mt-4 main-container">
    <?php 


	$id = '1';

	if(isset($_REQUEST['update'])) 
  	{
  	
	$uupQry="UPDATE homepage_title SET `title1` = '".mysqli_real_escape_string($con,$_REQUEST['title1'])."',`title11` = '".mysqli_real_escape_string($con,$_REQUEST['title11'])."',`title2` = '".mysqli_real_escape_string($con,$_REQUEST['title2'])."',`title22` = '".mysqli_real_escape_string($con,$_REQUEST['title22'])."',`title3` = '".mysqli_real_escape_string($con,$_REQUEST['title3'])."',`title33` = '".mysqli_real_escape_string($con,$_REQUEST['title33'])."',`title4` = '".mysqli_real_escape_string($con,$_REQUEST['title4'])."',`title44` = '".mysqli_real_escape_string($con,$_REQUEST['title44'])."',`title5` = '".mysqli_real_escape_string($con,$_REQUEST['title5'])."',`title55` = '".mysqli_real_escape_string($con,$_REQUEST['title55'])."',`title6` = '".mysqli_real_escape_string($con,$_REQUEST['title6'])."',`title66` = '".mysqli_real_escape_string($con,$_REQUEST['title66'])."',`title7` = '".mysqli_real_escape_string($con,$_REQUEST['title7'])."',`title77` = '".mysqli_real_escape_string($con,$_REQUEST['title77'])."',`title8` = '".mysqli_real_escape_string($con,$_REQUEST['title8'])."',`title88` = '".mysqli_real_escape_string($con,$_REQUEST['title88'])."',`title9` = '".mysqli_real_escape_string($con,$_REQUEST['title9'])."',`title99` = '".mysqli_real_escape_string($con,$_REQUEST['title99'])."' WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
  


	?>
    <script language="javascript">window.location.href="homepage_title.php";</script>
    <?php  } ?>
    <?php 
					$ure=mysqli_query($con,"select * from homepage_title where id = '$id'");
					$urow=mysqli_fetch_array($ure); ?>
    <div class="card mb-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="element-wrapper">
            <div class="element-box">
              <form autocomplete="off"  name="form" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Title 1<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="title1"  required value="<?php echo $urow['title1']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <div class="form-group">
                      <label for="">Description 1<span style="color:#FF0000">*</span></label>
                      <textarea name="title11" class="form-control" style="width:100%; height:100px"><?php echo $urow['title11']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Title 2<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="title2"  required value="<?php echo $urow['title2']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <div class="form-group">
                      <label for="">Description 2<span style="color:#FF0000">*</span></label>
                      <textarea name="title22" class="form-control" style="width:100%; height:100px"><?php echo $urow['title22']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Title 3<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="title3"  required value="<?php echo $urow['title3']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <div class="form-group">
                      <label for="">Description 3<span style="color:#FF0000">*</span></label>
                      <textarea name="title33" class="form-control" style="width:100%; height:100px"><?php echo $urow['title33']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Title 4<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="title4"  required value="<?php echo $urow['title4']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <div class="form-group">
                      <label for="">Description 4<span style="color:#FF0000">*</span></label>
                      <textarea name="title44" class="form-control" style="width:100%; height:100px"><?php echo $urow['title44']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Title 5<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="title5"  required value="<?php echo $urow['title5']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <div class="form-group">
                      <label for="">Description 5<span style="color:#FF0000">*</span></label>
                      <textarea name="title55" class="form-control" style="width:100%; height:100px"><?php echo $urow['title55']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Title 6<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="title6"  required value="<?php echo $urow['title6']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <div class="form-group">
                      <label for="">Description 6<span style="color:#FF0000">*</span></label>
                      <textarea name="title66" class="form-control" style="width:100%; height:100px"><?php echo $urow['title166']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Title 7<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="title7"  required value="<?php echo $urow['title7']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <div class="form-group">
                      <label for="">Description 7<span style="color:#FF0000">*</span></label>
                      <textarea name="title77" class="form-control" style="width:100%; height:100px"><?php echo $urow['title77']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Title 8<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="title8"  required value="<?php echo $urow['title8']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <div class="form-group">
                      <label for="">Description 8<span style="color:#FF0000">*</span></label>
                      <textarea name="title88" class="form-control" style="width:100%; height:100px"><?php echo $urow['title88']; ?></textarea>
                    </div>
                  </div>
                  
                  
                </div>
                <div class="form-buttons-w">
                  <input type="submit" name="update" value="Update" class="btn btn-primary">
                </div>
              </form>
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
    "use script";
        $('.chosen_select').chosen();
    </script>
<script>
        "use strict"
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        });

    </script>
<!-- page specific script -->
</body>
</html>
