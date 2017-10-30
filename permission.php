<?php
require('helpers/db.php');
session_start();
$userID = $_SESSION['userID'];
//echo $userID;
//Gets it all from your blogg table
$sql = "SELECT * from Blogg where UserID = :userID";
//echo $sql;
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':userID', $userID, PDO::PARAM_INT); //mby works
$stmt->execute();
$result = $stmt->fetchAll();
$bloggID = $result[0]->ID; //your bloggid
//echo $bloggID;

//Get all permissions on Your Site
$sql2 = "SELECT * from permission where BloggID = :bloggID";
//echo $sql2;
$stmt2 = $dbh->prepare($sql2);
$stmt2->bindParam(':bloggID', $bloggID, PDO::PARAM_INT); //mby works
$stmt2->execute();
$result2 = $stmt2->fetchAll();


if (empty($result2)) {
  echo "No one has joined your blogg";
}
else{
  //Get all user and their permissions

  foreach ($result2 as $res2) {
    $userInfo = $res2->UserID; //permission userid
    //echo $userInfo;
    $sql3 = "SELECT DISTINCT userinfo.Username as UN,userinfo.ID as ID, permission.Post as Post, permission.Comment as Comment, permission.Edit as Edit, permission.Del as Del from userinfo,permission where userinfo.ID = :userinfo AND permission.UserID = :userinfo AND permission.BloggID=:bloggID";
    //echo $sql3;
    //echo $userInfo ."||".$bloggID;

    $stmt3 = $dbh->prepare($sql3);
    $stmt3->bindParam(':userinfo', $userInfo, PDO::PARAM_INT); //mby works
    $stmt3->bindParam(':bloggID', $bloggID, PDO::PARAM_INT); //mby works
    $stmt3->execute();
    $result3 = $stmt3->fetchAll();

    foreach ($result3 as $res3) {
    ?>
    <br>
    <form action="" method="post">
      <?php
      if ($res3->ID == $userID) {
        //OWner
        ?>
        <h2><?php echo $res3->UN . " - ID:" . $res3->ID;?></h2>
        <?php
        if ($res3->Post == 1) {
          ?>
            Post<input type="checkbox" disabled checked name="Post" onclick="update2(this,<?php echo $res3->ID;?>,<?php echo $bloggID;?>);">
        <?php
        }
        else{
          ?>
            Post<input type="checkbox" disabled name="Post" onclick="update2(this,<?php echo $res3->ID;?>,<?php echo $bloggID;?>);">
        <?php
        }
        ?>

        <?php
        if ($res3->Comment == 1) {
          ?>
          Comment<input type="checkbox" disabled checked name="Comment" onclick="update2(this,<?php echo $res3->ID;?>,<?php echo $bloggID;?>);">

        <?php
        }
        else{
          ?>
          Comment<input type="checkbox"disabled name="Comment" onclick="update2(this,<?php echo $res3->ID;?>,<?php echo $bloggID;?>);">
        <?php
        }
        ?>

        <?php
        if ($res3->Edit == 1) {
          ?>
          Edit<input type="checkbox" disabled checked name="Edit" onclick="update2(this,<?php echo $res3->ID;?>,<?php echo $bloggID;?>);">
        <?php
        }
        else{
          ?>
          Edit<input type="checkbox" disabled name="Edit" onclick="update2(this,<?php echo $res3->ID;?>,<?php echo $bloggID;?>);">

          <?php
        }
        ?>

        <?php
        if ($res3->Del == 1) {
          ?>
          Delete<input type="checkbox" disabled checked name="Delete" onclick="update2(this,<?php echo $res3->ID;?>,<?php echo $bloggID;?>);">

          <?php
        }
        else{
          ?>
          Delete<input type="checkbox" disabled name="Delete" onclick="update2(this,<?php echo $res3->ID;?>,<?php echo $bloggID;?>);">
          <?php
        }
        ?>

        <input type="text" value="<?php echo $userInfo;?>" hidden>
        <?php
      }
      else{
      //If not owner of blog
       ?>
      <h2><?php echo $res3->UN . " - ID:" . $res3->ID;?></h2>
      <?php
      if ($res3->Post == 1) {
        ?>
          Post<input type="checkbox" checked name="Post" onclick="update2(this,<?php echo $res3->ID;?>,<?php echo $bloggID;?>);">
      <?php
      }
      else{
        ?>
          Post<input type="checkbox" name="Post" onclick="update2(this,<?php echo $res3->ID;?>,<?php echo $bloggID;?>);">
      <?php
      }
      ?>

      <?php
      if ($res3->Comment == 1) {
        ?>
        Comment<input type="checkbox" checked name="Comment" onclick="update2(this,<?php echo $res3->ID;?>,<?php echo $bloggID;?>);">

      <?php
      }
      else{
        ?>
        Comment<input type="checkbox" name="Comment" onclick="update2(this,<?php echo $res3->ID;?>,<?php echo $bloggID;?>);">
      <?php
      }
      ?>

      <?php
      if ($res3->Edit == 1) {
        ?>
        Edit<input type="checkbox" checked name="Edit" onclick="update2(this,<?php echo $res3->ID;?>,<?php echo $bloggID;?>);">
      <?php
      }
      else{
        ?>
        Edit<input type="checkbox" name="Edit" onclick="update2(this,<?php echo $res3->ID;?>,<?php echo $bloggID;?>);">

        <?php
      }
      ?>

      <?php
      if ($res3->Del == 1) {
        ?>
        Delete<input type="checkbox" checked name="Delete" onclick="update2(this,<?php echo $res3->ID;?>,<?php echo $bloggID;?>);">

        <?php
      }
      else{
        ?>
        Delete<input type="checkbox"name="Delete" onclick="update2(this,<?php echo $res3->ID;?>,<?php echo $bloggID;?>);">
        <?php
      }
      ?>

      <input type="text" value="<?php echo $userInfo;?>" hidden>


    </script>
    </form>
    <?php
  }
  }
  }
}
 ?>
