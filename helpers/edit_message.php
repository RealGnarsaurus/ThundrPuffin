<?php
  require('db.php');
  echo $_POST['choice'];

  if ($_POST['choice'] == "Post") {
    //echo "inside post";
    echo $_POST['editUserID'].$_POST['bloggID'].$_POST['editPostID'] . $_POST['editTextBefore'] . $_POST['editTextAfter'];
  if (!empty($_POST['editUserID']) && !empty($_POST['bloggID']) && !empty($_POST['editPostID']) && !empty($_POST['editTextBefore']) && !empty($_POST['editTextAfter'])) {
    echo "inside method";
    $editUserID = $_POST['editUserID'];
    $editBloggID = $_POST['bloggID'];
    $editPostID = $_POST['editPostID'];
    $editTextBefore = $_POST['editTextBefore'];
    $editTextAfter = $_POST['editTextAfter'];

    $sql = "INSERT INTO editpost (`ID`, `UserID`, `PostID`, `BloggID`, `TextBefore`, `TextAfter`) VALUES (null,:editUserID,:editPostID,:editBloggID,:editTextBefore,:editTextAfter)";
    echo $sql;
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':editUserID', $editUserID, PDO::PARAM_INT);
    $stmt->bindParam(':editPostID', $editPostID, PDO::PARAM_INT);
    $stmt->bindParam(':editBloggID', $editBloggID, PDO::PARAM_INT);
    $stmt->bindParam(':editTextBefore', $editTextBefore, PDO::PARAM_STR);
    $stmt->bindParam(':editTextAfter', $editTextAfter, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt) {
      $sql2 = "UPDATE post SET Post = :editTextAfter where ID=:editPostID";
      echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->bindParam(':editTextAfter', $editTextAfter, PDO::PARAM_STR);
      $stmt2->bindParam(':editPostID', $editPostID, PDO::PARAM_INT);
      $stmt2->execute();
    }
    }
  else{

  }
}
if ($_POST['choice'] == "Comment") {

  if (!empty($_POST['editUserID']) && !empty($_POST['bloggID']) && !empty($_POST['editCommentID']) && !empty($_POST['editTextBefore']) && !empty($_POST['editTextAfter'])) {
    echo "hello";
    $editUserID = $_POST['editUserID'];
    $editBloggID = $_POST['bloggID'];
    $editCommentID = $_POST['editCommentID'];
    $editTextBefore = $_POST['editTextBefore'];
    $editTextAfter = $_POST['editTextAfter'];
    if ($editCommentID == null) {
      $editCommentID = 0;
    }
    $sql = "INSERT INTO editcomment (`ID`, `UserID`, `CommentID`, `BloggID`, `TextBefore`, `TextNew`) VALUES (null,:editUserID,:editCommentID,:editBloggID,:editTextBefore,:editTextAfter)";
    echo $sql;
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':editUserID', $editUserID, PDO::PARAM_INT);
    $stmt->bindParam(':editCommentID', $editCommentID, PDO::PARAM_INT);
    $stmt->bindParam(':editBloggID', $editBloggID, PDO::PARAM_INT);
    $stmt->bindParam(':editTextBefore', $editTextBefore, PDO::PARAM_STR);
    $stmt->bindParam(':editTextAfter', $editTextAfter, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt) {
      $sql2 = "UPDATE comment SET Message = '$editTextAfter'";
      echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->execute();
    }
  }
  else{

  }
}
if ($_POST['choice'] == "Report") {

  if (!empty($_POST['bloggID']) && !empty($_POST['reportUserID']) && !empty($_POST['reportPrio'])&& !empty($_POST['reportUrl'])) {
    $bloggID = $_POST['bloggID'];
    $reportPostID = $_POST['reportPostID'];
    $reportCommentID = $_POST['reportCommentID'];
    $reportUserID = $_POST['reportUserID'];
    $reportPrio = $_POST['reportPrio'];
    $reportUrl = $_POST['reportUrl'];
    $reason = $_POST['reason'];
    if (empty($reportCommentID)) {
      $reportCommentID = 0;
    }
    $sql = "INSERT INTO report (`ID`, `BloggID`, `PostID`, `CommentID`, `UserID`, `Prio`,`Url`,`Reason`) VALUES (null,:bloggID,:reportPostID,:reportCommentID,:reportUserID,:reportPrio,:reportUrl,:reason)";
    echo $sql;
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':bloggID', $bloggID, PDO::PARAM_INT);
    $stmt->bindParam(':reportPostID', $reportPostID, PDO::PARAM_INT);
    $stmt->bindParam(':reportCommentID', $reportCommentID, PDO::PARAM_INT);
    $stmt->bindParam(':reportUserID', $reportUserID, PDO::PARAM_INT);
    $stmt->bindParam(':reportPrio', $reportPrio, PDO::PARAM_INT);
    $stmt->bindParam(':reportUrl', $reportUrl, PDO::PARAM_STR);
    $stmt->bindParam(':reason', $reason, PDO::PARAM_STR);
    $stmt->execute();
    header("Location:".$reportUrl);
  }
  else{

  }
}

?>
