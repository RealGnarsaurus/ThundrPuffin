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
    <input type="text" name="username" value="">
    <br>
    Password:
    <br>
    <input type="text" name="password" value="">
    <br>
    Repeat Password:
    <br>
    <input type="text" name="password2" value="">
    <br>
    Email:
    <br>
    <input type="text" name="email" value="">
    <br>
    <input id="Public" type="text" name="localIP" value="" >
    <br>
    <input id="Local" type="text" name="publicIP" value="" >
    <br>
    <script type="application/javascript">
      function getIP(json) {
        document.getElementById("Public").value=json.ip; //
        //document.write("My public IP address is: ", json.ip);
      }
    </script>
    <script type="application/javascript" src="https://api.ipify.org?format=jsonp&callback=getIP"></script> <!--Public Ip-->
    <br>
    Accept Eula To Sign Up<button ></button><input type="checkbox" name="EULA" value="Agreed" required="required">
    <br>
    <input type="submit" value="Sign Up">
  </form>

 </body>
 </html>
