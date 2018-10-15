<?php
include "../../todolist/todolist.class.php";
include "../../config/config.php";

$USER_ID = 2; //this will be changed soon

$due_by  = isset($_POST["due_by"]) ? $_POST["due_by"]: "";
$title   = isset($_POST["title"]) ? $_POST["title"]: "";
$content = isset($_POST["content"]) ? $_POST["content"]: "";

$Todolist = new Todolist( $USER_ID, $connection );
$Todolist->add( $due_by, $content, "", "", $title );
if (!empty($Todolist->aError)) {
	echo json_encode(array("error"=>$Todolist->aError));
}