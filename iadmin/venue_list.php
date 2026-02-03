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
xmlhttp.open("GET","company_master_getcity.php?q="+str,true);
xmlhttp.send();
}
</script>
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
            <h2 class="content-color-primary page-title">Venue Master</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content page title ends -->
  <!-- content page -->
  <div class="container mt-4 main-container">
     
    
    <div class="card mb-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="element-wrapper">
            <div class="element-box">
              <div class="table-responsive">
                <table class="table" id="dataTables-example">
                  <thead>
                    <tr>
                      <th> No </th>
                      <th> Venue Name </th>
                      <th> Contact/Email </th>
                      <th> Address</th>
                      <th> Main Photo </th>
                      <th> Photo </th>
                      <th> Includes </th>
                      <th> Rules </th>
                      <th> Model </th>
                      <th> Status </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php								 
						$ure=mysqli_query($con,"select * from venue_master");
						while($urow=mysqli_fetch_array($ure))
						 {
						?>
                    <tr class="showtr">
                      <td><?php echo $urow['orderlist']; ?> </td>
                      <td><?php echo $urow['name']; ?> </td>
                      <td><?php echo $urow['contact1']; ?><br/>
                        <?php echo $urow['email1']; ?> </td>
                      <td><?php echo $urow['address']; ?></td>
                      <td><?php $photo = $urow['photo']; if($photo != '') { ?>
                        <img src="../images/<?php echo $urow['photo']; ?>" width="100"  />
                        <?php } ?></td>
                      <td><a class="btn btn-danger" href="venue_photo.php?id=<?php echo $urow[0]; ?>" style="padding:2px;">Photo</a></td>
                      <td><a class="btn btn-danger" href="venue_includes.php?id=<?php echo $urow[0]; ?>" style="padding:2px;">Includes</a></td>
                      <td><a class="btn btn-danger" href="venue_rules.php?id=<?php echo $urow[0]; ?>" style="padding:2px;">Rules</a></td>
                      <td style="text-transform:capitalize"><?php echo $urow['venue_model']; ?> </td>
                      <td><div class="material-switch">
                          <input id="someSwitchOptionSuccess<?php echo $urow[0]; ?>" value="<?php echo $urow[0]; ?>" name="someSwitchOption001" type="checkbox" <?php if($urow['status']=='1') { echo"checked"; }?> onClick="status_cng(this.value);"/>
                          <label for="someSwitchOptionSuccess<?php echo $urow[0]; ?>" class="label-success"></label>
                        </div></td>
                      <td class="center"><a class="btn btn-mini btn-success" href="venue_master.php?uid=<?php echo $urow[0]; ?>" title=""><i class="icon-pencil"></i></a> <a href="#" id="<?php echo $urow[0]; ?>" class="delete btn btn-mini btn-danger" title="Delete" ><i class="icon-trash"></i></a> </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <script>
function status_cng(value)
{
    var pid = value;
    $.ajax({
        type:"POST",
        data:"pid="+pid,
        url:"venue_list.php",
        cache:false,
        success:function()
        {
        }
    });
}
</script>
                <?php 
if($_POST['pid'])
{
$pid=$_POST['pid'];
$ure=mysqli_query($con,"select * from venue_master where id = '$pid'");
$urow=mysqli_fetch_array($ure);
$ostatus = $urow['status'];
if($ostatus == '1') { $status = '0'; } else { $status = '1'; }
$uupQry="UPDATE venue_master SET status='$status' WHERE id='$pid'";
$uuresult=mysqli_query($con,$uupQry);
}
?>
                <script src="js/jquery.min.js"></script>
                <script type="text/javascript">
$(function() {
$(".delete").click(function(){
var element = $(this);
var del_id = element.attr("id");
var info = 'id=' + del_id;
if(confirm("Are you sure you want to Delete?"))
{
 $.ajax({
   type: "POST",
   url: "venue_list.php",
   data: info,
   success: function(){
 }
});
  $(this).parents(".showtr").animate({ backgroundColor: "#003" }, "slow")
  .animate({ opacity: "hide" }, "slow");
 }
return false;
});
});
</script>
                <?php 
if($_POST['id'])
{
$id=$_POST['id'];
$delete = "DELETE FROM venue_master WHERE id = '$id'";
mysqli_query($con, $delete);

$delete = "DELETE FROM venue_amenities WHERE venue_id = '$id'";
mysqli_query($con, $delete);

$delete = "DELETE FROM venue_sporttype WHERE venue_id = '$id'";
mysqli_query($con, $delete);

$delete = "DELETE FROM venue_subscription_range	 WHERE venue_id = '$id'";
mysqli_query($con, $delete);

$delete = "DELETE FROM venue_includes WHERE venue_id = '$id'";
mysqli_query($con, $delete);

$delete = "DELETE FROM venue_photo WHERE venue_id = '$id'";
mysqli_query($con, $delete);

$delete = "DELETE FROM venue_rules WHERE venue_id = '$id'";
mysqli_query($con, $delete);

}
?>
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
    "use script";
        $('.chosen_select').chosen();
    </script>
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
<!-- page specific script -->
</body>
</html>
