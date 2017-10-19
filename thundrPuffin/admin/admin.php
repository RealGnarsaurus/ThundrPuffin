<?PHP
	session_start();
	require '../Helpers/db.php';
?>
<!DOCTYPE html>
<html>
	<head>	
		<title>thundrPuffin</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="../js/getContent.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/main.css">
		<link rel="stylesheet" type="text/css" href="../css/adminStyle.css">
	</head>
	<body>
		<div id="adminSideNav" class="sidenav">
			<ul id="adminList">
				<li class="adminLiItem">
					<a href="#" class="adminLiItemA" id="manageUser" onClick="loadDoc()"><span class="material-icons">assignment_ind </span> Manage Users</a>
				</li>
				<li class="adminLiItem">
					<a href="#" class="adminLiItemA" id="customizeBlog" onClick="blogSettings()"><span class="material-icons">settings </span> Customize blog</a>
				</li>
				<li class="adminLiItem">
					<a href="#" class="adminLiItemA" id="flagReports" onClick="showFlagReports()"><span class="material-icons">feedback</span>Flag reports</a>
				</li>
				<br/>
				<li class="adminLiItem">
					<a href="#" class="adminLiItemA" onClick="window.location.href='../CreateBlogg/Blogg/<?PHP echo $_SESSION["userID"];?>/index.php?bloggID=<?PHP echo $_SESSION["userID"];?>'"><span class="material-icons">desktop_windows </span> Go to blog</button>
				</li>
			</ul>
		</div>
		<div id="main">
			<nav class="navbar navbar-default">
				<div class="container-fluid" id="navbarBg">
					<div class="navbar-header">
						
						<a class="navbar-brand" id="brand" href="../welcome.php">thundrPuffin</a>
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
				</div>
			</div>
		</div>
	</body>
</html>