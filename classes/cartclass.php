<?php
//connect to database class
require_once("../settings/db_class.php");

/**
*Product class to handle everything cart related
*/
/**
 *@author Allotei Pappoe
 *
 */

class cartClass extends db_connection
{
    //method to insert into the cart
    public function insertProductIntoCart($pid, $ipadd, $cid, $qty){
        $sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `c_id`, `qty`) VALUES ('$pid', '$ipadd', '$cid', '$qty')";

        //run the query
        return $this->db_query($sql);
    }

    //for customers who haven't logged in.
    public function insertProductIntoCartNull($pid, $ipadd, $qty){
        $sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `qty`) VALUES ('$pid', '$ipadd', '$qty')";

        //run the query
        return $this->db_query($sql);
    }

    //check for duplicate
    //logged in customers
    public function checkDuplicate($pid, $cid){
        $sql = "SELECT `p_id`, `c_id` FROM `cart` WHERE `p_id`='$pid' AND `c_id`='$cid'";

        return $this->db_query($sql);
    }

    //not logged in customers
    public function checkDuplicateNull($pid, $ipadd){
        $sql = "SELECT `ip_add`, `p_id` FROM `cart` WHERE `ip_add`='$ipadd' AND `p_id`='$pid'";

        return $this->db_query($sql);
    }
    //display cart
    //logged in customers
    public function displayCart($cid){
        $sql = "SELECT `cart`.`p_id`, `cart`.`c_id`, `cart`.`qty`, `products`.`product_title`, `products`.`product_price`, `products`.`product_image` FROM `cart`
        JOIN `products` on (`cart`.`p_id` = `products`.`product_id`)
        WHERE `cart`.`c_id` = '$cid'";

        //run the query
        return $this->db_query($sql);
    }

    //not logged in customers
    public function displayCartNull($ipadd){
        $sql = "SELECT `cart`.`p_id`, `cart`.`ip_add`, `cart`.`qty`, `products`.`product_title`, `products`.`product_price`, `products`.`product_image` FROM `cart`
        JOIN `products` on (`cart`.`p_id` = `products`.`product_id`)
        WHERE `cart`.`ip_add` = '$ipadd'";

        //run the query
        return $this->db_query($sql);
    }

    //get cart totals
    //logged and not logged in customers
    public function cartTotal($cid){
        $sql = "SELECT count(`c_id`) AS `count` FROM `cart` WHERE `c_id`='$cid'";
        return $this->db_query($sql);
    }

    public function cartTotalNull($ipadd){
        $sql = "SELECT count(`ip_add`) AS `count` FROM `cart` WHERE `ip_add`='$ipadd'";
        return $this->db_query($sql);
    }

    //update cart
    //logged in customers
    public function updateCart($cid, $pid, $qty){
        $sql = "UPDATE `cart` SET `qty`='$qty' WHERE `c_id`='$cid' AND `p_id`='$pid'";

        //run the query
        return $this->db_query($sql);
    }

    //not logged in customers
    public function updateCartNull($ipadd, $pid, $qty){
        $sql = "UPDATE `cart` SET `qty`='$qty' WHERE `ip_add`='$ipadd' AND `p_id`='$pid'";

        //run the query
        return $this->db_query($sql);
    }

    //delete from cart
    //logged in customers
    public function deleteCart($cid,$pid){
        $sql = "DELETE FROM `cart` WHERE `c_id`='$cid' AND `p_id`='$pid'";

        //run the query
        return $this->db_query($sql);
    }

    //not logged in customers
    public function deleteCartNull($ipadd, $pid){
        $sql = "DELETE FROM `cart` WHERE `ip_add`='$ipadd' AND `p_id`='$pid'";

        //run the query
        return $this->db_query($sql);
    }

}
?>
