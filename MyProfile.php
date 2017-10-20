<?php
session_start();
require("../Helpers/db.php");
if (!empty($_SESSION['userID'])) {
  $userID = $_SESSION['userID'];
}
$sql = "SELECT * from userinfo WHERE ID ='$userID'";
echo $sql;
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
  if ($res->Avatar == NULL) {
      ?>
      <img src="Blogg/Images/Stock.png" style="background-color:#ddd;width:100px;height:auto;">
      <?php
  }
  ?>

  <!DOCTYPE html>
  <html>
 <body>
   <h2>New Information</h2>
   <form id="MyForm" action="" method="post"enctype="multipart/form-data">
     Avatar:<input type="file" name="Avatar" onchange="preview(event,'previewImg');" id="BG">
     <br>
     Email:<input type="text" name="Email" placeholder="<?php echo $res->Email;?>">
     <br>
     Password:<input type="password" name="Password" placeholder="">
     <br>
     Repeat Password:<input type="password" name="Password2" placeholder="">
     <br>
     Confirme With Current Password<input type="password" name="CurrentPassword" placeholder="">
     <br>
     <input type="password" name="userID" value="<?php echo $userID;?>" placeholder="" hidden>
     <button onclick="myFunction()">Update</button>
    <script>
    function myFunction() {
        var choice = confirm("Update Information?");
        if (choice == true) {
            document.getElementById("MyForm").action="Helpers/MyProfile_Check.php";
            document.getElementById("MyForm").submit();
        }
        else{
          alert("Update Canceled");
        }
    }
    </script>

   </form>

 </body>
  </html>
<?php
}
 ?>
