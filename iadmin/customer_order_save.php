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

if($order_for == 'employee') { $order_ins = 'order_employee'; } else { $order_ins = 'order_master'; } 

$urezxe=mysqli_query($con,"select * from user_master where id = '$emp_id'");
$catdata_adde=mysqli_fetch_array($urezxe);
$employee_code_login = $catdata_adde['emp_code'];

   if($employee_code != $employee_code_login)
   {
   ?>
<script>alert('Employee OTP Code is Wrong');</script>
<script language="javascript">window.location.href="customer_order.php?code=<?php echo $code; ?>";</script>

   <?php } else { 		

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


$ureza=mysqli_query($con,"select * from product_master where barcode = '$barcode' and purchase_party != '0' and status = '1' and sold_status = '0'");
$catdata_addza=mysqli_fetch_array($ureza);
$title = mysqli_real_escape_string($con,$catdata_addza['title']);			
$subgodown_id = $catdata_addza['subgodown_id'];					
$offer = $catdata_addza['offer'];					
$gst_per = $catdata_addza['gst_per'];					
$id = $catdata_addza[0];					

$qry_main = "INSERT INTO ".$order_ins." (`red_oid` , `pid` ,`barcode`,`tax` ,`title` ,`price`,`qty`,`amount`,`godown_id`,`subgodown_id`,`society_id`) VALUES ('$insid','$id','$barcode','$gst_per','$title','$price','$qty','$total','$godown','$subgodown_id','$society')";
mysqli_query($con,$qry_main);

if($offer == 1)
{
$product_qtyx = $qty * 1; 
$qry_main = "INSERT INTO ".$order_ins." (`red_oid` , `pid` ,`barcode` ,`title` ,`price`,`qty`,`amount`,`godown_id`,`subgodown_id`,`society_id`) VALUES ('$insid','$id','$barcode','$title - Free','0','$product_qtyx','0','$godown','$subgodown_id','$society')";
mysqli_query($con,$qry_main);
}
}

$ure=mysqli_query($con,"select SUM(amount) from ".$order_ins." where red_oid = '$insid'");
$urow=mysqli_fetch_array($ure);
$subtotal = $urow["SUM(amount)"];

$uupQry="UPDATE ".$order_ins." SET total_amount='$subtotal',final_amount='$subtotal' WHERE id='$insid'";
$uuresult=mysqli_query($con,$uupQry);

$ure=mysqli_query($con,"select * from ".$order_ins." where id = '$insid'");
$urow=mysqli_fetch_array($ure);
$order_no = $urow["order_no"];
$wallet_amount = $urow["wallet_amount"];
$user_id = $urow["user_id"];
if($wallet_amount != 0)
{
$sql=mysqli_query($con,"INSERT INTO `wallet_master` (`cust_id`, `amount`, `amt_type`, `remarks`, `insdate`, `order_no`) VALUES ('$user_id','$wallet_amount', 'DR','Wallet Amount Used For Order','$order_date','$order_no')");	 
}

$delete = "DELETE FROM order_store WHERE code = '$code'";
mysqli_query($con, $delete);




$ure=mysqli_query($con,"select * from product_master where godown_id != '0' and purchase_party != '0' order by title asc");
while($urow=mysqli_fetch_array($ure))
{
$proid = $urow[0];
$op_qty = $urow['op_qty']; 
$rejection_qty = $urow['rejection_qty'];
$package_qty = $urow['package_qty'];
		
$data3 = mysqli_query($con,"select SUM(pur_qty),SUM(nontax_amount) from purchase_master_product where proid = '$proid' and ref_id != '0'");
$row3 = mysqli_fetch_array($data3);
$purchase = $row3['SUM(pur_qty)']; ?>
<?php $inward_qty = $sales_return + $purchase; ?>
<?php 
$data1 = mysqli_query($con,"select SUM(qty),SUM(amount) from order_master where pid = '$proid'");
$row1 = mysqli_fetch_array($data1);
$sales = $row1['SUM(qty)']; 

$data2 = mysqli_query($con,"select SUM(qty) from order_employee where pid = '$proid'");
$row2 = mysqli_fetch_array($data2);
$outward_sample_qty = $row2['SUM(qty)']; 

$data4 = mysqli_query($con,"select SUM(pur_qty) from creditnote_master_product where proid = '$proid' and ref_id != '0'");
$row4 = mysqli_fetch_array($data4);
$creditnote_qty = $row4['SUM(pur_qty)']; 
 
$outward_qty = $sales + $outward_sample_qty + $rejection_qty + $package_qty + $creditnote_qty; 
 

$balance = $inward_qty - $outward_qty;

if($balance <= 0) { 
$uupQry="UPDATE product_master SET sold_status='1'  WHERE id='$proid'";
$uuresult=mysqli_query($con,$uupQry);
}

if($balance > 0) { 
$uupQry="UPDATE product_master SET sold_status='0'  WHERE id='$proid'";
$uuresult=mysqli_query($con,$uupQry);
}
}


$logoadd=mysqli_query($con,"select * from whatsapp_api where status = '1'");
$logoadds=mysqli_fetch_array($logoadd);
$instance_id = $logoadds['instance_id']; 			
$access_token = $logoadds['access_token']; 			

$prefix='91';
$mobile = $prefix.$cust_contactno;

$randcode = rand(1111,9999);
$logincode = $randcode.$custid;

$smsx = "Thank you for your order. Your Order no : ".$order_no." will be delivered soon.%0aLogin Link : https://opaamart.com/login/".$logincode."%0aPlease do not share with anyone.%0aTeam OPAA MART";
$sms = str_replace(" ","%20",$smsx);
$sms_url = "https://picdikmarketing.info/api/send.php?number=".$mobile."&type=text&message=".$sms."&instance_id=".$instance_id."&access_token=".$access_token."";
//exit();
 $ch=curl_init();
 curl_setopt($ch,CURLOPT_URL,$sms_url);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch,CURLOPT_POSTFIELDS,1);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch,CURLOPT_TIMEOUT, '3');
 $content = trim(curl_exec($ch));
 curl_close($ch);

?>
<?php if($order_for == 'employee') { ?>
<script language="javascript">window.location.href="customer_master.php";</script>
<?php } ?>

<?php if($order_for != 'employee') { ?>
<script language="javascript">window.location.href="customer_master.php";</script>
<?php } ?>


<?php } ?>