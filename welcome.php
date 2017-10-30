<?PHP
    session_start();
    require('helpers/db.php');
    //session_destroy();
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
        <link href="css/welcomeStyle.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid" id="navbarBg">
                <div class="navbar-header">
                    <img src="img/tPLogonav-logga.png"/>
                    <a class="navbar-brand" id="brand" href="#">thundrPuffin</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="welcome.php">Home</a></li>
                    <li><a href="browsbloggs.php">Browse blogs</a></li>
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
                            echo '<li><a href=helpers/logout.php">Logout</a></li>';
                        }
                        else{
                            echo '<li><a href="login.php">Login/Register</a></li>';
                        }
                    ?>

                </ul>
            </div>
        </nav>
        <div class="container" id="content">
            <div class="row">
                <div class="welcomeHeader">
                    <h1>Welcome to the simple blog platform</h1>
                    <h3>Create your blog and get started</h3>
                </div>
            </div>
            <div class="row feature">
                <div class="col-md-5 featureImg">
                    <img src="img/featureImg1.png"/>
                </div>
                <div class="col-md-7 featureText">
                    <h4>Lightweight</h4>
                    <p>thundrPuffin offers one of the most lightweight blog platforms
                        on the internet. Simple to use, simple to share - all the important stuff!
                    </p>
                </div>
            </div>
            <div class="row feature">
                <div class="col-md-7 featureText">
                    <h4>Simplicity</h4>
                    <p>As mentioned, thundrPuffin is a really simple blog platform! There
                        is no confusing or overly complicated functions that is too hard to use
                        or which you'll never use! Keeping it simple is king!
                    </p>
                </div>
                <div class="col-md-5 featureImg">

                </div>
            </div>
        </div>
    </body>
</html>
