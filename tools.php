<?php
//---framework---
//framework header (title, header & nav-bar)
  function topModule($pageTitle) {
    $outputHeader = <<<"HEADER"
    <!DOCTYPE html>
    <html lang='en'>
      <head>
        <meta charset="utf-8">
        <title>$pageTitle</title>

        <!-- Keep wireframe.css for debugging, add your css to style.css -->
        <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
        <link id='stylecss' type="text/css" rel="stylesheet" href="css/style.css">
        <script src='../wireframe.js'></script>
        <script src='script.js'></script>
        <link href="https://fonts.googleapis.com/css?family=Aladin" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      </head>
      <body>
      <div class="wrapper">
        <header class="header"><!--header-->
        <div class="title"><!--title-->
            <p>Cake Tower</p>
            <img src="images/caketower.png" alt="Cake Tower" width="100px" height="100px">
        </div><!--/title-->
        <div class="main-nav"><!--nav-container-->
        <nav>
          <ul>
          <li><a href="index.php">HOME</a></li>
          <li class="dropdown">
          <a href="javascript:void(0)" class="dropbtn">SERVICES</a>
            <div class="dropdown-content">
              <a href="products.php">CAKE ORDERING</a>
              <a href="courses.php">CAKE COURSES</a>
            </div>
          <li><a href="cart.php">CART</a></li>
          </li>
          <li style="float:right;"><a class="login" href="login.php">LOGIN</a></li>
          </ul>
        </nav>
        </div><!--/nav-container-->
      </header><!--/header-->
HEADER;
  echo $outputHeader;
  }

//framework footer
function endModule() {
  $outputFooter = <<<"FOOTER"
  <footer class="footer"><!--footer-->
      <p>Visit Cake Tower on Facebook:<a href="https://www.facebook.com/pages/biz/3030/Cake-Tower-1441842409422393/"><img class="facebook" src="images/facebook.png" width="20px" height="20px"></a></p>
      <div>&copy;<script>
      document.write(new Date().getFullYear());
      </script> Jeromy Cassar | s3717004 </div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id ='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
      <div id="product"><a href="products.txt" target="_blank" class="txt-file-link">Link to products.txt</a><a href="orders.txt" target="_blank" class="txt-file-link">Link to orders.txt</a></div>
  </footer><!--/footer-->
  </div>
  </body>
  </html>
FOOTER;
    echo $outputFooter;
}
//form framework functions:
function productsVALID(){
  $valid = <<< "valid"
  <div class="order"><!--selection-->
    <div class="cupcake">
      <img src="images/cupcake-thumbnail.png" class="thumbnail"><br><br>
      <p class="desc">Delicious cupcakes made from delicious ingredients.</p><br>
      <a class="product-btn" href="cupcake.php">Cupcake</a>
    </div><!--/.cupcake-->

    <div class="cake">
      <img src="images/cake-thumbnail.jpeg" class="thumbnail"><br><br>
      <p class="desc">Delicious cakes made from delicious ingredients.</p><br>
      <a class="product-btn" href="cake.php">Cake</a>
    </div><!--/.cake-->

    <div class="slices">
      <img src="images/slice-thumbnail.jpg" class="thumbnail"><br><br>
      <p class="desc">Delicious slices made from delicious ingredients.</p><br>
      <a class="product-btn" href="slice.php">Slice</a>
    </div><!--/.slices-->
  </div><!--/selection-->
valid;
  	echo $valid;
}
function productsINVALID(){
  $invalid = <<< "invalid"
  <div class="cupcake">
    <img src="images/cupcake-thumbnail.png" class="thumbnail">
    <p class="desc">Delicious cupcakes made from delicious ingredients.</p>
  </div><!--/.cupcake-->
  <div class="cake">
    <img src="images/cake-thumbnail.jpeg" class="thumbnail">
    <p class="desc">Delicious cakes made from delicious ingredients.</p>
  </div><!--/.cake-->
  <div class="slices">
    <img src="images/" class="thumbnail">
    <p class="desc">Delicious slices made from delicious ingredients.</p>
  </div><!--/.slices-->
invalid;
  echo $invalid;
}
//empty cart function
function noCart(){
  $noCart = <<<"NOCART"
  <h2>Your cart is empty</h2><br>
  <p>If you wish to order our finest products, <a href="products.php" class="btn">browse now!</a></p><br>
  </div>
  </div>
NOCART;
  echo $noCart;
}
//calculate total price
function sum(){
  $num = count($_SESSION['receipt']);
  $total=0;
  for($i=0;$i<$num;$i++){
    $total+=$_SESSION['receipt'][$i]['price'];
  }
  $total=number_format($total, 2, '.', '');
  return $total;
}
//---debug modules---
//print data and shape/structure of data:
function preShow( $arr, $returnAsString=false ) {
  $ret  = '<pre>' . print_r($arr, true) . '</pre>';
  if ($returnAsString)
    return $ret;
  else
    echo $ret;
}

//print source code:
function printMyCode() {
  $lines = file($_SERVER['SCRIPT_FILENAME']);
  echo "<pre class='mycode'>\n";
  foreach ($lines as $lineNo => $lineOfCode)
     printf("%3u: %1s \n", $lineNo, rtrim(htmlentities($lineOfCode)));
  echo "</pre>";
}

//styling current nav-link:
function currentStyleNavLink($css) {
  $here = $_SERVER['SCRIPT_NAME'];
  $bits = explode('/',$here);
  $filename = $bits[count($bits)-1];
  echo "<style>nav a[href$='$filename'] { $css }</style>";
}
 ?>
