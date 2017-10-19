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
if (!empty($_SESSION['errorMsg'])) {
    echo '<h2>'.$_SESSION['errorMsg'].'</h2>';
    $_SESSION['errorMsg'] = "";
}

foreach ($result as $res) {
  ?>
  <!DOCTYPE html>
  <script src="Helpers/preview.js"></script>
  <html>
 <body>
   <div id="MyInfo">
   <h2>New Information</h2>
   <form id="MyForm" action="" method="post"enctype="multipart/form-data">
     Avatar:<input type="file" name="Avatar" onchange="preview(event,'previewImg');" id="BG">
     <!--Prints Avatar-->
     <?php
     if (!file_exists("Blogg/Images/Avatar$userID.png")) {
       ?>
       <img id="previewImg" src="Blogg/Images/Stock.png" style="width:90px;">
       <?php
     }
     else{
       ?>
       <img id="previewImg" src="Blogg/Images/Avatar<?php echo $userID;?>.png" style="width:90px;">
       <?php
     }
     ?>
     <br>
     Email:<input type="email" name="Email" placeholder="<?php echo $res->Email;?>">
     <br>
     Password:<input type="password" pattern="[a-zA-Z0-9]+"  name="Password" placeholder="">
     <br>
     Repeat Password:<input type="password" pattern="[a-zA-Z0-9]+" name="Password2" placeholder="">
     <br>
     Confirme With Current Password<input type="password" pattern="[a-zA-Z0-9]+" name="CurrentPassword" placeholder="">
     <br>
     <input type="password" name="userID" pattern="[0-9]+" value="<?php echo $userID;?>" placeholder="" hidden>
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
 </div>
 </body>
  </html>
<?php
}
 ?>
