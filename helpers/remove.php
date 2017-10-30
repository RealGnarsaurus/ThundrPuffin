<?php
require('db.php');

$postID = $_POST['postID'];
$commentID = $_POST['commentID'];

echo $postID . $commentID;
//remove all reports on the id.
if (!empty($_POST['postID'])) {
  //Its a Post
  $sql = "DELETE FROM report where PostID=:postID"; //Check if user has blogg
  echo $sql;
  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(':postID', $postID, PDO::PARAM_INT); //mby works
  $stmt->execute();
}
else{
  //its a comment
  $sql = "DELETE FROM report where CommentID=:commentID"; //Check if user has blogg
  echo $sql;
  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(':commentID', $commentID, PDO::PARAM_INT); //mby works
  $stmt->execute();
}

 ?>
