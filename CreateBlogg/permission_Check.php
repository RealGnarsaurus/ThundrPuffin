<?php
require('Blogg/sf/Helpers/db.php');
$userID = $_GET['UserID'];
$CheckBox = $_GET['CheckBox'];

if ($CheckBox == "Post") {
  $sql = "SELECT * FROM permission where UserID='$userID'"; //Check if user has blogg
  //echo $sql;
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();

  if ($result[0]->Post == 0) {
      $sql2 ="UPDATE `permission` SET `Post`= '1' WHERE UserID='$userID'";
      echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->execute();
  }
  else{
      $sql2 ="UPDATE `permission` SET `Post`= '0' WHERE UserID='$userID'";
      echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->execute();
  }


}
if ($CheckBox == "Comment") {
  $sql = "SELECT * FROM permission where UserID='$userID'"; //Check if user has blogg
  //echo $sql;
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();

  if ($result[0]->Comment == 0) {
      $sql2 ="UPDATE `permission` SET `Comment`= '1' WHERE UserID='$userID'";
      echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->execute();
  }
  else{
      $sql2 ="UPDATE `permission` SET `Comment`= '0' WHERE UserID='$userID'";
      echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->execute();
  }


}
if ($CheckBox == "Edit") {
  $sql = "SELECT * FROM permission where UserID='$userID'"; //Check if user has blogg
  //echo $sql;
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();

  if ($result[0]->Edit == 0) {
      $sql2 ="UPDATE `permission` SET `Edit`= '1' WHERE UserID='$userID'";
      echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->execute();
  }
  else{
      $sql2 ="UPDATE `permission` SET `Edit`= '0' WHERE UserID='$userID'";
      echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->execute();
  }


}
if ($CheckBox == "Delete") {
  $sql = "SELECT * FROM permission where UserID='$userID'"; //Check if user has blogg
  //echo $sql;
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();

  if ($result[0]->Del == 0) {
      $sql2 ="UPDATE `permission` SET `Del`= '1' WHERE UserID='$userID'";
      echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->execute();
  }
  else{
      $sql2 ="UPDATE `permission` SET `Del`= '0' WHERE UserID='$userID'";
      echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->execute();
  }


}

 ?>
