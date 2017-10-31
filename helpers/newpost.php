<?php
require('db.php');

$choice = $_POST['choice'];
$localIP = $_POST['localIP'];
$publicIP = $_POST['publicIP'];
$bloggID = $_POST['bloggID'];
$userID = $_POST['userID'];


if ($choice == "post") {
  $post = $_POST['post'];
  //echo $bloggID . $userID . $post;
  $sql = "INSERT INTO post(ID,BloggID,UserID,Post) VALUES (null,:bloggID,:userID,:post)";
  echo $sql;
  $stmt= $dbh->prepare($sql);
  $stmt->bindParam(':bloggID', $bloggID, PDO::PARAM_INT);
  $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
  $stmt->bindParam(':post', $post, PDO::PARAM_STR);
  $stmt->execute();
  header("location:../blogg/sf/index.php?bloggID=$bloggID");
}
if ($choice == "comment") {
  $postID = $_POST['postID'];
  $comment = $_POST['comment'];
  $sql = "INSERT INTO comment(ID,BloggID,UserID,PostID,IP,Message) VALUES (null,:bloggID,:userID,:postID,:publicIP,:comment)";
  echo $sql;
  echo "Blogg:".$bloggID . "user:". $userID . "post:".$postID . "pip:".$publicIP . "comment:".$comment;

  $stmt= $dbh->prepare($sql);
  $stmt->bindParam(':bloggID', $bloggID, PDO::PARAM_INT);
  $stmt->bindParam(':postID', $postID, PDO::PARAM_INT);
  $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
  $stmt->bindParam(':publicIP', $publicIP, PDO::PARAM_STR);
  $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
  $stmt->execute();
  header("location:../blogg/sf/index.php?bloggID=$bloggID");
}

 ?>
