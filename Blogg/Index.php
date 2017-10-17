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
<<<<<<< HEAD
 <body style="background-image: url('Helpers/gif.gif');background-size: cover;background-repeat: no-repeat;">
   <a href="Registrera.php">reg</a>
   <a href="Login.php">login</a>
   <a href="CreateBlogg/ManageBlogg.php">manage</a>
=======
 <body>
   <a href="Registrera.php">reg</a>
   <a href="Login.php">login</a>
   <a href="ManageBlogg.php">manage</a>
>>>>>>> 88d7a64d094eaed7816b99dbcc6df2bbb582089a
   <div id="">

     <tr>
       <th>Name</th>
       <th>ID</th>
     </tr>
     <br>
     <?php
        foreach ($result as $res) {?>
          <form action="Blogg/<?php echo $res->UserID;?>" method="get">
            <input type="number" name="bloggID" value="<?php echo $res->UserID;?>" hidden>
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
