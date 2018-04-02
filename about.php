<?php
//header('Location: home_page.php');
session_start();
if(!isset($_SESSION['user_id'])){
	session_destroy();
	header('Location: index.php');
	exit;
}
$_SESSION['current_page'] = "about.php";
include('template/header.php');
?>

				<div class="descriptBody">
					<p>This the body of the paragraph that will describe the purpose of this website. This will come almost last.</p>
				</div>
<?php include('template/footer.php'); ?>
