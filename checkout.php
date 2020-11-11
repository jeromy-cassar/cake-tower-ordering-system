<?php
  session_start();
  include_once('tools.php');

  //POST / GET Request Processing Code
  //check if user requests to go back to cart
  if(isset($_POST['back'])){
    header("Location: cart.php");
  }
  //validate checkout form
  //initialize variables and set them to empty values:
  $name = $email = $mobile = $credit = $expdate = $address = "";
  $name_error = $email_error = $address_error = $mobile_error = $credit_error = $expdate_error = "";
  //check if the checkout form is submitted
  if(isset($_POST['buy']))
  {
    //---validate each field---
    $valid = true; //checks if there are errors
    //validate name
    if(empty($_POST['name']))
    {
      $name_error = "Name is required";
      $valid = false;
    } else {
      $name = $_POST['name'];
      if(!preg_match("/^[a-zA-Z'-\s]*$/", $name))
      {
        $name_error = "Only letters are allowed and either ' or - characters";
        $valid = false;
      }
    }
    //validate Address
    if(empty($_POST['address']))
    {
      $address_error = "Address is required";
      $valid = false;
    } else {
      $address = $_POST['address'];
      if(!preg_match("/^[0-9a-zA-Z,:.-\s]*$/", $address)) //accepts letters, numbers and specifc characters
      {
        $address_error = "Address must have only letters/numerical characters and , or . or - characters";
        $valid = false;
      }
    }
    //validate email
    if(empty($_POST['email']))
    {
      $email_error = "Email is required";
      $valid = false;
    } else {
      $email = ($_POST['email']);
      //check if email is the correct format
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) //only accepts email format (e.g. smith@gmail.com)
      {
        $email_error = "Email invalid";
        $valid = false;
      }
    }
    //validate mobile
    if(empty($_POST['mobile']))
    {
      $mobile_error = "Mobile is required";
      $valid = false;
    } else {
      $mobile = $_POST['mobile'];
      //validate mobile regex | mask: xxxx_xxxx OR xxxxxxxx
      if(!preg_match("/^[0-9]{4}\s[0-9]{4}|[0-9]{8}/", $mobile))
      {
        $mobile_error = "Invalid mobile format. Must be an Australian mobile number";
        $valid = false;
      }
    }
    //validate credit
    if(empty($_POST['credit']))
    {
      $credit_error = "Credit Card details is required";
      $valid = false;
    } else {
      $credit = $_POST['credit'];
      //VALIDATE CREDIT CARD FORMATTING: ONLY ACCEPT NUMERICAL VALUES AND NEEDS A SPECIFIC FORMAT
      if(!preg_match("/^[0-9]{4}\s[0-9]{4}|[0-9]{8}/", $credit))
      {
          $credit_error = "Credit Card details must be numerical and have the correct format";
          $valid = false;
      }elseif($valid == false && !preg_match("/^[0-9]{4}\s[0-9]{4}\s[0-9]{4}\s[0-9]{4}|[0-9]{16}/", $credit)){
          $credit_error = "Credit Card details must be numerical and have the correct format";
          $valid = false;
      }elseif($valid == false && !preg_match("/^[0-9]{4}\s[0-9]{4}\s[0-9]{4}\s[0-9]{4}\s[0-9]{4}|[0-9]{20}/", $credit)){
          $credit_error = "Credit Card details must be numerical and have the correct format";
          $valid = false;
      }
    }
    //validate exp date
    if(empty($_POST['expdate']))
    {
      $expdate_error = "Expiry date is required";
      $valid = false;
    } else {
      $expdate = str_replace(' ','',$_POST['expdate']); //removes spaces
      //initialize current dates & get month and year from expiry date as a substring
      $exp_year = substr($expdate, 2); //gets expiry year (2 digits)
      $exp_month = substr($expdate, 0, 2); //gets expiry month
      //check if month and year is correctly formatted
      if(!preg_match("/^[0-9]{4}|[0-9]{2}\s[0-9]{2}/", $expdate))
      {
        $expdate_error = "Incorrect format. Must only contain numeric characters (spaces between month and year is allowed)";
        $valid = false;
      }
      //convert values to integer for comparisons
      $exp_year = (int)$exp_year;
      $exp_month = (int)$exp_month;
      $current_month = (int)date("m"); //current month
      $current_year = (int)date("y"); //current year
      //credit card range checking --> month > 12 & year < current year
      if($exp_month > 12 || $exp_year < $current_year)
      {
        $expdate_error = "Month must be less than 12 and year must not be less than this year";
        $valid = false;
      }
      //check if expiry date is within one month of purchase
      $compare = $exp_month - $current_month; //checks difference between expiry month and today's month
      //if there is no difference or negative difference (exp month < current month) and both years are equal --> print error message
      if($compare <= 0 && $exp_year == $current_year)
      {
        $expdate_error = "Credit Card cannot expire within 1 month of purchase";
        $valid = false;
      }
    }
    //check if there are no errors
    if($valid == true)
    {
      //write data to array
      $details = array();
      //assign personal details into an array
      $details['date'] = date('d/m h:i A');
      $details['name'] = $_POST['name'];
      $details['email'] = $_POST['email'];
      $details['mobile'] = $_POST['mobile'];
      $details['address'] = $_POST['address'];

      //remove elements to match text file columns:
      $numOfItems = count($_SESSION['cart']);
      for($i = 0; $i < $numOfItems; $i++){
        if(isset($_SESSION['cart'][$i]['type'])){
          unset($_SESSION['cart'][$i]['type']);
        }
        if(isset($_SESSION['cart'][$i]['tier'])){
          unset($_SESSION['cart'][$i]['tier']);
        }
        if(isset($_SESSION['cart'][$i]['colour'])){
          unset($_SESSION['cart'][$i]['colour']);
        }
      }
      //add unit price to SESSION array:
      for($i=0;$i<$numOfItems;$i++){
        if($_SESSION['cart'][$i]['id']=="C001"||$_SESSION['cart'][$i]['id'] == "C003"){
          $_SESSION['cart'][$i]['unitPrice'] = "2.50";
        }
        if($_SESSION['cart'][$i]['id']=="C002"){
          $_SESSION['cart'][$i]['unitPrice'] = "100.00";
        }
      }
      //send order to SESSION
      $order = array();
      $numOfItems = count($_SESSION['cart']);
      for($i = 0; $i < $numOfItems; $i++){
        //merge the two arrays into one
        $order[$i] = array_merge($details, $_SESSION['cart'][$i]);
      }
      unset($_SESSION['cart']); //empty cart
      $_SESSION['receipt'] = $order; //create a receipt

      //open file
      $file = fopen('orders.txt', 'a'); //open and append
      //write to file
      flock($file, LOCK_EX);
      foreach($order as $record)
        fputcsv($file, $record, chr(9)); //append each file with a tab separator
      flock($file, LOCK_UN);
      //close file
      fclose($file);
      //redirect to receipt page
      header("Location: receipt.php");
      exit();
    }
  }
  topModule('CakeTower - Checkout'); //header framework
 ?>
 <div class="main"><!--main content-->
   <h2>Checkout:</h2>
   <div class="checkout-form">
     <form action="" method="post">
       <div class="name">
         <p class="namelabel">Full Name:</p><input type="text" name="name" value="<?= $name ?>" class="name-area"><br>
         <span class="error-name"><?= $name_error ?></span><!--text errorbox-->
       </div><br>
       <div class="address">
         <p class="addresslabel">Address:</p><input type="text" name="address" value="<?= $address ?>" class="address-area"><br>
         <span class="error-address"><?= $address_error ?></span><!--address errorbox-->
       </div><br>
       <div class="email">
         <p class="emaillabel">Email:</p><input type="email" name="email" value="<?= $email ?>" class="email-area"><br>
         <span class="error-email"><?= $email_error ?></span><!--email errorbox-->
       </div><br>
       <div class="mobile">
         <p class="mobilelabel">Mobile (04):</p><input type="text" name="mobile" value="<?= $mobile ?>" class="mobile-area"><br>
         <span class="error-mobile"><?= $mobile_error ?></span><!--mobile-number errorbox-->
       </div><br>
       <div class="credit">
         <p class ="creditlabel">Credit:</p><input type="text" class="credit-area" name="credit" value="<?= $credit ?>" oninput="visa()"><br>
         <span class="error-credit"><?= $credit_error ?></span><br><!--credit-card-details errorbox-->
         <div class="visa"><img src="images/visa.png" class="visa-logo"></div>
       </div><br>
       <br><div class="expiry">
         <p class="expirylabel">Expiry Date:</p><input type="text" name="expdate" value="<?= $expdate ?>" class="exp-area"><br>
         <span class="error-expdate"><?= $expdate_error ?></span><!--expiry-date errorbox-->
       </div><br>
       <div class="buttons">
        <input type="submit" id="submit" name="buy" value="Buy" class="buy">
        <form method="post" action="cart.php">
          <input type="submit" id="submit" name="back" value="Cancel" class="cancel">
        </form>
       </div>
     </form>
   </div>
 </div><!--/main content-->
 <?php
   endModule(); //footer framework
   echo '<h2>POST data:</h2>';
   preShow($_POST);
   echo '<h2>SESSION data:</h2>';
   preShow($_SESSION);
   printMyCode();
 ?>
