<?php

if (!empoty($_POST['postID'])) {
  $PostID = $_POST['postID'];
  $sql = "DELETE FROM post where ID='$postID'"; //Check if user has blogg
  //echo $sql;
  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(':postID');
  $stmt->execute();
}
if (!empty($_POST['commentID'])) {
  $PostID = $_POST['postID'];
  $sql = "DELETE FROM comment where ID='$postID'"; //Check if user has blogg
  //echo $sql;
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
}


?>
