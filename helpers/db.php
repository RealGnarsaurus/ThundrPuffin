<!--Connects to database for info-->
<?php
$dsn = "mysql:host=localhost;dbname=thundrpuffin"; //Server Auth
$login = "thundrpuffin";//Username
$password = "t1";//Password
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"); //Set Value as UT8 Coding
$dbh = new pdo($dsn,$login,$password,$options); //Establish Con..
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
?>
