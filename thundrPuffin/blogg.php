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
	<link rel="stylesheet" type="text/css" href="css/bloggStyle.css">
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
					<li><a href="login.php">Login</a></li>
				</ul>
			</div>
		</nav>
		<div id="leftSideNav" class="sidenav">
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
        <div id="rightSideNav" class="sidenav">
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
		<div class="container">
			<div id="content">
                <div class="form-group">
                        <div class="row">
                            <div id="post">
                                <div id="postImg"><img src="img/smexyRobs.jpg"/></div>
                                <div id="Headline">
                                    <h1>Lorem ipsum</h1>
                                </div>
                                <div id="postText">
                                    Lorem ipsum dolor sit amet, 
                                    consectetur adipiscing elit. 
                                    Sed et diam ac purus congue ultrices et ut dolor. 
                                    Maecenas turpis nisi, eleifend ac diam nec, 
                                    blandit condimentum est. 
                                    Cras ullamcorper lectus et ex egestas, 
                                    ac pharetra justo congue. 
                                    Orci varius natoque penatibus et magnis dis parturient montes, 
                                    nascetur ridiculus mus. Integer tempor vel dui eu consectetur. 
                                    Mauris bibendum dui sed finibus dignissim. 
                                    Interdum et malesuada fames ac ante ipsum primis in faucibus. 
                                    Quisque diam dui, suscipit sed fermentum et, 
                                    faucibus quis erat. Donec eleifend eros risus, 
                                    eu molestie felis porta ut. Aliquam id est libero. 
                                    Fusce augue ligula, eleifend ultricies fringilla non, 
                                    auctor ut risus.
                                    </br>
                                    </br>
                                    Etiam finibus dignissim turpis eu aliquam. 
                                    Sed dictum luctus odio in placerat. 
                                    Sed vestibulum tortor id felis venenatis tristique. 
                                    Phasellus a volutpat nunc. 
                                    In sem ex, 
                                    elementum ac sollicitudin sed, 
                                    porttitor ut enim. Morbi sodales, 
                                    mi ac pharetra feugiat, 
                                    magna enim ornare felis, 
                                    in placerat magna dui vel nulla. 
                                    Pellentesque consectetur vel velit non ultrices. 
                                    Quisque aliquet neque id arcu efficitur, 
                                    sit amet molestie neque tempor. 
                                    Integer aliquet ante nec velit dignissim, 
                                    eget ultrices nulla condimentum. 
                                    Suspendisse potenti. 
                                    Proin turpis nisi, 
                                    molestie eget nulla sed, 
                                    eleifend scelerisque justo. 
                                    Pellentesque tincidunt sit amet nunc vitae accumsan. 
                                    Nullam vestibulum, orci eu convallis aliquam, 
                                    metus nunc tincidunt metus, a lacinia sem felis non metus.
                                </div>
                                </br>
                                <div id="comments">
                                    <div class="row" id="commentRow">
                                        <div id="postComment">
                                                <h6>McRandom</h6><img src="img/test.png" class="img-responsive" alt="">Howdy bois!
                                            <div id="commentReply">
                                                <div class="row"><h6>McDoucheBag</h6><img src="img/test.png" class="img-responsive" alt="">Shut up!</div>
                                                <div class="row"><h6>McDoucheBag</h6><img src="img/test.png" class="img-responsive" alt="">Shut up!</div>
                                                <div class="row"><h6>McDoucheBag</h6><img src="img/test.png" class="img-responsive" alt="">Shut up!</div>
                                                <div class="row"><h6>McDoucheBag</h6><img src="img/test.png" class="img-responsive" alt="">Shut up!</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="commentRow">
                                        <div id="postComment">
                                                <h6>McRandom</h6><img src="img/test.png" class="img-responsive" alt="">Howdy bois!
                                            <div id="commentReply">
                                                <div class="row"><h6>McDoucheBag</h6><img src="img/test.png" class="img-responsive" alt="">Shut up!</div>
                                                <div class="row"><h6>McDoucheBag</h6><img src="img/test.png" class="img-responsive" alt="">Shut up!</div>
                                                <div class="row"><h6>McDoucheBag</h6><img src="img/test.png" class="img-responsive" alt="">Shut up!</div>
                                                <div class="row"><h6>McDoucheBag</h6><img src="img/test.png" class="img-responsive" alt="">Shut up!</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="commentRow">
                                        <div id="postComment">
                                                <h6>McRandom</h6><img src="img/test.png" class="img-responsive" alt="">Howdy bois!
                                            <div id="commentReply">
                                                <div class="row"><h6>McDoucheBag</h6><img src="img/test.png" class="img-responsive" alt="">Shut up!</div>
                                                <div class="row"><h6>McDoucheBag</h6><img src="img/test.png" class="img-responsive" alt="">Shut up!</div>
                                                <div class="row"><h6>McDoucheBag</h6><img src="img/test.png" class="img-responsive" alt="">Shut up!</div>
                                                <div class="row"><h6>McDoucheBag</h6><img src="img/test.png" class="img-responsive" alt="">Shut up!</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
						<div class="col-md-4"></div>
					</div>
				</div>	
			</div>
        </div>
	</body>
</html>