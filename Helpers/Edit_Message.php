<?php
  require('db.php');
  echo filter_input(INPUT_POST, 'choice', FILTER_SANITIZE_STRING);
  //echo $_POST['choice'];
  if ($_POST['choice'] == "Post") {
    //echo "inside post";
    echo $_POST['editUserID'].$_POST['bloggID'].$_POST['editPostID'] . $_POST['editTextBefore'] . $_POST['editTextAfter'];
  if (!empty($_POST['editUserID']) && !empty($_POST['bloggID']) && !empty($_POST['editPostID']) && !empty($_POST['editTextBefore']) && !empty($_POST['editTextAfter'])) {
    echo "inside method";
    $editUserID = filter_input(INPUT_POST, 'editUserID', FILTER_SANITIZE_STRING);
    $editBloggID = filter_input(INPUT_POST, 'bloggID', FILTER_SANITIZE_STRING);
    $editPostID = filter_input(INPUT_POST, 'editPostID', FILTER_SANITIZE_STRING);
    $editTextBefore = filter_input(INPUT_POST, 'editTextBefore', FILTER_SANITIZE_STRING);
    $editTextAfter = filter_input(INPUT_POST, 'editTextAfter', FILTER_SANITIZE_STRING);

    $sql = "INSERT INTO editpost (`ID`, `UserID`, `PostID`, `BloggID`, `TextBefore`, `TextAfter`) VALUES (null,:editUserID,:editPostID,:editBloggID,:editTextBefore,:editTextAfter)";
    echo $sql;
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':editUserID', $editUserID,FILTER_SANITIZE_STRING); //mby works
    $stmt->bindParam(':editPostID', $editPostID,FILTER_SANITIZE_STRING); //mby works
    $stmt->bindParam(':editBloggID', $editBloggID,FILTER_SANITIZE_STRING); //mby works
    $stmt->bindParam(':editTextBefore', $editTextBefore,FILTER_SANITIZE_STRING); //mby works
    $stmt->bindParam(':editTextAfter', $editTextAfter,FILTER_SANITIZE_STRING); //mby works
    $stmt->execute();
    if ($stmt) {
      $sql2 = "UPDATE post SET Post = :editTextAfter where ID=:editPostID";
      echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->bindParam(':editTextAfter', $editTextAfter,FILTER_SANITIZE_STRING); //mby works
      $stmt2->bindParam(':editPostID', $editPostID,FILTER_SANITIZE_STRING); //mby works
      $stmt2->execute();
    }

    //$stmt->execute();
    }
  else{

  }
}
if ($_POST['choice'] == "Comment") {

  if (!empty($_POST['editUserID']) && !empty($_POST['bloggID']) && !empty($_POST['editCommentID']) && !empty($_POST['editTextBefore']) && !empty($_POST['editTextAfter'])) {
    $editUserID = filter_input(INPUT_POST, 'editUserID', FILTER_SANITIZE_STRING);
    $editBloggID = filter_input(INPUT_POST, 'bloggID', FILTER_SANITIZE_STRING);
    $editPostID = filter_input(INPUT_POST, 'editCommentID', FILTER_SANITIZE_STRING);
    $editTextBefore = filter_input(INPUT_POST, 'editTextBefore', FILTER_SANITIZE_STRING);
    $editTextAfter = filter_input(INPUT_POST, 'editTextAfter', FILTER_SANITIZE_STRING);

    $sql = "INSERT INTO editcomment (`ID`, `UserID`, `CommentID`, `BloggID`, `TextBefore`, `TextNew`) VALUES (null,:editUserID,:editCommentID',:editBloggID,:editTextBefore,:editTextAfter)";
    echo $sql;
    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(':editUserID', $editUserID,FILTER_SANITIZE_STRING); //mby works
    $stmt->bindParam(':editCommentID', $editCommentID,FILTER_SANITIZE_STRING); //mby works
    $stmt->bindParam(':editBloggID', $editBloggID,FILTER_SANITIZE_STRING); //mby works
    $stmt->bindParam(':editTextBefore', $editTextBefore,FILTER_SANITIZE_STRING); //mby works
    $stmt->bindParam(':editTextAfter', $editTextAfter,FILTER_SANITIZE_STRING); //mby works

    $stmt->execute();
    if ($stmt) {
      $sql2 = "UPDATE comment SET Message = :editTextAfter";
      echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->bindParam(':editTextAfter', $editTextAfter,FILTER_SANITIZE_STRING); //mby works
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

    $sql = "INSERT INTO report (`ID`, `BloggID`, `PostID`, `CommentID`, `UserID`, `Prio`,`Url`) VALUES (null,:bloggID,:reportPostID,:reportCommentID,:reportUserID,:reportPrio,:reportUrl)";
    echo $sql;
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':bloggID', $bloggID,FILTER_SANITIZE_STRING); //mby works
    $stmt->bindParam(':reportPostID', $reportPostID,FILTER_SANITIZE_STRING); //mby works
    $stmt->bindParam(':reportCommentID', $reportCommentID,FILTER_SANITIZE_STRING); //mby works
    $stmt->bindParam(':reportUserID', $reportUserID,FILTER_SANITIZE_STRING); //mby works
    $stmt->bindParam(':reportPrio', $reportPrio,FILTER_SANITIZE_STRING); //mby works$stmt->execute();reportUrl
    $stmt->bindParam(':reportUrl', $reportUrl,FILTER_SANITIZE_STRING); //mby works$stmt->execute();
    header("Location:".$reportUrl);
  }
  else{

  }
}

?>
