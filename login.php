<?php
  session_start();
  include_once('tools.php');

  //POST / GET Request Processing Code

  topModule('CakeTower - Login'); //header framework
  currentStyleNavLink('background-color:#fc2f8b; color:white; transition:0.4s; border:2px solid white; box-shadow:0px 8px 16px 0px rgba(0,0,0,0.2);');
 ?>
    <div class="main"><!--main content-->
        <h2>Login</h2><br>
        <div class="login-container">
          <form class="login-form" action="https://titan.csit.rmit.edu.au/~e54061/wp/processing.php" target="_blank" method="post"><!--login form-->
            <label for="email">Email:</label><br>
              <input type="email" id="email" name="email" required><br>
            <label for="password">Password:</label><br>
              <input type="password" id="password" name="password" required><br>
            <input type="submit" id="submit" value="Submit">
            <input type="button" id="back" onclick="history.back()" value="Cancel"><!--sends user back to previous page-->
          </form><!--/login form-->
        </div>
    </div><!--/main content-->
    <?php
      endModule(); //footer framework
      printMyCode();
    ?>
