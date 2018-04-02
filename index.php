<?php
session_start();
$_SESSION['current_page'] = "index.php";
include('template/header.php');
?>


			<div id="login">
			<form action="handlers/loginHandler.php" method="post">

				<input type="text" placeholder="Username" name="username"><br>

				<input type="password" placeholder="Password" name="password">

				<input type="submit" value="Submit">
			</form>
		</div>
		<div id="create_account">
			<a href="">Create an Account</a>
			<form action="handlers/loginHandler.php" method="post">

					<input type="text" placeholder="Email" name="email"><br>

					<input type="text" placeholder="Username" name="username"><br>

					<input type="password" placeholder="Password" name="password">
					<input type="submit" value="Submit">
			</form>
		</div>

<?php include('template/footer.php'); ?>
