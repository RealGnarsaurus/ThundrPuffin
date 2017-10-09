<?php
session_start();
require('Helpers/db.php');
$bloggID = $_GET['ID'];

$sql = "SELECT * FROM blogg where ID='$bloggID'";
//echo $sql;
$stmt = $dbh->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
$resTemp = $result[0]->ID;
$sql2 = "SELECT * FROM post where BloggID='$resTemp'";
//echo $sql;
$stmt2 = $dbh->prepare($sql2);
$stmt2->execute();
$result2 = $stmt2->fetchAll();
?>
 <!DOCTYPE html>
 <html>
 <link rel="stylesheet" href="style.css">
 <body>
   <br>
   <a href="../../Index.php">Gotta Go Back</a>
   <br>
   <div id="container">
     <div id="header">
     <h2><?php echo $result[0]->Name;?></h2>
   </div>
   <div id="newPost">
    <form action="Helpers/newPost.php" method="post">
      <textarea name="post"></textarea>
      <br>
        <input type="text" name="bloggID" value="<?php echo $bloggID;?>" hidden>
        <input type="text" name="choice" value="post" hidden>
        <input type="submit" name="" value="Send">

    </form>
 </div>
   <div id="postFeed">
     <?php
     foreach ($result2 as $res2) {
       ?>
       <h3><?php echo $res2->Post . " - " . $res2->Date;?></h3>
       <?php
       $res2Temp = $res2->ID;
       $sql3 = "SELECT * FROM comment where PostID='$res2Temp'";
       //echo $sql3;
       $stmt3 = $dbh->prepare($sql3);
       $stmt3->execute();
       $result3 = $stmt3->fetchAll();
       foreach ($result3 as $res3) {

         echo $res2->Date;?>
         <br>
         <?php
         echo $res3->Message;
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
