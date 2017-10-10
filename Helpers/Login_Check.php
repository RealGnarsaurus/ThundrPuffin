<?php
require ('db.php');
session_start();
$loginCred = $_POST['loginCred'];
$password = $_POST['password'];
echo $password;



$sql = "SELECT * FROM userinfo where Username = '$loginCred' OR Email = '$loginCred'";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
if (!empty($result)) { //IF Database Contains Username/Email -> check password
  echo  " || " . $result[0]->Password;
  if (password_verify($password, $result[0]->Password)) { //Entered pw - database pw
    $_SESSION['errorMsg'] = "Logged In";
    header("Location:../welcome.php");
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
