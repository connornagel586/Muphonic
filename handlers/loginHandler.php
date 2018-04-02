<?php
session_start();
require_once('dao.php');
if(isset($_POST["email"])){
$newAccount = array(
	"username"=>htmlspecialchars($_POST["username"]),
	"password"=>htmlspecialchars($_POST["password"]),
	"email"=>htmlspecialchars($_POST["email"])
);
$dao = new dao();

$dao->insert_User($newAccount);
header("Location: ../index.php");
exit;
}
else{
	$newAccount = array(
		"username"=>htmlspecialchars($_POST["username"]),
		"password"=>htmlspecialchars($_POST["password"])
	);
	$dao = new dao();

	$userdata = $dao->get_User($newAccount);
	$user = array_shift($userdata);
	$_SESSION['user_id'] = $user['user_id'];
	$_SESSION['username'] = $user['username'];
	$_SESSION['email'] = $user['email'];
	header('Location: ../home_page.php');
}


?>
