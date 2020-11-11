<?php
  session_start();
  include_once('tools.php');
  topModule('CakeTower - Product'); //header framework
  //POST / GET Request Processing Code
  //check if cancel is set (clicked):
  if (isset($_POST['cancel'])) {
      unset($_SESSION['cart']);
      $id = $colour = $type = $price = "";
      $qty = 0;
  }
  $error_msg = "";
  //print_r($_SESSION['cart']); //print data
 ?>
    <div class="main"><!--main content-->
        <h2>Order Cupcakes</h2>
        <div class="desc">
          <p>Cake Tower's speciality cupcakes, made with fresh ingredients, packed with a delicious flavour.<br>
          Select your choice of icing/fondant color, flavour, and quantity:</p><br>
            <div class="form-container">
             <form class="product-form" method="post" action="cart.php" onsubmit="return validate();">
              <p>Select Icing or Fondant:</p>
                <input type="radio" name="type" class="radio" checked>Icing
                <input type="radio" name="type" class="radio">Fondant<br>
              <p>Select icing/fondant colour:</p>
              <select class="colour" name="colour">
                <option id="none" value="none">None</option>
                <option id="red"value="red">Red</option>
                <option id="blue"value="blue">Blue</option>
                <option id="yellow"value="yellow">Yellow</option>
                <option id="white"value="white">White</option>
                <option id="black"value="black">Black</option>
              </select><br>
                <input type="hidden" name="id" value="C001">
                <p>Select flavour:</p>
                <select class="flavour" name="oid">
                  <option value="choc">Chocolate</option>
                  <option value="whitechoc">White Chocolate</option>
                  <option value="orang-ppyseed">Orange / Poppyseed</option>
                  <option value="carrot">Carrot</option>
                  <option value="red-vel">Red Velvet</option>
                </select><br>
                <p>Select quantity:</p>
                <button onclick="minus(); return false;" id="decrement">-</button>
                <input type="text" id="quantity" value="0" name="qty" onkeyup="restrict(this)">
                <button onclick="plus(); return false;" id="increment">+</button>
                <?php echo "<span>".$error_msg."</span>" ?>
                <br>
                <input type="submit" id="add" name="add" value="Add to Cart">
                <button type="button" id="submit" onclick="history.back()">Cancel</button>
                <span id="cost"></span>
              </form>
            </div>
          </div>
    </div><!--/main content-->
    <?php
      endModule(); //footer framework
    ?>
