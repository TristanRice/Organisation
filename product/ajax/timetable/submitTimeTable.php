<?php 
include "../../timetable/timetable.class.php";
include "../../config/config.php";
include "../../includes/site-include.inc.php";

Site::init( $connection );

function validateHex( $hex ) {
	return preg_match("/^[#][0-9A-Za-z]{6}$/", $hex);
}
if (!isset($_GET["timeID"]) || !isset($_GET["dayID"]) || !isset($_GET["subject"]) || !isset($_GET["color"])) {
	echo "Invalid GET data entered";
	die( );
} else if (empty(trim($_GET["timeID"])) || !is_numeric($_GET["timeID"]) || empty(trim($_GET["dayID"])) || !is_numeric($_GET["dayID"]) || empty(trim($_GET["subject"])) || !validateHex($_GET["color"])) {
	echo "Invalid GET data submitted";
	die( );
}
$timeID  = (int) mysqli_escape_string($connection, $_GET["timeID"]);
$dayID   = (int) mysqli_escape_string($connection, $_GET["dayID"]);
$subject = mysqli_escape_string($connection, $_GET["subject"]);
$color   = mysqli_escape_string($connection, $_GET["color"]);
$query   = "INSERT INTO time_table (subject, day, time, userID, color) VALUES ('$subject', $dayID, $timeID, ".Site::$userId.", '$color');";
$result  = mysqli_query($connection, $query);
if (!$result) {
	echo "Query failed";
}