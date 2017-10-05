<?php

 ?>
<!DOCTYPE html>
<html>
    <script src="IP.js"></script><!--LocalIp-->
<body onload="GetLocalIp();">
  <h2 id="Local">Testing Page</h2>
  <h2 id="Public">Testing Page</h2>
  <script type="application/javascript">
    function getIP(json) {
      document.getElementById("Public").textContent="Public: " +json.ip; //
      //document.write("My public IP address is: ", json.ip);
    }
  </script>
  <script type="application/javascript" src="https://api.ipify.org?format=jsonp&callback=getIP"></script> <!--Public Ip-->


</body>
</html>
