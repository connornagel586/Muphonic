<?php
//header('Location: home_page.php');
session_start();
require_once('handlers/dao.php');
$_SESSION['current_page'] = "chat_main.php";
if(!isset($_SESSION['user_id'])){
	session_destroy();
	$_SESSION = array();
	header('Location: index.php');
	exit;
}
$dao = new dao();
include('template/header.php');
?>

<div class="user_topics">
	<div id='mypinned'><h4>Pinned Chats</h4></div>
</div>
<div class="topic_panel">
	<h4>Chat Rooms</h4>
		<div id='topics'>
			<?php
			$limit = 10;
			$topics = $dao->get_topics($limit);
			//$topics = array_shift($data);

			foreach($topics as $topic){
				$data = $dao->find_user($topic['created_by']);
				$username = array_shift($data);
				print	"<div class=\"topic\" value=\"" . $topic['topic_id']. "\">"
				. $topic['topic_title'] . "<span>created by " .
				 $username . " " .
				$topic['time_created'] . "</span>" .
				"</div>";

			}
			?>

		</div>
</div>

<?php include('template/footer.php'); ?>
