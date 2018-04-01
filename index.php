<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Muphonic</title>
		<link rel="stylesheet" type="text/css" href="style/main.css">
		<link rel="stylesheet" type="text/css" href="style/index.css">
	</head>

	<body>
	<header>
		<img src="images/mu.png" id="icon">
		<h1>Login Page</h1>
	</header>
		<nav>
			<ul>
				<a href="about.php">About</a>
			</ul>
		</nav>
		<div class="main">
			<form action="handlers/loginHandler.php" method="post">

				Username:<input type="text" name="username"><br>

				Password: <input type="password" name="password">

				<input type="submit" value="Submit">
			</form>
			<form action="handlers/loginHandler.php" method="post">

					Email:<input type="text" name="email"><br>

					Username:<input type="text" name="username"><br>

					Password:<input type="password" name="password">
					<input type="submit" value="Submit">
			</form>
		</div>

	</body>
	<footer>
		<p>Connor Nagel Boise State University</p>
	</footer>
</html>
