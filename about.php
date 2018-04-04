<?php
//header('Location: home_page.php');
session_start();
if(isset($_SESSION['user_id'])){
	$_SESSION['current_page'] = "about_home";
}else{
	$_SESSION['current_page'] = "about_index";
}
include('template/header.php');
?>

				<div class="descriptBody">
					<p>This site has the forum pages part working, however the chat still needs work because I'm still trying to figure out how to use ajax.</p>
				</div>
<?php include('template/footer.php'); ?>
