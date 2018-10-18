<?php
interface ToDoListInterFace {
	public function __construct( $userId );
	public function get( $specific = false, $todolistId = "" );
	public function remove( $todolistId );
	public function add(  $due_by, $data, $color, $img_location, $title );
}

class Todolist implements ToDoListInterFace {

	private $userId;
	private $con;

	public $aError;

	public function __construct( $userId, $connection="" ) {
		$this->con = $connection;
		if (empty($connection)) {
			include "config/config.php";
			$this->con    = $connection;
		}
		$this->userId = $userId;
		$this->aError = "";
	}

	public function restore( $id ) {

		$query = "UPDATE todo_list SET deleted=0 WHERE id=".$id.";";
		$result = mysqli_query( $this->con, $query );

		if ( !$result ) {
			$this->aError = "There was an error restoring this, please try aghain later";
			return false;
		}
		echo $query;
		return true;
	}

	public function get( $specific = false, $todolistId = "", $days=0, $limit=-1, $color="", $getCompleted=false ) {
		
		$baseQuery  = "SELECT * FROM todo_list WHERE user_id=".$this->userId." AND deleted=0";
		$todoListId = mysqli_escape_string($this->con, $todolistId);
		$color      = mysqli_escape_string($this->con, $color);
		$days       = mysqli_escape_string($this->con, $days);

		//make the query based on the function parameters
		if (! $getCompleted) {
			$baseQuery .= " AND completed=0";
		}
		if ($specific) {
			$baseQuery .= " AND id=".$todolistId;
		}
		if ((bool)$days) {
			$baseQuery .= " AND DATEDIFF(NOW(), due_by)>=$days";
		}
		if (!empty($color)) {
			$baseQuery .= " AND color='$color'";
		}
		if ($limit>0) {
			$baseQuery .= " ORDER BY due_by ASC LIMIT ".(string)$limit;
		}
		$baseQuery .= ";";

		$result = mysqli_query($this->con, $baseQuery);
		
		//echo $baseQuery;
		if (!$result)
		{   $this->aError = "There was an error communicating with the database, please try again later";
			return false;
		}
		if (!mysqli_num_rows($result))
		{   $this->aError = "You do not have any todolists";
			return false;
		}
		
		return $this->getAssocFromQuery( $result , true );
	}

	public function remove( $todolistId ) {

		$query = "DELETE FROM todo_list WHERE user_id=".$this->userId." AND id=".$todolistId.";";

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

	public function add(  $due_by, $data, $color, $img_location, $title ) {
		$title        = mysqli_escape_string($this->con, $title);
		$due_by 	  = mysqli_escape_string($this->con, $due_by);
		$data   	  = mysqli_escape_string($this->con, $data);
		$img_lcoation = mysqli_escape_string($this->con, $img_location);
		$color 		  = mysqli_escape_string($this->con, $color);
		$query = "INSERT INTO todo_list (user_id, started, due_by, data, color, img_location, title) VALUES (".$this->userId.", NOW(), '".$due_by."', '".$data."', '".$color."', '".$img_location."', '".$title."');";
		$result = mysqli_query($this->con, $query);
		if (!$result)
		{   $this->aError = "There was an error adding this todolist, please try again later";
			return false;
		}
		return true;
	}

	private function getAssocFromQuery( $result, $cleanHTML=false ) {
		$assoc = array( );
		while ($row = mysqli_fetch_assoc( $result )) {
			$newRow = [];
			if ($cleanHTML) {
				foreach ($row as $old_row) {
					$newRow[] = htmlspecialchars($old_row);
				}
			}
			array_push( $assoc, $row );
		}
		return $assoc;
	}
}
