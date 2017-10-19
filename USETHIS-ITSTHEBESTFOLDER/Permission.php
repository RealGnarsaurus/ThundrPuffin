<?php
require('Helpers/db.php');
session_start();
$userID = $_SESSION['userID'];
//echo $userID;
//Gets it all from your blogg table
$sql = "SELECT * from Blogg where UserID = '$userID'";
//echo $sql;
$stmt = $dbh->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
$bloggID = $result[0]->ID; //your bloggid
//echo $bloggID;
//Get all permissions on Your Site
$sql2 = "SELECT * from permission where BloggID = '$bloggID'";
//echo $sql2;
$stmt2 = $dbh->prepare($sql2);
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
    $sql3 = "SELECT * from userinfo where ID = '$userInfo'";
    //echo $sql3;
    $stmt3 = $dbh->prepare($sql3);
    $stmt3->execute();
    $result3 = $stmt3->fetchAll();

    $sql4 = "SELECT * from permission where UserID = '$userInfo'";
    //echo $sql4;
    $stmt4 = $dbh->prepare($sql4);
    $stmt4->execute();
    $result4 = $stmt4->fetchAll();
    foreach ($result3 as $res3) {
      foreach ($result4 as $res4) {
    ?>
    <script src="Helpers/UpdateInstant.js"></script>
    <br>
    <form action="" method="post">
      <h2><?php echo $res3->Username;?></h2>
      <?php
      if ($res4->Post == 1) {
        ?>
          Message<input type="checkbox" checked name="Post" onclick="update2(this,<?php echo $res3->ID;?>);">
      <?php
      }
      else{
        ?>
          Message<input type="checkbox" name="Post" onclick="update2(this,<?php echo $res3->ID;?>);">
      <?php
      }
      ?>

      <?php
      if ($res4->Comment == 1) {
        ?>
        Comment<input type="checkbox" checked name="Comment" onclick="update2(this,<?php echo $res3->ID;?>);">

      <?php
      }
      else{
        ?>
        Comment<input type="checkbox" name="Comment" onclick="update2(this,<?php echo $res3->ID;?>);">
      <?php
      }
      ?>

      <?php
      if ($res4->Edit == 1) {
        ?>
        Edit<input type="checkbox" checked name="Edit" onclick="update2(this,<?php echo $res3->ID;?>);">
      <?php
      }
      else{
        ?>
        Edit<input type="checkbox" name="Edit" onclick="update2(this,<?php echo $res3->ID;?>);">

        <?php
      }
      ?>

      <?php
      if ($res4->Del == 1) {
        ?>
        Delete<input type="checkbox" checked name="Delete" onclick="update2(this,<?php echo $res3->ID;?>);">

        <?php
      }
      else{
        ?>
        Delete<input type="checkbox"name="Delete" onclick="update2(this,<?php echo $res3->ID;?>);">
        <?php
      }
      ?>
      <input type="text" value="<?php echo $userInfo;?>" hidden>
    </form>
    <?php
  }
}
  }
}
 ?>
