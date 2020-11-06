<?php
require_once("../controllers/cartcontroller.php");
function getRealIpAddr(){
 if ( !empty($_SERVER['HTTP_CLIENT_IP']) ) {
  // Check IP from internet.
  $ip = $_SERVER['HTTP_CLIENT_IP'];
 } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
  // Check IP is passed from proxy.
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
 } else {
  // Get IP address from remote address.
  $ip = $_SERVER['REMOTE_ADDR'];
 }
 return $ip;
}
session_start();
if(isset($_GET['id'])){

    $pid = $_GET['id'];
    $ipadd = getRealIpAddr();

    if(isset($_SESSION['customer_id'])){
       $cid = $_SESSION['customer_id'];
        $delete = deleteCart_fxn($cid,$pid);
        if($delete){
            header("location: ../view/cart.php");
        }else{
            echo "something went wrong";
        }
    }else{
       $delete = deleteCartNull_fxn($ipadd,$pid);
        if($delete){
            header("location: ../view/cart.php");
        }else{
            echo "something went wrong";
        }
    }

}else{
    header("location: ../view/index.php");
}

?>
