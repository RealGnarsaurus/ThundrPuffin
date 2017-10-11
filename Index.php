<?php
session_start();
require('Helpers/db.php');
$sql = "SELECT * FROM blogg";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

?>
 <!DOCTYPE html>
 <html>
 <body>
   <div id="">
     <a href="Registrera.php">reg</a>
     <a href="Login.php">login</a>
     <a href="ManageBlogg.php">manage</a>
     <tr>
       <th>Name</th>
       <th>ID</th>
     </tr>
     <br>
     <?php
        foreach ($result as $res) {?>
          <form action="Blogg/Blogg/<?php echo $res->UserID;?>" method="post">
            <input type="number" name="bloggID" value="" hidden>
            <input type="submit" name="" value="<?php echo $res->Name;?>">
           <tr>
             <?php echo $res->Name;?>
           </tr>
           <tr>
             <?php echo $res->UserID;?>
           </tr>
         </form>
     <br>
     <?php
     }
     ?>

   </div>
 </body>
 </html>
