<?php
//This file will manage blog and or create one.


session_start();
require('sf/Helpers/db.php');
if (empty($_SESSION['Login'])) { //IF logged in
  //Header("Location:Login.php")
  $userID = '6';
  $sql = "SELECT * FROM blogg where UserID='$userID'"; //Check if user has blogg
  //echo $sql;
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
}
else if(!empty($_SESSION['Login'])){
/*
  $userID = '3';
  $sql = "SELECT * FROM blogg where UserID='$userID'"; //Check if user has blogg
  //echo $sql;
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
  */
}
?>
 <!DOCTYPE html>
 <html>
<script src="Helpers/preview.js"></script>
<link rel="stylesheet" href="Helpers/style.css">
 <body>
   <?php
    if (!empty($_SESSION{'errorBlogMsg'})) {
      //Provides a error message if something goes wrong
        ?>
        <h2><?php echo $_SESSION['errorBlogMsg']?></h2>
        <?php
        $_SESSION['errorBlogMsg'] = null;
    }
    //<input type="text" value="" name="bloggName" placeholder="BloggName">

    if (empty($result)) { //Create one
      echo "can create";
      ?>
      <form action="Helpers/Blogg_Check.php" method="post">
        <input type="text" value="" name="bloggName">
        <br>
        <input type="text" name="userID" value="<?php echo $userID;?>"hidden>
        <input type="text" name="choice" value="addBlogg"hidden>
        <input type="submit" value="Skapa" name="">
      </form>
      <?php
    }
    else{
      //echo "cant create new"; //Manage Blogg
      ?>
      <div id="AdminMenu">
          <form action="Helpers/Blogg_Check.php" method="post" enctype="multipart/form-data">
            BackGround Image: <input type="file" name="BG" onchange="preview(event,'previewImg');" id="BG">
            <br>
            <br>
            Header Image: <input type="file" name="HeaderImage" onchange="preview(event,'previewHeader');" id="HeaderImage">
            <br>
            <br>
            Lefter Image: <input type="file" name="LefterImage" onchange="preview(event,'previewLefter');" id="LefterImage">
            <br>
            <br>
            Righter Image: <input type="file" name="RighterImage" onchange="preview(event,'previewRighter');" id="RighterImage">
            <br>
            <br>
            Name Of Blogg:
            <br>
            <input type="text" name="bloggName" value="<?php echo $result[0]->Name;?>" onchange="preview(event,'previewName');" placeholder="">
            <input type="text" name="userID" value="<?php echo $userID;?>" placeholder="<?php echo $result[0]->ID;?>"hidden>
            <input type="text" name="choice" value="updateBlogg"hidden>
            <br>
            <input type="submit" value="Update" name="submit">
          </form>
      </div>
      <?php

    }
    ?>

    <div id="preview">
      <form id="previewBloggSite" runat="server">
        <div id="previewImg">

        </div>
        <img id="previewLefter">
        <img id="previewRighter">

          <div id="previewHeader">
            <p id="previewName">blyat profile</p>
          </div>

      <div id="fakePost">

        <div>
      </form>
    </div>
 </body>
 </html>
