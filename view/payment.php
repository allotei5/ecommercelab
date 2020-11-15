<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <link rel="stylesheet" href="../css/custom.css">

    <title>Cart</title>
  </head>
  <body>
    <?php
      include("inc/navbar.php");
      require_once("../controllers/cartcontroller.php");
      if (isset($_SESSION['customer_id'])){
          $cid = $_SESSION['customer_id'];
          $cart = displayCart_fxn($cid);
          $checkOutAmt = cartValue_fxn($cid);

      }else{
          header("location: ../login/login.php");
          $ipadd = getRealIpAddr();
          $cart = displayCartNull_fxn($ipadd);
          $checkOutAmt = cartValueNull_fxn($ipadd);
      }

    ?>
      <!--
    <div class="container">
    <h1>My Cart</h1>

    <?php
      foreach($cart as $key => $cartItem){
    ?>
      <div class="media" style="margin-bottom: 20px">
          <img src="<?= $cartItem[4] ?>" class="align-self-start mr-3" alt="..." height="200px">
          <div class="media-body">
            <h5 class="mt-0"><?= $cartItem[2] ?></h5>
            <h8 class="mt-0">Price: Ghc <?= $cartItem[3] ?></h8>
            <p>Quantity:</p>
            <form class="form-inline" method="GET" action="../functions/manage_quantity_cart.php">
              <div class="form-group mb-2">
                <input type="number" class="form-control" id="inputPassword2" value="<?= $cartItem[1] ?>" name="qty">
                <input type="hidden" name="pid" value="<?= $key ?>">
              </div>
              <button type="submit" class="btn mx-sm-3 btn-primary mb-2">Update Quantity</button>
              <a href="<?php echo "../functions/remove_from_cart.php?id=".$key; ?>" class="btn btn-danger  mb-2">Remove From Cart</a>
            </form>
          </div>
        </div>

    <?php }?>
        </div>
      -->

    <div class="container" style="padding-top: 100px">
      <div class="row">
        <div class="col-sm-9">
          <table class="table">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>

                </tr>
              </thead>
              <tbody>
                <?php
                  foreach($cart as $key => $cartItem){
                  ?>

                  <tr>
                  <th scope="row"><?= $cartItem[2] ?></th>
                  <td>Ghc <?= $cartItem[3] ?></td>
                    <td>
                        <?= $cartItem[1] ?>

                    </td>
                </tr>

                  <?php } ?>

              </tbody>
            </table>
        </div>
        <div class="col-sm-3 bg-light" style="padding: 40px 10px ">
          <h5 style="padding-bottom: 10px">Cart Summary</h5>
          <table class="table">
  <thead>

  </thead>
  <tbody>
    <tr>

      <td>Sub-Total</td>
      <td>Ghc <?= $checkOutAmt['Result'] ?></td>

    </tr>

    <tr>

      <td>Total</td>
      <td>Ghc <span id="amt"><?= $checkOutAmt['Result'] ?></span></td>


    </tr>
  </tbody>

</table>
    <div id="paypal-payment-button">
    </div>


        </div>

      </div>
    </div>
    <?php
    if(isset($_GET['status'])){
        if($_GET['status'] == 'failed'){
            ?>
      <script>alert("Payment Cancelled Or Failed")</script>
      <?php
        }
    }
    ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <script src="https://www.paypal.com/sdk/js?client-id=AVfGv6Z5RwC0EOTNplKlG2XLXRhWWREacIPQKRdVDevDzmi6snUeA5MC4IYEUOo-ePbTIDMYhPT2iG-E&disable-funding=credit,card"></script>
    <script src="../js/payment.js"></script>
  </body>
</html>
