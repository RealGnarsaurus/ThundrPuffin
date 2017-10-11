<?php
session_start();
require('Helpers/db.php');
$bloggName = $_POST['bloggName'];
$userID = $_SESSION['ID'];

?>
