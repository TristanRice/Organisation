<?php
//right now this is just by date and color
include "../../config/config.php";
include "../../todolist/todolist.class.php";
include "../../includes/site-include.inc.php";

Site::init( $connection );
$Todolist = new Todolist( Site::$userId, $connection );

if (!isset($_GET["date"]) || !isset($_GET["color"])) {
	//don't show error message here because they'll just be clicking the button randomly
	echo "";
	die( );
}
//print_r($_GET);
$days 	  = time( ) - strtotime($_GET["date"]);
$datediff = round($days/86400);
$datediff = mysqli_escape_string($connection, $datediff);
$date 	  = mysqli_escape_string($connection, $_GET["date"]);
$col  	  = "#".mysqli_escape_string($connection, $_GET["color"]); 
$items = $Todolist->get(false, "", $datediff, $limit=-1, $color=strtoupper($col), true);
if ($items) {
	echo json_encode($items);
}
