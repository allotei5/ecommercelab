<?php
//connect to the customer class
require_once("../classes/customerclass.php");

//insert customer function
//takes name, email, password, country, city, contact
function insertCustomer($name, $email, $password, $country, $city, $contact)
{
    //create an instance
    $newCustomerObject = new customerClass();

    //run the add customer method
    $addCustomer = $newCustomerObject->addNewCustomer($name, $email, $password, $country, $city, $contact);

    if ($addCustomer){
        //return the query result
        return $addCustomer;
    }else{
        return false;
    }
}

//return if email exists
//takes email
function returnEmail($email){
    //create an instance
    $newCustomerObject = new customerClass();

    //run the return email method
    $returnEmail = $newCustomerObject->checkForExistingCustomer($email);

    if ($returnEmail){
        $existingEmail = $newCustomerObject->db_fetch();
        return $existingEmail;
    }else{
        return false;
    }
}

//return customer login details
//takes email
function returnCustomerLoginInfo($email){
    //create an instance
    $newCustomerObject = new customerClass();

    //run the return customer login details method
    $returnLoginInfo = $newCustomerObject->returnCustomerLoginInfo($email);

    //check if query run successful
    if ($returnLoginInfo){

        //create an array
        $credentials = array();
        $credentials = $newCustomerObject->db_fetch();

        if (empty($credentials)){
            return false;
        }else{
            return $credentials;
        }

    }else{
        return false;
    }
}
?>
