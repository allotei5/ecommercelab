<?php
require("../controllers/productcontroller.php");

//get item to delete
$delItem = $_GET['cid'];

//delete item
$delete = deleteCategory($delItem);

if ($delete){
    header("location: ../admin/category.php");
}else{
    echo "Delete failed";
}
?>
