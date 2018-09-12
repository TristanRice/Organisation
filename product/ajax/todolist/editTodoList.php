<?php
session_start( );
include "../../includes/site-include.inc.php";
include "../../config/config.php";

function checkDateFormat( $date ) //checks that the date format is YYYY-MM-DD with regex.
{   return (bool) preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date);
}

if (!array_key_exists($_SESSION["username"]))
{   echo "User not logged in";
	die( );
}
$tableName = "data";
if (isset($_GET["date"]))
{   if ($_GET["date"])) $tableName  = "due_by"; 
}
