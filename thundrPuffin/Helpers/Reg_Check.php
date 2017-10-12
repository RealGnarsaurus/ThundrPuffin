<?php
require ('db.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$email = $_POST['email'];
echo $password . "||" . $password2;
//$password = password_hash($password, PASSWORD_DEFAULT);
$localIP = $_POST['localIP'];
$publicIP = $_POST['publicIP'];
echo "Local:" . $localIP . " || publicIP:" . $publicIP;


$sql = "SELECT * FROM userinfo where Username = '$username'";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

if (empty($result)) { //IF Database Contains Username/Email -> check password
  $sql2 = "SELECT * FROM userinfo where Email = '$email'";
  $stmt2 = $dbh->prepare($sql2);
  $stmt2->execute();
  $result2 = $stmt2->fetchAll();
  if (empty($result2)) {
    if ($password == $password2) {
        //ADD NEW USER
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql2 = "INSERT INTO userinfo(`ID`, `IP`, `PublicIP`, `Email`, `Password`, `Username`) VALUES (null,'$localIP','$publicIP','$email','$password','$username')";
        echo $sql2;
        $stmt2 = $dbh->prepare($sql2);
        $stmt2->execute();
        $_SESSION['errorMsg'] = "Account Registered";
        header("Location:../login.php");
    }
    else{

      $_SESSION['errorMsg'] = "Password Doesnt Match";
      header("Location:../Registrera.php");
    }
  }
  else{
    $_SESSION['errorMsg'] = "Email Already Exists";
    header("Location:../Registrera.php");
  }
}
else{
  $_SESSION['errorMsg'] = "Username Already Exists";
  header("Location:../Registrera.php");
}
 ?>
