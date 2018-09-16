<?php

class Site {

	public static $userId;
	public static $username;
	public static $errors;

	public static function getIdFromUsername( $connection, $username ) {
		$sql = "SELECT userId FROM users WHERE username='".mysqli_escape_string($connection, $username)."';";
		$result = mysqli_query( $connection, $sql );
		if (!$result) return false;
		if (!mysqli_num_rows($result)) return false; //this shouldn't hapepn but it's useful for debugging
		$assoc = mysqli_fetch_assoc( $result );
		if (!(bool) sizeof($assoc)) return false;
		return $assoc["userId"];
	}

	public static function init( $connection ) {
		session_start( );
		if (!isset($_SESSION["username"])) header("Location: login.php");
		Site::$username = $_SESSION["username"];
		$userId = Site::getIdFromUsername( $connection, Site::$username );
		if (!$userId) $errors[] = "There was an error, please try again later";
		Site::$userId = $userId;
	}

	public static function getUsernameById( $connection, $id ) {
		$sql = "SELECT username FROM users WHERE username='".mysqli_escape_string($connection, $username)."';";
		$result = mysqli_query($connection, $sql);
		if (!$result) {
			return false;
		}
		$assoc = mysqli_fetch_assoc( $result );
		if (!(bool) sizeof($assoc)) {
			return false;
		}
		return $assoc["username"];
	}
}