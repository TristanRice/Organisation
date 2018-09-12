<?php
session_start( );
include "../../includes/site-include.inc.php";
include "../../config/config.php";
if (!array_key_exists("username", $_SESSION)) //make sure that the user is logged in before doing anything else
{   echo "user not logged in";
	die( );
} else if (!array_key_exists("id", $_GET))
{   echo "ID not provided";
	die( );
} else if (!is_numeric($_GET["id"]))
{   echo "Invalid id provided";
	die( );
}
$userId = Site::getIdFromUsername( $connection, $_SESSION["username"] );
$listId = mysqli_escape_string( $connection, $_GET["id"]);
$userId = mysqli_escape_string( $connection, $userId );
$query  = "DELETE FROM todo_list WHERE user_id=$userId AND id=$listId;";
$result = mysqli_query($connection, $query);
if (!$result)
{   //return 403 or something similar here, to make the ajax purposelly fail
}
//nothing more is needed beyond this point. If nothign more is done, then this will be a successful request, and I can show that in the 
//success: key on the ajax frontend. 

