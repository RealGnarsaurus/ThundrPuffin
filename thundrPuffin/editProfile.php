<!DOCTYPE html>
<html>
	<head>
	<title>thundrPuffin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/editProfileStyle.css">
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
			<ul class="nav navbar-nav navbar-right" id="logOut">
				<li><a href="logout.php">Logout</a></li>
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
							<img src="img/test.png" class="img-responsive" alt="">
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
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
							<label class="control-label" for="pwd">Email:</label>
							<input type="email" class="form-control" id="email">
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<textarea name="bio" rows="20" cols="60"></textarea>
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>	
				<div class="form-group">
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<button type="submit" class="btn btn-default">Save changes</button>
							<a href="profile.php" class="btn btn-danger" role="button">Cancel</a>
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>	
			</form>	
		</div>
	</div>
	</body>
</html>