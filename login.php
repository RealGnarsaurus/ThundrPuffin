<!DOCTYPE html>
<html>
	<head>	
		<title>thundrPuffin</title>				
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/loginStyle.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>	
		<nav class="navbar navbar-default">
			<div class="container-fluid navbarBg">
				<div class="navbar-header">
					<a class="navbar-brand" href="welcome.php">ThundrPuffin</a>
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
				<form>				
					<div class="form-group">
						<div class="row">							
							<div class="col-md-4"></div>
							<div class="col-sm-4 col-md-4">
								<label class="control-label" for="usr">Username:</label>
								<input type="text" class="form-control" id="usr">
							</div>
							<div class="col-md-4"></div>
						</div>
					</div>					
					<div class="form-group">
						<div class="row">
							
							<div class="col-md-4"></div>
							<div class="col-sm-4">
								<label class="control-label" for="pwd">Password:</label>
								<input type="password" class="form-control" id="pwd">
							</div>
							<div class="col-md-4"></div>
						</div>
					</div>					
					<div class="form-group">
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<button type="submit" class="btn btn-default">Login</button>
							</div>
							<div class="col-md-4"></div>
						</div>
					</div>
					
					<div id="register">					
						<div id="dontHaveAccount">					
							<a href="../register/register.php">Dont have an account yet?</a>						
						</div>				
					</div>				
					<div id="forgotPsw">					
						<div id="forgottenPsw">					
							<a href="../forgottenPsw/forgottenPsw.php">Forgot password?</a>						
						</div>				
					</div>			
													
				</form>			
						
			</div>		
		</div>		
		<div class="footer">		
			<div class="panel-footer">Footer</div>			
		</div>
	</body>
</html>
