<!DOCTYPE html>
<html>

	<head>
	
	<title>thudrPuffin</title>
	
	<link rel="stylesheet" type="text/css" href="registerStyle.css">
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	

	</head>

	<body>
	
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
						<div class="col-sm-4">
							<label class="control-label" for="pwd">Repeat Password:</label>
							<input type="rePassword" class="form-control" id="repeatPwd">
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
				
				<div class="form-group">
					<div class="row">
						
						<div class="col-md-4"></div>
						<div class="col-sm-4">
							<label class="control-label" for="email">Email address:</label>
							<input type="email" class="form-control" id="email">
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<button type="submit" class="btn btn-default">Register</button>
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
