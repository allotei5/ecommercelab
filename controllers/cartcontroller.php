<?php

require_once("../classes/cartclass.php");
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

//check for duplicates
//logged in customer
function checkDuplicates($pid, $cid){
    //create a new object
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->checkDuplicate($pid, $cid);

    if ($runQuery){
        $record = $newCartObject->db_fetch();
        if (!empty($record['p_id']) && !empty($record['c_id'])){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }

}

//check for duplicates
// not logged in customer
function checkDuplicatesNull($pid, $ipadd){
    //create a new object
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->checkDuplicateNull($pid, $ipadd);

    if ($runQuery){
        $record = $newCartObject->db_fetch();
        if (!empty($record['p_id']) && !empty($record['ip_add'])){
            return true;
        }else{
            return false;
        }
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

function cartTotal_fxn($cid){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->cartTotal($cid);

    //check if query run
    if($runQuery){
        $total = $newCartObject->db_fetch();
        return $total;
    }else{
        return false;
    }
}

function cartTotalNull_fxn($ipadd){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->cartTotalNull($ipadd);

    //check if query run
    if($runQuery){
        $total = $newCartObject->db_fetch();
        return $total;
    }else{
        return false;
    }
}

//update cart functions
//logged in customers
function updateCart_fxn($cid, $pid, $qty){
    //create a new object
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->updateCart($cid, $pid, $qty);

    //if query run successfully
    if ($runQuery){
        //return query result
        return $runQuery;
    }else{
        return false;
    }
}

//not logged in customers
function updateCartNull_fxn($ipadd, $pid, $qty){
    //create a new object
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->updateCartNull($ipadd, $pid, $qty);

    //if query run successfully
    if ($runQuery){
        //return query result
        return $runQuery;
    }else{
        return false;
    }
}

//delete from cart functions
//logged in customer
function deleteCart_fxn($cid,$pid){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->deleteCart($cid,$pid);

    //if query run successfully
    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

//not logged in customers
function deleteCartNull_fxn($ipadd,$pid){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->deleteCartNull($ipadd,$pid);

    //if query run successfully
    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

//cart value functions
//logged in customer
function cartValue_fxn($cid){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->cartValue($cid);

    if ($runQuery){
        $total = $newCartObject->db_fetch();
        return $total;
    }else{
        return false;
    }
}

function cartValueNull_fxn($ipadd){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->cartValueNull($ipadd);

    if ($runQuery){
        $total = $newCartObject->db_fetch();
        return $total;
    }else{
        return false;
    }
}

function updateCartWithCID_fxn($cid, $ip_add){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->updateCartWithCID($cid, $ip_add);

    if ($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function addOrder_fxn($cid, $inv_no, $ord_date, $ord_stat){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->addOrder($cid, $inv_no, $ord_date, $ord_stat);

    if ($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function addOrderDetails_fxn($ord_id, $prod_id, $qty){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->addOrderDetails($ord_id, $prod_id, $qty);

    if ($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function addPayment_fxn($amt, $cid, $ord_id, $currency, $pay_date){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->addPayment($amt, $cid, $ord_id, $currency, $pay_date);

    if ($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function recentOrder_fxn(){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->recentOrder();
    if($runQuery){
        $recent = $newCartObject->db_fetch();
        return $recent;
    }else{
        return false;
    }
}

function deleteWholeCart_fxn($cid){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->deleteWholeCart($cid);

    if ($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function getOrder_fxn($ord_id){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->getOrder($ord_id);
    if($runQuery){
        $ord_arr = $newCartObject->db_fetch();
        return $ord_arr;
    }else{
        return false;
    }
}

function getOrderDetails_fxn($ord_id){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->getOrderDetails($ord_id);
    if($runQuery){
        while($record = $newCartObject->db_fetch()){
            $ord_arr[] = $record;
        }
        return $ord_arr;
    }else{
        return false;
    }
}

?>
