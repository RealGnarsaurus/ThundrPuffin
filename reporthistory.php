<?php
require('Helpers/db.php');
session_start();
$userID = $_SESSION['userID'];
//Gets it all from blogg table
$sql = "SELECT * from blogg where UserID = :userID";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll();
$bloggReportID = $result[0]->ID;

//Get all Comments Reported On Your Site
$sql2 = "SELECT * from report where BloggID = :bloggReportID";
$stmt2 = $dbh->prepare($sql2);
$stmt2->bindParam(':bloggReportID', $bloggReportID, PDO::PARAM_INT);
$stmt2->execute();
$result2 = $stmt2->fetchAll();

if (empty($result2)) {
  echo "No Reports To Report";
}
else{
  $reportUserInfo = $result2[0]->UserID;
  $sql3 = "SELECT * from userinfo where ID = :reportUserInfo";
  $stmt3 = $dbh->prepare($sql3);
  $stmt3->bindParam(':reportUserInfo', $reportUserInfo, PDO::PARAM_INT);
  $stmt3->execute();
  $result3 = $stmt3->fetchAll();
  foreach ($result2 as $res2) {
    foreach ($result3 as $res3) {

    ?>
    <form action="<?php echo $res2->Url;?>" method="post">
      <?php
      //A Reported Post
      if($res2->CommentID == 0) {
        echo "User:" . $res3->Username . " || Reported With PostID:". $res2->PostID . " [Reason:" . $res2->Reason."]";
       ?>
      <input type="text" name="reportedPostID" value="<?php echo $res2->PostID;?>" hidden>
      <input type="submit" value="Quick Link">

      <?php
      }
    //A reported Comment
    else{
        echo "User:" . $res3->Username . " || Reported With CommentID:". $res2->PostID. " [Reason:" . $res2->Reason."]";
     ?>
    <input type="text" name="reportedCommentID" value="<?php echo $res2->CommentID;?>" hidden>
    <input type="submit" value="Quick Link">
    <?php
  }
    ?>
    </form>
    <input type="submit" name="" value="Remove <?php echo "Report ID:". $res2->PostID;?>" onclick="Remove(<?php echo $res2->PostID;?>);">
    <?php
  }
  }
}
 ?>
