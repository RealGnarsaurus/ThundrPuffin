<!DOCTYPE html>
<html lang="sv">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" 
	integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>thundrPuffin</title>

</head>

<body>
	
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">ThundrPuffin</a>
			</div>
			<div class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">Browse</a></li>
				<li><a href="#">Features</a></li>
				<li><a href="#">About</a></li>
			</div>
			<div class="nav navbar-nav navbar-right">
				<li><a href="register.php" class="btn btn-primary">Register</a></li>
				<li><a href="login.php" class="btn btn-primary"></a></li>
			</div>
		</div>
	</nav>

	<div id="loginForms">
		<div id="postLogin">
			<form action="login.php">
				<label><b>Username</b></label>
				<input type="text" placeholder="Username" name="uname" required>
				
				<label><b>Password</b></label>
				<input type="password" placeholder="Password" name="psw" required>
				
				</br>

				<button type="submit">Login</button>
				<input type="checkbox" checked="checked"> Remember me
		</div>		
	</div>
		<div id="accountSupport">
		
			<div id="register">
			
				<a href="url">Register</a>
				
			</div>
			
			<div id="forgotPassword">
			
				<a href="url">Forgotten password?</a>
				
			</div>
	
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>
