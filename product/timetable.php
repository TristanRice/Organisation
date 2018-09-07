<?php
include "timetable/timetable.class.php";
include "includes/site-include.inc.php";
include "config/config.php";
Site::init( $connection );
print_r(Site::$userId);
$Timetable = new TimeTable( (int) Site::$userId );
$Timetables = $Timetable->get( );
if (!$Timetables) $errors = $Timetable->aError;
if ($errors=="You do not have any timetables") $none = true; //check if they have made any tables;
$Timetable->add("aaa", "aaa");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Timetables</title>
	</head>
	<body>
		<?php if (isset($errors)) { ?>
			<div class="alert alert-danger"><p><?php echo $errors; ?></p></div>
		<?php } ?>
		<?php if (!$Timetables || sizeof($Timetables) <= 10) { ?>
			
		<?php } else if (sizeof($Timetables) > 10) { ?>
			<div class="alert alert-danger"><p>You cannot have more than 10 timetables</p></div>
		<?php } ?>
		<p>Here, you can edit your timetables</p>
	</body>
</html>