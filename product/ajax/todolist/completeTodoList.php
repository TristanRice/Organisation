<?php
include "../../includes/site-include.inc.php";
include "../../config/config.php";
Site::init( $connection );

if (!isset($_GET["id"]) || empty(trim($_GET["id"])) || !is_numeric($_GET["id"]))
{   echo "GET data not submitted";
	die( );
}
$id = mysqli_escape_stirng($_GET["id"]);
$query = "UPDATE todo_list SET complete=1 WHERE id=$id;";
$result = mysqli_query($connection, $query);
if (!$result) echo "Could not delete";