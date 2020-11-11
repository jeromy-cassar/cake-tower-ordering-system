<?php
  session_start();
  include_once('tools.php');

  //POST / GET Request Processing Code

  topModule('CakeTower - Courses'); //header framework
  currentStyleNavLink('background-color:#fc2f8b; color:white; transition:0.4s; border:2px solid white; box-shadow:0px 8px 16px 0px rgba(0,0,0,0.2);');
 ?>
    <div class="main"><!--main content-->
        <h2>Cake Courses</h2>
        <p>Cake Tower offers small cake courses for all ages. Contact Cake Tower about their upcoming programs on Facebook!</p>
        <br>
        <div class="row"><!--image gallery-->
            <div class="column1">
              <img src="images/dripcake.jpg" class="gallery" alt="drip cake" width="300px" height="300px">
            </div>
            <div class="column2">
              <img src="images/cakes.jpg" class="gallery" alt="cupcakes" width="300px" height="300px">
            </div>
            <div class="column3">
              <img src="images/rainbowcupcakes.jpg" class="gallery" alt="rainbow cupcakes" width="300px" height="300px">
            </div>
        </div><!--/image gallery-->
        <a class="button" href="https://www.facebook.com/pages/biz/3030/Cake-Tower-1441842409422393/">Visit Cake Tower on Facebook</a>
    </div><!--/main content-->
    <?php
      endModule(); //footer framework
      printMyCode();
    ?>
