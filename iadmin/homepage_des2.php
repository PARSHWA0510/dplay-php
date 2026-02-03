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
            <h2 class="content-color-primary page-title">Homepage Description 2</h2>
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
  	
	
	$uupQry="UPDATE homepage_des2 SET `title1` = '".mysqli_real_escape_string($con,$_REQUEST['title1'])."', `title2` = '".mysqli_real_escape_string($con,$_REQUEST['title2'])."', `title3` = '".mysqli_real_escape_string($con,$_REQUEST['title3'])."' WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
  
 	$img1 = $_FILES['img1']['name'];
	if($img1 != '')
	{
	$img1 = rand(1,1000000).str_replace(" ","_",trim($_FILES['img1']['name']));
 	$tmp_name=$_FILES["img1"]["tmp_name"];
	$pr="../images/";
	$pr1=$pr.$img1;
	move_uploaded_file($tmp_name,$pr1);
	}
	
	$img2 = $_FILES['img2']['name'];
	if($img2 != '')
	{
	$img2 = rand(1,1000000).str_replace(" ","_",trim($_FILES['img2']['name']));
 	$tmp_name=$_FILES["img2"]["tmp_name"];
	$pr="../images/";
	$pr2=$pr.$img2;
	move_uploaded_file($tmp_name,$pr2);
	}
	
	$img3 = $_FILES['img3']['name'];
	if($img3 != '')
	{
	$img3 = rand(1,1000000).str_replace(" ","_",trim($_FILES['img3']['name']));
 	$tmp_name=$_FILES["img3"]["tmp_name"];
	$pr="../images/";
	$pr3=$pr.$img3;
	move_uploaded_file($tmp_name,$pr3);
	}


	$img4 = $_FILES['img4']['name'];
	if($img4 != '')
	{
	$img4 = rand(1,1000000).str_replace(" ","_",trim($_FILES['img4']['name']));
 	$tmp_name=$_FILES["img4"]["tmp_name"];
	$pr="../images/";
	$pr4=$pr.$img4;
	move_uploaded_file($tmp_name,$pr4);
	}

	$img5 = $_FILES['img5']['name'];
	if($img5 != '')
	{
	$img5 = rand(1,1000000).str_replace(" ","_",trim($_FILES['img5']['name']));
 	$tmp_name=$_FILES["img5"]["tmp_name"];
	$pr="../images/";
	$pr5=$pr.$img5;
	move_uploaded_file($tmp_name,$pr5);
	}


	if($img1 != '')
 {
    $uupQry="UPDATE homepage_des2 SET image1='$img1'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 }
 if($img2 != '')
 {
    $uupQry="UPDATE homepage_des2 SET image2='$img2'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 }
  if($img3 != '')
 {
    $uupQry="UPDATE homepage_des2 SET image3='$img3'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 }
  
  

	

 // exit();
	?>
    <script language="javascript">window.location.href="homepage_des2.php";</script>
    <?php  } ?>
    <?php 
					$ure=mysqli_query($con,"select * from homepage_des2 where id = '$id'");
					$urow=mysqli_fetch_array($ure); ?>
    <div class="card mb-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="element-wrapper">
            <div class="element-box">
              <form autocomplete="off"  name="form" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-8">
                    <div class="form-group">
                      <label for="">Title 1<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="title1"  required value="<?php echo $urow['title1']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label> Image <span class="required">*</span></label>
                      <input class="form-control" name="img1"  type="file">
                      <?php $image1 = $urow['image1'];
						  if($image1 != '') { ?>
                      <img src="../images/<?php echo $image1; ?>" width="100" style="margin-top:5px;">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for=""> Additional Information<span class="required">*</span></label>
                      <textarea name="title2" class="input-xlarge" style="width:90%; height:150px"/>
                      <?php echo $urow['title2']; ?>
                      </textarea>
                      <script type="text/javascript">
					//<![CDATA[
		 
						// This call can be placed at any point after the
						// <textarea>, or inside a <head><script> in a
						// window.onload event handler.
						// Replace the <textarea id="editor"> with an CKEditor
						// instance, using default configurations.
						CKEDITOR.env.isCompatible = true;
						CKEDITOR.replace( 'title2' );
					//]]>
					</script>
                    </div>
                  </div>
                  
                  <?php /*?> <div class="col-sm-4">
                    <div class="form-group">
                      <label> Image <span class="required">*</span></label>
                      <input class="form-control" name="img2"  type="file">
                      <?php $image2 = $urow['image2'];
						  if($image2 != '') { ?>
                      <img src="../images/<?php echo $image2; ?>" width="100" style="margin-top:5px;">
                      <?php } ?>
                    </div>
                  </div>
                  
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label> Image <span class="required">*</span></label>
                      <input class="form-control" name="img1"  type="file">
                      <?php $image3 = $urow['image3'];
						  if($image3 != '') { ?>
                      <img src="../images/<?php echo $image3; ?>" width="100" style="margin-top:5px;">
                      <?php } ?>
                    </div>
                  </div><?php */?>
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
