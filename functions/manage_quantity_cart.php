<?php
require("../controllers/cartcontroller.php");
$pid = $_GET['pid'];
$qty = $_GET['qty'];
include("../view/inc/navbar.php");
session_start();
if (isset($_SESSION['customer_id'])){
    $cid = $_SESSION['customer_id'];
    $updateCart = updateCart_fxn($cid, $pid, $qty);
    if($updateCart){
        header("location: ../view/cart.php");
    }else{
        echo "something went wrong";
    }
}else{
    $ipadd = getRealIpAddr();
    $updateCart = updateCartNull_fxn($ipadd, $pid, $qty);
    if($updateCart){
        header("location: ../view/cart.php");
    }else{
        echo "something went wrong";
    }
}
?>
