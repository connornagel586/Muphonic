<?php
//header('Location: home_page.php');
session_start();
require_once('handlers/dao.php');
$_SESSION['current_page'] = "chat_main.php";
if(!isset($_SESSION['user_id'])){
	session_destroy();
	header('Location: index.php');
	exit;
}
$dao = new dao();
include('template/header.php');
?>

<div class="chat_panel">
	<div id='chatlist'><h4>Topics</h4>
		<div id='chats'>
			<?php
			$limit = 2;
			$topics = $dao->get_topics($limit);

			foreach($topics as $topic){
				$data = $dao->find_user($topic['created_by']);
				$username = array_shift($data);
				print	"<div class=\"topic\" value=\"" . $topic['topic_id']. "\">"
				. $topic['topic_title'] . " created by " .
				 $username . " " .
				$topic['time_created'] . " " .
				"</div>";

			}
			?>
			<div id="add_class">
				<input type="button" value="New Topic">
			</div>
		</div>
	</div>

</div>

<?php include('template/footer.php'); ?>
