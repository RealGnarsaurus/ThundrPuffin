<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ThundrPuffin</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/welcomeStyle.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid" id="welcome_well">
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid" id="navbarBg">
                <div class="navbar-header">
                    <a class="navbar-brand" id="brand" href="#">thundrPuffin</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Browse blogs</a></li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">About</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="login.php">Login</a></li>
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