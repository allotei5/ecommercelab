<?php
//connect to the controller
require("../controllers/customercontroller.php");
$errors = array();

//check if submit button was clicked
if(isset($_POST['customerLogin'])){
    //get user data
    $loginEmail = $_POST['loginEmail'];
    $loginPassword = $_POST['loginPassword'];

    //check if fields are empty
    if(empty($loginEmail)){
        array_push($errors, "Email is Required");
    }
    if(empty($loginPassword)){
        array_push($errors, "Password is Required");
    }

    //check if email is valid
    if (!filter_var($loginEmail, FILTER_VALIDATE_EMAIL)) {
      array_push($errors, "Email is invalid");
    }

    //if there are errors in form
    if(count($errors) == 0){
        $loginPassword = md5($loginPassword);

        //return login info
        $loginInfo = array();
        $loginInfo = returnCustomerLoginInfo($loginEmail);

        //check if email is in the db
        if($loginInfo){
        //check if they are equal:

        if($loginPassword == $loginInfo['customer_pass']){

            session_start();
            $_SESSION['customer_id'] = $loginInfo['customer_id'];
            $_SESSION['user_role'] = $loginInfo['user_role'];
            header("location: ../view/index.php");


        }else{

            array_push($errors, "Email or Password is wrong");

        }
        }else{
            array_push($errors, "Email or Password is wrong");
        }



    }

}

?>
