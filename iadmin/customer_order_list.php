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
$urezzcom=mysqli_query($con,"select * from company_master where cid = '$company_id'");
$urowcom=mysqli_fetch_array($urezzcom); 
$company_name = $urowcom['name'];
$company_mobno = $urowcom['mobile1']; ?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $company_name; ?>!</title>
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
<body class="fixed-header iconsibarbar">
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
            <h2 class="content-color-primary page-title">Order List 
              
              &nbsp;&nbsp;|&nbsp;&nbsp; <a href="customer_order.php" class="btn btn-success btn-mini">New Order</a></h2>
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
                <table class="table " id="dataTables-example">
                  <thead>
                    <tr>
                      <th> Order No </th>
                      <th> Order Date </th>
                      <th> Grand Total </th>
                      <th> Print </th>
                      <th> Whatsapp </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php								 
$z=("select * from order_master where red_oid = '0'");
$uree = mysqli_query($con,$z);
while($uroww=mysqli_fetch_array($uree))
{
$invid = $uroww[0];
			?>
                    <tr class="showtr">
                      <td><?php echo $a = $urowvch['prefix']; ?><?php echo $invoice_no = $uroww['order_no']; ?><?php echo $b = $urowvch['suffix'];  $fullinvno = $a.$invoice_no.$b;?></td>
                      <td><?php echo $invoice_date = date("d-m-Y", strtotime($uroww['order_date'])); ?> </td>
                      <td><del>&#2352;</del>&nbsp;<?php echo $grand_total = round($uroww['final_amount']); $gt[] = $uroww['final_amount']; ?>.00 </td>
                      <td><a href="customer_order_print.php?id=<?php echo $uroww[0]; ?>" target="_blank"><strong>Print</strong></a> </td>
                      <td><a target="_blank" href="<?php if(isMobileDevice()) { ?>whatsapp://<?php } else { ?>https://api.whatsapp.com/<?php } ?>send?phone=91<?php echo $party_contactno; ?>&text=Dear <?php echo $party_name; ?>,%0a%0aPlease view the details of  your transaction below. %0a%0aInvoice No: <?php echo $fullinvno; ?>%0aDate: <?php echo $invoice_date; ?>%0aAmount: <?php echo $grand_total; ?>%0a%0aClick To view your details and pay :- https://www.demoproject.site/vraj_industry/sales/<?php echo $invid; ?>%0a%0aThanks,%0a<?php echo $company_name; ?>,%0a<?php echo $company_mobno; ?>."> <img src="img/whatsapp.jpg" width="30"></a> </td>
                      <td class="center">
                        <a href='#'  id="<?php echo $uroww[0]; ?>" class="delete btn btn-mini btn-danger" title="Delete" ><i class="icon-trash"></i></a>
                      
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  
                </table>
                
                
                <script src="js/jquery.min.js"></script>
                <script type="text/javascript">
$(function() {
$(".delete").click(function(){
var element = $(this);
var del_id = element.attr("id");
var info = 'id=' + del_id;
if(confirm("Are you sure you want to Delete Invoice?"))
{
 $.ajax({
   type: "POST",
   url: "customer_order_list.php",
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
		$dusr=mysqli_query($con,"delete from order_master where id='$id'");
		$dusr=mysqli_query($con,"delete from order_master where red_oid='$id'");
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
        "use strict"
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                "order": [
                    [3, "desc"]
                ]
            });
        });

    </script>
<script>
    "use script";
        $('.chosen_select').chosen();
    </script>
<!-- page specific script -->
</body>
</html>
