<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Update Product</title>
  </head>
  <body>
    <?php include("inc/navbar.php");
      require("../functions/productupdateprocess.php");?>
    <div class="container">

        <h1>Update Product</h1>

      <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control" id="exampleInputname1" name="pname" value="<?php echo $productDetails['product_title']?>">
          </div>
          <div class="form-group">
            <label>Product Price (Ghc)</label>
            <input type="number" class="form-control" id="exampleInputname1" name="pprice" value="<?php echo $productDetails['product_price']?>">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Product Category</label>
            <select class="form-control" id="exampleFormControlSelect1" name="pcat">
            <option value="<?php echo $productDetails['cat_id']?>"><?php echo $productDetails['cat_name']?></option>
             <?php
              foreach($categories as $cat => $catname){
                  echo "<option value=".$cat.">".$catname."</options>";
              }
            ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Product Brand</label>
            <select class="form-control" id="exampleFormControlSelect1" name="pbrand">
            <option value="<?php echo $productDetails['brand_id']?>"><?php echo $productDetails['brand_name']?></option>
             <?php
              foreach($brands as $brand => $brandname){
                  echo "<option value=".$brand.">".$brandname."</options>";
              }
            ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Product Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="pdesc"><?php echo $productDetails['product_desc']?></textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">Product Image</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="pimg">
          </div>
          <div class="form-group">
            <label>Product Keyword</label>
            <input type="text" class="form-control" id="exampleInputkeyword1" name="pkeyword" value="<?php echo $productDetails['product_keywords']?>">
          </div>

          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        <?php
            //success or failed messages
            if(isset($addFailed)){
                echo $addFailed;
            }else if(isset($imgfail)){
                echo $imgfail;
            }

            //error messages
            if(!empty($errors)){
                foreach ($errors as $error){
                echo "\n<div class='alert alert-danger' role='alert' style='padding-bottom: 10px;'>".$error."</div>";
            }
            }
        ?>


    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
