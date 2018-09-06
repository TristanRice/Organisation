<?php
interface TimetableInterface {
	public function __construct( $userId );
	public function get( $specific = false, $timeTableId = "" );
	public function remove( $timeTableId );
	
	private function getAssocFromQuery( $result );
}

class Timetable implements TimetableInterface {
	
	private $userID;
	private $connection;
	
	public $aError;
	
	public function __construct( $userId ) {
		include "config/config.php";
		$this->con    = $connection
		$this->userId = $userId;
		$this->aError = "";
	}
	
	public function get( $specific = false, $timeTableId = "" ) {
		if ($specific) {   
			$query  = "SELECT * FROM time_table WHERE userId=".$this->userId." AND id=".$timeTableId.";";
		} else {	
			$query  = "SELECT * FROM time_table WHERE userId=".$this->userId.";";
		}
		$result = mysqli_query($this->con, $query);
		if (!$result)
		{   $this->aError = "There was an error communicating with the database, please try again later";
			return false;
		}
		if (!mysqli_num_rows($result))
		{   $this->aError = "You do not have any timetables";
			return false;
		}
		return $this->getAssocFromQuery( $result );
	}
	
	public function remove( $timeTableId ) {
		$query = "DELETE FROM time_table WHERE userId=".$this->userId." AND id=".$timeTableId.";";
		$result = mysqli_query($this->con, $result);
		if (!mysqli_num_rows($result))
		{   $this->aError= "This timetable does not exist";
			return false;
		}
		if (!$result)
		{   $this->aError = "Could not delete this table, plaese try again later";
			return false;
		}
		return True;
	}
	
	public function add( ) {
		$query = "INSERT INTO time_table () VALUES ();";
		$result = mysqli_query($this->con, $query);
		if (!$result)
		{   $this->aError = "There was an error adding this timetable, please try again later";
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