<?php
session_start();
require('Helpers/db.php');
$bloggID = $_GET['bloggID'];
$userID = $_SESSION['userID'];

$sql7 = "SELECT * FROM permission where UserID='$userID'";
//echo $sql;
$stmt7 = $dbh->prepare($sql7);
$stmt7->execute();
$result7 = $stmt7->fetchAll();
if (!empty($result7)) {
  $sql8 = "INSERT INTO `permission`(`BloggID`, `UserID`, `Message`, `Comment`, `Edit`, `Del`) VALUES ('$bloggID','$userID','0','1','0','0')";
  //echo $sql;
  $stmt8 = $dbh->prepare($sql8);
  $stmt8->execute();
  $result8 = $stmt8->fetchAll();
}
$sql = "SELECT * FROM blogg where UserID='$userID'";
//echo $sql;
$stmt = $dbh->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
$resTemp = $result[0]->ID;
//echo $resTemp;
$sql2 = "SELECT * FROM post where BloggID='$resTemp'";
//echo $sql2;
$stmt2 = $dbh->prepare($sql2);
$stmt2->execute();
$result2 = $stmt2->fetchAll();
?>
 <!DOCTYPE html>
 <html>
 <link rel="stylesheet" href="style.css">
 <script src="Helpers/Edit.Js"></script> <!--Edit Forms Script-->
 <script src="Helpers/IP.js"></script><!--LocalIp-->

 <script type="application/javascript" src="https://api.ipify.org?format=jsonp&callback=getIP"></script> <!--Public Ip-->
 <body onload="GetLocalIp();">
   <br>
   <a href="../../Index.php">Gotta Go Back</a>
   <br>
   <div id="container">
     <div id="header">
     <h1><?php echo $result[0]->Name;?></h1>
   </div>
   <div id="newPost">
    <form action="Helpers/newPost.php" method="post">
      <textarea name="post"></textarea>
      <br>
        <input id="local" type="text" name="localIP" value="" hidden>
        <input id="public" type="text" name="publicIP" value="" hidden>
        <input type="text" name="userID" value="<?php echo $bloggID;?>"hidden>
        <input type="text" name="bloggID" value="<?php echo $resTemp;?>"hidden>
        <input type="text" name="choice" value="post" hidden>
        <input type="submit" name="" value="Send">
    </form>
 </div>
   <div id="postFeed">
     <?php
     foreach ($result2 as $res2) {
       $res2Temp = $res2->ID;
       ?>
       <div id="post">

         <h2><?php echo $res2->Post . " - " . $res2->Dates;//This Prints The Post?><button id="" class="openComment" onclick="edit('SB',<?php echo $res2Temp?>)">+</button>
           <form action="Edit_Message.php" method="post">

             <input type="text" name="editUserID" value="<?php echo $userID;?>">
             <input type="text" name="editPostID" value="<?php echo $res2Temp;?>">
             <input type="text" name="editTextBefore" value="<?php echo $res2->Message;?>">
             <input type="text" name="editTextAfter" value="">
             <input type="submit"name="" value="Edit">

           </form>
         </h2>
         <?php

         $sql3 = "SELECT * FROM comment where PostID='$res2Temp'";
         //echo $sql3;
         $stmt3 = $dbh->prepare($sql3);
         $stmt3->execute();
         $result3 = $stmt3->fetchAll();?>
         <form class="SB<?php echo $res2Temp?>" action="Helpers/newPost.php" method="post" hidden>
           <textarea class="SB<?php echo $res2Temp?>" name="comment" hidden></textarea>
           <br>
             <input  type="text" name="postID" value="<?php echo $res2Temp;?>" hidden>
             <input  type="text" name="choice" value="comment" hidden>
             <input type="text" name="bloggID" value="<?php echo $bloggID;?>" hidden>
             <input id="local" type="text" name="localIP" value="" hidden>
             <input id="Public" type="text" name="publicIP" value="" hidden>
             <script type="application/javascript">
               function getIP(json) {
                 document.getElementById("Public").value=json.ip; //
                 //document.write("My public IP address is: ", json.ip);
               }
             </script>
             <script type="application/javascript" src="https://api.ipify.org?format=jsonp&callback=getIP"></script> <!--Public Ip-->
             <input class="SB<?php echo $res2Temp?>" type="submit" name="" value="Send" hidden>

         </form>
      </div>

      <?php
       foreach ($result3 as $res3) {
         ?>

         <div id="comment">
          <h3><?php echo $res3->Message . " - " . $res3->Dates ;//This Prints The Post?></h3>
         </div>

         <br>
         <br>
         <?php
       }
     }
      ?>
   </div>
 </div>
 </body>
 </html>
