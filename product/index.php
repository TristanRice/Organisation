<?php
include "timetable/timetable.class.php";
include "includes/site-include.inc.php";
include "config/config.php";
Site::init( $connection );
$Todolist = new Todolist((int) Site::$userId);
print_r($Todolist->get(  true, 1, 5 ));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include dirname(__DIR__)."/product/includes/head.inc.php"; ?>
  </head>
  <body>
    <?php include dirname(__DIR__)."/product/includes/page-top.inc.php"; ?>

    <?php include dirname(__DIR__)."/product/includes/page-bottom.inc.php"; ?>
  </body>
</html>
