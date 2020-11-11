<?php
  session_start();
  include_once('tools.php');
  //POST / GET Request Processing Code
  echo '<script>alert("Transaction Successful");</script>';
  if(isset($_POST['ok'])){
    unset($_SESSION['receipt']);
    header("Location: index.php");
  }
  topModule('CakeTower - Checkout'); //header framework
 ?>
 <div class="main"><!--main content-->
   <h2>Your Receipt:</h2>
   <div class="receipt">
     <div class="top">
       <div class="company">
         <div class="image-logo">
           <img src="images/caketower.png" width="100px" height="100px">
         </div><!--/.image-logo-->
         <div class="company-txt">
           <h2>Cake Tower</h2><br>
           <p>Lisa Cassar</p>
         </div><!--/.company-txt-->
       </div><!--/.company-->
       <div class="contact">
         <p>Facebook: caketower<br>
            Email: lisascaketower@outlook.com<br>
            Mobile: (04)07 425 753</p>
       </div><!--/.contact-->
     </div><!--/.top-->
     <div class="personal-details">
       <p>
         <strong>Name:    </strong><?= $_SESSION['receipt'][0]['name']?><br>
         <strong>Email:   </strong><?= $_SESSION['receipt'][0]['email']?><br>
         <strong>Address:   </strong><?= $_SESSION['receipt'][0]['address']?><br>
         <strong>Mobile:    </strong><?= '(04) '.$_SESSION['receipt'][0]['mobile']?><br>
         <strong>Date of purchase:    </strong><?= $_SESSION['receipt'][0]['date']?><br>
       </p>
     </div><!--/.personal-details-->
     <div id="order">
       <div class="orderMiddle">
       <h2>Your Order:</h2><br>
       <table>
         <tr class="headings">
           <th>ID</th>
           <th>OID</th>
           <th>Quantity</th>
           <th>Unit Price</th>
           <th>Subtotal</th>
          </tr>
        <?php
      $numItems = count($_SESSION['receipt']);
      for($i=0; $i < $numItems; $i++){
        echo '<tr>';
        echo '<th>'.$_SESSION['receipt'][$i]['id'].'</th>';
        echo '<th>'.$_SESSION['receipt'][$i]['oid'].'</th>';
        echo '<th>'.$_SESSION['receipt'][$i]['qty'].'</th>';
        echo '<th>$'.$_SESSION['receipt'][$i]['unitPrice'].'</th>';
        echo '<th>$'.$_SESSION['receipt'][$i]['price'].'</th>';
        echo '</tr>';
      }
        ?>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th>Total:</th>
        <th><?='$'.sum();?></th>
      </tr>
      </table>
       </div>
     </div><!--/.order-->
     <div class="bottom">
       <p>Thank you for shopping with<br>Cake Tower</p>
     </div>
  </div><!--/.receipt-->
  <form method="post" id="ok">
    <input type="submit" id="submit" name="ok" value="OK">
  </form>
</div><!--/main content-->
<?php
   endModule(); //footer framework
   echo '<h2>SESSION data</h2>';
   preShow($_SESSION);
   printMyCode();
 ?>
