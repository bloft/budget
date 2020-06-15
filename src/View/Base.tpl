<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Budget - {$title}</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="View/css/bootstrap.min.css" rel="stylesheet" />
		<link href="View/css/bootstrap-responsive.css" rel="stylesheet" />
		<link href="View/css/style.css" rel="stylesheet" />
		<script type="text/javascript" src="View/js/jquery.js"></script>
		<script type="text/javascript" src="View/js/bootstrap.js"></script>
	</head>
	<body>
		<div class="body">
			<div class="navbar content">
				<div class="container-fluid">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand hidden-desktop" href="#">Project name</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li><a href="/">Home</a></li>
							<li><a href="/index.php?page=Balance">Balance</a></li>
							<li><a href="/index.php?page=Betalinger">Betalinger</a></li>
						</ul>
						<!--<ul class="nav pull-right visible-desktop">
							<li class="hidden"><a href="#">Login</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Username<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#profile">Profile</a></li>
									<li class="divider"></li>
									<li><a href="#logout">Logout</a></li>
								</ul>
							</li>
						</ul>-->
					</div>
				</div>
			</div>
			<div class="content main">
				<div class="page-header visible-desktop">
					<h1>Budget - {$title}</h1>
				</div>
				{include file="$includePage"}
				<div class="page-footer visible-desktop">
					Lavet af Bjarne Loft
				</div>
			</div>
		</div>
	</body>
</html>
