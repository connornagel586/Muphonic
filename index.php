<?php 
//header('Location: home_page.php');
session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Muphonic</title>
		<link rel="stylesheet" type="text/css" href="style/main.css">
		<link rel="stylesheet" type="text/css" href="style/index.css">
	</head>
	<header>
		<h1>Muphonic</h1>	
	</header>
	<body>
		<nav>
			<ul>
				<a href="about.php">About</a>
			</ul>
		</nav>
		<div class="main">
			<form action="home_page.php" method="post">
				
				Username:<input type="text" name="username"><br>
				
				Password: <input type="text" name="password">
				
				<input type="submit" value="Submit">
			</form>
		</div>
	</body>
	<footer>
		<p>Connor Nagel Boise State University</p>
	</footer>
</html>