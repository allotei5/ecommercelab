<?php
require("../controllers/cartcontroller.php");

    //grab get data from links
    $pid = $_GET['pid'];
    $ipadd = $_GET['ipadd'];
    $cid = $_GET['cid'];
    $qty = $_GET['qty'];

    //check for log in
    if (empty($cid)){
        $insertIntoCart = insertProductIntoCartNull_fxn($pid, $ipadd, $qty);
        if ($insertIntoCart){
            header("location: ../view/index.php");
        }else{
            echo "something went wrong";
        }
    }else{

        $insertIntoCart = insertProductIntoCart_fxn($pid, $ipadd, $cid, $qty);

        if ($insertIntoCart){
            header("location: ../view/index.php");
        }else{
            echo "something went wrong";
        }
         }

?>
