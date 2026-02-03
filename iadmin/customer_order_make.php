<?php  error_reporting(0);
session_start();
ob_start();
include('../config.php');
$admin_id = $_SESSION['admin_id'];

		$order_custid = $_SESSION['order_custid'];
		$order_randcode = $_SESSION['order_randcode'];

		$ure=mysqli_query($con,"select * from user_master where id = '$emp_id'");
		$urow=mysqli_fetch_array($ure); 
		$godown_user_id = $urow['godown_id'];  
		
		$id=$_GET['id'];
		$checktbl=$_GET['checktbl'];
		$data=array();
		 

		$qry="select * from product_master where barcode='$id' and status = '1'";
		$result=mysqli_query($con,$qry);
		$rs=mysqli_fetch_array($result);
		$price = $rs['price'];
		$offer = $rs['offer'];
		$cnt=mysqli_num_rows($result);

		if($cnt > 0)
		{
		$uupQry="UPDATE order_store SET barcode='$id',qty='1',price='$price',total='$price' WHERE autono='$checktbl' and code='$order_randcode'";
		$uuresult=mysqli_query($con,$uupQry);
		
		$data['title']=$rs['title'];
		$data['price']=$rs['price'];
		}
		else
		{
		$data['price']='0';
		}
		echo json_encode($data);
?>

                     
