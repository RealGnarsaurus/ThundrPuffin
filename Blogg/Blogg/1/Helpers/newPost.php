<?php
require('db.php');

$choice = $_POST['choice'];
$bloggID = $_POST['bloggID'];
$post = $_POST['post'];
$dates = Date("Y/m-d H:G:s");

if ($choice == "post") {
  $sql = "INSERT INTO post(ID,BloggID,Post,Dates) VALUES (null,'$bloggID','$post','$dates')";
echo $sql;
  $stmt= $dbh->prepare($sql);
  //$stmt->execute();
  //header("location:../Index.php?ID=$bloggID");
}
if ($choice == "comment") {

}

 ?>
