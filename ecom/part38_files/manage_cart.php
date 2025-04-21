<?php
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');

$pid=get_safe_value($con,$_POST['pid']);
$qty=get_safe_value($con,$_POST['qty']);
$type=get_safe_value($con,$_POST['type']);


$productSoldQtyByProductId=productSoldQtyByProductId($con,$pid);
$productQty=productQty($con,$pid);

$pending_qty=$productQty-$productSoldQtyByProductId;

if($qty>$pending_qty && $type!='remove'){
	echo "not_avaliable";
	die();
}

$attr_id=0;
if(isset($_POST['sid']) && isset($_POST['cid'])){
	$sid=get_safe_value($con,$_POST['sid']);
	$cid=get_safe_value($con,$_POST['cid']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select id from product_attributes where color_id=$cid and size_id=$sid"));
	$attr_id=$row['id'];
}

$obj=new add_to_cart();

if($type=='add'){
	$obj->addProduct($pid,$qty,$attr_id);
}

if($type=='remove'){
	$obj->removeProduct($pid,$attr_id);
}

if($type=='update'){
	$obj->updateProduct($pid,$qty,$attr_id);
}

echo $obj->totalProduct();
?>