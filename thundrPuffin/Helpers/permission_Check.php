<?php
require('db.php');

$userID = filter_input(INPUT_POST, 'UserID', FILTER_SANITIZE_STRING);
$CheckBox = filter_input(INPUT_POST, 'CheckBox', FILTER_SANITIZE_STRING);

if ($CheckBox == "Post") {
  $sql = "SELECT * FROM permission where UserID=:userID"; //Check if user has blogg
  //echo $sql;
  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(':userID', $userID, PDO::PARAM_INT); //mby works

  $stmt->execute();
  $result = $stmt->fetchAll();

  if ($result[0]->Post == 0) {

      $sql2 ="UPDATE `permission` SET `Post`= '1' WHERE UserID=:userID";
      echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->bindParam(':userID', $userID, PDO::PARAM_INT); //mby works
      $stmt2->execute();
  }
  else{
      $sql2 ="UPDATE `permission` SET `Post`= '0' WHERE UserID=:userID";
      echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->bindParam(':userID', $userID, PDO::PARAM_INT); //mby works

      $stmt2->execute();
  }
}
if ($CheckBox == "Comment") {

  $sql = "SELECT * FROM permission where UserID=:userID"; //Check if user has blogg
  echo $sql . $userID;
  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(':userID', $userID, PDO::PARAM_INT); //mby works

  $stmt->execute();
  $result = $stmt->fetchAll();

  if ($result[0]->Comment == 0) {

      $sql2 ="UPDATE `permission` SET `Comment`= '1' WHERE UserID=:userID";
      echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->bindParam(':userID', $userID, PDO::PARAM_INT); //mby works
      $stmt2->execute();
  }
  else{
      $sql2 ="UPDATE `permission` SET `Comment`= '0' WHERE UserID=:userID";
      echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->bindParam(':userID', $userID, PDO::PARAM_INT); //mby works

      $stmt2->execute();
  }


}
if ($CheckBox == "Edit") {

  $sql = "SELECT * FROM permission where UserID=:userID"; //Check if user has blogg
  //echo $sql;
  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(':userID', $userID, PDO::PARAM_INT); //mby works

  $stmt->execute();
  $result = $stmt->fetchAll();

  if ($result[0]->Edit == 0) {

      $sql2 ="UPDATE `permission` SET `Edit`= '1' WHERE UserID=:userID";
      echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->bindParam(':userID', $userID, PDO::PARAM_INT); //mby works
      $stmt2->execute();
  }
  else{
      $sql2 ="UPDATE `permission` SET `Edit`= '0' WHERE UserID=:userID";
      echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->bindParam(':userID', $userID, PDO::PARAM_INT); //mby works
      $stmt2->execute();
  }


}
if ($CheckBox == "Delete") {

  $sql = "SELECT * FROM permission where UserID=:userID"; //Check if user has blogg
  //echo $sql;
  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(':userID', $userID, PDO::PARAM_INT); //mby works

  $stmt->execute();
  $result = $stmt->fetchAll();

  if ($result[0]->Del == 0) {

      $sql2 ="UPDATE `permission` SET `Del`= '1' WHERE UserID=:userID";
      echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->bindParam(':userID', $userID, PDO::PARAM_INT); //mby works
      $stmt2->execute();
  }
  else{
      $sql2 ="UPDATE `permission` SET `Del`= '0' WHERE UserID=:userID";
      echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->bindParam(':userID', $userID, PDO::PARAM_INT); //mby works
      $stmt2->execute();
  }

}

 ?>
