<?php
session_start();
require("Helpers/db.php");
if (!empty($_SESSION['userID'])) {
  $userID = $_SESSION['userID'];
}
?>

<!DOCTYPE html>
<script src="../Helpers/preview.js"></script>
<html>
 <body>
<div id="profileInformation">
  <?php
    $sql = "SELECT * from userinfo WHERE ID ='$userID'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    foreach ($result as $res) {
  ?>
    <h2>Username</h2><?php
    echo $res->Username;
    ?>
    <h2>Email</h2><?php
    echo $res->Email;
    ?>
    <h2>Avatar</h2><?php
    if (!file_exists("../Blogg/Images/Avatar{$userID}.png")) {
      ?>
      <img id="previewImg" src="../Blogg/Images/Avatar<?php echo $userID;?>.png" style="background-color:black;width:100px;height:auto;">
      <?php
      echo "File exist!";
    }
    else{
      ?>
      <img id="previewImg" src="../Blogg/Images/Stock.png" style="background-color:black;width:100px;height:auto;">
      <?php
      echo "../Blogg/Images/Avatar{$userID}.png";
      echo "File does not exist!";
    }
    ?>
  </div>
  
  <div id="profileChanges">
    <h2>Edit profile</h2>
    <form id="MyForm" action="../Helpers/MyProfile_Check.php" method="post"enctype="multipart/form-data">
    <h3>Change Avatar</h3>
    <input type="file" name="Avatar" onchange="preview(event,'previewImg');" id="BG">
    <h3>New Email</h3>
    <input type="text" name="Email" placeholder="<?php echo $res->Email;?>">
    <h3>New Password</h3>
    <input type="password" name="Password" placeholder="">
    <h3>Repeat New Password</h3>
    <input type="password" name="Password2" placeholder="">
    <h3>Confirm With Old Password</h3>
    <input type="password" name="CurrentPassword" placeholder="" required>
    <input type="password" name="userID" value="<?php echo $userID;?>" placeholder="" hidden>
    </br>
    <input type="submit" name="" value="Update">
    </form>
  </div>
 </body>
  </html>
<?php
}
 ?>
