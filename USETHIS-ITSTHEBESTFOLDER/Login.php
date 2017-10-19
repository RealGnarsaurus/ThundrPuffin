<?php
session_start();

  require('Helpers/db.php');
  //$password = password_hash($password, PASSWORD_DEFAULT);
 ?>
 <!DOCTYPE html>
 <html>
 <?php
  if (!empty($_SESSION['errorMsg'])) {
    ?>
    <h2><?php echo $_SESSION['errorMsg'];?></h2>
    <?php

  }
  ?>

 <body>
  <form action="Helpers/Login_Check.php" method="post">
    Username:
    <br>
    <input type="text" name="loginCred" value="">
    <br>
    Password:
    <br>
    <input type="text" name="password" value="">
    <br>
    <input type="submit" value="Login">
  </form>

 </body>
 </html>
