<?php
include "../../includes/site-include.inc.php";
include "../../config/config.php";
Site::init( $connection );
function checkDateFormat( $date ) //checks that the date format is YYYY-MM-DD with regex.
{   return (bool) preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date);
}

if (!array_key_exists("username", $_SESSION	))
{   echo "User not logged in";
	die( );
}
if (!isset($_GET["title"]) || !isset($_GET["newData"])  || !isset($_GET["id"]) || !is_numeric($_GET["id"]))
{   echo "Invalid GET data";
	die( );
}
$data  = mysqli_escape_string($connection, $_GET["newData"]);
$title  = mysqli_escape_string($connection, $_GET["title"]);
$id    = mysqli_escape_string($connection, $_GET["id"]);
$query = "UPDATE todo_list SET data='".$data."', title='".$title."' WHERE user_id=".Site::$userId." AND deleted=0 AND id=".$id.";";
$result = mysqli_query($connection, $query);
if (!$result)
{   echo "Could not upadte the database";
	die( );
}