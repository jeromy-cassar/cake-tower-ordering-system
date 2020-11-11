<?php
  session_start();
  include_once('tools.php');
  topModule('CakeTower - Products'); //header framework
  $cart = array(); //stores POST data; used for appending
  //check if user adds slice to cart:
if(isset($_POST['addSlice'])){
  if($_POST['qty'] > 0 && $_POST['id']=="C003"){
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
   <div class="slice-order">
     <img src="images/slice-thumbnail.jpg" class="thumbnail"><br><br>
     <p class="desc">Select the choice of type and quantity:</p><br>
     <div class="form-container">
      <form class="product-form" method="post" onsubmit="return validateSlice();">
         <input type="hidden" name="id" value="C003">
         <p>Select flavour:</p>
         <select class="type" name="oid" class="type">
           <option value="vanilla" selected>Vanilla Slice</option>
           <option value="caramel">Caramel Slice</option>
           <option value="mint">Mint Slice</option>
           <option value="lemon">Lemon Slice</option>
           <option value="jelly">Jelly Slice</option>
         </select><br>
         <br>
         <p>Select quantity:</p>
         <button onclick="minusSlice(); return false;" class="decrement">-</button>
         <input type="text" class="quantity" id="quantitySlice" value="0" name="qty" onkeydown="restrict(this)" oninput="calcSlice()">
         <button onclick="plusSlice(); return false;" class="increment">+</button><br>
         <input type="submit" id="add" name="addSlice" value="Add to Cart"><br>
         <span id="costSlice" name="price">$0.00</span>
       </form>
     </div><!--/form-container-->
     <a href="products.php" class="product-btn">Back to selection</a>
   </div><!--/.slices-->
</div><!--/main content-->
<?php
  endModule(); //footer framework
  echo '<h2>POST data:</h2>';
  preShow($_POST);
  echo '<h2>SESSION data:</h2>';
  preShow($_SESSION);
  printMyCode();
?>
