<?php
require_once("../controllers/productcontroller.php");


$limit = 15;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$product = array();
$product = displayProducts($start, $limit);
$productCount = countRows();
$pages = ceil($productCount['id']/$limit);


?>
