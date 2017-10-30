<?php
session_start();
require('../../helpers/db.php');
$bloggID = $_GET['bloggID'];

if (!empty($recentlyInserted)) {

}
  else{
  if (!empty($_POST['reportedPostID'])) {
      $reportedPostID = $_POST['reportedPostID'];
  }
  else{
    $reportedPostID = "*";
  }
  if (!empty($_POST['reportedCommentID'])) {
    $reportedCommentID = $_POST['reportedCommentID'];
  }
  else{
    $reportedCommentID = "*";
  }
  if (empty($_GET['bloggID'])) {
    header("Location:../../index.php");
  }
  if (!empty($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
    $sql7 = "SELECT * FROM permission where BloggID=:bloggID AND UserID = :userID";
    //echo $sql7;
    $stmt7 = $dbh->prepare($sql7);
    $stmt7->bindParam(':bloggID', $bloggID, PDO::PARAM_INT);
    $stmt7->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt7->execute();
    $result7 = $stmt7->fetchAll();

    if (empty($result7)) {
      $sql8 = "INSERT INTO `permission`(`BloggID`, `UserID`, `Post`, `Comment`, `Edit`, `Del`) VALUES (:bloggID,:userID,'0','1','0','0')";
      //echo $sql8;
      $stmt8 = $dbh->prepare($sql8);
      $stmt8->bindParam(':bloggID', $bloggID, PDO::PARAM_INT); //mby works
      $stmt8->bindParam(':userID', $userID, PDO::PARAM_INT); //mby works
      $stmt8->execute();
      $recentlyInserted = "true";
      header("Refresh:0");

    }
  }
  if(empty($_SESSION['userID'])){
    $userID = 0;
  }
}


$sql = "SELECT * FROM blogg where ID=:bloggID";
//echo $sql;
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':bloggID', $bloggID, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll();
if (empty($result)) {
  header("Location:../../index.php");
}
$resTemp = $result[0]->ID;
//echo $resTemp;
$sql2 = "SELECT * FROM post where BloggID=:resTemp";
//echo $sql2;
$stmt2 = $dbh->prepare($sql2);
$stmt2->bindParam(':resTemp', $resTemp, PDO::PARAM_INT);
$stmt2->execute();
$result2 = $stmt2->fetchAll();
?>
 <!DOCTYPE html>
 <html>
 <link rel="stylesheet" href="../<?php echo $bloggID;?>/style.css">
 <script src="../../helpers/edit.Js"></script> <!--Edit Forms Script-->
 <script src="../../helpers/ip.js"></script><!--LocalIp-->
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 <!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <!-- Latest compiled JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link href="../../css/welcomeStyle.css" rel="stylesheet">
 <link href="../../css/main.css" rel="stylesheet">
 <script type="application/javascript" src="https://api.ipify.org?format=jsonp&callback=getIP"></script> <!--Public Ip-->
 <body onload="GetLocalIp();">
    <!--Menu-->
    <nav class="navbar navbar-default">
         <div class="container-fluid" id="navbarBg">
             <div class="navbar-header">
                 <img src="img/tPLogonav-logga.png"/>
                 <a class="navbar-brand" id="brand" href="#">thundrPuffin</a>
             </div>
             <ul class="nav navbar-nav">
                 <li><a href="../../welcome.php">Home</a></li>
                 <li><a href="../../browsbloggs.php">Gotta Go Back</a></li>
                 <li><a href="#">Features(W)</a></li>
                 <li><a href="#">About(W)</a></li>
                 <li><a href="../../admin/admin.php"></a></li>
                 <?php
                 if (!empty($userID)) {
                   if ($result[0]->UserID == $userID) {
                    ?>
                    <li><a href="../../admin/admin.php">AdminPanel</a></li>
                    <?php
                   }
                 }
                  ?>
             </ul>
             <ul class="nav navbar-nav navbar-right">
                 <?PHP
                     if(!empty($_SESSION['userID'])) {
                         $userID = $_SESSION['userID'];
                         $sql = "SELECT Username from userinfo WHERE ID = $userID";
                         $getName = $dbh->prepare($sql);
                         $getName->execute();
                         $getNameResult = $getName->fetchAll();
                         echo '<li><a href="admin/admin.php"><i class="material-icons menuIcons">account_circle</i>'.$getNameResult[0]->Username.'</a></li>';
                         echo '<li><a href="../../helpers/logout.php">Logout</a></li>';
                     }
                     else{
                         echo '<li><a href="../../login.php">Login/Register</a></li>';
                     }
                 ?>
             </ul>
         </div>
     </nav>
    <br>
    <br>
   <div id="container">
     <!--BloggName-->
     <div id="header">
       <h1><?php echo $result[0]->Name;?></h1>
     </div>
     <!--TextArea For New Post-->
     <?php
       if (!empty($userID) && $result7[0]->Post == 1) {
        ?>
         <div id="newPost">
          <!--New Post-->
          <form action="../../helpers/newpost.php" method="post">
            <textarea minlength="1" name="post"></textarea>
            <br>
              <input id="Local" type="text" name="localIP" value="" hidden>
              <input id="public" type="text" name="publicIP" value="" hidden>
              <input type="text" name="userID" value="<?php echo $bloggID;?>"hidden>
              <input type="text" name="bloggID" value="<?php echo $resTemp;?>"hidden>
              <input type="text" name="choice" value="post" hidden>
              <input type="submit" name="" value="Send">
          </form>
        </div>
      <?php
      }
    ?>
    <!--Contains All Posts And Comments-->
   <div id="postFeed">
     <?php
     foreach ($result2 as $res2) {
       $res2Temp = $res2->ID;
       ?>
       <!--Show All Posts-->
       <div id="post">
         <?php



         //If reported link has been pressed;
         if ($res2->ID == $reportedPostID){
           ?>
           <h2 style="background-color:red;"><?php echo $res2->Post . " - " . $res2->Dates;//This Prints The Post?>
             <?php
          }
          //shown normal
            else{?>
              <h2><?php echo $res2->Post . " - " . $res2->Dates;//This Prints The Post?>
                <?php
              }
                if (!empty($userID) && $result7[0]->Comment == 1) {
                 ?>
                <button id="" class="openComment" onclick="edithide('Comment',<?php echo $res2Temp?>)">Comment</button><!--Comment Button-->
                <?php
                $sql10 = "SELECT * FROM report where UserID=:userID AND PostID='$res2Temp' AND CommentID = '0'"; //Checks if user already reported the comment/post
                //echo $sql5;
                $stmt10 = $dbh->prepare($sql10);
                $stmt10->bindParam(':userID', $userID, PDO::PARAM_INT);
                $stmt10->execute();
                $result10 = $stmt10->fetchAll();
                if (empty($result10)) {
                    ?>
                    <button id="" class="openComment" onclick="edithide('Report',<?php echo $res2Temp?>);">Report</button><!--Comment Button-->
                    <?php
                }
              }
              if (!empty($userID) && $result7[0]->Edit == 1) {
               ?>
              <button id="" class="openComment" onclick="edithide('Edit',<?php echo $res2Temp?>);">Edit</button><!--Comment Button-->
             <?php
             }
             if (!empty($userID) && $result7[0]->Del == 1) {
              ?>
              <button id="" class="openComment" onclick="edithide('Delete',<?php echo $res2Temp?>)">Delete</button><!--Comment Button-->

            <?php
            }
            //Comment for anonymous
              if (empty($userID)){
              ?>
             <button id="" class="openComment" onclick="edithide('Comment',<?php echo $res2Temp?>)">Comment</button><!--Comment Button-->
            <?php
            }
              //delete button for admin
              if (!empty($userID) && $result7[0]->Del == 1) {
                ?>
                <form id="Delete<?php echo $res2Temp?>" class="Delete<?php echo $res2Temp?>" action="../../helpers/delete_msg.php" method="post" hidden>
                  <input type="text" name="delUserID" value="<?php echo $userID;?>" hidden>
                  <input type="text" name="delPostID" value="<?php echo $res2Temp;?>" hidden>
                  <input type="text" name="delTextBefore" value="<?php echo $res2->Post;?>"hidden>
                  <input type="text" name="choice" value="Post" hidden>
                  <input type="text" name="delbloggID" value="<?php echo $bloggID;?>"hidden >
                  <input type="text" name="reason" value="" placeholder="Reason">
                  <input type="text" name="delTextAfter" value="*DELETED*"hidden>
                  <input type="submit"name="" value="Delete">
                </form>
                <?php
              }

            ?>
            <!--Edit Post-->
            <?php
            if (!empty($userID) && $result7[0]->Edit == 1) {
             ?>
           <form id="Edit<?php echo $res2Temp?>" class="Edit<?php echo $res2Temp?>" action="../../helpers/edit_message.php" method="post" hidden>
             <input type="text" name="editUserID" value="<?php echo $userID;?>" hidden>
             <input type="text" name="editPostID" value="<?php echo $res2Temp;?>" hidden>
             <input type="text" name="editTextBefore" value="<?php echo $res2->Post;?>" hidden>
             <input type="text" name="choice" value="Post" hidden>
             <input type="text" name="bloggID" value="<?php echo $bloggID;?>" hidden>
             <input type="text" class="Edit<?php echo $res2Temp?>" name="editTextAfter" value="">
             <input type="submit" class="Edit<?php echo $res2Temp?>" name="" value="Edit">
           </form>
           <?php
           }
            ?>
         </h2>
         <!--If user already reported Comment-->
         <?php
         $sql5 = "SELECT * FROM report where UserID=:userID AND PostID='$res2Temp' AND CommentID = '0'"; //Checks if user already reported the comment/post
         //echo $sql5;
         $stmt5 = $dbh->prepare($sql5);
         $stmt5->bindParam(':userID', $userID, PDO::PARAM_INT);
         $stmt5->execute();
         $result5 = $stmt5->fetchAll();
         if (empty($result5)) {

         ?>
          <?php
          if (!empty($userID) && $result7[0]->Comment == 1) {
           ?>
           <!--Report Post-->
         <form id="Report<?php echo $res2Temp?>" class="Report<?php echo $res2Temp?>" action="../../helpers/edit_message.php" method="post" hidden>
           <input type="text" name="bloggID" value="<?php echo $bloggID;?>" hidden>
           <input type="text" name="reportPostID" value="<?php echo $res2Temp;?>" hidden>
           <input type="text" name="reportUserID" value="<?php echo $userID;?>" hidden>
           <?php
           $link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
           if (empty($userID)){?>
             <input type="text" name="reportPrio" value="5" hidden>
             <?php
           }
           else{?>
             <input type="text" name="reportPrio" value="1" hidden>
             <?php
           }?>
           <input type="text" name="reportUrl" value="<?php echo $link;?>" hidden>
           <input type="text" name="choice" value="Report" hidden>
           <input type="text" name="reason" value="" placeholder="Report Reason">
           <input type="submit"name="" value="Report">
         </form>
         <?php
       }
       }
          ?>
       </h2>
       <!--Select All Comments for the post-->
       <?php
         $sql3 = "SELECT * FROM comment where PostID='$res2Temp'";
         //echo $sql3;
         $stmt3 = $dbh->prepare($sql3);
         $stmt3->execute();
         $result3 = $stmt3->fetchAll();?>
           <!--Open comment section with button above-->
           <?php
           if (!empty($userID) && $result7[0]->Comment == 1 || $userID == 0) {
            ?>
         <form id="Comment<?php echo $res2Temp?>" class="Comment<?php echo $res2Temp?>" action="../../helpers/newpost.php" method="post" hidden>
           <textarea class="Comment<?php echo $res2Temp?>" name="comment" ></textarea>
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
             <input class="Comment<?php echo $res2Temp?>" type="submit" name="" value="Send" >
         </form>
         <?php
       }

          ?>
      </div>

      <?php
       foreach ($result3 as $res3) {
         ?>
         <!--If comment reported-->
         <div id="comment">
           <?php
            if ($reportedCommentID == $res3->ID) {
                ?>
                <h3 style="background-color:red;"><?php echo $res3->Message . " - " . $res3->Dates ;//This Prints The Post?></h3>
                <?php
            }
            else{
              ?>
              <h3><?php echo $res3->Message . " - " . $res3->Dates ;//This Prints The Post?></h3>
              <?php
            }
            if (!empty($userID) && $result7[0]->Comment == 1) {
              $sql9 = "SELECT * FROM report where UserID=:userID AND CommentID='$res3->ID'"; //Checks if user already reported the comment/post
              //echo $sql5;
              $stmt9 = $dbh->prepare($sql9);
              $stmt9->bindParam(':userID', $userID, PDO::PARAM_INT);
              $stmt9->execute();
              $result9 = $stmt9->fetchAll();
              if (empty($result9)) {
               ?>
              <button id="" class="openComment" onclick="edithide('Report2',<?php echo $res3->ID?>)">Report</button><!--Comment Button-->
             <?php
           }
          }
          if (!empty($userID) && $result7[0]->Edit == 1) {
           ?>
          <button id="" class="openComment" onclick="edithide('Edit2',<?php echo $res3->ID?>)">Edit</button><!--Comment Button-->
         <?php
         }
         if (!empty($userID) && $result7[0]->Del == 1) {
          ?>
          <button id="" class="openComment" onclick="edithide('Delete2',<?php echo $res3->ID?>)">Delete</button><!--Comment Button-->

        <?php
        }
         if (!empty($userID) && $result7[0]->Edit == 1) {
           ?>

         <!--Edit Comment tab-->
         <form id="Edit2<?php echo $res3->ID?>" class="Edit2<?php echo $res3->ID?>" action="../../helpers/edit_message.php" method="post" hidden>
           <input type="text" name="editUserID" value="<?php echo $userID;?>" hidden>
           <input type="text" name="editCommentID" value="<?php echo $res2Temp;?>" hidden>
           <input type="text" name="editTextBefore" value="<?php echo $res3->Message;?>" hidden>
           <input type="text" name="editTextAfter" value="">
           <input type="text" name="bloggID" value="<?php echo $bloggID;?>" hidden>
           <input type="text" name="choice" value="Comment" hidden>
           <input type="submit"name="" value="Edit">
         </form>
         <?php
       }
         //Delete Button for ADMIN when reported
         if (!empty($userID) && $result7[0]->Del == 1) {
           ?>
           <form id="Delete2<?php echo $res3->ID?>" class="Delete2<?php echo $res3->ID?>" action="../../helpers/delete_msg.php" method="post" hidden>
             <input type="text" name="delUserID" value="<?php echo $userID;?>"hidden >
             <input type="text" name="delCommentID" value="<?php echo $res3->ID;?>"hidden >
             <input type="text" name="delTextBefore" value="<?php echo $res3->Message;?>"hidden>
             <input type="text" name="choice" value="Comment" hidden>
             <input type="text" name="delbloggID" value="<?php echo $bloggID;?>" hidden >
             <input type="text" name="reason" value="" placeholder="Delete Reason" required >
             <input type="text" name="delTextNew" value="*DELETED*" hidden>
             <input type="submit"name="" value="Delete">
           </form>
           <?php
         }
         if (!empty($userID) && $result7[0]->Edit == 1) {
         //If not reported earlier
         $sql4 = "SELECT * FROM report where UserID=:userID AND CommentID='$res2Temp'";
         //cho $sql4;
         $stmt4 = $dbh->prepare($sql4);
         $stmt4->bindParam(':userID', $userID, PDO::PARAM_INT);
         $stmt4->execute();
         $result4 = $stmt4->fetchAll();
         if (empty($result4)) {

         ?>
         <!--Report Comment-->
           <form id="Report2<?php echo $res3->ID?>" class="Report2<?php echo $res3->ID?>" action="../../helpers/edit_message.php" method="post" hidden>
             <input type="text" name="bloggID" value="<?php echo $bloggID;?>" hidden>
             <input type="text" name="reportPostID" value="<?php echo $res2Temp;?>" hidden>
             <input type="text" name="reportCommentID" value="<?php echo $res3->ID;?>" hidden>
             <input type="text" name="reportUserID" value="<?php echo $userID;?>" hidden>
             <?php
             $link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
             if (empty($userID)){?>
               <input type="text" name="reportPrio" value="5" hidden>
               <?php
             }
             else{?>
               <input type="text" name="reportPrio" value="1" hidden>
               <?php

             }?>
             <input type="text" name="reportUrl" value="<?php echo $link;?>" hidden>
             <input type="text" name="reason" value="" placeholder="Report Reason">
             <input type="text" name="choice" value="Report" hidden>
             <input type="submit"name="" value="Report">
           </form>
           <?php
         }
         }?>
         <?php

          ?>
         <br>
         <br>
      </div>
         <?php
       }
     }
      ?>
   </div>
 </div>
 </body>
 </html>
