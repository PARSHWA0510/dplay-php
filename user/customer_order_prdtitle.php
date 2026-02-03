<?php  error_reporting(0);
session_start();
ob_start();
include('../config.php');
$admin_id = $_SESSION['admin_id'];
		$ure=mysqli_query($con,"select * from user_master where id = '$emp_id'");
		$urow=mysqli_fetch_array($ure); 
		$godown_user_id = $urow['godown_id'];  
		
		$q=$_GET['q'];
		$qry="select * from product_master where barcode='$q' and status = '1'";
		$result=mysqli_query($con,$qry);
		$rs=mysqli_fetch_array($result);
		$rejection_qty = $rs['rejection_qty'];
		$package_qty = $rs['package_qty'];
		$proid = $rs[0];
		$price = $rs['price'];
		$title=$rs['title'];
		 ?>

<table border="0">
  <tr>
    
      <td style="border-right:none;  padding-right:10px; width:120px;">&nbsp;<strong style="color:#009933">Price : <?php echo $mrp = $rs['price']; ?> </strong> </td>
    <?php /*?><td  style="border-right:none;">
      <select name="qty<?php echo $count; ?>" id="qty<?php echo $count; ?>" class="quantity" onKeyUp="checkqty(<?php echo $count; ?>,this.value);"  onChange="get1('<?php echo $count; ?>',this.value);" style="height:30px; width:50px">
        <?php for ($x = 1; $x <= $balance; $x++) { ?>
        <option value="<?php echo $x; ?>" <?php if($x == $return_qtyf) echo 'selected="selected"';?>><?php echo $x; ?></option>
        <?php } ?>
      </select>
     
    </td><?php */?>
  <?php /*?>  <td><input  name="qty<?php echo $count; ?>" id="qty<?php echo $count; ?>" type="text"  onKeyUp="checkqty(<?php echo $count; ?>,this.value);" onChange="get1('<?php echo $count; ?>',this.value);" style="width:50px" value="<?php $qty = $catdata_adde['qty'];  if($qty != 0) { echo $qty; } ?>" /></td><?php */?>
    
  </tr>
</table>
