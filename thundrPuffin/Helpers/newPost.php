<?php
require('db.php');


$choice = filter_input(INPUT_POST, 'choice', FILTER_SANITIZE_STRING);
$dates = Date("Y/m-d H:G:s");
$localIP = filter_input(INPUT_POST, 'localIP', FILTER_SANITIZE_IP);
$publicIP = filter_input(INPUT_POST, 'publicIP', FILTER_SANITIZE_IP);
$bloggID = filter_input(INPUT_POST, 'bloggID', FILTER_SANITIZE_INT);

if ($choice == "post") {
  $post = $_POST['post'];
  $sql = "INSERT INTO post(ID,BloggID,Post,Dates) VALUES (null,:bloggID,:post,:dates)";
  echo $sql;
  $stmt= $dbh->prepare($sql);
  $stmt->bindParam(':bloggID', $bloggID, PDO::PARAM_INT); //mby works
  $stmt->bindParam(':post', $post, PDO::PARAM_INT); //mby works
  $stmt->bindParam(':dates', $dates, PDO::PARAM_INT); //mby works
  $stmt->execute();
  header("location:../Blogg/sf/Index.php?bloggID=$bloggID");

}
if ($choice == "comment") {
  $postID = $_POST['postID'];
  $comment = $_POST['comment'];

  $sql = "INSERT INTO comment(ID,PostID,IP,Message,Dates) VALUES (null,:postID,:publicIP,:comment,:dates)";
  echo $sql;
  $stmt= $dbh->prepare($sql);
  $stmt->bindParam(':bloggID', $postID, PDO::PARAM_INT); //mby works
  $stmt->bindParam(':publicIP', $publicIP, PDO::PARAM_INT); //mby works
  $stmt->bindParam(':comment', $comment, PDO::PARAM_INT); //mby works
  $stmt->bindParam(':dates', $dates, PDO::PARAM_INT); //mby works
  $stmt->execute();
  header("location:../Blogg/sf/Index.php?bloggID=$bloggID");

}

 ?>
