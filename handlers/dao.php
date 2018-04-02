<?php

class DAO {


	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "Muphonic";

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
	public function delete_user($username){

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

	public function create_post($postInfo){}

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
		//$query->bindParam(':limit', $limit);
		$query->bindParam(':user_id', $user_id);
		$query->execute();

		return $query->fetchAll();
	}
	public function modify_post($newPostValues){}

	public function modify_topic($newTopicValues){}

	public function delete_topic($topicID){}

	public function delete_post($postID){}

						}
