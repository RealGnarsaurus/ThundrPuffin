<?php
session_start();
function getLineWithString($fileName,$Row,$AlteredValue,$alterText) {
  $line_i_am_looking_for = $Row;
  $lines = file($fileName , FILE_IGNORE_NEW_LINES );

  $lines[$line_i_am_looking_for] = "  ".$alterText . $AlteredValue . ";";
  file_put_contents( $fileName , implode( "\n", $lines ) );
};
require('db.php');
$userID = $_SESSION['userID'];
if (!empty($_POST['bloggID'])) {
  $bloggID = $_POST['bloggID'];
}
echo $bloggID;
if ($_POST['choice'] == "updateBlogg") {
  echo "inside";
  $extension = "jpg";
  $target_dir = "../Blogg/$bloggID/Texture/";

  //POST
    if (!empty($_POST['BBC'])) {  //Body background color
      echo $_POST['BBC'] . " || ";
      getLineWithString("../Blogg/$bloggID/style.css","1",$_POST['BBC'],'background-color:');
    }
    if (!empty($_POST['IPBC'])) { //Input Post Background Color - newpost
      echo $_POST['IPBC'] . " || ";
      getLineWithString("../Blogg/$bloggID/style.css","17",$_POST['IPBC'],'background-color:');
    }
    if (!empty($_POST['PBC'])) { //Post Background Color
      echo $_POST['PBC'] . " || ";
      getLineWithString("../Blogg/$bloggID/style.css","46",$_POST['PBC'],'background-color:');
    }
    // if (!empty(!empty($_POST['ICBC']))) { //Input Comment Background Color
    //   getLineWithString("Blogg/$bloggID/style.css","5",$_POST['ICBC']);
    // }
    // if (!empty(!empty($_POST['CBC']))) {//Comment Background color
    //   getLineWithString("Blogg/$bloggID/style.css","5",$_POST['CBC']);
    // }
    //Replaces text size
    if (!empty($_POST['TFHS'])) {//Text Size Header
      echo $_POST['THFS'] . " || ";
      getLineWithString("../Blogg/$bloggID/style.css","35",$_POST['TFHS'],'font-size:');
    }
    if (!empty($_POST['TFPS'])) {//Text size post
      getLineWithString("../Blogg/$bloggID/style.css","47",$_POST['TFPS'],'font-size:');
    }
    if (!empty($_POST['TFCS'])) { //text size comment
      getLineWithString("../Blogg/$bloggID/style.css","57",$_POST['TFCS'],'font-size:');
      getLineWithString("../Blogg/$bloggID/style.css","67",$_POST['TFCS'],'font-size:');
    }
    //Replaces text color
    if (!empty($_POST['TCH'])) { //text color header
      echo $_POST['TCH'];
      getLineWithString("../Blogg/$bloggID/style.css","34",$_POST['TCH'],'color:');
    }
    if (!empty($_POST['TCP'])) { //text color post
      getLineWithString("../Blogg/$bloggID/style.css","58",$_POST['TCP'],'color:');
        getLineWithString("../Blogg/$bloggID/style.css","68",$_POST['TCP'],'color:');
    }
    if (!empty($_POST['TCC'])) { //text color comment
      getLineWithString("../Blogg/$bloggID/style.css","48",$_POST['TCC'],'color:');
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
  if (!empty($_POST['bloggName']) && !empty($_POST['bloggID'])) {
    $bloggName = $_POST['bloggName'];
    $userID = $_POST['userID'];

    $sql = "SELECT * FROM blogg where Name=:bloggName"; //Check if user has blogg
    //echo $sql;
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':bloggName', $bloggName, PDO::PARAM_STR);
    $stmt->execute();
    if (empty($result)) {
      $sql2 = "UPDATE blogg SET Name =:bloggName WHERE ID=:bloggID"; //Check if user has blogg
      //echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt->bindParam(':bloggName', $bloggName, PDO::PARAM_STR);
      $stmt->bindParam(':bloggID', $bloggID, PDO::PARAM_INT);
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
    $userID = $_POST['userID'];

    $sql = "SELECT * FROM blogg where UserID=:userID"; //Check if user has blogg
    echo $sql;
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (empty($result)) {
      $sql2 = "INSERT INTO `blogg`(`ID`, `Name`, `UserID`) VALUES (null,:bloggName,:userID)"; //Check if user has blogg
      //echo $sql2;
      $stmt2 = $dbh->prepare($sql2);
      $stmt->bindParam(':bloggName', $bloggName, PDO::PARAM_STR);
      $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
      $stmt2->execute();

      $sql3 = "SELECT * FROM blogg where UserID=:userID"; //Check if user has blogg
      echo $sql3;
      $stmt3 = $dbh->prepare($sql3);
      $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
      $stmt3->execute();
      $result3 = $stmt3->fetchAll();
      $bloggID = $result3[0]->ID;

      if ($stmt2) { //If correctly inserted to databsae, create folders
        //Create Files
        if (!is_dir('../Blogg/'.$bloggID)) {
          mkdir('../Blogg/'.$bloggID, 0777, true); //Creates A Personal Blogg Folder
          echo("personal folder created");
        }

          $style = fopen('../Blogg/'.$bloggID.'/style.css', "w"); //Style Folder
        }

        if (!is_dir('../Blogg/'.$bloggID.'/Texture')) { //Contains images
            mkdir('../Blogg/'.$bloggID.'/Texture', 0777, true); //Creates Helper Folder
        }

      //At this point all files should have been created
      $sStyle =  "../Blogg/sf/style.css";
      $csStyle = file_get_contents($sStyle);
      file_put_contents('../Blogg/'.$bloggID.'/style.css', $csStyle);




      $sql8 = "INSERT INTO `permission`(`BloggID`, `UserID`, `Post`, `Comment`, `Edit`, `Del`) VALUES (:bloggID,:userID,'1','1','1','1')";
      echo $sql8;
      $stmt8 = $dbh->prepare($sql8);
      $stmt->bindParam(':bloggID', $bloggID, PDO::PARAM_INT);
      $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
      $stmt8->execute();
    }
  }
}
$_SESSION['errorBlogMsg']  = "Blogg Added";
header("Location:../admin/admin.php");

?>
