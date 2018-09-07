<?php
interface ToDoListInterFace {
	public function __construct( $userId );
	public function get( $specific = false, $todolistId = "" );
	public function remove( $todolistId );
}

class Todolist implements ToDoListInterFace {
	
	private $userID;
	private $connection;
	
	public $aError;
	
	public function __construct( $userId ) {
		include "config/config.php";
		$this->con    = $connection;
		$this->userId = $userId;
		$this->aError = "";
	}
	
	public function get( $specific = false, $todolistId = "" ) {
		if ($specific) {   
			$query  = "SELECT * FROM todo_list WHERE userId=".$this->userId." AND id=".$todolistId.";";
		} else {	
			$query  = "SELECT * FROM todo_list WHERE userId=".$this->userId.";";
		}
		$result = mysqli_query($this->con, $query);
		if (!$result)
		{   $this->aError = "There was an error communicating with the database, please try again later";
			return false;
		}
		if (!mysqli_num_rows($result))
		{   $this->aError = "You do not have any todolists";
			return false;
		}
		return $this->getAssocFromQuery( $result );
	}
	
	public function remove( $todolistId ) {
		$query = "DELETE FROM todo_list WHERE userId=".$this->userId." AND id=".$todolistId.";";
		$result = mysqli_query($this->con, $result);
		if (!mysqli_num_rows($result))
		{   $this->aError= "This todolist does not exist";
			return false;
		}
		if (!$result)
		{   $this->aError = "Could not delete this table, plaese try again later";
			return false;
		}
		return True;
	}
	
	public function add(  $due_by, $data ) {
		$query = "INSERT INTO todo_list (user_id, started, due_by, data) VALUES (".$this->user_id.", NOW(), '".$this->due_by."', '".$this->data."');";
		echo $query;
		$result = mysqli_query($this->con, $query);
		if (!$result)
		{   $this->aError = "There was an error adding this todolist, please try again later";
			return false;
		}
		return true;
	}
	
	private function getAssocFromQuery( $result ) {
		$assoc = array( );
		while ($row = mysqli_fetch_assoc( $result )) array_push( $assoc, $row );
		return $assoc;
	}
}