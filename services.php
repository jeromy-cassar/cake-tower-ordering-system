<?php
  session_start();
  include_once('tools.php');

  //POST / GET Request Processing Code

  topModule('CakeTower - Services'); //header framework
 ?>
    <div class="main"><!--main content-->
        <h2>Order</h2>
        <p>Ordering on our website allows users to order either a cake or cupcakes. Once ordered you will be sent a reference number<br>
          and you will be messaged on when to pick up your ordered product.<br>Select a product:</p><br>
        <br>
        <div class="order"><!--selection-->
          <div class="cupcake">
            <img src="images/cupcake-thumbnail.png" class="thumbnail"><br>
            <br>
            <p class="desc">Select the choice of coloured icing, flavour and quantity.</p>
            <a href="product.php" class="option">Cupcake</a>
          </div>
          <div class="cake">
            <img src="images/cake-thumbnail.jpeg" class="thumbnail"><br>
            <br>
            <p class="desc">Select the choice of tier level, flavour and icing/fondant.</p>
            <a href="javascript:void(0)" class="option">Cake</a>
          </div>
        </div><!--/selection-->
    </div><!--/main content-->
<?php
  endModule(); //footer framework
?>
