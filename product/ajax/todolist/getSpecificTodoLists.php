<?php
//right now this is just by date and color
include "../../config/config.php";
include "../../todolist/todolist.class.php";
include "../../includes/site-include.inc.php";



function filter(&$value) {
  $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
//Site::init( $connection );
$Todolist = new Todolist( 2, $connection );

$date      = !empty($_GET["date"])  ? round((time( ) - strtotime($_GET["date"]))/86400): 0;
$color     = !empty($_GET["color"]) ? "#".$_GET["color"]: "";
$completed = $_GET["completed"]=="true" ? 1: 0; //havascript ajax sends as a string :(
//it *should* show completed items by default

$date 	   = mysqli_escape_string($connection, $date);
$col  	   = mysqli_escape_string($connection, $color); //I CBA to keep the # in the URL query
$items     = $Todolist->get(false, "", $date, $limit=-1, $color=strtoupper($col), $completed); //get all the jobs

if (!empty($Todolist->aError)) {
	echo $Todolist->aError;
	echo json_encode(array("error"=>"Failed to retrieve information from database, please try again later")); //todo, move this to $Todolist->aError
	die ( );
}
array_walk_recursive($items, "filter");

echo json_encode($items);