<?php
  session_start();
  include_once('tools.php');

  //POST / GET Request Processing Code
  topModule('CakeTower - Home'); //header framework
  currentStyleNavLink('background-color:#fc2f8b; color:white; transition:0.4s; border:2px solid white; box-shadow:0px 8px 16px 0px rgba(0,0,0,0.2);');
 ?>
</header><!--/header-->
    <div class="main"><!--main content-->
        <h2>About Cake Tower</h2>
        <p>Welcome to Cake Tower! We are a small cake baking business run by Lisa Cassar, where we sell high quality goods and products. She
          has created cakes and found a hobby in designing divine and delicious cakes around the western suburbs. Cake Tower specializes in wedding and celebration cakes for that special occasion.<br>
        </p><br><br>
          <h2>Goals and future plans</h2>
          <p>Cake Tower's irresistible cakes, cupcakes and speciality cookies will suit any occasion.<br>
          We ensure our cakes taste and look amazing.</p><br><br>
          <p>For pricing guide contact us for a quote:<br>
          <strong>Email:</strong> lisascaketower@outlook.com<br>
          <strong>Facebook:</strong> caketower<br>
          <strong>Mobile:</strong> 0407 425 753</p>
    </div><!--/main content-->
<?php
  endModule(); //footer framework
  echo '<h2>SESSION data</h2>';
  preShow($_SESSION);
  printMyCode();
?>
