<?php
include "todolist/todolist.class.php";
include "includes/site-include.inc.php";
include "config/config.php";
Site::init( $connection );
$Todolist = new Todolist((int) Site::$userId);
print_r($Todolist->get(  true, 1, 5 ));
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
