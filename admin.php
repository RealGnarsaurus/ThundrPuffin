<!DOCTYPE html>
<html>

	<head>
	
	<title>thudrPuffin</title>
	
	<link rel="stylesheet" type="text/css" href="adminStyle.css">
	
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
					<ul class="nav navbar-nav navbar-right" id="logOut">
							<li><button type="submit" class="btn navbar-btn btn-danger" name="logout" id="logout" value="Log Out">Log Out</button></li>
					</ul>

			</div>
		</nav>

		<div id="adminSideNav" class="sidenav">
			<h1>Admin options</h1>

			<div class="row">
				<button type="button" class="btn" id="amanageUser">Manage Users</button>
			</div>

			<div class="row">
				<button type="button" class="btn" id="customizeBlog">Customize blog</button>
			</div>

			<div class="row">
				<button type="button" class="btn" id="flagReports">Flag reports</button>
			</div>

		</div>

		<div class="container pull-right">

			<div id="content">
				
			</div>
		
		</div>
		
		<div class="footer">
		
			<div class="panel-footer panel-danger">Footer</div>
			
		</div>

	</body>

</html>