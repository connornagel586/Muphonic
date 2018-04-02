<?php
//header('Location: home_page.php');
session_start();
require_once('handlers/dao.php');
$_SESSION['current_page'] = "forum_main.php";
if(!isset($_SESSION['user_id'])){
	session_destroy();
	header('Location: index.php');
	exit;
}
$dao = new dao();
include('template/header.php');
?>

			<div class="user_topics">
				<div id='my_topics'><h4>My Topics</h4>
					<?php
					$limit = 10;
					$topics = $dao->get_my_topics($_SESSION['user_id'], $limit);
					//$topics = array_shift($data);

					foreach($topics as $topic){
						print	"<div class=\"topic\" value=\"" . $topic['topic_id']. "\"><div>"
						. $topic['topic_title'] . "</div><div>" .
						$topic['time_created'] . "</div>" .
						"</div>";

					}
					?>
				</div>
				<div id='mypinned_topics'><h4>Pinned Topics</h4></div>
			</div>
			<div class="topic_panel">
				<h4>Topics</h4>
					<div id='topics'>
						<?php
						$limit = 2;
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
					<div class="new_topic">
					<button type="button" id="add_topic">New Topic</button>
				</div>
			</div>
<?php include('template/footer.php'); ?>
