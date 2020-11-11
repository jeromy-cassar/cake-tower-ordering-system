<?php
  session_start();
  include_once('tools.php');
  //POST / GET Request Processing Code
  if(isset($_POST['viewCart'])){
    header("Location: cart.php");
  }
  topModule('CakeTower - Products'); //header framework
  currentStyleNavLink('background-color:#fc2f8b; color:white; transition:0.4s; border:2px solid white; box-shadow:0px 8px 16px 0px rgba(0,0,0,0.2);');
 ?>
 <div class="main"><!--main content-->
        <h2>Order</h2>
        <p>Ordering on our website allows users to order cake, cupcakes and slices.<br>
        Choose from the following:</p><br>
<?php
        productsVALID();
?>
<div id="button">
  <form method="post" id="ok">
    <input type="submit" id="submit" name="viewCart" value="View Cart" class="cart-btn">
  </form>
</div>
</div><!--/main content-->
<?php
  endModule(); //footer framework
  echo '<h2>SESSION data:</h2>';
  preShow($_SESSION);
  printMyCode();
?>
