<?php

session_start();
if(!isset($_SESSION['user_id'])){
	session_destroy();
	header('Location: index.php');
	exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Muphonic</title>
		<link rel="stylesheet" type="text/css" href="style/main.css">
	</head>
	<body>
		<div id='container'>
	<header>
		<img src="images/mu.png" id="icon">
		<h1>Home Page</h1>
	</header>
	<nav>
		<ul>
			<a href="about.php">About</a>
			<a href="home_page.php">Home</a>
			<a href="chat_main.php">Chat</a>
			<a href="forum_main.php">Forum</a>
			<a href="handlers/signoutHandler.php">Sign Out</a>
		</ul>
	</nav>

		<div class="main">
			<div class="user_body">
				<div class="comments">
					<p>User Comments</p>
				</div>
				<div class="favorites">
					<p>User Favorites</p>
				</div>
			</div>
		</div>
		<footer>
			<p>Connor Nagel Boise State University</p>
		</footer>
	</div>
	</body>
</html>
