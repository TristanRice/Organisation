<?php
//---------------------------------------
include "todolist/todolist.class.php";
include "timetable/timetable.class.php";
include "includes/site-include.inc.php";
include "config/config.php";
//---------------------------------------

Site::init( $connection );

$Todolist  = new Todolist ( (int) Site::$userId );
$Timetable = new Timetable( Site::$userId );

$aErrors  = [];
$aSuccess = [];

$jobs = $Todolist->get( $limit=5 );

if ($jobs===false){
	$aErrors[] = $Todolist->aError;
} else {
	//make todolist HTML here
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "includes/head.inc.php"; ?>
  </head>
  <body>
    <?php include "includes/page-top.inc.php"; ?>

    <?php include "includes/page-bottom.inc.php"; ?>
  </body>
</html>
