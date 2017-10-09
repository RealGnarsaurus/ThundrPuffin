<?php
session_start();
require('Helpers/db.php');
if (empty($_SESSION['Login'])) {
  //Header("Location:Login.php")
}
?>
 <!DOCTYPE html>
 <html>
 <body>
   <?php
    if (!empty($_SESSION{'errorBlogMsg'})) {
        ?>
        <h2><?php echo $_SESSION['errorBlogMsg']?></h2>
        <?php
    }
    //<input type="text" value="" name="bloggName" placeholder="BloggName">
    ?>

  <form action="Helpers/Blogg_Check.php" method="get">
    <input type="text" value="1" name="ID">
    <br>
    <input type="submit" value="Skapa" name="">
  </form>
 </body>
 </html>
