<?php 
//header('Location: home_page.php');
session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Muphonic</title>
		<link rel="stylesheet" type="text/css" href="style/main.css">
	</head>
	<header>
		<img src="images/mu.png" id="icon">
		<h1>Chat</h1>
	</header>
	<body>
		<nav>
			<ul>
				<a href="about.php">About</a>
				<a href="home_page.php">Home</a>
				<a href="chat_main.php">Chat</a>
				<a href="forum_main.php">Forum</a>
				<a href="index.php">Sign Out</a>
			</ul>
		</nav>
		<div class="main">
			<div class="user_body">
				<div><p>Chat Rooms</p></div>
				<div><p>Search/Filter</p></div>
			</div>
		</div>
	</body>
	<footer>
		<p>Connor Nagel Boise State University</p>
	</footer>
</html>