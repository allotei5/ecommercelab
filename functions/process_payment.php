<?php
require_once("../controllers/cartcontroller.php");
session_start();
//check for status
if(isset($_GET['status'])){
    $status = $_GET['status'];

    if($status == 'completed'){
        // ..code
        $cid = $_SESSION['customer_id'];
        $inv_no = mt_rand(10,5000);
        $ord_date = date("Y/m/d");
        $ord_stat = 'unfulfilled';
        $addOrder = addOrder_fxn($cid, $inv_no, $ord_date, $ord_stat);
        if($addOrder){

        }

    }else if ($status == 'failed'){
        echo "failed";
    }
}else{
    //code
}

?>
