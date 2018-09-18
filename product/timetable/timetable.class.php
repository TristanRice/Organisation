<?php

interface TimetableInterface {
	public function __construct( );
}

class Timetable {

	private $userId;
	private $con;
	private $tableName;

	public function __construct( $userID ) {
		include "config/config.php";
		$this->con = $connection;
		$this->userId = $userID;
		$this->tableName = "time_table";
	}

	public function getAll( $limit=-1 ) {
		$baseQuery = "SELECT subject, day, time, userID, color FROM ".$this->tableName." WHERE  userID=".$this->userId;
		if ($limit>=0) {
			$baseQuery .= " LIMIT ".$limit;
		}
		$baseQuery .= " AND DELETED=0;";
		$result = mysqli_query($this->con, $baseQuery);
		if (!$result) {
			return false;
		}
		return $this->getAssocFromQuery( $result );
	}

	private function getAssocFromQuery( $result ) {
		$array = array( );
		while ($row = mysqli_fetch_assoc($result)) {
			array_push($array, $row);
		}
		return $array;
	}
}