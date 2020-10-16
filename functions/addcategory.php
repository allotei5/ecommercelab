<?php
require("../controllers/productcontroller.php");
$categoryErrors = array();

// check if button was clicked
if(isset($_POST['addCategory'])){
    //grab form data
    $categoryName = $_POST['categoryName'];

    //check for errors
    if(empty($categoryName)){
        array_push($categoryErrors, "Field Cannot be Empty");
    }
    if(strlen($categoryName) > 100){
        array_push($categoryErrors, "Category is too long");
    }

    //if there are no errors
    if (count($categoryErrors) == 0){
        $insertCategory = addCategory($categoryName);

        //check if insert worked
        if ($insertCategory){
            $addSuccess = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  Category Added Successfully
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
        }else{
            $addFailed = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Category Addition Failed
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
        }

    }
}

$categories = array();
$categories = displayCategories();
?>
