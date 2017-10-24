<?php
	session_start();
  	require('Helpers/db.php');
  //$password = password_hash($password, PASSWORD_DEFAULT);
 ?>

<!DOCTYPE html>
<html>
	<?php
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
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/registerStyle.css">
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid" id="navbarBg">
				<div class="navbar-header">
					<a class="navbar-brand" id="brand" href="#">ThundrPuffin</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="welcome.php">Home</a></li>
					<li><a href="#">Browse blogs</a></li>
					<li><a href="#">Features</a></li>
					<li><a href="#">About</a></li>
				</ul>
			</div>
		</nav>
		<div class="container">
			<div id="content">
				<form action="Helpers/Login_Check.php" method="post">
					<div class="form-group">
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-sm-4 col-md-4">
								<label class="control-label" for="usr">Username:</label>
								<input type="text" class="form-control" id="usr" name="loginCred" value="">
							</div>
							<div class="col-md-4"></div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-sm-4">
								<label class="control-label" for="pwd">Password:</label>
								<input type="password" class="form-control" id="pwd" name="password" value="">
							</div>
							<div class="col-md-4"></div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<button type="submit" class="btn btn-default" value="Login">Login</button>
								<a class="btn btn-default" href="register.php">No account?</a>	
							</div>
							<div class="col-md-4"></div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
