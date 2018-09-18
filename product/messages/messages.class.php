<?php

interface MessageInterface {
	public function __construct( $userId );
	public function send( $to, $content );
	public function get( );
}

class Message {

	public $userId;

	private $con;

	public function __construct( $userId )  {
		include "config/config.php";
		$this->con = $connection;
		$this->userId = (int)$userId;
	}

	public function send( $to, $content ) {
		$content = mysqli_escape_string($this->con, $content);
		$to = (int)$to; //make sure that it's an integer
		$query = "INSERT INTO messages(sender, reciever, content) VALUES (".$this->userId.", ".$to.", '".$content."');";
		//echo $query;
		$result = mysqli_query($this->con, $query);
		return (bool) $result;
	}

	public function get ( ) {
		$query = "SELECT * FROM messages WHERE reciever=".$this->userId." AND deleted=0;";
		$result = mysqli_query($this->con, $query);
		return $this->getAssocFromResult( $result );
	}

	public function delete( $id ) {
		$id = mysqli_escape_string( $this->con, $id );
		$query = "DELETE FROM messages WHERE id=".$id.";";

	}

	private function getAssocFromResult( $result ) {
		$changeNameLater = array( );
		while ($row = mysqli_fetch_assoc($result)) { 
			array_push($changeNameLater, $row);
		}
		return $changeNameLater;
	}
}