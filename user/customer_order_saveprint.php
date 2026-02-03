<?php   session_start();
error_reporting(0);
ob_start();
include('../config.php');
$admin_id = $_SESSION['admin_id'];

date_default_timezone_set('Asia/Kolkata');
$todaydatetime = date('Y-m-d H:i:s');

$code=$_GET['code'];
$urezxe=mysqli_query($con,"select * from order_store where code = '$code'");
$catdata_adde=mysqli_fetch_array($urezxe);
$employee_code = $catdata_adde['emp_code'];
$order_type = $catdata_adde['order_type'];
$order_for = $catdata_adde['order_for'];
$wallet_amount = $catdata_adde['wallet'];

$order_ins = 'order_master';

$urezxe=mysqli_query($con,"select * from user_master where id = '$emp_id'");
$catdata_adde=mysqli_fetch_array($urezxe);
$employee_code_login = $catdata_adde['emp_code'];


$ure=mysqli_query($con,"select * from order_store where code = '$code'");
$urow=mysqli_fetch_array($ure);		
$custid = $urow['custid'];

$urex=mysqli_query($con,"select * from customer_master where id = '$custid'");
$urowx=mysqli_fetch_array($urex);		
$godown = $urowx['godown'];
$society = $urowx['society'];
$cust_contactno = $urowx['contactno'];


$ures=("select * from ".$order_ins." where red_oid = '0' order by ABS(order_no) desc");
$ure = mysqli_query($con,$ures);
$catdata=mysqli_fetch_array($ure);
$no = mysqli_num_rows($ure);
if($no == 0)
{
$order_no = '1';
}
else
{
$sr_no_old = $catdata['order_no'];
$order_no = 1 + $sr_no_old;
}

$order_date = date('Y-m-d');

   $sql=mysqli_query($con,"INSERT INTO ".$order_ins." (`order_no`,`order_date`, `order_type`, `user_id`, `billing_address`, `shipping_address`, `order_confirmed`, `order_status`,`couponcode`,`couponcode_per`,`godown_id`,`society_id`,`order_ordered`,`delivered_by`,`order_delivered`,`wallet_amount`) VALUES ('$order_no','$order_date','$order_type','$custid','$billing_address','$shipping_address','1','Delivered','$couponcode','$couponcode_per','$godown','$society','$todaydatetime','$emp_id','$todaydatetime','$wallet_amount')");	 
$insid = mysqli_insert_id($con);


$ure=mysqli_query($con,"select * from order_store where code = '$code' and qty != '0' order by ABS(id) asc");
while($product=mysqli_fetch_array($ure))
{
$barcode = $product["barcode"]; 
$qty = $product["qty"];
$price = $product["price"];
$total = $product["total"];


$ureza=mysqli_query($con,"select * from product_master where barcode = '$barcode' and status = '1'");
$catdata_addza=mysqli_fetch_array($ureza);
$title = mysqli_real_escape_string($con,$catdata_addza['title']);			
$subgodown_id = $catdata_addza['subgodown_id'];					
$offer = $catdata_addza['offer'];					
$gst_per = $catdata_addza['gst_per'];					
$id = $catdata_addza[0];					

$qry_main = "INSERT INTO ".$order_ins." (`red_oid` , `pid` ,`barcode`,`tax` ,`title` ,`price`,`qty`,`amount`,`godown_id`,`subgodown_id`,`society_id`) VALUES ('$insid','$id','$barcode','$gst_per','$title','$price','$qty','$total','$godown','$subgodown_id','$society')";
mysqli_query($con,$qry_main);
}

$ure=mysqli_query($con,"select SUM(amount) from ".$order_ins." where red_oid = '$insid'");
$urow=mysqli_fetch_array($ure);
$subtotal = $urow["SUM(amount)"];

$uupQry="UPDATE ".$order_ins." SET total_amount='$subtotal',final_amount='$subtotal' WHERE id='$insid'";
$uuresult=mysqli_query($con,$uupQry);


$delete = "DELETE FROM order_store WHERE code = '$code'";
mysqli_query($con, $delete);



?>
<script language="javascript">window.location.href="customer_order_print.php?id=<?php echo $insid; ?>";</script>
