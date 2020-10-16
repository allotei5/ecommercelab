<?php

require("../classes/cartclass.php");
/*
*cart controller to handle everything about the cart
*/

function insertProductIntoCart_fxn($pid, $ipadd, $cid, $qty){
    //create a new object
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->insertProductIntoCart($pid, $ipadd, $cid, $qty);

    //if query run successfully
    if ($runQuery){
        //return query result
        return $runQuery;
    }else{
        return false;
    }
}

function insertProductIntoCartNull_fxn($pid, $ipadd, $qty){
    //create a new object
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->insertProductIntoCartNull($pid, $ipadd, $qty);

    //if query run successfully
    if ($runQuery){
        //return query result
        return $runQuery;
    }else{
        return false;
    }
}

function displayCart_fxn($cid){
    //create a new object
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->displayCart($cid);

    //check if query run
    if ($runQuery){
        //create array to start product details
        $prodArray = array();
        while ($record = $newCartObject->db_fetch()){
            $prodArray[$record['p_id']] = [
                $record['c_id'],
                $record['qty'],
                $record['product_title'],
                $record['product_price'],
                $record['product_image']
            ];

            /*
            $prodArray['p_id'] = $record['p_id'];
            $prodArray['c_id'] = $record['c_id'];
            $prodArray['qty'] = $record['qty'];
            $prodArray['product_title'] = $record['product_title'];
            $prodArray['product_price'] = $record['product_price'];
            $prodArray['product_image'] = $record['product_image'];*/
        }

        return $prodArray;
    }else{
        return false;
    }
}

function displayCartNull_fxn($ipadd){
    //create a new object
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->displayCartNull($ipadd);

    //check if query run
    if ($runQuery){
        //create array to start product details
        $prodArray = array();
        while ($record = $newCartObject->db_fetch()){
            $prodArray[$record['p_id']] = [
                $record['ip_add'],
                $record['qty'],
                $record['product_title'],
                $record['product_price'],
                $record['product_image']
            ];

        }

        return $prodArray;
    }else{
        return false;
    }
}

?>
