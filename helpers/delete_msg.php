<?php
<<<<<<< HEAD

if (!empoty($_POST['postID'])) {
  $PostID = $_POST['postID'];
  $sql = "DELETE FROM post where ID=:postID"; //Check if user has blogg
  //echo $sql;
  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(':postID', $postID, PDO::PARAM_INT);
  $stmt->execute();
}
if (!empty($_POST['commentID'])) {
  $PostID = $_POST['postID'];
  $sql = "DELETE FROM comment where ID=:postID"; //Check if user has blogg
  //echo $sql;
  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(':postID', $postID, PDO::PARAM_INT);
  $stmt->execute();
}


=======
require('db.php');
$delBloggID = $_POST['delbloggID'];
echo $_POST['delCommentID'] . " || " . $_POST['choice'];
if (!empty($_POST['delPostID']) && $_POST['choice'] == "Post") {

  $delUserID = $_POST['delUserID'];
  $delPostID = $_POST['delPostID'];
  $delTextBefore = $_POST['delTextBefore'];
  $delTextAfter = $_POST['delTextAfter'];
  $delTextNew = $delTextAfter;

  $sql = "DELETE FROM post where ID=:delPostID"; //Check if user has blogg
  echo $sql;
  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(':delPostID', $delPostID, PDO::PARAM_INT); //mby works
  $stmt->execute();

  $sql2 = "SELECT * FROM comment where PostID=:delPostID"; //Check if user has blogg
  echo $sql2;
  $stmt2 = $dbh->prepare($sql2);
  $stmt2->bindParam(':delPostID', $delPostID, PDO::PARAM_INT); //mby works
  $stmt2->execute();
  $result = $stmt2->fetchAll();
  foreach ($result as $res) {
    $tempID = $res->ID;
    $sql3 = "DELETE FROM comment where ID=:tempID"; //Check if user has blogg
    echo $sql3;
    $stmt3 = $dbh->prepare($sql3);
    $stmt3->bindParam(':tempID', $tempID, PDO::PARAM_INT); //mby works
    $stmt3->execute();

    $sql5 = "INSERT INTO editcomment (`ID`, `UserID`, `CommentID`, `BloggID`, `TextBefore`, `TextNew`) VALUES (null,:delUserID,:delCommentID,:delBloggID,:delTextBefore,:delTextNew)";
    echo $sql5;
    echo "\n" . $delUserID . $tempID . $delBloggID . $delTextBefore . $delTextNew . "\n";
    $stmt5 = $dbh->prepare($sql5);
    $stmt5->bindParam(':delUserID', $delUserID, PDO::PARAM_INT);
    $stmt5->bindParam(':delCommentID', $tempID, PDO::PARAM_INT);
    $stmt5->bindParam(':delBloggID', $delBloggID, PDO::PARAM_INT);
    $stmt5->bindParam(':delTextBefore', $delTextBefore, PDO::PARAM_INT);
    $stmt5->bindParam(':delTextNew', $delTextNew, PDO::PARAM_INT);
    $stmt5->execute();
  }

  $sql4 = "INSERT INTO editpost (`ID`, `UserID`, `PostID`, `BloggID`, `TextBefore`, `TextAfter`) VALUES (null,:delUserID,:delPostID,:delBloggID,:delTextBefore,:delTextAfter)";
  echo $sql4;
  $stmt4 = $dbh->prepare($sql4);
  $stmt4->bindParam(':delUserID', $delUserID, PDO::PARAM_INT);
  $stmt4->bindParam(':delPostID', $delPostID, PDO::PARAM_INT);
  $stmt4->bindParam(':delBloggID', $delBloggID, PDO::PARAM_INT);
  $stmt4->bindParam(':delTextBefore', $delTextBefore, PDO::PARAM_INT);
  $stmt4->bindParam(':delTextAfter', $delTextAfter, PDO::PARAM_INT);
  $stmt4->execute();
}
if (!empty($_POST['delCommentID'])&& $_POST['choice'] == "Comment" ) {
  $delUserID = $_POST['delUserID'];
  $delCommentID = $_POST['delCommentID'];
  $delTextBefore = $_POST['delTextBefore'];
  $delTextNew = $_POST['delTextNew'];

  $sql2 = "DELETE FROM comment where ID=:delCommentID"; //Check if user has blogg
  echo $sql2;
  $stmt2 = $dbh->prepare($sql2);
  $stmt2->bindParam(':delCommentID', $delCommentID, PDO::PARAM_INT); //mby works
  $stmt2->execute();

  $sql3 = "INSERT INTO editcomment (`ID`, `UserID`, `CommentID`, `BloggID`, `TextBefore`, `TextNew`) VALUES (null,:delUserID,:delCommentID,:delBloggID,:delTextBefore,:delTextNew)";
  echo $sql3;
  echo "\n" . $delUserID . $delCommentID . $delBloggID . $delTextBefore . $delTextNew . "\n";
  $stmt3 = $dbh->prepare($sql3);
  $stmt3->bindParam(':delUserID', $delUserID, PDO::PARAM_INT);
  $stmt3->bindParam(':delCommentID', $delCommentID, PDO::PARAM_INT);
  $stmt3->bindParam(':delBloggID', $delBloggID, PDO::PARAM_INT);
  $stmt3->bindParam(':delTextBefore', $delTextBefore, PDO::PARAM_INT);
  $stmt3->bindParam(':delTextNew', $delTextNew, PDO::PARAM_INT);
  $stmt3->execute();
}

header("Location:../blogg/sf/index.php?bloggID=".$delBloggID)
>>>>>>> 0f4b1bc0fd323090762971a1535d2e2d66c1122a
?>
