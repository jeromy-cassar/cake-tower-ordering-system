<?php
  session_start();
  include_once('tools.php');
  topModule('CakeTower - Products'); //header framework
  $cart = array(); //stores POST data; used for appending
  //check if user adds cupcake to cart:
  if(isset($_POST['addCupcake'])){
    //check if there user wants to append cart:
    if($_POST['qty'] > 0 && $_POST['id']=="C001"){
      //check if there is already an order in the cart session array:
      if(isset($_SESSION['cart'])){
        //re-calculate price server-side
        $price = number_format((float)($_POST['qty']*2.50),2,'.','');
        $_POST['price'] = $price;
        //get POST data to array
        $cart = $_POST;
        array_push($_SESSION['cart'], $cart); //append to cart
      }else{
        //re-calculate price server-side
        $price = number_format((float)($_POST['qty']*2.50),2,'.','');
        $_POST['price'] = $price;
        //get POST data to array
        $cart = $_POST;
        $_SESSION['cart'][] = $cart; //add to cart
      }
    }
  }
 ?>
 <div class="main"><!--main content-->
   <div class="cupcake">
     <img src="images/cupcake-thumbnail.png" class="thumbnail"><br><br>
     <p class="desc">Select the choice of coloured icing, flavour and quantity:</p>
     <div class="form-container">
      <form class="product-form" method="post" onsubmit="return validateCupcake();">
      <input type="hidden" name="id" value="C001">
       <p>Select icing colour:</p>
       <select class="colour" name="colour">
         <option id="none" value="none">None</option>
         <option id="red" value="red">Red</option>
         <option id="blue" value="blue">Blue</option>
         <option id="yellow" value="yellow">Yellow</option>
         <option id="white" value="white">White</option>
         <option id="black" value="black">Black</option>
       </select><br>
       <br>
         <p>Select flavour:</p>
         <select class="flavour" name="oid">
           <option value="choc">Chocolate</option>
           <option value="whitechoc">White Chocolate</option>
           <option value="orange-poppyseed">Orange / Poppyseed</option>
           <option value="carrot">Carrot</option>
           <option value="red-velvet">Red Velvet</option>
         </select><br>
         <br>
         <p>Select quantity:</p>
         <button onclick="minusCupcake(); return false;" class="decrement">-</button>
         <input type="text" id="quantityCupcake" class="quantity" value="0" name="qty" onkeydown="restrict(this)" oninput="calcCupcake()">
         <button onclick="plusCupcake(); return false;" class="increment">+</button><br>
         <input type="submit" id="add" name="addCupcake" value="Add to Cart"><br>
         <span id="costCupcake">$0.00</span>
       </form>
     </div><!--/form-container-->
     <a href="products.php" class="product-btn">Back to selection</a>
   </div><!--/.cupcake-->
</div><!--/main content-->
<?php
  endModule(); //footer framework
  echo '<h2>POST data:</h2>';
  preShow($_POST);
  echo '<h2>SESSION data:</h2>';
  preShow($_SESSION);
  printMyCode();
?>
