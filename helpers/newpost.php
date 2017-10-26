<?php
require('db.php');

$choice = $_POST['choice'];
$localIP = $_POST['localIP'];
$publicIP = $_POST['publicIP'];
  $bloggID = $_POST['bloggID'];

if ($choice == "post") {
  $post = $_POST['post'];
  $sql = "INSERT INTO post(ID,BloggID,Post) VALUES (null,:bloggID,:post)";
  echo $sql;
  $stmt= $dbh->prepare($sql);
  $stmt->bindParam(':bloggID', $bloggID, PDO::PARAM_INT);
  $stmt->bindParam(':post', $post, PDO::PARAM_STR);
  $stmt->execute();
  header("location:../blogg/sf/index.php?bloggID=$bloggID");
}
if ($choice == "comment") {
  $postID = $_POST['postID'];
  $comment = $_POST['comment'];
  $sql = "INSERT INTO comment(ID,PostID,IP,Message) VALUES (null,:postID,:publicIP,:comment)";
  echo $sql;
  $stmt= $dbh->prepare($sql);
  $stmt->bindParam(':postID', $postID, PDO::PARAM_INT);
  $stmt->bindParam(':publicID', $publicID, PDO::PARAM_INT);
  $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
  $stmt->execute();
  header("location:../blogg/sf/index.php?bloggID=$bloggID");
}

 ?>
