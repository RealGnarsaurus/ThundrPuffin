<?php
//This file will manage blog and or create one.
function getLineWithString($fileName, $str,$endPoint) {
    echo $str;
    $lines = file($fileName);
    $startRow =0;
    $endRow =0;

    //echo count($lines);

    for ($i=0; $i < count($lines); $i++) {
        if (strpos($lines[$i], $str) !== false) { //Finds startpos for Words
            //echo $lines[$i];

              //echo $i . $lines[$i];
              $startRow = $i;
        }
    }
    $canFind = "true";
    for ($j=$startRow; $j < count($lines); $j++) {
        if (strpos($lines[$j], $endPoint) !== false && $canFind == "true") { //Finds endpos of Words
            //echo $lines[$i];
            //echo $j;
            $endRow = $j;
            $canFind = "false";
              //echo $j . $lines[$j];
        }
    }
    echo  " StartRow:".$startRow;
    echo  " EndRow:".$endRow;
    ?>
    <br>
    <br>
    <?php
    for ($x=$startRow; $x != $startRow + $endRow +1; $x++) {
      //echo $row +6;
      //echo $x;
      echo $x . $lines[$x];
      ?>
      <br>
      <?php
    }
    if (!empty($Row)) {
          $line_i_am_looking_for = $Row;
    }

    $lines = file( $fileName , FILE_IGNORE_NEW_LINES );
    //$lines[$line_i_am_looking_for] = 'background-color:Yellow;';
    //file_put_contents( $fileName , implode( "\n", $lines ) );
  }
session_start();
require('Helpers/db.php');
if (!empty($_SESSION['userID'])) { //IF logged in
  //Header("Location:Login.php")
  $userID = $_SESSION['userID'];
  $sql = "SELECT * FROM blogg where UserID='$userID'"; //Check if user has blogg
  //echo $sql;
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
  if (!empty($result)) {
    $bloggID = $result[0]->ID;
  }
}
else if(empty($_SESSION['userID'])){
  header("Location:Login.php");
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
<script src="Helpers/EditStyle.js"></script>
<script src="Helpers/UpdateInstant.js"></script>
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
        <input type="text" value="" pattern="[a-zA-Z0-9]+" name="bloggName">
        <br>
        <input type="text" name="userID" pattern="[0-9]+" value="<?php echo $userID;?>"hidden>
        <input type="text" name="choice" pattern="[a-zA-Z]+" value="addBlogg"hidden>
        <input type="submit" value="Skapa" name="">
      </form>
      <?php
    }
    else{
      //echo "cant create new"; //Manage Blogg'
      //echo "BloggID ->" . $bloggID;
      getLineWithString("Blogg/$bloggID/style.css","body","}");
      ?>
      <div id="AdminMenu">
          <form action="Blogg/sf/Index.php?bloggID" method="GET">
            <input type="text" name="userID" pattern="[0-9]+" value="<?php echo $userID;?>" placeholder="<?php echo $result[0]->ID;?>"hidden>
            <input type="text" name="bloggID"  pattern="[0-9]+" value="<?php echo $bloggID;?>" hidden>
            <input type="submit" name="" value="Goto Blogg">
          </form>
          <form action="Helpers/Blogg_Check.php" method="post" enctype="multipart/form-data">
            <input type="text" name="userID"  pattern="[0-9]+" value="<?php echo $userID;?>" placeholder="<?php echo $result[0]->ID;?>"hidden>
            <input type="text" name="bloggID" pattern="[0-9]+" value="<?php echo $bloggID;?>" hidden>
            <br>
            Name Of Blogg:
            <br>
            <input type="text" name="bloggName" pattern="[a-zA-Z0-9]+" value="<?php echo $result[0]->Name;?>" onchange="preview(event,'previewName');" placeholder="">
            <h2>Images</h2>
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
            <input type="text" name="choice" pattern="[a-zA-Z0-9]+" value="updateBlogg"hidden>
            <br>
            <br>
            <input type="submit" value="Update" name="submit">
          </form>
            <h2>Background</h2>
            Body BackGround Color: <input type="color" onchange="update(this,<?php echo $bloggID;?>)" name="BBC"><br>
            Input - Post BackGround Color: <input type="color" onchange="update(this,<?php echo $bloggID;?>)" name="IPBC"><br>
            Post BackGround Color: <input type="color" name="PBC" onchange="update(this,<?php echo $bloggID;?>)" id="HeaderColor"><br>
            Input - Comment BackGround Color: <input type="color" onchange="update(this,<?php echo $bloggID;?>)" name="ICBC"><br>
            Comment BackGround Color: <input type="color" onchange="update(this,<?php echo $bloggID;?>)" name="CBC"><br>

            <h2>Text</h2>
            Text Size  [Header]:  <input type="number" name="TFHS" onchange="update(this,<?php echo $bloggID;?>)" placeholder="Normal is 25px"><br>
            Text Size    [Post]: <input type="number" name="TFPS" onchange="update(this,<?php echo $bloggID;?>)" placeholder="Normal is 10px"><br>
            Text Size [Comment]:  <input type="number" name="TFCS" onchange="update(this,<?php echo $bloggID;?>)" placeholder="Normal is 9px"><br><br>
            Text Color [Header]: <input type="color" name="TCH" onchange="update(this,<?php echo $bloggID;?>)" id="HeaderColor"><br>
            Text Color   [Comment]: <input type="color" name="TCP" onchange="update(this,<?php echo $bloggID;?>)" id="HeaderColor"><br>
            Text Color [Post]: <input type="color" name="TCC" onchange="update(this,<?php echo $bloggID;?>)" id="HeaderColor"><br>
            <br>
            Text Font:
      </div>
      <?php

    }
    ?>

    <div id="preview">
      <h2>Preview</h2>
      <form id="previewBloggSite" runat="server">
        <img id="previewImg" src="Blogg/<?php echo $userID;?>/Texture/Background.jpg"> <!--Background Image-->
        <img id="previewLefter" src="Blogg/<?php echo $userID;?>/Texture/LefterImage.jpg"><!--Left Image-->
        <img id="previewRighter" src="Blogg/<?php echo $userID;?>/Texture/RighterImage.jpg"><!--Right Image-->
        <img id="previewHeader" src="Blogg/<?php echo $userID;?>/Texture/HeaderImage.jpg"><!--Header Image-->
        <p id="previewName">Preview Name</p><!--Blogg Name-->

      <div id="fakePost">

        <div>
      </form>
    </div>
 </body>
 </html>