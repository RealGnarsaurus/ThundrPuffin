<?PHP
	session_start();
    require ('../Helpers/db.php');

    $userID = $_SESSION['userID'];
    //Gets Blogg ID
    $sql = "SELECT ID from blogg where UserID = $userID";
    //echo $sql;
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $result = $stmt->FetchAll();
		//Gets User Info
		$sql2 = "SELECT * from userinfo where ID = $userID";
		//echo $sql2;
		$stmt2 = $dbh->prepare($sql2);
		$stmt2->execute();
		$result2 = $stmt2->FetchAll();
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
		<script src="../Helpers/getContent.js"></script>
		<script src="../Helpers/preview.js"></script>
		<script src="../Helpers/EditStyle.js"></script>
		<script src="../Helpers/UpdateInstant.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/main.css">
		<link rel="stylesheet" type="text/css" href="../css/adminStyle.css">
	</head>
	<body>
		<div id="adminSideNav" class="sidenav">
            <br/>
						<?php
						if (file_exists("../Blogg/Images/Avatar$userID.png")) {
							?>
							<img class="avatar img-circle" src="../Blogg/Images/Avatar<?php echo $userID;?>.png" style="height: 8vw; width: auto; display: block;">
							<?php
						}
						else{
							?>
							<img class="avatar img-circle" src="../Blogg/Images/Stock.png" style="height: 8vw; width: auto; display: block;">
							<?php
						}
						?>
            <p><?php echo $result2[0]->Username;?></p>
            <br/>
						<button href="#" class="adminLiButton btn" id="manageUser" onClick="MyProfile()"><span class="material-icons">assignment_ind </span> My Profile</button>
						<button href="#" class="adminLiButton btn" id="customizeBlog" onClick="blogSettings()"><span class="material-icons">settings </span> Customize blog</button>
						<?php
							$sql3 = "SELECT * FROM blogg where UserID='$userID'"; //Check if user has blogg
							//echo $sql;
							$stmt3 = $dbh->prepare($sql3);
							$stmt3->execute();
							$result3 = $stmt3->fetchAll();
							if (!empty($result3)) {
						 ?>
							<button href="#" class="adminLiButton btn" id="manageUser" onClick="loadDoc()"><span class="material-icons">assignment_ind </span> Manage Users</button>
							<button href="#" class="adminLiButton btn" id="flagReports" onClick="showFlagReports()"><span class="material-icons">feedback</span>Flag reports</button>
						</br>
						<button href="#" class="adminLiButton btn" onClick="window.location.href='../Blogg/sf/index.php?bloggID=<?PHP echo $result[0]->ID;?>'"><span class="material-icons">desktop_windows </span> Go to blog</button>
						<?php
						}
						 ?>
				</div>
        <nav class="navbar navbar-default">
				<div class="container-fluid" id="navbarBg">
					<div class="navbar-header">

						<a class="navbar-brand" id="brand" href="../welcome.php">thundrPuffin</a>
					</div>
					<ul class="nav navbar-nav">
						<li><a href="../welcome.php">Home</a></li>
						<li><a href="#">Browse blogs</a></li>
						<li><a href="#">Features</a></li>
						<li><a href="#">About</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right" id="logOut">
						<li><a href="../Helpers/Logout.php">Logout</a></li>
					</ul>
				</div>
			</nav>
		<div id="main">


			<div class="container">
				<div id="content">
				</div>
			</div>
		</div>
	</body>
</html>
