<?php
include "../../config/config.php";
include "../../todolist/todolist.class.php";
include "../../includes/site-include.inc.php";

Site::init( $connection );
$Todolist = new Todolist( Site::$userId, $connection );

if (!isset($_GET["id"]) || empty(trim($_GET["id"]))){
	die( );
}

$id = mysqli_escape_string($connection, $_GET["id"]);

if (!$Todolist->restore( $id )) {
	echo $Todolist->aError;
}
