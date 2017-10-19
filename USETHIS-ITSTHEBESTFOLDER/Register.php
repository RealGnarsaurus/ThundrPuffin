<?php
session_start();

  require('Helpers/db.php');

 ?>
 <!DOCTYPE html>
 <html>
 <script src="Helpers/IP.js"></script><!--LocalIp-->
 <?php
 $IP;
  if (!empty($_SESSION['errorMsg'])) {
    ?>
    <h2><?php echo $_SESSION['errorMsg'];?></h2>
    <?php
  }
  ?>

 <body onload="GetLocalIp();">
  <form action="Helpers/Reg_Check.php" method="post">
    Username:
    <br>
    <input type="text" name="username"  minlength="5" value="" required>
    <br>
    Password:
    <br>
    <input type="password" name="password" minlength="8" value="" required>
    <br>
    Repeat Password:
    <br>
    <input type="password" name="password2" minlength="8" value="" required>
    <br>
    Email:
    <br>
    <input type="email" name="email" value="" required>
    <br>
    <input id="Public" type="text" name="localIP" value="" >
    <br>
    <input id="Local" type="text" name="publicIP" value="" >
    <script type="application/javascript">
      function getIP(json) {
        document.getElementById("Public").value=json.ip; //
        //document.write("My public IP address is: ", json.ip);
      }
    </script>
    <script type="application/javascript" src="https://api.ipify.org?format=jsonp&callback=getIP"></script> <!--Public Ip-->

    Accept Eula To Sign Up<input type="checkbox" name="EULA" value="Agreed" required="required">
    <br>
    <input type="submit" value="Sign Up">
  </form>

 </body>
 </html>
