<?php
require('db.php');

$choice = $_POST['choice'];
$dates = Date("Y/m-d H:G:s");
$localIP = $_POST['localIP'];
$publicIP = $_POST['publicIP'];
$bloggID = $_POST['bloggID'];
$userID = $_POST['userID'];
if ($choice == "post") {
  $post = $_POST['post'];
  $sql = "INSERT INTO post(ID,BloggID,UserID,Post) VALUES (null,'$bloggID','$userID','$post')";
  echo $sql;
  $stmt= $dbh->prepare($sql);
  $stmt->execute();
  header("location:../Index.php?ID=$bloggID");
}
if ($choice == "comment") {
  $postID = $_POST['postID'];
  $comment = $_POST['comment'];
  $sql = "INSERT INTO comment(ID,BloggID,PostID,IP,Message) VALUES (null,'$bloggID','$postID','$publicIP','$comment')";
  echo $sql;
  $stmt= $dbh->prepare($sql);
  $stmt->execute();
  header("location:../Index.php?ID=$bloggID");
}

 ?>
