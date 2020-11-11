<?php
  session_start();
  include_once('tools.php');
  //POST / GET Request Processing Code
  //check if user cancels cart
  if(isset($_POST['cancel'])){
    unset($_SESSION['cart']); //empty cart array
    header("Location: products.php"); //redirect
  }
  topModule('CakeTower - Cart'); //header framework
  currentStyleNavLink('background-color:#fc2f8b; color:white; transition:0.4s; border:2px solid white; box-shadow:0px 8px 16px 0px rgba(0,0,0,0.2);');
 ?>
<div class="main"><!--main content-->
  <div class="results">
    <h2>Your item(s):</h2>
    <div class = "item-container">
    <?php
    //check if user has ordered
    if(isset($_SESSION['cart'])){
    $numItems = count($_SESSION['cart']); //get the total amount of items in the cart
    //print/display all items:
    for($i = 0; $i < $numItems; $i++){
      if($_SESSION['cart'][$i]['id'] == "C001"){
        echo '<div class="item">';
        echo '<div class="left">';
        echo '<p class="name">'.$_SESSION['cart'][$i]['id'].'<p>';
        echo '<img src="images/cupcake-thumbnail.png" height="100px" width="100px" class="product-image">';
        echo '</div>';
        echo '<div class="middle">';
        echo '<p class="oid">Flavour: '.$_SESSION['cart'][$i]['oid'].'</p>';
        echo '<p class="colourR">Colour: '.$_SESSION['cart'][$i]['colour'].'</p>';
        echo '</div>';
        echo '<div class="right">';
        echo '<p class="price">$'.$_SESSION['cart'][$i]['price'].'</p>';
        echo '<p class="qty">Quantity: '.$_SESSION['cart'][$i]['qty'].'</p>';
        echo '</div>';
        echo '</div><br>';
        //remove add element:
        unset($_SESSION['cart'][$i]['addCupcake']);
      }
    if($_SESSION['cart'][$i]['id'] == "C002"){
      echo '<div class="item">';
        echo '<div class="left">';
        echo '<p class="name">'.$_SESSION['cart'][$i]['id'].'<p>';
        echo '<img src="images/cake-thumbnail.jpeg" height="100px" width="100px" class="product-image">';
        echo '</div>';
        echo '<div class="middle">';
        echo '<p class="oid">Flavour: '.$_SESSION['cart'][$i]['oid'].'</p>';
        echo '<p class="typeR">Type: '.$_SESSION['cart'][$i]['type'].'</p>';
        echo '<p class="tier">Tier: '.$_SESSION['cart'][$i]['tier'].'</p>';
        echo '<p class="colourR">Colour: '.$_SESSION['cart'][$i]['colour'].'</p>';
        echo '</div>';
        echo '<div class="right">';
        echo '<p class="price">$'.$_SESSION['cart'][$i]['price'].'</p>';
        echo '<p class="qty">Quantity: '.$_SESSION['cart'][$i]['qty'].'</p>';
        echo '</div>';
        echo '</div><br>';
        //remove add element:
        unset($_SESSION['cart'][$i]['addCake']);
      }
      if($_SESSION['cart'][$i]['id'] == "C003"){
        echo '<div class="item">';
        echo '<div class="left">';
        echo '<p class="name">'.$_SESSION['cart'][$i]['id'].'<p>';
        echo '<img src="images/slice-thumbnail.jpg" height="100px" width="100px" class="product-image">';
        echo '</div>';
        echo '<div class="middle">';
        echo '<p class="oid">Flavour: '.$_SESSION['cart'][$i]['oid'].'</p>';
        echo '</div>';
        echo '<div class="right">';
        echo '<p class="price">$'.$_SESSION['cart'][$i]['price'].'</p>';
        echo '<p class="qty">Quantity: '.$_SESSION['cart'][$i]['qty'].'</p>';
        echo '</div>';
        echo '</div><br>';
        //remove add element:
        unset($_SESSION['cart'][$i]['addSlice']);
      }
    }
    function purchaseControls(){
      //get total price
        $numItems = count($_SESSION['cart']); //get the total amount of items in the cart
        $totalPrice = 0; //gets total price of order
        //loop through each order and summarise the price:
        for($i = 0; $i < $numItems; $i++){
          $totalPrice += $_SESSION['cart'][$i]['price']; //calculated total
        }
        $total = '$'.number_format($totalPrice,2,'.',''); //format price to appropriate AUS currency

      $output = <<<"OUTPUT"
      </div><!--/.item-container--><br>
        <div class="checkout-buttons">
          <form class="cart-form" action="checkout.php" method="post">
            <input type="submit" name="checkout" id="submit" value="Checkout" class="checkout">
          </form>
          <form class="cancel-form" method="post">
            <input type="submit" name="cancel" id="submit" value="Cancel" class="checkout">
          </form>
        </div>
      </div>
      <h2 class="totalLabel">Total: <strong class="totalPrice">$total</strong></h2>
OUTPUT;
  echo $output;
    }
    purchaseControls();
  }else{
      noCart();//display empty cart screen
    }
    ?>
</div><!--/main content-->
 <?php
   endModule(); //footer framework
   //debug
   //print data structure
   echo '<h2>Session data:</h2>';
   preShow($_SESSION);
   //print page code
   printMyCode();
 ?>
