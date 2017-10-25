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
    <h1>User Info</h1>
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
    }
    else{
      ?>
      <img id="previewImg" src="../Blogg/Images/Stock.png" style="background-color:black;width:100px;height:auto;">
      <?php
    }
    ?>
  </div>
  
  <div id="profileChanges">
    <h1>Edit profile</h1>
    <form id="MyForm" action="../Helpers/MyProfile_Check.php" method="post"enctype="multipart/form-data">
    <h2>Change Avatar</h2>
    <input type="file" name="Avatar" onchange="preview(event,'previewImg');" id="BG">
    <h2>New Email</h2>
    <input type="text" name="Email" placeholder="<?php echo $res->Email;?>">
    <h2>New Password</h2>
    <input type="password" name="Password" placeholder="">
    <h2>Repeat New Password</h2>
    <input type="password" name="Password2" placeholder="">
    <h2>Confirm With Old Password</h2>
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
