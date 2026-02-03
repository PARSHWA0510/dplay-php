<?php
error_reporting( 0 );
session_start();
ob_start();
include( '../config.php' );
$admin_id = $_SESSION[ 'admin_id' ];
date_default_timezone_set( 'Asia/Kolkata' );
$todaydatetime = date( 'Y-m-d H:i:s' );
if ( !isset( $_SESSION[ 'admin_id' ] ) || ( $_SESSION[ 'admin_id' ] == "" ) ) {
  ?>
<script>window.location.href="index.php";</script>
<?php
}
$ures11 = ( "select * from order_master where red_oid != '0' and mrp_amount = '0'" );
$ure_file11 = mysqli_query( $con, $ures11 );
while ( $urow_file11 = mysqli_fetch_array( $ure_file11 ) ) {
  $id = $urow_file11[ 0 ];
  $pid = $urow_file11[ 'pid' ];
  $qty = $urow_file11[ 'qty' ];
  $ures = mysqli_query( $con, "select * from product_master where id = '$pid'" );
  $urows = mysqli_fetch_array( $ures );
  $mrp = $urows[ 'mrp' ];
  $mrp_amount = $mrp * $qty;
  $uupQry = "UPDATE order_master SET mrp='$mrp',mrp_amount='$mrp_amount' WHERE id='$id'";
  $uuresult = mysqli_query( $con, $uupQry );
}

$urezzemp = mysqli_query( $con, "select * from company_master" );
$urowemp = mysqli_fetch_array( $urezzemp );
?>
<!DOCTYPE html>
<html>
<head>
<title>Order Print</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php /*?><meta http-equiv = "refresh" content = "2; url = https://www.opaamart.com/employee/order_outfordelivery.php" /><?php */?>
<style type="text/css">
body {
    font-family: Arial, Helvetica, sans-serif;
}
table {
    border-collapse: collapse;
}
td, th {
    padding: 1px 2px;
    border: solid 0.1px;
    font-size: 10px;
}

@media print {
#printButton {
    display: none;
}
#download {
    display: none;
}
}
body {
    -webkit-print-color-adjust: exact !important;
}
.page {
    width: 10cm;
    padding: 0px;
}
@page {
    size: A4;
    margin: 0;
}

@media print {
.page {
    margin: 0;
    border: initial;
    border-radius: initial;
    width: initial;
    min-height: initial;
    box-shadow: initial;
    background: initial;
    page-break-after: always;
}
}
</style>
</head>
<body class="menu-position-side menu-side-left full-screen">
<?php
$oid = $_GET[ 'id' ];
$ure = mysqli_query( $con, "select * from order_master where id = '$oid'" );
$uroworder = mysqli_fetch_array( $ure );
$cust_society = $uroworder[ 'society_id' ];
$service_charge = $uroworder[ 'service_charge' ];
?>
<div class="page">
  <table border="1" width="100%" id="invoice" cellpadding="0" cellspacing="0" style="margin-left:-5px">
    <tr style="border:solid 1px">
      <td colspan="8"><center>
          <strong>Retail / Tax Invoice</strong><br>
          <b style="text-transform:uppercase"><?php echo $company_name = $urowemp['name']; ?></b><br>
          <?php echo $urowemp['address1']; ?>,<br/>
          <?php $email = $urowemp['email']; if($email != '') { ?>
          Email : <?php echo $email; ?> <br/>
          <?php } ?>
          (M) : <?php echo $company_mobno = $urowemp['mobile1']; ?><br/>
        </center></td>
    </tr>
    <tr>
      <td colspan="2" style="font-size:8px;"><strong>Bill No</strong></td>
      <td colspan="2"  style="font-size:8px;"><?php echo $uroworder['order_no']; ?></td>
      <td colspan="2" style="font-size:8px;"><strong>Bill Date</strong></td>
      <td colspan="2" style="font-size:8px"><?php $order_date = $uroworder['order_date']; echo date("d-m-Y", strtotime($order_date)); ?></td>
    </tr>
    <tr>
      <td colspan="2"  style="font-size:8px;"><strong>Name</strong></td>
      <td colspan="2"  style="font-size:8px;"><?php echo $uroworder['customer_name']; ?></td>
      <td colspan="2"  style="font-size:8px;"><strong>Mobile</strong></td>
      <td colspan="2"  style="font-size:8px;"><?php echo $uroworder['customer_mobile']; ?></td>
    </tr>
    <tr>
      <td colspan="8" style="padding:0px !important; border:hidden !important"><table border="1" style="width:100%;" cellpadding="0" cellspacing="0">
          <tr>
            <td style="text-align:center; font-size:8px; background-color:<?php echo $inv_bgcolor; ?>; color:<?php echo $inv_textcolor; ?>;">No</td>
            <td style="text-align:center; font-size:8px; background-color:<?php echo $inv_bgcolor; ?>; color:<?php echo $inv_textcolor; ?>;">Product</td>
            <td style="text-align:center; font-size:8px; background-color:<?php echo $inv_bgcolor; ?>; color:<?php echo $inv_textcolor; ?>;">Qty</td>
            <td style="text-align:center; font-size:8px; background-color:<?php echo $inv_bgcolor; ?>; color:<?php echo $inv_textcolor; ?>;">Rate</td>
            <td style="text-align:center; font-size:8px; background-color:<?php echo $inv_bgcolor; ?>; color:<?php echo $inv_textcolor; ?>;">Total</td>
          </tr>
          <?php
          $ures = mysqli_query( $con, "select * from order_master where red_oid = '$oid'" );
          while ( $urow_file_price = mysqli_fetch_array( $ures ) ) {
            $pid = $urow_file_price[ 'pid' ];
            $mrp_amountz[] = $urow_file_price[ 'mrp_amount' ];
            $qty = $urow_file_price[ 'qty' ];
            $qtyz[] = $urow_file_price[ 'qty' ];
            $return_qty = $urow_file_price[ 'return_qty' ];
            $return_qtyz[] = $urow_file_price[ 'return_qty' ];
            $final_qty = $qty - $return_qty;
            $final_qtyz[] = $qty - $return_qty;
            $ure = mysqli_query( $con, "select * from product_master where id = '$pid'" );
            $urow = mysqli_fetch_array( $ure );
            ?>
          <tr class="pageRow1">
            <td style="text-align:left; font-size:8px"><?php echo $nos = 1 + $nox++; ?></td>
            <td style="text-align:left; font-size:8px"><?php echo $item_name = $urow['item_name']; ?></td>
            <td style="text-align:left; font-size:8px"><?php echo $final_qty;  ?></td>
            <td style="text-align:left; font-size:8px"><?php echo $rate = $urow_file_price['price']; ?></td>
            <td style="text-align:left; font-size:8px"><?php  $final_total = $urow_file_price['amount'];  $amountz[] = $urow_file_price['amount']; echo number_format($final_total,2,'.',''); ?></td>
          </tr>
          <?php } ?>
        </table></td>
    </tr>
    <tr>
      <td colspan="8" valign="top"><table cellpadding="0" width="100%" cellspacing="0" border="1" style="border:hidden;">
          <tr>
            <td style="font-size:8px"><strong> Total Amount </strong></td>
            <td style="text-align:right; font-size:8px"><del>&#2352;</del>&nbsp;<?php echo $total_nontaxamt = number_format(array_sum($amountz),2,'.',''); ?></td>
          </tr>
		  <tr>
            <td style="font-size:8px"><strong>Service Charges</strong>:</td>
            <td style="text-align:right; font-size:8px"><del>&#2352;</del><strong>&nbsp; <?php echo $service_charge = number_format($uroworder['service_charge'],2,'.',''); ?> </strong></td>
          </tr>
          <?php /*?>
          <?php
          $couponcode = $uroworder[ 'couponcode' ];
          if ( $couponcode != '' ) {
            $ure = mysqli_query( $con, "select * from couponcode_master where code = '$couponcode'" );
            $urow = mysqli_fetch_array( $ure );
            ?>
<tr>
  <td style="font-size:8px"><strong>Discount (<?php echo $discount = $urow['discount']; ?> %)</strong></td>
  <td style="text-align:right; font-size:8px"><del>&#2352;</del>&nbsp;
    <?php $x1 = $total_nontaxamt * $discount; $x2 = $x1 / 100; echo $coupon_discount = round($x2,2); ?></td>
</tr>
            <?php } ?><?php */?>
          <tr>
            <td style="font-size:8px"><strong>Received</strong>:</td>
            <td style="text-align:right; font-size:8px"><del>&#2352;</del><strong>&nbsp; <?php echo number_format($uroworder['received_amount'],2,'.',''); ?> </strong></td>
          </tr>
          <tr>
            <td style="font-size:8px"><strong>Grand Total</strong>:</td>
            <td style="text-align:right; font-size:8px"><del>&#2352;</del><strong>&nbsp; <?php echo $grand_total = number_format($total_nontaxamt + $service_charge,2,'.',''); ?> </strong></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td colspan="8" valign="top" style="font-size:8px"><strong> Terms and Conditions:</strong><br>
        1. Retail Selling price are including GST<br>
        2. Goods once sold will not be taken back.<br>
        3. No Gurantee, No Claim.<br>
        4. No Exchange without Bill & Tag(Barcode).<br>
        5. All Subject to Ahmedabad Jurisdiction <br></td>
    </tr>
  </table>
</div>
<script>window.print();</script>
</body>
</html>
