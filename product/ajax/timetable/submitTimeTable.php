<?php 
include "../../timetable/timetable.class.php";
include "../../config/config.php";
include "../../includes/site-include.inc.php";

Site::init( $connection );
if (!isset($_GET["timeID"]) || !isset($_GET["dayID"]) || !isset($_GET["subject"])) {
	echo "Invalid GET data entered";
	die( );
} else if (empty(trim($_GET["timeID"])) || !is_numeric($_GET["timeID"]) || empty(trim($_GET["dayID"])) || !is_numeric($_GET["dayID"]) || empty(trim($_GET["subject"]))) {
	echo "Invalid GET data submitted";
	die( );
}
$timeID  = (int) mysqli_escape_string($connection, $_GET["timeID"]);
$dayID   = (int) mysqli_escape_string($connection, $_GET["dayID"]);
$subject = mysqli_escape_string($connection, $_GET["subject"]);
$query   = "INSERT INTO time_table (subject, day, time, userID) VALUES ('$subject', $dayID, $timeID, ".Site::$userId.");";
$result  = mysqli_query($connection, $query);
if (!$result) {
	echo "Query failed";
}