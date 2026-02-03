<?php
error_reporting( 0 );
session_start();
ob_start();
include( '../config.php' );
$admin_id = $_SESSION[ 'admin_id' ];
$company_id = $_SESSION[ 'company_id' ];
if ( $admin_id == '' || $company_id == '' ) {
  ?>
<script>window.location.href="index.php";</script>
<?php
}
$code_get = $_GET[ 'code' ];
if ( $code_get == '' ) {
  $code = rand( 1111, 9999 );
  $_SESSION[ 'order_randcode' ] = $code;

  for ( $i = 1; $i <= 15; $i++ ) {
    $sql = ( "INSERT INTO `order_store` (`autono`,`custid`,`code`,`order_for`,`order_type`) VALUES ('$i','$id','$code','customer','COD')" );
    $x = mysqli_query( $con, $sql );
  }
  ?>
<script language="javascript">window.location.href="customer_order.php?code=<?php echo $code; ?>";</script>
<?php } ?>
<?php
$urezzcom = mysqli_query( $con, "select * from company_master where cid = '$company_id'" );
$urowcom = mysqli_fetch_array( $urezzcom );
$company_name = $urowcom[ 'name' ];
?>
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
<style type="text/css">
.weekmenu .read {
    background: #000;
    color: #00FF00;
    font-family: "Courier New", Courier, monospace;
    font-weight: bold;
    padding: 3px;
    font-size: 14px;
    width: 150px;
}
</style>
<script language="javascript" type="text/javascript">  
function getproduct(nm,str)
{
	var productname = 'productname' + nm;
	var producttotalprice = 'producttotalprice' + nm;
	var qty = 'qty' + nm;
	
	 
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
			var data = xmlhttp.responseText;	
			var abc = JSON.parse(data);
			document.getElementById(productname).value = abc.pname;
			document.getElementById("productprice"+nm).value=parseFloat(abc.price).toFixed(2);
	  		document.getElementById(producttotalprice).value = parseFloat(abc.price).toFixed(2);
			document.getElementById(qty).value = '1';
			
			grandtotal();
    	}
  	}
	
	xmlhttp.open("GET","customer_order_make.php?checktbl="+nm+"&id="+str,true);
	xmlhttp.send();	
	
	
}
function grandtotal()
{
	var totalrow=document.getElementById('totalrow').value;
	var grandtotal=0.00;
	for(var i=1;i<=totalrow;i++)
	{
		var qt=document.getElementById('qty'+i).value;
		var pr=document.getElementById('productprice'+i).value;
		var totalpr=(qt*pr);
		grandtotal +=totalpr;
	}
	document.getElementById('grandtotal').value=parseFloat(grandtotal).toFixed(2);
}
function checkqty(ids,qt)
{
	var pr=document.getElementById('productprice'+ids).value;
	var totalpr=(qt*pr);
	if(pr != "")
	{
		document.getElementById("producttotalprice"+ids).value=parseFloat(totalpr).toFixed(2);
		grandtotal();
	}
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
	
	xmlhttp.open("GET","customer_order_changeprice.php?checktbl="+nm+"&id="+str,true);
	xmlhttp.send();	
}
</script> 
<script language="javascript" type="text/javascript">  
function get2(nm,str)
{
	if (window.XMLHttpRequest)
  	{// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else
  	{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	
	xmlhttp.open("GET","customer_order_empcode.php?checktbl="+nm+"&id="+str,true);
	xmlhttp.send();	
}
</script> 
<script language="javascript" type="text/javascript">  
function get3(nm,str)
{
	if (window.XMLHttpRequest)
  	{// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else
  	{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	
	xmlhttp.open("GET","customer_order_paymenttype.php?checktbl="+nm+"&id="+str,true);
	xmlhttp.send();	
}
</script>
<?php
for ( $i = 1; $i <= 15; $i++ ) {
  ?>
<script type="text/javascript">
function showUser<?php echo $i; ?>(str)
{
if (str=="")
  {
  document.getElementById("txtHint<?php echo $i; ?>").innerHTML="";
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
    document.getElementById("txtHint<?php echo $i; ?>").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","customer_order_prdtitle<?php echo $i; ?>.php?q="+str,true);
xmlhttp.send();
}
</script>
<?php } ?>
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
            <h2 class="content-color-primary page-title">Retail Customer Order</h2>
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
              <script type="text/javascript">
function doCalc1x(form) {  
  var tot  = parseFloat(form.grandtotal.value) + parseFloat(form.service_charge.value) - parseFloat(form.t2.value); 
  form.t3.value = tot.toFixed(2); 
}  
</script> 
              <script src="js/searchjquery.min.js"></script> 
              <script src="js/searchbootstrap.min.js"></script> 
              <script src="js/searchjquery.bootbox.js"></script>
              <style>
						.dropdown-menu>li>a {
							display: block;
							padding: 3px 20px;
							clear: both;
							font-weight: 400;
							line-height: 1.42857143;
							color: #333;
							white-space: nowrap; } 
						</style>
              <!--onSubmit="return false;"-->
              <form name="form" method="post" autocomplete="off" onKeyDown="return event.key != 'Enter';">
                <table class="table table-hover table-nomargin table-bordered">
                  <thead>
                    <tr style="height:20px">
                      <th> Product Barcode </th>
                      <th> Product Name </th>
                      <th>Quantity</th>
                      <th> Total (Rs.)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $code = $_GET[ 'code' ];
                    for ( $i = 1; $i <= 15; $i++ ) {
                      $count = $i;

                      $urezxe = mysqli_query( $con, "select * from order_store where code = '$code' and autono = '$count'" );
                      $catdata_adde = mysqli_fetch_array( $urezxe );
                      $employee_code_login = $catdata_adde[ 'order_code1' ];
                      ?>
                    <tr>
                      <td><input type="text" name="product<?php echo $count; ?>" id="product<?php echo $count; ?>" onChange="getproduct('<?php echo $count; ?>',this.value);" onKeyUp="getproduct('<?php echo $count; ?>',this.value);" onBlur="showUser<?php echo $count; ?>(this.value)" value="<?php echo $q = $catdata_adde['barcode']; ?>" <?php if($count == 1) { ?> autofocus <?php } ?> class="form-control" data-provide="typeahead" data-items="9999" data-source="[&quot;<?php $z=("select * from product_master where status = '1' order by item_name asc"); $ures = mysqli_query($con,$z); while($urows=mysqli_fetch_array($ures)) {?><?php echo $urows['item_name']; ?>&quot;,&quot;<?php } ?>&quot;]">
                        <input type="hidden" name="productname<?php echo $count; ?>" id="productname<?php echo $count; ?>" value="" >
                        <input type="hidden" name="productprice<?php echo $count; ?>" id="productprice<?php echo $count; ?>" value=""></td>
                      <td><span id="txtHint<?php echo $count; ?>">
                        <?php /*?>
                        <?php
                        if ( $q != '' ) {
                          $qry = "select * from product_master where barcode = '$q' status = '1'";
                          $result = mysqli_query( $con, $qry );
                          $rs = mysqli_fetch_array( $result );
                          $title = $rs[ 'title' ];
                          $package_qty = $rs[ 'package_qty' ];
                          $price = $rs[ 'price' ];
                          ?>
<table border="0">
  <tr>
    <td style="border-right:none;  padding-right:10px; width:120px;">&nbsp;<strong style="color:#009933">Price : <?php echo $mrp = $rs['price']; ?> </strong> </td>
  </tr>
</table>
                          <?php } ?>
                          <?php */?>
                        </span></td>
                      <td><input  name="qty<?php echo $count; ?>" id="qty<?php echo $count; ?>" type="text"  onKeyUp="checkqty(<?php echo $count; ?>,this.value);" onChange="get1('<?php echo $count; ?>',this.value);" style="width:50px" value="<?php $qty = $catdata_adde['qty'];  if($qty != 0) { echo $qty; } ?>" class="form-control" /></td>
                      <td style="width:50px"><input name="producttotalprice<?php echo $count; ?>" id="producttotalprice<?php echo $count; ?>"  type="text" readonly="readonly"  value="<?php echo $catdata_adde['total']; ?>" class="form-control read" /></td>
                    </tr>
                    <?php
                    $count++;
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="3" style="text-align:right"><b>Total</b></td>
                      <td><input type="hidden" name="totalrow" id="totalrow" value="<?php echo --$count; ?>">
                        <?php
                        $urezxe = mysqli_query( $con, "select SUM(total) from order_store where code = '$code'" );
                        $catdata_adde = mysqli_fetch_array( $urezxe );
                        $order_total = $catdata_adde[ 'SUM(total)' ];
                        ?>
                        <input type="text" name="grandtotal" class="form-control" readonly="readonly" id="grandtotal" value="<?php if($order_total == '') { echo '0.00'; } else { echo $order_total; } ?>" style="min-width:150px" ></td>
                    </tr>
                    <tr>
                      <th colspan="3" style="text-align:right">Service Charge</th>
                      <th><input type="text" name="service_charge" class="form-control" >
                      </th>
                    </tr>
                    <tr>
                      <th colspan="3" style="text-align:right">Received</th>
                      <th><input type="text" name="t2" class="form-control"  onKeyUp="doCalc1x(this.form)" >
                      </th>
                    </tr>
                    <tr>
                      <th colspan="3" style="text-align:right">Balance</th>
                      <th><input type="text" name="t3" class="form-control" readonly>
                      </th>
                    </tr>
                    <tr>
                      <th colspan="3" style="text-align:right">Customer Name</th>
                      <th><input type="text" name="customer_name" class="form-control" >
                      </th>
                    </tr>
                    <tr>
                      <th colspan="3" style="text-align:right">Customer Mobile</th>
                      <th><input type="text" name="customer_mobile" class="form-control" >
                      </th>
                    </tr>
                    <tr>
                      <th colspan="3" style="text-align:right">Payment</th>
                      <th> <input type="radio" name="order_type" checked  value="COD"class="input-small" required style="margin:-2px 3px 0 0" onChange="get3('<?php echo $code; ?>',this.value);">
                        Cash&nbsp;&nbsp;
                        <input type="radio" name="order_type" value="UPI"  class="input-small" required style="margin:-2px 3px 0 0" onChange="get3('<?php echo $code; ?>',this.value);">
                        UPI </th>
                    </tr>
                    <tr>
                      <td colspan="4"  style="text-align:right"><?php /*?><input type="password" placeholder="Employee Code" onChange="get2('<?php echo $code; ?>',this.value);" required name="employee_code" style="width:150px"  class="input-block-level"   /><?php */?>
                        <input type="hidden" name="code" value="<?php echo $_GET['code']; ?>"  />
                        <input type="submit" name="insert1" value="Save Order" class="btn btn-primary">
                        <input type="submit" name="insert2" value="Save Order & Print" class="btn btn-primary">
                        <?php /*?><a href="customer_order_save.php?code=<?php echo $_GET['code']; ?>" class="btn btn-primary" />Save Order</a> <a href="customer_order_saveprint.php?code=<?php echo $_GET['code']; ?>" class="btn btn-danger" />Save Order & Print</a><?php */?></td>
                    </tr>
                  </tfoot>
                </table>
              </form>
              <?php
              if ( $_POST[ 'insert1' ] || $_POST[ 'insert2' ] ) {

                $code = $_GET[ 'code' ];
                $urezxe = mysqli_query( $con, "select * from order_store where code = '$code'" );
                $catdata_adde = mysqli_fetch_array( $urezxe );
                $employee_code = $catdata_adde[ 'emp_code' ];
                $order_for = $catdata_adde[ 'order_for' ];
                $wallet_amount = $catdata_adde[ 'wallet' ];

                $ures = ( "select * from order_master where red_oid = '0' order by ABS(order_no) desc" );
                $ure = mysqli_query( $con, $ures );
                $catdata = mysqli_fetch_array( $ure );
                $no = mysqli_num_rows( $ure );
                if ( $no == 0 ) {
                  $order_no = '1';
                } else {
                  $sr_no_old = $catdata[ 'order_no' ];
                  $order_no = 1 + $sr_no_old;
                }

                $order_date = date( 'Y-m-d' );

                $order_type = $_REQUEST[ 'order_type' ];
                $received_amount = $_REQUEST[ 't2' ];
                $due_amount = $_REQUEST[ 't3' ];
                $customer_name = $_REQUEST[ 'customer_name' ];
                $customer_mobile = $_REQUEST[ 'customer_mobile' ];
                $service_charge = $_REQUEST[ 'service_charge' ];

                $sql = mysqli_query( $con, "INSERT INTO order_master (`order_no`,`order_date`, `order_type`, `user_id`, `billing_address`, `shipping_address`, `order_confirmed`, `order_status`,`couponcode`,`couponcode_per`,`godown_id`,`society_id`,`order_ordered`,`delivered_by`,`order_delivered`,`wallet_amount`,`received_amount`,`due_amount`,`customer_name`,`customer_mobile`,`service_charge`) VALUES ('$order_no','$order_date','$order_type','$admin_id','$billing_address','$shipping_address','1','Delivered','$couponcode','$couponcode_per','$godown','$society','$todaydatetime','$admin_id','$todaydatetime','$wallet_amount','$received_amount','$due_amount','$customer_name','$customer_mobile','$service_charge')" );
                $insid = mysqli_insert_id( $con );


                $ure = mysqli_query( $con, "select * from order_store where code = '$code' and qty != '0' order by ABS(id) asc" );
                while ( $product = mysqli_fetch_array( $ure ) ) {
                  $barcode = $product[ "barcode" ];
                  $qty = $product[ "qty" ];
                  $price = $product[ "price" ];
                  $total = $product[ "total" ];


                  $ureza = mysqli_query( $con, "select * from product_master where barcode = '$barcode' and status = '1'" );
                  $catdata_addza = mysqli_fetch_array( $ureza );
                  $title = mysqli_real_escape_string( $con, $catdata_addza[ 'title' ] );
                  $offer = $catdata_addza[ 'offer' ];
                  $gst_per = $catdata_addza[ 'gst_per' ];
                  $id = $catdata_addza[ 0 ];

                  $qry_main = "INSERT INTO order_master (`red_oid` , `pid` ,`barcode`,`tax` ,`title` ,`price`,`qty`,`amount`) VALUES ('$insid','$id','$barcode','$gst_per','$title','$price','$qty','$total')";
                  mysqli_query( $con, $qry_main );
                }

                $ure = mysqli_query( $con, "select SUM(amount) from order_master where red_oid = '$insid'" );
                $urow = mysqli_fetch_array( $ure );
                $subtotal = $urow[ "SUM(amount)" ];

                $uupQry = "UPDATE order_master SET total_amount='$subtotal',final_amount='$subtotal' WHERE id='$insid'";
                $uuresult = mysqli_query( $con, $uupQry );


                $delete = "DELETE FROM order_store WHERE code = '$code'";
                mysqli_query( $con, $delete );

                $insert1 = $_POST[ 'insert1' ];
                $insert2 = $_POST[ 'insert2' ];

                ?>
              <?php if($insert1 != '') { ?>
              <script language="javascript">window.location.href="customer_order.php";</script>
              <?php } ?>
              <?php if($insert2 != '') { ?>
              <script language="javascript">window.location.href="customer_order_print.php?id=<?php echo $insid; ?>";</script>
              <?php } ?>
              <?php } ?>
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
