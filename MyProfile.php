<?php
session_start();
require("Helpers/db.php");
if (!empty($_SESSION['userID'])) {
  $userID = $_SESSION['userID'];
}
$sql = "SELECT * from userinfo WHERE ID ='$userID'";
//echo $sql;
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
  //echo "../Blogg/Images/Avatar$userID.png";
  if (!file_exists("../Blogg/Images/Avatar$userID.png")) {
    //echo "files Exist";
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

  <!DOCTYPE html>
  <script src="../Helpers/preview.js"></script>
  <html>
 <body>
   <h2>New Information</h2>
   <form id="MyForm" action="../Helpers/MyProfile_Check.php" method="post"enctype="multipart/form-data">
     Avatar:<input type="file" name="Avatar" onchange="preview(event,'previewImg');" id="BG">
     <br>
     Email:<input type="email" name="Email" placeholder="<?php echo $res->Email;?>">
     <br>
     Password:<input type="password" name="Password" placeholder="">
     <br>
     Repeat Password:<input type="password" name="Password2" placeholder="">
     <br>
     Confirme With Current Password<input type="password" name="CurrentPassword" placeholder="" required>
     <br>
     <input type="password" name="userID" value="<?php echo $userID;?>" placeholder="" hidden>
     <input type="submit" name="" value="Update">
   </form>

 </body>
  </html>
<?php
}
 ?>
