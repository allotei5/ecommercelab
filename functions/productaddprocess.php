<?php
require_once("../controllers/productcontroller.php");
$errors = array();

if (isset($_POST['submit'])){
    //grab form inputs
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pcat = $_POST['pcat'];
    $pbrand = $_POST['pbrand'];
    $pdesc = $_POST['pdesc'];
    $pkeyword = $_POST['pkeyword'];

    //check if fields aren't empty
    if (empty($pname)){array_push($errors, "Name is required");}
    if (empty($pprice)){array_push($errors, "Price is required");}
    if (empty($pcat)){array_push($errors, "Category is required");}
    if (empty($pbrand)){array_push($errors, "Brand is required");}

    //check if fields are of appropriate length
    if (strlen($pname) > 200){array_push($errors, "Name is too long");}
    if (strlen($pdesc) > 500){array_push($errors, "Description is too long");}
    if (strlen($pkeyword) > 100){array_push($errors, "Keyword is too long");}

    //image validation
    $target_dir = "../images/product/";
    $target_file = $target_dir . basename($_FILES["pimg"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    //check if image has been uploaded
    if (empty($_FILES["pimg"]["name"])){
        array_push($errors, "File cannot be empty");
    }else{
        //check if its an actual image
        $check = getimagesize($_FILES["pimg"]["tmp_name"]);
    if ($check == false){
        array_push($errors, "File is not an image");
    }
    //check if file already exists
    if (file_exists($target_file)){
        array_push($errors, "File already exists");
    }

    //limit file size
    if ($_FILES["pimg"]["size"] > 5000000){
        array_push($errors, "File is too large");
    }

    //limit file type
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
        array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }
    }



    //if form is fine
    if (count($errors) == 0){
        echo "file to be uploaded: ". $_FILES["pimg"]["tmp_name"];
        echo "<br>";
        echo "target file: " . $target_file;
        echo "<br>";

        $uploadImage = move_uploaded_file($_FILES["pimg"]["tmp_name"], $target_file);
        echo "return value move uploaded: ". $uploadImage;
        return;
        if ($uploadImage){
            $addProduct = addProduct($pcat, $pbrand, $pname, $pprice, $pdesc, $target_file, $pkeyword);

            if ($addProduct){
                header("location: ../view/listproducts.php");
            }else{
                $addFailed = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Product Addition Failed
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
            }
        }else{
            $imgfail = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Image Failed to Upload
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
        }
    }

}

?>
