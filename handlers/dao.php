<?php

class DAO {


	private $servername = "tyduzbv3ggpf15sx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
	private $username = "lnvexydhh92ltgjy";
	private $password = "b7j4hazh3x178cdq";
	private $database = "cdrifsz9vwbwmo0y";

	private function getConnection(){

		try {
			$conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo "Connected successfully";
			return $conn;
		}
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}
		throw new Exception("user not found");

	}

	public function insert_user($user_data){
		$conn = $this->getConnection();
		$query = $conn->prepare("INSERT INTO `user_info` (username, password, email)
		VALUES (:username, :password, :email)");
		$query->bindParam(':username',	$user_data['username']);
		$query->bindParam(':password', $user_data['password']);
		$query->bindParam(':email', $user_data['email']);

		$query->execute();
	}
	public function get_user($user_login){
		$conn = $this->getConnection();
		$query = $conn->prepare("SELECT * FROM `user_info` where `password`=:password AND `email`=:username OR `username`=:username");
		$query->bindParam(':password', $user_login['password']);
		$query->bindParam(':username', $user_login['username']);
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();

		return $query->fetchAll();
	}
	public function find_user($user_id){
		$conn = $this->getConnection();
		$query = $conn->prepare("SELECT `username` FROM `user_info` where `user_id`=:user_id");
		$query->bindParam(':user_id', $user_id);
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
		return $query->fetch();
	}
	public function delete_user($user_id){
		$conn = $this->getConnection();
		$query = $conn->prepare("DELETE FROM `user_info` where `user_id` = :user_id");
		$query->bindParam(':user_id', $user_id);

		$query->execute();
	}
	public function create_topic($topicInfo){
		$conn = $this->getConnection();
		$query = $conn->prepare("INSERT INTO `topics` (`topic_id`, `topic_title`, `created_by`, `num_comments`, `time_created`)
		VALUES (NULL, :topictitle, :created_by, '0', CURRENT_TIMESTAMP);");
		$query->bindParam(':topictitle', $topicInfo['topic_title']);
		$query->bindParam(':created_by', $topicInfo['created_by']);
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
	}

	public function get_topics($limit){
		$conn = $this->getConnection();
		$query = $conn->prepare("SELECT * FROM `topics`  ORDER BY `time_created` DESC LIMIT $limit");
		$query->setFetchMode(PDO::FETCH_ASSOC);
		//$query->bindParam(':limit', $limit);
		$query->execute();

		return $query->fetchAll();
	}
	public function get_topic($topic_id){
		$conn = $this->getConnection();
		$query = $conn->prepare("SELECT * FROM `topics`  where `topic_id` = :topic_id");
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->bindParam(':topic_id', $topic_id);
		$query->execute();

		return $query->fetch();
	}
	public function get_topic_comments($topic_id, $limit){
		$conn = $this->getConnection();
		$query = $conn->prepare("SELECT * FROM `comments` where `topic_id` =:topic_id ORDER BY `time_posted` DESC LIMIT $limit");
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->bindParam(':topic_id', $topic_id);
		$query->execute();
		return $query->fetchAll();
	}
	public function get_my_topics($user_id, $limit){
		$conn = $this->getConnection();
		$query = $conn->prepare("SELECT * FROM `topics` where `created_by` =:user_id ORDER BY `time_created` DESC LIMIT $limit");
		$query->setFetchMode(PDO::FETCH_ASSOC);
		
		$query->bindParam(':user_id', $user_id);
		$query->execute();

		return $query->fetchAll();
	}	
	public function post_comment($postInfo){
		$conn = $this->getConnection();
		$query = $conn->prepare("INSERT INTO `comments` (comment_id, topic_id, posted_by, comment_text, time_posted)
		VALUES (:comment_id, :topic_id, :posted_by, :comment_text, :time_posted)");
		$query->bindParam(':comment_id',	$user_data['comment_id']);
		$query->bindParam(':topic_id', $user_data['topic_id']);
		$query->bindParam(':posted_by', $user_data['posted_by']);
		$query->bindParam(':comment_text', $user_data['comment_text']);
		$query->bindParam(':time_posted', $user_data['time_posted']);

		$query->execute();
	}

	public function modify_post($newPostValues){
		$conn = $this->getConnection();
		$query = $conn->prepare("UPDATE `comments` SET `comment_text`=:comment_text where `comment_id` = :comment_id");
		$query->bindParam(':comment_id', $newPostValues['comment_id']);
		$query->bindParam(':comment_text', $newPostValues['comment_text']);

		$query->execute();
	}

	public function modify_topic($newTopicValues){
		$conn = $this->getConnection();
		$query = $conn->prepare("UPDATE `topics` SET `topic_text`=:topic_text, `topic_title` = :topic_title where `topic_id` = :topic_id");
		$query->bindParam(':topic_id', $newPostValues['topic_id']);
		$query->bindParam(':topic_text', $newPostValues['topic_text']);

		$query->execute();
	}

	public function delete_topic($topicID){
		$conn = $this->getConnection();
		$query = $conn->prepare("DELETE FROM `topics` where `topic_id` = :topic_id");
		$query->bindParam(':topic_id', $topicID);

		$query->execute();
	}

	public function delete_post($postID){
		$conn = $this->getConnection();
		$query = $conn->prepare("DELETE FROM `comments` where `comment_id` = :comment_id");
		$query->bindParam(':comment_id', $postID);

		$query->execute();
	}

	public function get_rooms($limit){
		$conn = $this->getConnection();
		$query = $conn->prepare("SELECT * FROM `rooms`  ORDER BY `time_created` DESC LIMIT $limit");
		$query->setFetchMode(PDO::FETCH_ASSOC);
		
		$query->execute();

		return $query->fetchAll();
	}

	public function get_room($room_ID){
		$conn = $this->getConnection();
		$query = $conn->prepare("SELECT * FROM `rooms`  where `room_id` = :room_id");
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->bindParam(':room_id', $room_ID);
		$query->execute();

		return $query->fetch();
	}

	public function create_room($room_info){
		$conn = $this->getConnection();
		$query = $conn->prepare("INSERT INTO `rooms` (`room_id`, `room_title`, `created_by`,`time_created`)
		VALUES (NULL, :roomtitle, :created_by, CURRENT_TIMESTAMP);");
		$query->bindParam(':roomtitle', $topicInfo['room_title']);
		$query->bindParam(':created_by', $topicInfo['created_by']);
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
	}

	
						}
