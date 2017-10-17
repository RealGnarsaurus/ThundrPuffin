<?php
session_start();
function getLineWithString($fileName,$Row,$AlteredValue) {
$line_i_am_looking_for = $Row;
$lines = file( $fileName , FILE_IGNORE_NEW_LINES );
$lines[$line_i_am_looking_for] = 'background-color:'. $AlteredValue . ";";
file_put_contents( $fileName , implode( "\n", $lines ) );
}
require('Blogg/sf/Helpers/db.php');
$userID = $_SESSION['userID'];
if ($_POST['choice'] == "updateBlogg") {
  $extension = "jpg";
  $target_dir = "Blogg/$userID/Texture/";
  //Replaces Background img;
  if (!empty($_POST['BBC'])) {
      echo $_POST['BBC'];
      getLineWithString("Blogg/$userID/style.css","5",$_POST['BBC']);

    }
  if (!empty(basename($_FILES["BG"]["name"]))) {

    $target_file = $target_dir . basename($_FILES["BG"]["name"]);
    $filename=$_FILES["BG"]["name"];
    $newfilename=$target_dir ."BackGround." . $extension;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["BG"]["tmp_name"]);
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
    if ($_FILES["BG"]["size"] > 5000000) { //5gb limit
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo $imageFileType;
        echo "Sorry, only JPG, JPEG, PNG ,GIF ,MP3 & MP4 files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    }
    else{

        if (move_uploaded_file($_FILES["BG"]["tmp_name"], $newfilename)) {
            echo "The file ". basename( $_FILES["BG"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
  }
  if (!empty(basename($_FILES["HeaderImage"]["name"]))) {

    $HeaderImage = $target_dir . basename($_FILES["HeaderImage"]["name"]);
    $filename=$_FILES["HeaderImage"]["name"];
    $newfilename=$target_dir ."HeaderImage." . $extension;
    $uploadOk = 1;
    $imageFileType = pathinfo($HeaderImage,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["HeaderImage"]["tmp_name"]);
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
    if ($_FILES["HeaderImage"]["size"] > 5000000) { //5gb limit
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
    } else {

      if (move_uploaded_file($_FILES["HeaderImage"]["tmp_name"], $newfilename)) {
          echo "The file ". basename( $_FILES["HeaderImage"]["name"]). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
    }
  }
  if (!empty(basename($_FILES["LefterImage"]["name"]))) {

    $LefterImage = $target_dir . basename($_FILES["LefterImage"]["name"]);
    $filename=$_FILES["LefterImage"]["name"];
    $newfilename=$target_dir ."LefterImage." . $extension;
    $uploadOk = 1;
    $imageFileType = pathinfo($LefterImage,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["LefterImage"]["tmp_name"]);
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
    if ($_FILES["LefterImage"]["size"] > 5000000) { //5gb limit
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
    } else {

      if (move_uploaded_file($_FILES["LefterImage"]["tmp_name"], $newfilename)) {
          echo "The file ". basename( $_FILES["LefterImage"]["name"]). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
    }
  }
  if (!empty(basename($_FILES["RighterImage"]["name"]))) {

    $RighterImage = $target_dir . basename($_FILES["RighterImage"]["name"]);
    $filename=$_FILES["RighterImage"]["name"];
    $newfilename=$target_dir ."RighterImage." . $extension;
    $uploadOk = 1;
    $imageFileType = pathinfo($RighterImage,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["RighterImage"]["tmp_name"]);
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
    if ($_FILES["RighterImage"]["size"] > 5000000) { //5gb limit
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
    } else {

      if (move_uploaded_file($_FILES["RighterImage"]["tmp_name"], $newfilename)) {
          echo "The file ". basename( $_FILES["RighterImage"]["name"]). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
    }
  }
  if (!empty($_POST['bloggName']) && !empty($_POST['userID'])) {
    $bloggName = $_POST['bloggName'];
    $userID = $_POST['userID'];

    $sql = "SELECT * FROM blogg where Name='$bloggName'"; //Check if user has blogg
    //echo $sql;
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    if (empty($result)) {
      $sql2 = "UPDATE blogg SET Name ='$bloggName' WHERE ID='$userID'"; //Check if user has blogg
      //echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->execute();
    }
  }
  else{
    $_SESSION['errorBlogMsg']  = "cant update blog";
    }
  $_SESSION['errorBlogMsg']  = "Blogg Uppdated";
  //header("Location:ManageBlogg.php");
}
if ($_POST['choice'] == "addBlogg") {

  if (!empty($_POST['bloggName']) && !empty($_POST['userID'])) {
    $bloggName = $_POST['bloggName'];

    $sql = "SELECT * FROM blogg where UserID='$userID'"; //Check if user has blogg
    echo $sql;
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    if (empty($result)) {
      $sql2 = "INSERT INTO `blogg`(`ID`, `Name`, `UserID`) VALUES (null,'$bloggName','$userID')"; //Check if user has blogg
      //echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->execute();
      if ($stmt2) { //If correctly inserted to databsae, create folders
        //Create Files
        if (!is_dir('Blogg/'.$userID)) {
          mkdir('Blogg/'.$userID, 0777, true); //Creates A Personal Blogg Folder
          echo("personal folder created");
        }

        if (!is_dir('Blogg/'.$userID.'/Helpers')) {
          mkdir('Blogg/'.$userID.'/Helpers', 0777, true); //Creates Helper Folder
          if (is_dir('Blogg/'.$userID.'/Helpers')) {

            $index = fopen('Blogg/'.$userID.'/Index.php', "w");
            $style = fopen('Blogg/'.$userID.'/style.css', "w");
            $blogCheck = fopen('Blogg/'.$userID.'/Helpers/Blogg_Check.php', "w");
            $db = fopen('Blogg/'.$userID.'/Helpers/db.php', "w");
            $edit = fopen('Blogg/'.$userID.'/Helpers/Edit.js', "w");
            $IP = fopen('Blogg/'.$userID.'/Helpers/IP.js', "w");
            $newPost = fopen('Blogg/'.$userID.'/Helpers/newPost.php', "w");

          }
        }

        if (!is_dir('Blogg/'.$userID.'/Texture')) {
            mkdir('Blogg/'.$userID.'/Texture', 0777, true); //Creates Helper Folder
        }
      //At this point all files should have been created
      $sIndex = "Blogg/sf/Index.php"; //all static files (basic of blogg)
      $csIndex = file_get_contents($sIndex); //all static content in files

      $sStyle =  "Blogg/sf/style.css";
      $csStyle = file_get_contents($sStyle);

      $sDb =  "Blogg/sf/Helpers/db.php";
      $csDb = file_get_contents($sDb);

      $sEdit =  "Blogg/sf/Helpers/Edit.js";
      $csEdit = file_get_contents($sEdit);

      $sIP =  "Blogg/sf/Helpers/IP.js";
      $csIP = file_get_contents($sIP);

      $sNewPost =  "Blogg/sf/Helpers/newPost.php";
      $csNewPost = file_get_contents($sNewPost);


      file_put_contents('Blogg/'.$userID.'/Index.php', $csIndex);
      file_put_contents('Blogg/'.$userID.'/style.css', $csStyle);
      file_put_contents('Blogg/'.$userID.'/Helpers/db.php', $csDb);
      file_put_contents('Blogg/'.$userID.'/Helpers/Edit.js', $csEdit);
      file_put_contents('Blogg/'.$userID.'/Helpers/IP.js', $csIP);
      file_put_contents('Blogg/'.$userID.'/Helpers/newPost.php', $csNewPost);
    }
  }
}
else{

  $_SESSION['errorBlogMsg']  = "How did you even do dizz, no userid or bloggname";
}
$_SESSION['errorBlogMsg']  = "Blogg Added";
header("Location:ManageBlogg.php");
}
?>
