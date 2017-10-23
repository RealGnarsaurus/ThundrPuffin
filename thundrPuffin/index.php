<?php
session_start();
require('Helpers/db.php');
$sql = "SELECT * FROM blogg";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
header("Location: welcome.php");
?>
 <!DOCTYPE html>
 <html>
 <body style="background-image: url('Helpers/gif.gif');background-size: cover;background-repeat: no-repeat;">
   <a href="Register.php">reg</a>
   <a href="Login.php">login</a>
   <a href="ManageBlogg.php">manageblogg</a>
   <a href="ReportHistory.php">report</a>
   <a href="MyProfile.php">myprofile</a>
   <a href="Helpers/Logout.php">Logout</a>

 <body>

   <div id="">

     <tr>
       <th>Name</th>
       <th>ID</th>
     </tr>
     <br>
     <?php
        foreach ($result as $res) {?>
          <form action="Blogg/sf/index.php" method="get">
            <input type="number" name="bloggID" value="<?php echo $res->ID;?>" hidden>
            <input type="submit" name="" value="<?php echo $res->Name;?>">
         </form>
     <br>
     <?php
     }
     /*
     <a href="Blogg/<?php echo $res->ID;?>/?bloggID=<?php echo $res->ID;?>">
      <tr>
        <?php echo $res->Name;?>
      </tr>
      <tr>
        <?php echo $res->ID;?>
      </tr>
    </a>
    */
     ?>

   </div>
 </body>
 </html>
