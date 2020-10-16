<?php
    //check if button is clicked
    if (isset($_GET['submit'])){
        $term = $_GET['searchTerm'];
        if(!empty($term)){
            header("location: ../view/search.php?searchTerm=$term");
        }
    }
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../view/index.php">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<?php

session_start();
if (isset($_SESSION['customer_id'])){
    if($_SESSION['user_role'] == 1){
    //if user is admin
    ?>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../login/logout.php">logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../login/register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="brand.php">Brand</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../admin/category.php">Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listproducts.php">Products</a>
      </li>
    </ul>
  </div>
<?php
    }else{
        //if user is customer
    ?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../login/logout.php">logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../login/register.php">Register</a>
      </li>
    </ul>

  </div>


<?php
    }}else{
?>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../login/login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../login/register.php">Register</a>
      </li>
    </ul>

  </div>
<?php
}?>
<form class="form-inline my-2 my-lg-0" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchTerm">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
    </form>
</nav>


