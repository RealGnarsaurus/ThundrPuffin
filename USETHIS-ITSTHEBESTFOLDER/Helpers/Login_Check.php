<?php
require('db.php');
session_start();
$loginCred = filter_input(INPUT_POST, 'loginCred', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
echo $loginCred . $password;

$sql = "SELECT * FROM userinfo where Username = :loginCred";
echo $sql;
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':loginCred', $loginCred);
$stmt->execute();
$result = $stmt->fetchAll();
if (!empty($result)) { //IF Database Contains Username/Email -> check password
  echo  " || " . $result[0]->Password;
  if (password_verify($password, $result[0]->Password)) { //Entered pw - database pw
    $_SESSION['errorMsg'] = "Logged In";
    $_SESSION['userID'] = $result[0]->ID;
    //echo $_SESSION['errorMsg'];
    header("Location:../Index.php");
  }
  else{
    $_SESSION['errorMsg'] = "Wrong Password";
    header("Location:../Login.php");
  }
}
else{
  $_SESSION['errorMsg'] = "Wrong Password/User";
  header("Location:../Login.php");
}
 ?>
