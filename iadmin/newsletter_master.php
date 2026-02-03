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
<?php }
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include 'PHPMailer/src/Exception.php';
include 'PHPMailer/src/PHPMailer.php';
include 'PHPMailer/src/SMTP.php';
 ?>
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
            <h2 class="content-color-primary page-title">Newsletter Emailer</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content page title ends -->
  <!-- content page -->
  <div class="container mt-4 main-container">
    <?php 
if ($_POST['insert']) 
{
$subject = $_REQUEST['subject'];
$message_body = $_REQUEST['message_body'];
	

echo $fullMessage = $fullMessage.''.$message_body.'';

$sqllr = mysqli_query($con,"SELECT * FROM api_email WHERE ins_type='Google Email Account'");
$rser = mysqli_fetch_array($sqllr);
$title1 = $rser['title1'];
$title2 = $rser['title2'];

$coun=mysqli_query($con,"select * from user_master where user_type = 'customer' and email1 != '' order by name asc");
while($Fcoun=mysqli_fetch_array($coun)) 
{ 
$user_email = $Fcoun['email1'];

        $mail = new PHPMailer(true);

        $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        $mail->isSMTP(); 
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true; 
        $mail->Username   = $title1; 
        $mail->Password   = $title2;

	 //password set in path=Account/security/2-step verification/add password 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port       = 587; 

        $mail->setFrom($title1, 'DPlays');
        $mail->addAddress($user_email, 'DPlays'); 

        $mail->isHTML(true); 
        $mail->Subject = $subject; 
        $mail->Body    = $fullMessage; 

        $mail->send();
        echo 'Message has been sent successfully';
}		


$coun=mysqli_query($con,"select * from subscribe_master where email != '' order by email asc");
while($Fcoun=mysqli_fetch_array($coun)) 
{ 
$user_email = $Fcoun['email'];

        $mail = new PHPMailer(true);

        $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        $mail->isSMTP(); 
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true; 
        $mail->Username   = $title1; 
        $mail->Password   = $title2;

	 //password set in path=Account/security/2-step verification/add password 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port       = 587; 

        $mail->setFrom($title1, 'DPlays');
        $mail->addAddress($user_email, 'DPlays'); 

        $mail->isHTML(true); 
        $mail->Subject = $subject; 
        $mail->Body    = $fullMessage; 

        $mail->send();
        echo 'Message has been sent successfully';
}		

?>
<script>alert('Email Sent Successfully');</script>
<script language="javascript">window.location.href="newsletter_master.php";</script>
<?php  } ?>
    <div class="card mb-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="element-wrapper">
            <div class="element-box">
              <form autocomplete="off"  name="form" method="post" enctype="multipart/form-data">
                <div class="row">
                
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for=""> Subject<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="subject"  required value="<?php echo $urow['subject']; ?>" type="text">
                    </div>
                  </div>
                  
                  <?php /*?><div class="col-sm-3">
                    <div class="form-group">
                      <label> Attachment <span class="required">*</span></label>
                      <input class="form-control" name="img1"  type="file">
                    </div>
                  </div><?php */?>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="">Message Body<span class="required">*</span></label>
                      <textarea name="message_body" class="input-xlarge" style="width:90%; height:150px"/><?php echo $urow['message_body']; ?></textarea>
                      <script type="text/javascript">
					//<![CDATA[
		 
						// This call can be placed at any point after the
						// <textarea>, or inside a <head><script> in a
						// window.onload event handler.
						// Replace the <textarea id="editor"> with an CKEditor
						// instance, using default configurations.
						CKEDITOR.env.isCompatible = true;
						CKEDITOR.replace( 'message_body' );
					//]]>
					</script>
                    </div>
                  </div>
                  
                  
                </div>
                <div class="form-buttons-w">
                  <input type="submit" name="insert" value="Send Email" class="btn btn-primary">
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
