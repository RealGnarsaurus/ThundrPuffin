<?php
require('db.php');
session_start();
if (!empty($_POST['CurrentPassword'])) {
  $userID = filter_input(INPUT_POST, 'userID', FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, 'CurrentPassword', FILTER_SANITIZE_STRING);
  echo $userID;
  $sql = "SELECT * FROM userinfo where ID = :userID";
  echo $sql;
  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(':userID', $userID, PDO::PARAM_INT); //mby works
  $stmt->execute();
  $result = $stmt->fetchAll();
  if (!empty($result)) { //IF Database Contains Username -> check password
    echo  " || " . $result[0]->Password;
    if (password_verify($password, $result[0]->Password)) { //Entered pw - database pw
      $newPassword = "";
      if (!empty($_POST['Password']) && !empty($_POST['Password2'])) {
        $Password = $_POST['Password'];
        $Password2 = $_POST['Password2'];
        echo $Password;
        echo $Password2;
        if ($Password == $Password2) {
          $newPassword = $Password;
          $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
          $sql2 = "UPDATE `userinfo` SET `Password`= :newPassword WHERE ID = :userID";
          echo $sql2;
          $stmt2 = $dbh->prepare($sql2);
          $stmt2->bindParam(':userID', $userID, PDO::PARAM_INT); //mby works
          $stmt2->bindParam(':newPassword', $newPassword); //mby works
          $stmt2->execute();
          $_SESSION['errorMsg'] = "Account Updated";
            //header("location:../MyProfile.php");
        }
        else{
          $_SESSION['errorMsg'] = "Password Doesnt Match";
          //header("location:../MyProfile.php");
        }
      }
      if (!empty($_POST['Email'])) {
        $Email = $_POST['Email'];
        $sql2 = "UPDATE `userinfo` SET `Email`= :Email WHERE ID = :userID";
        echo $sql2;
        $stmt2 = $dbh->prepare($sql2);
        $stmt2->bindParam(':userID', $userID, PDO::PARAM_INT); //mby works
        $stmt2->bindParam(':Email', $Email); //mby works
        $stmt2->execute();
        $_SESSION['errorMsg'] = "Account Updated";
          //header("location:../MyProfile.php");
      }
      if (!empty(basename($_FILES["Avatar"]["name"]))) {
        $target_dir = "../Blogg/Images/";
        $target_file = $target_dir . basename($_FILES["Avatar"]["name"]);
        $filename=$_FILES["Avatar"]["name"];
        $extension = "png";
        $newfilename=$target_dir ."Avatar" . $userID . "." . $extension;
        echo $newfilename;
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["Avatar"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 1;
        }
        // Check file size
        if ($_FILES["Avatar"]["size"] > 5000000) { //5gb limit
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG ,GIF ,MP3 & MP4 files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        }
        else{

            if (move_uploaded_file($_FILES["Avatar"]["tmp_name"], $newfilename)) {
                echo "The file ". basename( $_FILES["Avatar"]["name"]). " has been uploaded.";
                $_SESSION['errorMsg'] = "Account Updated";

            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
      }
      }

    }
    $_SESSION['errorMsg'] = "Wrong Password";
    //header("location:../MyProfile.php");
}
