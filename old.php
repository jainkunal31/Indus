<?php

require 'db.php';
session_start();
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$customer_id = $mysqli->escape_string($_POST['customer_id']);
$company_name = $mysqli->escape_string($_POST['company_name']);
$result = $mysqli->query("SELECT * FROM customer WHERE customer_id='$customer_id'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that id doesn't exist!";
    header("location: error.php");
}
else { // User exists
    $customer = $result->fetch_assoc();

   
        
        $_SESSION['customer_id'] = $customer['customer_id'];
        $_SESSION['company_name'] = $customer['company_name'];
        // $_SESSION['last_name'] = $customer['last_name'];
        // $_SESSION['active'] = $customer['active'];
        // $_SESSION['u_id'] = $customer['id'];
        
        // This is how we'll know the user is logged in
         $_SESSION['customer_logged_in'] = true;

        header("location: profile.php");
  
        
   
}
