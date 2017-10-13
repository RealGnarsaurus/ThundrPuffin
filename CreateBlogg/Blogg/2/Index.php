<?php
session_start();
require('Helpers/db.php');
$bloggID = $_GET['bloggID'];
$userID = $_SESSION['userID'];
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
           <form action="../../Edit_Message.php" method="post">

             <input type="text" name="editUserID" value="<?php echo $userID;?>">
             <input type="text" name="editPostID" value="<?php echo $res2Temp;?>">
             <input type="text" name="editTextBefore" value="<?php echo $res2->Post;?>" hidden>
             <input type="text" name="editTextAfter" placeholder="<?php echo $res2->Post;?>" value="">
             <input type="text" name="bloggID" value="<?php echo $bloggID;?>" hidden>
             <input type="text" name="choice" value="Post">
             <input type="submit"name="" value="Edit">

           </form>
           <?php
           $sql5 = "SELECT * FROM report where UserID='$userID' AND PostID='$res2Temp' AND CommentID = '0'";
           echo $sql5;
           $stmt5 = $dbh->prepare($sql5);
           $stmt5->execute();
           $result5 = $stmt5->fetchAll();
           if (empty($result5)) {

           ?>
           <!--This is for report system-->
           <form action="../../Edit_Message.php" method="post">

             <input type="text" name="bloggID" value="<?php echo $bloggID;?>" hidden>
             <input type="text" name="reportPostID" value="<?php echo $res2Temp;?>">
             <input type="text" name="reportUserID" value="<?php echo $userID;?>">
             <?php
             $link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
             if (empty($userID)){?>
               <input type="text" name="reportPrio" value="5">

               <?php
             }
             else{?>
               <input type="text" name="reportPrio" value="1">
               <?php

             }?>
             <input type="text" name="reportUrl" value="<?php echo $link;?>">
             <input type="text" name="choice" value="Report">
             <input type="submit"name="" value="Report">

           </form>
           <?php
         }
            ?>
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
         <form action="../../Edit_Message.php" method="post">

           <input type="text" name="editUserID" value="<?php echo $userID;?>">
           <input type="text" name="editCommentID" value="<?php echo $res2Temp;?>">
           <input type="text" name="editTextBefore" value="<?php echo $res3->Message;?>">
           <input type="text" name="editTextAfter" value="<?php echo $res3->Message;?>">
           <input type="text" name="bloggID" value="<?php echo $bloggID;?>" hidden>
           <input type="text" name="choice" value="Comment">
           <input type="submit"name="" value="Edit">

         </form>
         <?php
         $sql4 = "SELECT * FROM report where UserID='$userID' AND CommentID='$res2Temp'";
         echo $sql4;
         $stmt4 = $dbh->prepare($sql4);
         $stmt4->execute();
         $result4 = $stmt4->fetchAll();
         if (empty($result4)) {

         ?>
         <form action="../../Edit_Message.php" method="post">

           <input type="text" name="bloggID" value="<?php echo $bloggID;?>" hidden>
           <input type="text" name="reportPostID" value="<?php echo $res2Temp;?>">
           <input type="text" name="reportCommentID" value="<?php echo $res3->ID;?>">
           <input type="text" name="reportUserID" value="<?php echo $userID;?>">
           <?php
           $link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
           if (empty($userID)){?>
             <input type="text" name="reportPrio" value="5">

             <?php
           }
           else{?>
             <input type="text" name="reportPrio" value="1">
             <?php

           }?>
           <input type="text" name="reportUrl" value="<?php echo $link;?>">
           <input type="text" name="choice" value="Report">
           <input type="submit"name="" value="Report">

         </form>
         <?php
        }
          ?>
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
