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
			$rooms = $dao->get_rooms($limit);
			

			foreach($rooms as $room){
				$data = $dao->find_user($room['created_by']);
				$username = array_shift($data);
				print	"<div class=\"topic\" value=\"" . $room['room_id']. "\">"
				. $room['room_title'] . "<span>created by " .
				 $username . " " .
				$room['time_created'] . "</span>" .
				"</div>";

			}
			?>

		</div>
</div>

<?php include('template/footer.php'); ?>
