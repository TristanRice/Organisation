<?php

include "../../config/config.php";
include "../../includes/site-include.inc.php";
Site::init( $connection );

if (!isset($_GET["dayID"]) || !isset($_GET["timeID"])) {
	echo "Not enough GET information entered";
} else if (empty(trim($_GET["dayID"])) || empty(trim($_GET["timeID"]))) {
	echo "one or more piece of data is empty";
} else if (!is_numeric($_GET["dayID"]) || !is_numeric($_GET["timeID"])) {
	echo "Both values must be numeric";
}

$timeID = mysqli_escape_string($connection, $_GET["timeID"]);
$dayID  = mysqli_escape_string($connection, $_GET["dayID"]);
$query  = "DELETE FROM time_table WHERE time=$timeID AND day=$dayID AND userID=".Site::$userId.";";
$result = mysqli_query($connection, $query);
if (!$result) {
	echo "Fialed to delete";
}