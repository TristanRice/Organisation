<?php
interface FriendInterface {
}

class Friend implements FriendInterface {

	public $userId;

	private $con;

	public function __construct( $userId ) {
		include "config/config.php";
		$this->con = $connection;
		$this->userId = $userId;
	}

	public function add( $username ) { 
		$query = "INSERT INTO friends (user, friend) VALUES (".$this->userId.",'".$username."');";
		return (bool) mysqli_query($this->con, $query);
	}
		
	public function is( $username ) { 
		$query = "SELECT friend FROM friends WHERE friend=".$username>";";
		$result = mysqli_query($this->con, $query);
		return (bool) mysqli_num_rows($result);
	}

	public function getAll( ) {
		$query = "SELECT * FROM friends WHERE user=".$this->userId.";";
		$result = mysqli_query($this->con, $query);
		return $this->getAssocFromResult($result);
	}

	public function aa( ) {

	}

	private function getAssocFromResult( $result ) {
		$array = array( );
		while ($row = mysqli_fetch_assoc($result)) {
			array_push($array, $row);
		}
		return $array;
	}
}