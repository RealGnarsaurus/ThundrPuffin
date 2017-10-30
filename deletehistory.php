<?php
require('Helpers/db.php');
session_start();
$userID = $_SESSION['userID'];
//echo $userID;
//Gets it all from your blogg table
$sql = "SELECT * from Blogg where UserID = :userID";
//echo $sql;
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':userID', $userID, PDO::PARAM_INT); //mby works
$stmt->execute();
$result = $stmt->fetchAll();
$bloggID = $result[0]->ID; //your bloggid
//echo $bloggID;

//Get all permissions on Your Site
$sql2 = "SELECT DISTINCT * from editpost where BloggID = :bloggID";
//echo $sql2;
$stmt2 = $dbh->prepare($sql2);
$stmt2->bindParam(':bloggID', $bloggID, PDO::PARAM_INT); //mby works
$stmt2->execute();
$result2 = $stmt2->fetchAll();

$sql3 = "SELECT DISTINCT * from editcomment where BloggID = :bloggID";
//echo $sql2;
$stmt3 = $dbh->prepare($sql3);
$stmt3->bindParam(':bloggID', $bloggID, PDO::PARAM_INT); //mby works
$stmt3->execute();
$result3 = $stmt3->fetchAll();

if (empty($result2) && empty($result3)) {
  echo "No one has reported anything on your blogg";
}
else{
  //Get all user and their permissions

  foreach ($result2 as $res2) {
    $userTemp = $res2->UserID;
    $sql4 = "SELECT * from userinfo where ID = :userID";
    //echo $sql2;
    $stmt4 = $dbh->prepare($sql4);
    $stmt4->bindParam(':userID', $userTemp, PDO::PARAM_STR); //mby works
    $stmt4->execute();
    $result4 = $stmt4->fetchAll();
    foreach ($result4 as $res4) {
    echo "Post [". $res2->TextBefore."]" . "- Deleted By User " ." [" .$res4->Username . "]";
    ?>
    <br>
    <?php
  }
}
  foreach ($result3 as $res3) {
      $userTemp = $res3->UserID;
      $sql4 = "SELECT * from userinfo where ID = :userID";
      //echo $sql2;
      $stmt4 = $dbh->prepare($sql4);
      $stmt4->bindParam(':userID', $userTemp, PDO::PARAM_STR); //mby works
      $stmt4->execute();
      $result4 = $stmt4->fetchAll();
      foreach ($result4 as $res4) {
      echo "Comment [". $res3->TextBefore."]" . "- Deleted By User " ." [" .$res4->Username . "]";
      ?>
      <br>
      <?php
    }
  }
}
 ?>
