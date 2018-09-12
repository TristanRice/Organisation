<?php
session_start( );
include "../../includes/site-include.inc.php";
include "../../config/config.php";
if (!array_key_exists($_SESSION["username"]))
{   echo "User not logged in";
	die( );
}
$tableName = "data";
if (isset($_GET["date"]))
{   if ($_GET["date"])) $tableName  = "due_by"; 
}
