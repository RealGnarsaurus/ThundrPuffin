<?php
$cred=$_POST['cred'];
$bloggID=$_POST['bloggID'];
require('db.php');
$sql = "SELECT * from permission where bloggID='$bloggID'";
echo $sql;
$stmt = $dbh->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

foreach($result as $res){
    $userID = $res->UserID;
    $sql2 ="SELECT * from userinfo where ID='$userID' AND Username LIKE '%$cred%' OR Email LIKE '%$cred%'";
    $stmt2 = $dbh->prepare($sql2);
    $stmt2->execute();
    $result2 = $stmt2->fetchAll();
    foreach($result2 as $res2){
        echo $res2->Username;
    }
}

?>