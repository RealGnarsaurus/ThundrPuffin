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
  <form action="Helpers/Login_Check.php" autocomplete="off" method="post">
    Username:
    <br>
    <input type="text" name="loginCred"  value="">
    <br>
    Password:
    <br>
    <input type="password" name="password" autocomplete="off" value="">
    <br>
    <input type="submit" value="Login">
  </form>

 </body>
 </html>
