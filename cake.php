<?php
  session_start();
  include_once('tools.php');
  topModule('CakeTower - Products'); //header framework

    $cart = array(); //stores POST data; used for appending
  if(isset($_POST['addCake'])){
    if($_POST['qty'] > 0 && $_POST['id']=="C002") {
    //check if there is already an order in the cart session array:
      if(isset($_SESSION['cart'])){
        //re-calculate price server-side
        $price = number_format((float)($_POST['qty']*100.00),2,'.','');
        $_POST['price'] = $price;
        //get POST data to array
        $cart = $_POST;
        array_push($_SESSION['cart'], $cart); //append to cart
        }else{
          //re-calculate price server-side
          $price = number_format((float)($_POST['qty']*100.00),2,'.','');
          $_POST['price'] = $price;
          //get POST data to array
          $cart = $_POST;
          $_SESSION['cart'][] = $cart; //add to cart
        }
      }
  }
 ?>
 <div class="main"><!--main content-->
   <div class="cake">
     <img src="images/cake-thumbnail.jpeg" class="thumbnail"><br><br>
     <p class="desc">Select the choice of coloured icing, flavour and quantity:</p>
     <div class="form-container">
      <form class="product-form" method="post" onsubmit="return validateCake();">
       <input type="hidden" name="id" value="C002">
       <p>Select icing or fondant</p>
         <input type="radio" name="type" value="icing"checked>Icing
         <input type="radio" name="type" value="fondant">Fondant
       <br>
       <p>Select icing colour:</p>
       <select class="colour" name="colour">
         <option id="none" value="none" selected>None</option>
         <option id="red" value="red">Red</option>
         <option id="blue" value="blue">Blue</option>
         <option id="yellow" value="yellow">Yellow</option>
         <option id="white" value="white">White</option>
         <option id="black" value="black">Black</option>
       </select><br>
       <br>
         <p>Select flavour:</p>
         <select class="flavour" name="oid">
           <option value="choc" selected>Chocolate</option>
           <option value="whitechoc">White Chocolate</option>
           <option value="orange-poppyseed">Orange / Poppyseed</option>
           <option value="carrot">Carrot</option>
           <option value="red-velvet">Red Velvet</option>
         </select><br>
         <br>
         <p>Select tier:</p>
           <input type="radio" name="tier" value="1" checked>1
           <input type="radio" name="tier" value="2">2
           <input type="radio" name="tier" value="3">3
         <br>
         <p>Select quantity:</p>
         <button onclick="minusCake(); return false;" class="decrement">-</button>
         <input type="text" class="quantity" id="quantityCake" value="0" name="qty" onkeydown="restrict(this)" oninput="calcCake()">
         <button onclick="plusCake(); return false;" class="increment">+</button><br>
         <input type="submit" id="add" name="addCake" value="Add to Cart"><br>
         <span id="costCake">$0.00</span>
       </form>
     </div><!--/form-container-->
     <a href="products.php" class="product-btn">Back to selection</a>
   </div><!--/.cake-->
</div><!--/main content-->
<?php
  endModule(); //footer framework
  echo '<h2>POST data:</h2>';
  preShow($_POST);
  echo '<h2>SESSION data:</h2>';
  preShow($_SESSION);
  printMyCode();
?>
