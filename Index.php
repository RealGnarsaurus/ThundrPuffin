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

     <tr>
       <th>Name</th>
       <th>ID</th>
     </tr>
     <br>
     <?php
        foreach ($result as $res) {?>
          <a href="Blogg/Blogg/<?php echo $res->UserID;?>/?ID=<?php echo $res->UserID;?>">
           <tr>
             <?php echo $res->Name;?>
           </tr>
           <tr>
             <?php echo $res->UserID;?>
           </tr>
         </a>
     <br>
     <?php
     }
     ?>

   </div>
 </body>
 </html>
