<?PHP
    session_start();
    require('helpers/db.php');

    if (!empty($_SESSION['userID'])) {
      $userID = $_SESSION['userID'];
      //Gets Blogg ID
      $sql = "SELECT * from blogg where UserID = $userID";
      //echo $sql;
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
      $result = $stmt->FetchAll();
    }

		//Gets User Info
		$sql2 = "SELECT * from blogg";
		//echo $sql2;
		$stmt2 = $dbh->prepare($sql2);
		$stmt2->execute();
		$result2 = $stmt2->FetchAll();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ThundrPuffin</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/welcomestyle.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid" id="welcome_well">
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid" id="navbarBg">
                <div class="navbar-header">
                    <img src="img/tplogonav-logga.png"/>
                    <a class="navbar-brand" id="brand" href="welcome.php">thundrPuffin</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="welcome.php">Home</a></li>
                    <li class="active"><a href="browsbloggs.php">Browse blogs</a></li>
                    <li><a href="#">Features(W)</a></li>
                    <li><a href="#">About(W)</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?PHP
                        if(!empty($_SESSION['userID'])) {
                            $userID = $_SESSION['userID'];
                            $sql = "SELECT Username from userinfo WHERE ID = $userID";
                            $getName = $dbh->prepare($sql);
                            $getName->execute();
                            $getNameResult = $getName->fetchAll();
                            echo '<li><a href="admin/admin.php"><i class="material-icons menuIcons">account_circle</i>'.$getNameResult[0]->Username.'</a></li>';
                            echo '<li><a href="helpers/logout.php">Logout</a></li>';
                        }
                        else{
                            echo '<li><a href="login.php">Login/Register</a></li>';
                        }
                    ?>

                </ul>
            </div>
        </nav>
        <div class="container" id="content">
            <div class="row feature">
                <div class="col-md-7 featureText">
                    <?php
                    if (!empty($result[0]->ID)) {
                      ?>
                      <a href="blogg/sf/index.php?bloggID=<?php echo $result[0]->ID;?>" style="color:white;"><h4><?php echo $result[0]->Name;?> - My Profile</h4></a>
                      <?php
                      }
                     ?>
                    <br>
                    <?php
                      foreach ($result2 as $res2) {
                          ?>
                            <a href="blogg/sf/index.php?bloggID=<?php echo $res2->ID;?>"><h4><?php echo $res2->Name;?></h4></a>
                            <br>
                          <?php
                      }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
