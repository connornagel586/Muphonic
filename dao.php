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
			echo "Connected successfully";
			return $conn;
		}
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}
		throw new Exception("user not found");

	}

	public function insert_User($user_data){
		$conn = $this->getConnection();
		$query = $conn->prepare("INSERT INTO `user_info` (username, password, email)
		VALUES (:username, :password, :email)");
		$query->bindParam(':username',	$user_data['username']);
		$query->bindParam(':password', $user_data['password']);
		$query->bindParam(':email', $user_data['email']);

		$query->execute();
	}
	public function get_User($user_login){
		$conn = $this->getConnection();
		$query = $conn->prepare("SELECT * FROM `user_info` where `password`=:password AND `email`=:username OR `username`=:username");
		$query->bindParam(':password', $user_login['password']);
		$query->bindParam(':username', $user_login['username']);
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();

		return $query->fetchAll();
	}
	public function delete_User($username){

	}
	public function create_topic(){}

	public function create_post(){}

	public function modify_post(){}

	public function modify_topic(){}

	public function delete_topic(){}

	public function delete_post(){}

						}
