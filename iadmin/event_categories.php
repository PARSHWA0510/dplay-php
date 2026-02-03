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
            <h2 class="content-color-primary page-title">Event Categories&nbsp;|&nbsp;
            <?php 
			$event_id = $_GET['eid'];
			$ure=mysqli_query($con,"select * from event_master where id = '$event_id'");
			$urow=mysqli_fetch_array($ure); echo $urow['name']; ?></h2>
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
$accessories_id = implode('@', (array)($_REQUEST['accessories_id'] ?? []));
	
  $sql=("INSERT INTO `event_data` ( `event_id`,`data_title`,  `data_description`, `data_max_player`, `data_fees`, `status`,`accessories_id`) VALUES ( '$event_id','".mysqli_real_escape_string($con,$_REQUEST['data_title'])."','".mysqli_real_escape_string($con,$_REQUEST['data_description'])."', '".mysqli_real_escape_string($con,$_REQUEST['data_max_player'])."', '".mysqli_real_escape_string($con,$_REQUEST['data_fees'])."','1', '$accessories_id')");	 
 
$z = mysqli_query($con,$sql);
$id = mysqli_insert_id($con);
		

?>
    <script language="javascript">window.location.href="event_categories.php?eid=<?php echo $event_id; ?>";</script>
    <?php 
} 

	$id = $_GET['uid'];

	if(isset($_REQUEST['update'])) 
  	{

$accessories_id = implode('@', (array)($_REQUEST['accessories_id'] ?? []));

	$uupQry="UPDATE event_data SET  `data_title` = '".mysqli_real_escape_string($con,$_REQUEST['data_title'])."',`data_description` = '".mysqli_real_escape_string($con,$_REQUEST['data_description'])."',`data_max_player` = '".mysqli_real_escape_string($con,$_REQUEST['data_max_player'])."', `data_fees` = '".mysqli_real_escape_string($con,$_REQUEST['data_fees'])."',`accessories_id` = '$accessories_id' WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
  

 // exit();
	?>
    <script language="javascript">window.location.href="event_categories.php?eid=<?php echo $event_id; ?>";</script>
    <?php  } ?>
    <?php 
					$ure=mysqli_query($con,"select * from event_data where id = '$id'");
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
                      <label for=""> Title<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="data_title"  required value="<?php echo $urow['data_title']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="multicol-username"> Event Accessories</label>
                      <?php $accessories_ids = explode('@',$urow['accessories_id']);   $ids = "'" . implode("','", $accessories_ids) . "'";  ?>
                      <select class="chosen_select form-control" data-placeholder="Choose a Accessories..." multiple="multiple" name="accessories_id[]">
                        <option value=""></option>
                        <?php $ures=mysqli_query($con,"select * from event_accessories where status = '1' and ref_id = '0' and user_id = '$admin_id' and id IN ($ids)  order by name asc");
								while($urows=mysqli_fetch_array($ures))
								{
								?>
                        <option value="<?php echo $urows[0]; ?>" selected="selected"> <?php echo $urows['name']; ?></option>
                        <?php } ?>
                        <?php $ures=mysqli_query($con,"select * from event_accessories where status = '1' and ref_id = '0' and user_id = '$admin_id' and id NOT IN ($ids)  order by name asc");
								while($urows=mysqli_fetch_array($ures))
								{
								?>
                        <option value="<?php echo $urows[0]; ?>"> <?php echo $urows['name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for=""> Max Player <span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="data_max_player"  required value="<?php echo $urow['data_max_player']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for=""> Fees<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="data_fees"  required value="<?php echo $urow['data_fees']; ?>" type="text">
                    </div>
                  </div>
                  
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for=""> Additional Information<span class="required">*</span></label>
                      <textarea name="data_description" class="input-xlarge" style="width:90%; height:150px"/>
                      <?php echo $urow['data_description']; ?>
                      </textarea>
                      <script type="text/javascript">
					//<![CDATA[
		 
						// This call can be placed at any point after the
						// <textarea>, or inside a <head><script> in a
						// window.onload event handler.
						// Replace the <textarea id="editor"> with an CKEditor
						// instance, using default configurations.
						CKEDITOR.env.isCompatible = true;
						CKEDITOR.replace( 'data_description' );
					//]]>
					</script>
                    </div>
                  </div>
                  
                </div>
                <div class="form-buttons-w">
                  <?php
                        if($id)
						{
						?>
                  <input type="submit" name="update" value="Update" class="btn btn-primary">
                  <?php 
}
else 
{
?>
                  <input type="submit" name="insert" value="Insert" class="btn btn-primary">
                  <input value="Cancel" name="cancel" type="reset" class="btn btn-danger">
                  <?php } ?>
                </div>
              </form>
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
                <table class="table " id="dataTables-example">
                  <thead>
                    <tr>
                      <th> Title </th>
                      <th> Accessories </th>
                      <th> Max Player </th>
                      <th> Fees </th>
                      <th> Status </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php								 
						$ure=mysqli_query($con,"select * from event_data where event_id = '$event_id'");
						while($urow=mysqli_fetch_array($ure))
						 {
						?>
                    <tr class="showtr">
                      <td><?php echo $urow['data_title']; ?> </td>
                      <td><?php $accessories_id = explode('@',$urow['accessories_id']);
					  foreach($accessories_id as $key=>$val) {
					  $urex=mysqli_query($con,"select * from event_accessories where id = '$val'");
					  $urowx=mysqli_fetch_array($urex); echo $urowx['name']; echo ','; }  ?> </td>
                      <td><?php echo $urow['data_max_player']; ?> </td>
                      <td><?php echo $urow['data_fees']; ?> </td>
                      <td><div class="material-switch">
                          <input id="someSwitchOptionSuccess<?php echo $urow[0]; ?>" value="<?php echo $urow[0]; ?>" name="someSwitchOption001" type="checkbox" <?php if($urow['status']=='1') { echo"checked"; }?> onClick="status_cng(this.value);"/>
                          <label for="someSwitchOptionSuccess<?php echo $urow[0]; ?>" class="label-success"></label>
                        </div></td>
                      <td class="center"><a class="btn btn-mini btn-success" href="event_categories.php?uid=<?php echo $urow[0]; ?>&eid=<?php echo $event_id; ?>" title=""><i class="icon-pencil"></i></a> <a href="#" id="<?php echo $urow[0]; ?>" class="delete btn btn-mini btn-danger" title="Delete" ><i class="icon-trash"></i></a> </td>
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
        url:"event_categories.php",
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
$ure=mysqli_query($con,"select * from event_data where id = '$pid'");
$urow=mysqli_fetch_array($ure);
$ostatus = $urow['status'];
if($ostatus == '1') { $status = '0'; } else { $status = '1'; }
$uupQry="UPDATE event_data SET status='$status' WHERE id='$pid'";
$uuresult=mysqli_query($con,$uupQry);
}
?>
                <script src="js/jquery-3.2.1.min.js"></script>
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
   url: "event_categories.php",
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
$delete = "DELETE FROM event_data WHERE id = '$id'";
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
