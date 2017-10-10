<?php
session_start();

  require('Helpers/db.php');

 ?>

<!DOCTYPE html>
<html>

<script src="Helpers/IP.js"></script><!--LocalIp-->
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
	
	<link rel="stylesheet" type="text/css" href="registerStyle.css">
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	

	</head>

	<body onload="GetLocalIp(); ">
	
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="#">ThundrPuffin</a>
		</div>
		<ul class="nav navbar-nav">
		  <li class="active"><a href="#">Home</a></li>
		  <li><a href="#">Page 1</a></li>
		  <li><a href="#">Page 2</a></li>
		  <li><a href="#">Page 3</a></li>
		</ul>
	  </div>
	</nav>
	
	<div class="container">
	
		<div id="content">
	
			<form action="Helpers/Reg_Check.php" method="post">
			
				<div class="form-group">
					<div class="row">
						
						<div class="col-md-4"></div>
						<div class="col-sm-4 col-md-4">
							<label class="control-label" for="usr">Username:</label>
							<input type="text" class="form-control" id="usr" name="username" value="">
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
						<div class="col-sm-4">
							<label class="control-label" for="pwd">Repeat Password:</label>
							<input type="rePassword" class="form-control" id="repeatPwd" name="password2" value="">
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
				
				<div class="form-group">
					<div class="row">
						
						<div class="col-md-4"></div>
						<div class="col-sm-4">
							<label class="control-label" for="email">Email address:</label>
							<input type="email" class="form-control" id="email" name="email" value="">
							<input id="Public" type="text" name="localIP" value="" hidden >
							<input id="Local" type="text" name="publicIP" value="" hidden >
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
							<button type="submit" class="btn btn-default" value="Sign Up">Register</button>
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
				
				
			</form>
		
			<div id="backLogin">
				
				<div id="haveAccount">
				
					<a href="../login/login.php">Already have an account?</a>
					
				</div>	
		
			</div>
			
		</div>		
	
	</div>
	
	<div class="footer">
	
		<div class="panel-footer panel-danger">Footer</div>
		
	</div>

	</body>

</html>
