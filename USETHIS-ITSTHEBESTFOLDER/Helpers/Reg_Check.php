<?php
require('db.php');
session_start();
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
echo $password . "||" . $password2;
//$password = password_hash($password, PASSWORD_DEFAULT);
$localIP = filter_input(INPUT_POST, 'localIP', FILTER_VALIDATE_IP);
$publicIP = filter_input(INPUT_POST, 'publicIP', FILTER_VALIDATE_IP);
echo "Local:" . $localIP . " || publicIP:" . $publicIP;


$sql = "SELECT * FROM userinfo where Username = ':username'";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':username', $username, PDO::PARAM_INT|PDO::PARAM_STR); //mby works
$stmt->execute();
$result = $stmt->fetchAll();

if (empty($result)) { //IF Database Contains Username/Email -> check password
  $sql2 = "SELECT * FROM userinfo where Email = ':email'";
  $stmt2 = $dbh->prepare($sql2);
  $stmt2->bindParam(':email', $email); //mby works
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
        //header("Location:../Registrera.php");
    }
    else{

      $_SESSION['errorMsg'] = "Password Doesnt Match";
      //header("Location:../Registrera.php");
    }
  }
  else{
    $_SESSION['errorMsg'] = "Email Already Exists";
    //header("Location:../Registrera.php");
  }
}
else{
  $_SESSION['errorMsg'] = "Username Already Exists";
  //header("Location:../Registrera.php");
}
 ?>
