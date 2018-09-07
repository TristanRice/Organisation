<?php
include "timetable/timetable.class.php";
include "includes/site-include.inc.php";
include "config/config.php";
Site::init( $connection );
print_r(Site::$userId);
$Todolist = new Todolist( (int) Site::$userId );
$Todolists = $Todolist->get( );
if (!$Todolist) $errors = $Todolist->aError;
if ($errors=="You do not have any timetables") $none = true; //check if they have made any tables;
$Todolist->add("aaa", "aaa");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Todolists</title>
	</head>
	<body>
		<?php if (isset($errors)) { ?>
			<div class="alert alert-danger"><p><?php echo $errors; ?></p></div>
		<?php } ?>
		<?php if (!$Todolists || sizeof($Todolists) <= 10) { ?>
			
		<?php } else if (sizeof($Todolists) > 10) { ?>
			<div class="alert alert-danger"><p>You cannot have more than 10 timetables</p></div>
		<?php } ?>
		<p>Here, you can edit your timetables</p>
	</body>
</html>