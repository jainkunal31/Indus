<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['customer_logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $customer_id = $_SESSION['customer_id'];
    $company_name = $_SESSION['company_name'];
    // $email = $_SESSION['email'];
     $active = 0;
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $customer_id?></title>
  <?php include 'css/css.html'; ?>
</head>

<body>
  <div class="form">

          <h1>Welcome</h1>
          
          <p>
          <?php 
     
          // Display message about account verification link only once
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];
              
              // Don't annoy the user with more messages upon page refresh
              unset( $_SESSION['message'] );
          }
          
          ?>
          </p>
          
          <?php

          //echo $_GET['r_id'];
          
          // Keep reminding the user this account is not active, until they activate
          if ( !$active ){
              echo
              '<div class="info">
              You are now logged in!!
              </div>';
          }
          
          ?>
          
          <h2><?php echo $customer_id.' '.$company_name; ?></h2>
        
          
          <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>
<br>


           <a href="index.php"><button class="button button-block" name="logout"/>Back To main page</button></a>

    </div>
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/kunal.js"></script>

</body>
</html>