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
<link id="theme" rel="stylesheet" href="css/purplesidebar.css" type="text/css">
<link href="icon_fonts_assets/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
<script type="text/javascript">
function showUser1(str)
{
if (str=="")
  {
  document.getElementById("txtHint1").innerHTML="";
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
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","equipment_rented_equipment.php?q="+str,true);
xmlhttp.send();
}
</script>

<script type="text/javascript">
function showUser2(str)
{
if (str=="")
  {
  document.getElementById("txtHint2").innerHTML="";
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
    document.getElementById("txtHint2").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","equipment_rented_equipment_price.php?q="+str,true);
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
            <h2 class="content-color-primary page-title">Equipment Rented List &nbsp;|&nbsp;<a class="btn btn-mini btn-success" href="equipment_rented_history.php">History</a></h2>
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
                  <?php 
if ($_POST['insert']) 
{

    $sql=mysqli_query($con,"INSERT INTO `equipment_rented` (`equipment_id`, `qty`, `price`, `total`, `duration`, `user_id`, `venue_id`, `cust_name`, `cust_mobile`, `ins_datetime`) VALUES ('".mysqli_real_escape_string($con,$_REQUEST['equipment_id'])."','".mysqli_real_escape_string($con,$_REQUEST['qty'])."','".mysqli_real_escape_string($con,$_REQUEST['price'])."','".mysqli_real_escape_string($con,$_REQUEST['total'])."','".mysqli_real_escape_string($con,$_REQUEST['duration'])."','$admin_id','".mysqli_real_escape_string($con,$_REQUEST['venue_id'])."','".mysqli_real_escape_string($con,$_REQUEST['cust_name'])."','".mysqli_real_escape_string($con,$_REQUEST['cust_mobile'])."','$today_datetime')");	 
 	?>
                  <script language="javascript">window.location.href="equipment_rented.php";</script>
                  <?php 
} 
?>
                  <?php 
  $id = $_GET['uid'];
						
						
if(isset($_REQUEST['update'])) 
  {
  	
	
	$uupQry="UPDATE equipment_rented SET equipment_id='".mysqli_real_escape_string($con,$_REQUEST['equipment_id'])."',qty='".mysqli_real_escape_string($con,$_REQUEST['qty'])."',total='".mysqli_real_escape_string($con,$_REQUEST['total'])."',price='".mysqli_real_escape_string($con,$_REQUEST['price'])."',duration='".mysqli_real_escape_string($con,$_REQUEST['duration'])."',venue_id='".mysqli_real_escape_string($con,$_REQUEST['venue_id'])."',cust_name='".mysqli_real_escape_string($con,$_REQUEST['cust_name'])."',cust_mobile='".mysqli_real_escape_string($con,$_REQUEST['cust_mobile'])."' WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
	
	?>
                  <script language="javascript">window.location.href="equipment_rented.php";</script>
                  <?php  } ?>
                  <?php 
		$ure=mysqli_query($con,"select * from equipment_rented where id = '$id'");
		$urow=mysqli_fetch_array($ure); ?>
        
        
        <script type="text/javascript">  
function doCalc(form) {
  var amt  = parseFloat(form.qty.value) * parseFloat(form.price.value); 
  form.total.value = amt.toFixed(2);
}  
</script>
                  <form autocomplete="off"  name="form" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>Venue Name <span class="required">*</span></label>
                          <select  class='form-control chosen_select' name="venue_id" onChange="showUser1(this.value)">
                            <option value="">Please Select</option>
                            <?php 
							$coun=mysqli_query($con,"select * from venue_master where status = '1' and manager_id = '$admin_id' order by name asc");
							while($Fcoun=mysqli_fetch_array($coun)) { 
							 ?>
                            <option value="<?php echo $Fcoun[0]; ?>" <?php if($Fcoun[0] == $urow['venue_id']) echo 'selected="selected"';?>><?php echo $Fcoun['name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for=""> Select Equipment</label>
                          <span id="txtHint1">
                          <select class="form-control select2" name="equipment_id" onChange="showUser2(this.value)">
                            <option value="">Please Select</option>
                            <?php 
						$venue_id = $urow['venue_id'];
						$ures=mysqli_query($con,"select * from equipment_master where status = '1' and venue_id = '$venue_id' order by name asc");
						while($urows=mysqli_fetch_array($ures))
						{ ?>
                            <option value="<?php echo $urows[0]; ?>" <?php if($urows[0] == $urow['equipment_id']) echo 'selected="selected"';?>><?php echo $urows['name']; ?></option>
                            <?php } ?>
                          </select>
                          </span> </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label> Price <span class="required">*</span></label>
                          <span id="txtHint2"><input class="form-control"   required value="<?php echo $urow['price']; ?>" name="price" type="text"></span>
                        </div>
                      </div>
                      <div class="col-sm-1">
                        <div class="form-group">
                          <label> Qty <span class="required">*</span></label>
                          <input class="form-control"   required value="<?php echo $urow['qty']; ?>" name="qty" type="text" onkeyup="doCalc(this.form)">
                        </div>
                      </div>
                      
                      <div class="col-sm-1">
                        <div class="form-group">
                          <label> Total <span class="required">*</span></label>
                          <input class="form-control"   required value="<?php echo $urow['total']; ?>" name="total" type="text">
                        </div>
                      </div>
                      
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label> Duration <span class="required">*</span></label>
                          <input class="form-control"   required value="<?php echo $urow['duration']; ?>" name="duration" type="time">
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label> Customer Name <span class="required">*</span></label>
                          <input class="form-control"   required value="<?php echo $urow['cust_name']; ?>" name="cust_name" type="text" >
                        </div>
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label> Customer Mobile <span class="required">*</span></label>
                          <input class="form-control"   required value="<?php echo $urow['cust_mobile']; ?>" name="cust_mobile" type="text">
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
      </div>
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="row">
            <div class="col-lg-12">
              <div class="element-wrapper">
                <div class="element-box">
                  <div class="table-responsive">
                    <table class="table " id="dataTables-example">
                      <thead>
                        <tr>
                          <th style="display:none"> </th>
                          <th> Date</th>
                          <th> Customer Detail</th>
                          <th> Venue Name </th>
                          <th> Equipment Name </th>
                          <th> Duration </th>
                          <th> Price</th>
                          <th> Qty </th>
                          <th> Total </th>
                          <th> Inward </th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php								 
						$ure=mysqli_query($con,"select * from equipment_rented where user_id = '$admin_id' and inward_status = '0'");
						while($urow=mysqli_fetch_array($ure))
						 {
						?>
                        <tr class="showtr">
                          <td style="display:none"><?php echo $urow[0]; ?> </td>
                          <td style="width:100px;"><?php echo date("d-m-y", strtotime($urow['ins_datetime'])); ?><br/><?php echo date("h:i A", strtotime($urow['ins_datetime'])); ?> </td>
                          <td><?php echo $urow['cust_name']; ?> <br/><?php echo $urow['cust_mobile']; ?> </td>
                      	  <td><?php $venue_id = $urow['venue_id']; 
						   $urex=mysqli_query($con,"select * from venue_master where id = '$venue_id'");
						   $urowx=mysqli_fetch_array($urex); echo $urowx['name'];?>
                      	 </td>
                     	 <td><?php $equipment_id = $urow['equipment_id'];
						  $urez=mysqli_query($con,"select * from equipment_master where id = '$equipment_id'");
						  $urowz=mysqli_fetch_array($urez); echo $urowz['name'];  ?>
                      </td>
                          <td><?php echo date("h:i", strtotime($urow['duration'])); ?> </td>
                          <td><?php echo $urow['qty']; ?> </td>
                          <td><?php echo $urow['price']; ?> </td>
                          <td><?php echo $urow['total']; ?> </td>
                          <td class="center"><div class="material-switch">
                              <input id="someSwitchOptionSuccess<?php echo $urow[0]; ?>" value="<?php echo $urow[0]; ?>" name="someSwitchOption001" type="checkbox" <?php if($urow['inward_status']=='1') { echo"checked"; }?> onClick="status_cng(this.value);"/>
                              <label for="someSwitchOptionSuccess<?php echo $urow[0]; ?>" class="label-success"></label>
                            </div></td>
                          <td class="center"><a class="btn btn-mini btn-success" href="equipment_rented.php?uid=<?php echo $urow[0]; ?>" title=""><i class="icon-pencil"></i></a> <a href="#" id="<?php echo $urow[0]; ?>" class="delete btn btn-mini btn-danger" title="Delete" ><i class="icon-trash"></i></a> </td>
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
        url:"equipment_rented.php",
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
$ure=mysqli_query($con,"select * from equipment_rented where id = '$pid'");
$urow=mysqli_fetch_array($ure);
$ostatus = $urow['inward_status'];
if($ostatus == '1') { $status = '0'; } else { $status = '1'; }
$uupQry="UPDATE equipment_rented SET inward_status='$status',inward_datetime='$today_datetime' WHERE id='$pid'";
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
   url: "equipment_rented.php",
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
$delete = "DELETE FROM equipment_rented WHERE id = '$id'";
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
<!-- page specific script -->
</body>
</html>
