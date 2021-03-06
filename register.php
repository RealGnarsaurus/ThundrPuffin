<?php
session_start();

  require('helpers/db.php');

 ?>

<!DOCTYPE html>
<html>
	<script src="helpers/ip.js"></script><!--LocalIp-->
	<?php
	$IP;
	if (!empty($_SESSION['errorMsg'])) {
		?>
		<h2><?php echo $_SESSION['errorMsg'];?></h2>
		<?php
	}
	?>
	<head>
		<title>thundrPuffin</title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="helpers/ip.js"></script>
    <script src="helpers/popup.js"></script>
    <script src="helpers/getcontent.js"></script>
  </head>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/registerStyle.css">
	</head>

  <body onload="GetLocalIp(); ">
		<nav class="navbar navbar-default">
			<div class="container-fluid" id="navbarBg">
				<div class="navbar-header">
					<img src="img/tPLogonav-logga.png"/>
					<a class="navbar-brand" id="brand" href="welcome.php">ThundrPuffin</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="welcome.php">Home</a></li>
					<li><a href="browsbloggs.php">Browse blogs</a></li>
					<li><a href="#">Features(W)</a></li>
					<li><a href="#">About(W)</a></li>
				</ul>
			</div>
		</nav>
		<div class="container">
			<div id="content">
				<form action="helpers/reg_check.php" method="post">
					<div class="form-group">
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-sm-4 col-md-4">
								<label class="control-label" id="popup" onclick="popup('popupid1',this);" for="usr">Username:</label>
                <div class="popup" onclick="popup('popupid1');">Click me to show Format!
                  <span class="popuptext" id="popupid1">Numbers And letters: exempel123</span>
                </div>
								<input type="text" class="form-control" id="usr" name="username" pattern="[A-Za-z0-9]+" value="">
							</div>
							<div class="col-md-4"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-sm-4">
								<label class="control-label" for="pwd">Password:</label>
                <div class="popup" onclick="popup('popupid2');">Click me to show Format!
                  <span class="popuptext" id="popupid2">Numbers And letters: password123</span>
                </div>
								<input type="password" class="form-control" id="pwd" name="password" pattern="[A-Za-z0-9]+" value="">
							</div>
							<div class="col-md-4"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">

							<div class="col-md-4"></div>
							<div class="col-sm-4">
								<label class="control-label" for="pwd">Repeat Password:</label>
                <div class="popup" onclick="popup('popupid3');">Click me to show Format!
                  <span class="popuptext" id="popupid3">Numbers And letters: password123</span>
                </div>
								<input type="password" class="form-control" id="repeatPwd" name="password2" pattern="[A-Za-z0-9]+" value="">
							</div>
							<div class="col-md-4"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-sm-4">
								<label class="control-label" for="email">Email address:</label>
                <div class="popup" onclick="popup('popupid4');">Click me to show Format!
                  <span class="popuptext" id="popupid4">Numbers And letters: exempel123@gmail.se</span>
                </div>
								<input type="email" class="form-control" id="email" name="email" value="">
								<input id="Public" type="text" name="localIP" value="" hidden>
								<input id="Local" type="text" name="publicIP" value="" hidden>
							</div>
							<div class="col-md-4"></div>
						</div>
					</div>
					<script type="application/javascript">
					function getIP(json) {
						document.getElementById("Public").value=json.ip; //
						//document.write("My public IP address is: ", json.ip);
					}
					</script>
					<script type="application/javascript" src="https://api.ipify.org?format=jsonp&callback=getIP"></script>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4">
							 <p onclick="eula();"> Accept <b id="b">Eula</b> To Sign Up <input type="checkbox" name="EULA" value="Agreed" required="required"></p>
               <div class="popup">
                 <span class="popuptext" id="popupid5">Eula Or Igree In Blindness</span>
               </div>

							</div>
							<div class="col-md-4"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<button type="submit" class="btn btn-default" value="Sign Up">Register</button>
								<a class="btn btn-default" href="login.php">Already registered?</a>
							</div>
							<div class="col-md-4"></div>
						</div>

					</div>
				</form>
			</div>
		</div>
		<div class="footer" id="footer">
			<div class="panel-footer panel-danger">Footer</div>
		</div>

					</div>
				</form>
			</div>
		</div>

	</body>
</html>
