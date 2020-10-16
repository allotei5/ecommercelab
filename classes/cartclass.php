<?php
//connect to database class
require("../settings/db_class.php");

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

}
?>
