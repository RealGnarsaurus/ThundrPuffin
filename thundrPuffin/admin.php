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
	<link rel="stylesheet" type="text/css" href="css/adminStyle.css">
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
	</body>
</html>