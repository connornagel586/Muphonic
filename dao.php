<?php

class DAO {

	
		private $servername = "localhost";
		private $username = "root";
		private $password = "";
		private $database = "Muphonic";

	private function getConnection(){
	
		try {
		    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
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

	public function insert_User(){
		$conn = $this->getConnection();
		$query = $conn->prepare("");
		$query->execute();
		return $query->fetchAll();
	}
	public function delete_User($username){

	}

	public function get_UserInfo($studentID){}

}